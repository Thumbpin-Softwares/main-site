<?php

namespace App\Support\SpamGuard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Scores a form submission on how bot-like it looks.
 *
 * Every rule here is invisible to a real visitor -- there is nothing extra to
 * read, click or solve. Rules are additive: each one that fires adds its weight
 * from config/spamguard.php, and the total is compared against the threshold.
 *
 * Deliberately NOT included: any inspection of what the person actually wrote.
 * Keyword and link scoring is what produces false positives on genuine leads
 * (a real client pasting a Drive link, a name this codebase's rules don't
 * expect), and losing one real enquiry costs more than filing ten spam ones.
 */
class SpamGuard
{
    /**
     * Assess a submission.
     *
     * @param  array<int, string> $contentFields Field names that make up the
     *         "body" of this form, used for duplicate detection. Order matters
     *         only in that it must be stable between submissions.
     */
    public function assess(Request $request, array $contentFields = []): SpamAssessment
    {
        if (! config('spamguard.enabled')) {
            return SpamAssessment::clean();
        }

        $weights = config('spamguard.weights');
        $score   = 0;
        $reasons = [];

        $add = function (string $rule) use (&$score, &$reasons, $weights) {
            $weight = (int) ($weights[$rule] ?? 0);
            if ($weight > 0) {
                $score += $weight;
                $reasons[] = $rule;
            }
        };

        // --- 1. Honeypot -------------------------------------------------
        // A field hidden from sighted users and skipped by keyboard/AT. Only
        // something filling every input it finds will touch it.
        $honeypot = $request->input(config('spamguard.honeypot_field'));
        if (! empty($honeypot)) {
            $add('honeypot');
        }

        // --- 2. Timing ---------------------------------------------------
        $this->assessTiming($request, $add);

        // --- 3. User-Agent -----------------------------------------------
        $agent = (string) $request->userAgent();
        if (trim($agent) === '') {
            $add('empty_agent');
        } elseif ($this->looksLikeBotAgent($agent)) {
            $add('bot_agent');
        }

        // --- 4. Per-IP rate ----------------------------------------------
        if ($this->exceedsRate($request)) {
            $add('rate_limited');
        }

        // --- 5. Duplicate payload ----------------------------------------
        if ($contentFields && $this->isDuplicate($request, $contentFields)) {
            $add('duplicate');
        }

        // --- 6. Turnstile ------------------------------------------------
        // Only runs once real keys exist in .env; inert until then.
        if (config('spamguard.turnstile.enabled') && ! $this->turnstilePasses($request)) {
            $add('turnstile_failed');
        }

        return new SpamAssessment($score, $reasons, (int) config('spamguard.threshold'));
    }

    /**
     * Timing trap: the form stamps the page-render time into a signed field,
     * so we know how long the visitor actually had it open.
     *
     * The stamp is signed with the app key. An unsigned integer would just be
     * rewritten by any bot that noticed it.
     */
    private function assessTiming(Request $request, callable $add): void
    {
        $raw = $request->input(config('spamguard.timestamp_field'));

        if (empty($raw)) {
            $add('no_timestamp');
            return;
        }

        $issuedAt = $this->unsignTimestamp($raw);

        if ($issuedAt === null) {
            $add('bad_timestamp');
            return;
        }

        $elapsed = time() - $issuedAt;

        // Negative elapsed means a stamp from the future -- forged, or clocks
        // are wrong. Either way it isn't a normal submission.
        if ($elapsed < 0) {
            $add('bad_timestamp');
            return;
        }

        if ($elapsed < (int) config('spamguard.min_fill_seconds')) {
            $add('too_fast');
        } elseif ($elapsed > (int) config('spamguard.max_form_age')) {
            // Weak signal only: someone genuinely can leave a tab open all day.
            $add('stale_form');
        }
    }

    /**
     * Sign the current time for embedding in a form.
     */
    public function signedTimestamp(): string
    {
        $time = time();

        return $time . '.' . $this->timestampHash($time);
    }

    /**
     * @return int|null Unix time, or null if the value was forged or malformed.
     */
    private function unsignTimestamp(string $raw): ?int
    {
        if (substr_count($raw, '.') !== 1) {
            return null;
        }

        [$time, $hash] = explode('.', $raw, 2);

        if (! ctype_digit($time)) {
            return null;
        }

        if (! hash_equals($this->timestampHash((int) $time), $hash)) {
            return null;
        }

        return (int) $time;
    }

    private function timestampHash(int $time): string
    {
        return hash_hmac('sha256', 'spamguard|' . $time, config('app.key'));
    }

    /**
     * True once this IP has submitted more than max_per_ip times inside the
     * decay window. Counts this submission.
     */
    private function exceedsRate(Request $request): bool
    {
        $max = (int) config('spamguard.max_per_ip');
        if ($max <= 0) {
            return false;
        }

        $key   = 'spamguard:rate:' . sha1((string) $request->ip());
        $decay = (int) config('spamguard.decay_seconds');

        $count = (int) Cache::get($key, 0) + 1;
        Cache::put($key, $count, $decay);

        return $count > $max;
    }

    /**
     * True if this exact payload was submitted recently.
     */
    private function isDuplicate(Request $request, array $contentFields): bool
    {
        $window = (int) config('spamguard.duplicate_window');
        if ($window <= 0) {
            return false;
        }

        $parts = [];
        foreach ($contentFields as $field) {
            $parts[$field] = Str::lower(trim((string) $request->input($field)));
        }

        // An empty payload isn't a meaningful fingerprint -- validation will
        // reject it anyway, and hashing it would make every empty POST a
        // "duplicate" of the last one.
        if (trim(implode('', $parts)) === '') {
            return false;
        }

        $key = 'spamguard:dupe:' . sha1(json_encode($parts));

        if (Cache::has($key)) {
            return true;
        }

        Cache::put($key, true, $window);

        return false;
    }

    /**
     * Matches agents that announce themselves as automation. Real browsers
     * never carry these tokens; well-behaved crawlers do and shouldn't be
     * POSTing forms anyway.
     */
    private function looksLikeBotAgent(string $agent): bool
    {
        $tokens = [
            'curl/', 'wget', 'python-requests', 'python-urllib', 'httpclient',
            'go-http-client', 'okhttp', 'java/', 'libwww-perl', 'scrapy',
            'phantomjs', 'headlesschrome', 'selenium', 'puppeteer', 'playwright',
            'axios/', 'guzzlehttp', 'postman', 'insomnia', 'bot', 'spider', 'crawler',
        ];

        $agent = Str::lower($agent);

        foreach ($tokens as $token) {
            if (Str::contains($agent, $token)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verify the Turnstile response token with Cloudflare.
     *
     * Fails open on a network error: if Cloudflare is unreachable we would
     * rather file a few spam leads than reject every real one while they are
     * down. The invisible rules still apply in the meantime.
     */
    private function turnstilePasses(Request $request): bool
    {
        $token = $request->input('cf-turnstile-response');

        if (empty($token)) {
            return false;
        }

        try {
            $response = Http::timeout((int) config('spamguard.turnstile.timeout'))
                ->asForm()
                ->post(config('spamguard.turnstile.verify_url'), [
                    'secret'   => config('spamguard.turnstile.secret_key'),
                    'response' => $token,
                    'remoteip' => $request->ip(),
                ]);

            return (bool) ($response->json('success') ?? false);
        } catch (\Throwable $e) {
            Log::warning('Turnstile verification unreachable, allowing submission: ' . $e->getMessage());

            return true;
        }
    }
}
