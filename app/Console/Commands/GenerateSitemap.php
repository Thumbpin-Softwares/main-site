<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Throwable;

/**
 * Regenerates public/sitemap.xml from the registered routes.
 *
 * Run on every deploy (see deploy.sh) so <lastmod> reflects reality instead of
 * drifting -- the hand-maintained file had /about pinned at 2023 while the page
 * was being rewritten.
 *
 * <lastmod> comes from the mtime of the Blade view backing each route, so a page
 * only gets a new date when its template actually changes. Bumping every URL on
 * every deploy trains crawlers to ignore the signal.
 */
class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate
                            {--output= : Where to write (defaults to public/sitemap.xml)}
                            {--base= : Base URL (defaults to config app.url)}
                            {--dry-run : Print the XML instead of writing it}';

    protected $description = 'Generate public/sitemap.xml from the application routes';

    /** URI prefixes that must never appear in a public sitemap. */
    private array $excludedPrefixes = ['admin', 'api', '_debugbar', '_ignition', 'storage'];

    /** Indexable-but-unwanted URIs: conversion pages carry no search value. */
    private array $excludedUris = ['thank-you'];

    /**
     * Routes whose view cannot be read off the route definition (controller-backed).
     * Without an entry here they still get listed, just with a coarser lastmod.
     */
    private array $viewMap = [
        'home' => 'visitors.index_new',
        'blog' => 'visitors.blog',
    ];

    public function handle(): int
    {
        $base = rtrim($this->option('base') ?: config('app.url'), '/');

        if (Str::contains($base, ['localhost', '127.0.0.1'])) {
            $this->warn("Base URL is \"{$base}\" -- looks like a local APP_URL.");
            $this->warn('Set APP_URL in .env, or pass --base=https://www.thumbpin.in');
        }

        $entries = $this->staticRoutes($base);
        $blogCount = count($entries);
        $entries = array_merge($entries, $this->blogPosts($base));
        $blogCount = count($entries) - $blogCount;

        $xml = $this->render($entries);

        if ($this->option('dry-run')) {
            $this->line($xml);
            return self::SUCCESS;
        }

        $path = $this->option('output') ?: public_path('sitemap.xml');
        file_put_contents($path, $xml);

        $this->info(sprintf(
            'Wrote %d URLs (%d pages + %d blog posts) to %s',
            count($entries), count($entries) - $blogCount, $blogCount, $path
        ));

        return self::SUCCESS;
    }

    /** Every GET route that is a real, parameterless, public page. */
    private function staticRoutes(string $base): array
    {
        $entries = [];
        $seen = [];

        foreach (Route::getRoutes() as $route) {
            if (! in_array('GET', $route->methods(), true)) {
                continue;
            }

            $uri = trim($route->uri(), '/');

            // Parameterised routes (/blog/{slug}) are expanded separately.
            if (Str::contains($uri, '{')) {
                continue;
            }

            if ($this->isExcluded($uri) || ! $this->isOwnRoute($route)) {
                continue;
            }

            $loc = $uri === '' ? $base.'/' : $base.'/'.$uri;

            if (isset($seen[$loc])) {
                continue;
            }
            $seen[$loc] = true;

            $entries[] = [
                'loc'      => $loc,
                'lastmod'  => $this->lastModified($route),
                'priority' => $this->priority($uri),
            ];
        }

        return $entries;
    }

    /**
     * Only our own pages belong in the sitemap. Packages register GET routes too
     * (arrilot/load-widget, sanctum/csrf-cookie), and blocklisting each vendor
     * prefix means fixing this again on every new dependency.
     */
    private function isOwnRoute($route): bool
    {
        // Route::view(...) points at Illuminate's ViewController and keeps the
        // view name in $route->defaults, so match on that rather than the action.
        if ($this->routeView($route)) {
            return true;
        }

        $controller = $route->getAction('controller');

        return is_string($controller)
            && Str::startsWith($controller, 'App\\Http\\Controllers\\');
    }

    /** The Blade view backing a route, or null if it cannot be determined. */
    private function routeView($route): ?string
    {
        return $route->defaults['view']
            ?? ($route->getName() ? ($this->viewMap[$route->getName()] ?? null) : null);
    }

    private function isExcluded(string $uri): bool
    {
        if (in_array($uri, $this->excludedUris, true)) {
            return true;
        }

        foreach ($this->excludedPrefixes as $prefix) {
            if ($uri === $prefix || Str::startsWith($uri, $prefix.'/')) {
                return true;
            }
        }

        return false;
    }

    /**
     * Published blog posts. Skipped without failing the deploy when the database
     * is unreachable -- a sitemap missing its blog entries beats a failed deploy.
     */
    private function blogPosts(string $base): array
    {
        if (! Route::has('blog-detail')) {
            return [];
        }

        try {
            $posts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')
                ->select('slug', 'updated_at')
                ->get();
        } catch (Throwable $e) {
            $this->warn('Skipping blog posts: '.$e->getMessage());
            return [];
        }

        return $posts->map(fn ($post) => [
            'loc'      => $base.'/blog/'.$post->slug,
            'lastmod'  => optional($post->updated_at)->toIso8601String() ?? $this->now(),
            'priority' => $this->priority('blog/'.$post->slug),
        ])->all();
    }

    /** Mirrors the previous generator: 0.8^depth, with the homepage at 1.00. */
    private function priority(string $uri): string
    {
        if ($uri === '') {
            return '1.00';
        }

        $depth = count(explode('/', $uri));

        return number_format(max(0.8 ** $depth, 0.30), 2);
    }

    private function lastModified($route): string
    {
        if ($view = $this->routeView($route)) {
            $path = resource_path('views/'.str_replace('.', '/', $view).'.blade.php');

            if (is_file($path)) {
                return date('c', filemtime($path));
            }
        }

        return $this->now();
    }

    private function now(): string
    {
        return date('c');
    }

    private function render(array $entries): string
    {
        $lines = [
            '<?xml version="1.0" encoding="UTF-8"?>',
            '<urlset',
            '      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"',
            '      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"',
            '      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9',
            '            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">',
            '',
        ];

        foreach ($entries as $entry) {
            $lines[] = '<url>';
            $lines[] = '  <loc>'.htmlspecialchars($entry['loc'], ENT_XML1).'</loc>';
            $lines[] = '  <lastmod>'.$entry['lastmod'].'</lastmod>';
            $lines[] = '  <priority>'.$entry['priority'].'</priority>';
            $lines[] = '</url>';
            $lines[] = '';
        }

        $lines[] = '</urlset>';

        return implode("\n", $lines)."\n";
    }
}
