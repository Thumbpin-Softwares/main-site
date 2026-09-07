<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Master switch
    |--------------------------------------------------------------------------
    | Turn the whole guard off without touching code. When disabled, every
    | submission is treated as clean and stored exactly as it was before.
    */
    'enabled' => env('SPAMGUARD_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Mode
    |--------------------------------------------------------------------------
    | 'flag'  - spam is still stored, marked is_spam=1, and no notification
    |           email is sent. Nothing is ever lost to a false positive.
    | 'block' - spam is rejected at submission and never stored.
    |
    | Start on 'flag'. Watch what it catches (php artisan leads:spam-report),
    | and only move to 'block' once you trust the rules.
    */
    'mode' => env('SPAMGUARD_MODE', 'flag'),

    /*
    |--------------------------------------------------------------------------
    | Score threshold
    |--------------------------------------------------------------------------
    | A submission is spam once its score reaches this number. Individual rule
    | weights live in 'weights' below; 100 is "certain", so the default of 100
    | means one certain signal, or two strong-but-not-certain ones, is enough.
    */
    'threshold' => env('SPAMGUARD_THRESHOLD', 100),

    /*
    |--------------------------------------------------------------------------
    | Rule weights
    |--------------------------------------------------------------------------
    | Set any weight to 0 to disable that rule.
    */
    'weights' => [
        'honeypot'        => 100, // a hidden field a human never sees was filled in
        'too_fast'        => 70,  // form submitted faster than a human could type it
        'no_timestamp'    => 30,  // our timing field was stripped or never loaded
        'bad_timestamp'   => 60,  // timing field present but forged or unreadable
        'stale_form'      => 25,  // page sat open far longer than 'max_form_age'
        'rate_limited'    => 60,  // this IP is submitting faster than a human would
        'duplicate'       => 55,  // byte-identical submission seen recently
        'empty_agent'     => 50,  // no User-Agent header at all
        'bot_agent'       => 70,  // User-Agent self-identifies as a script/crawler
        'turnstile_failed'=> 100, // captcha was enabled and did not pass
    ],

    /*
    |--------------------------------------------------------------------------
    | Timing trap
    |--------------------------------------------------------------------------
    | 'min_fill_seconds' is the fastest a genuine person could plausibly fill
    | the form in. 'max_form_age' guards against a token harvested once and
    | replayed for days. Both in seconds.
    */
    'min_fill_seconds' => env('SPAMGUARD_MIN_SECONDS', 4),
    'max_form_age'     => env('SPAMGUARD_MAX_FORM_AGE', 60 * 60 * 12),

    /*
    |--------------------------------------------------------------------------
    | Rate limiting
    |--------------------------------------------------------------------------
    | More than 'max_per_ip' submissions from one IP inside 'decay_seconds'
    | scores the 'rate_limited' weight. Deliberately loose: a family or office
    | behind one NAT address should never trip it.
    */
    'max_per_ip'    => env('SPAMGUARD_MAX_PER_IP', 5),
    'decay_seconds' => env('SPAMGUARD_DECAY', 3600),

    /*
    |--------------------------------------------------------------------------
    | Duplicate detection
    |--------------------------------------------------------------------------
    | How long an identical payload is remembered, in seconds. A real person
    | double-clicking submit trips this too, which is fine -- the duplicate is
    | the row you want flagged either way.
    */
    'duplicate_window' => env('SPAMGUARD_DUPLICATE_WINDOW', 6 * 3600),

    /*
    |--------------------------------------------------------------------------
    | Field names
    |--------------------------------------------------------------------------
    | The honeypot is named after something bots want to fill. Change it if you
    | ever suspect a bot has learned it -- update inc/spam-fields.blade.php too,
    | since it reads these same config values.
    */
    'honeypot_field'  => 'website_url',
    'timestamp_field' => '_ts',

    /*
    |--------------------------------------------------------------------------
    | Cloudflare Turnstile
    |--------------------------------------------------------------------------
    | Free, privacy-friendly, and invisible for nearly all real visitors. Stays
    | completely inert until both keys are present in .env, so nothing breaks
    | before you create them:
    |
    |   1. https://dash.cloudflare.com  ->  Turnstile  ->  Add site
    |   2. Widget mode: Managed. Add your domain(s).
    |   3. Put the two keys in .env:
    |        TURNSTILE_SITE_KEY=0x...
    |        TURNSTILE_SECRET_KEY=0x...
    |
    | With no keys set, 'enabled' below resolves false and the captcha rule is
    | skipped entirely -- the invisible checks still run.
    */
    'turnstile' => [
        'site_key'   => env('TURNSTILE_SITE_KEY'),
        'secret_key' => env('TURNSTILE_SECRET_KEY'),
        'enabled'    => (bool) (env('TURNSTILE_SITE_KEY') && env('TURNSTILE_SECRET_KEY')),
        'verify_url' => 'https://challenges.cloudflare.com/turnstile/v0/siteverify',
        'timeout'    => 5,
    ],

    /*
    |--------------------------------------------------------------------------
    | Tables the guard writes its verdict to
    |--------------------------------------------------------------------------
    | Used by the migration and by leads:spam-report. Keep in sync if you add
    | another lead table.
    */
    'tables' => [
        'contacts',
        'inquiry_forms',
        'project_forms',
        'task_forms',
        'real_estate_leads',
        'video_production_leads',
        'advertising_agency_contacts',
    ],

];
