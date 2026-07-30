#!/bin/bash
#
# Manual deploy, for running over SSH on the cPanel host:
#
#     cd ~/repositories/thumbpin-main && ./deploy.sh
#
# Mirrors .cpanel.yml, so it stays useful whether or not cPanel's
# "Deploy HEAD Commit" button is available.
#
set -euo pipefail

REPOPATH="${REPOPATH:-$HOME/repositories/thumbpin-main}"
DEPLOYPATH="${DEPLOYPATH:-$HOME/public_html}"

# /usr/local/bin/php on this host is 7.4; the app requires >= 8.2.
PHPBIN="${PHPBIN:-}"
if [ -z "$PHPBIN" ]; then
    for candidate in /opt/cpanel/ea-php84/root/usr/bin/php \
                     /opt/cpanel/ea-php83/root/usr/bin/php \
                     /opt/cpanel/ea-php82/root/usr/bin/php; do
        [ -x "$candidate" ] && PHPBIN="$candidate" && break
    done
fi
[ -n "$PHPBIN" ] || { echo "!! no PHP >= 8.2 binary found under /opt/cpanel"; exit 1; }

echo "repo:   $REPOPATH"
echo "deploy: $DEPLOYPATH"
echo "php:    $PHPBIN ($("$PHPBIN" -r 'echo PHP_VERSION;'))"
echo

echo "==> pulling latest"
git -C "$REPOPATH" pull --ff-only

echo "==> syncing public/ into document root"
# .htaccess and index.php are deliberately excluded: cPanel's MultiPHP handler
# lives in public_html/.htaccess and is not tracked in git. Overwriting it drops
# the domain to the default PHP 7.4 and takes the site down. No rsync on this host,
# so tar provides the per-file excludes.
( cd "$REPOPATH/public" && tar -cf - --exclude=.htaccess --exclude=index.php . ) \
    | ( cd "$DEPLOYPATH" && tar -xf - )

echo "==> clearing caches"
cd "$REPOPATH"
"$PHPBIN" artisan view:clear   || echo "   (view:clear failed, continuing)"
"$PHPBIN" artisan config:clear || echo "   (config:clear failed, continuing)"
"$PHPBIN" artisan route:clear  || echo "   (route:clear failed, continuing)"

echo
echo "==> verifying"
if grep -q 'footer-services' "$DEPLOYPATH/assets/css/style.css" 2>/dev/null; then
    echo "    footer CSS present"
else
    echo "    !! footer CSS MISSING in $DEPLOYPATH/assets/css/style.css"
fi
echo "    app.css lines: $(wc -l < "$DEPLOYPATH/css/app.css" 2>/dev/null || echo '?') (1 = minified prod build)"

echo
echo "DEPLOY DONE"
