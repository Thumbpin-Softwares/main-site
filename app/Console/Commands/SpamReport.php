<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Reviews lead rows that already exist and reports which ones look like spam.
 *
 * Reports only by default -- nothing is written unless you pass --apply, and
 * even then it only sets is_spam. No row is ever deleted.
 *
 *   php artisan leads:spam-report                  # everything, report only
 *   php artisan leads:spam-report --days=90        # recent rows only
 *   php artisan leads:spam-report --table=contacts # one table
 *   php artisan leads:spam-report --show           # print each flagged row
 *   php artisan leads:spam-report --apply          # write is_spam=1
 *
 * NOTE ON METHOD: the live guard deliberately judges submissions on behaviour
 * (honeypot, timing, rate) and never on what the person wrote. Rows that
 * pre-date the guard have no behavioural evidence attached -- so this command
 * has to fall back on the content itself, which is inherently less reliable.
 * That is exactly why it reports rather than deletes: read the output before
 * you trust it.
 */
class SpamReport extends Command
{
    protected $signature = 'leads:spam-report
                            {--table= : Limit to one table}
                            {--days= : Only rows created in the last N days}
                            {--show : Print every flagged row}
                            {--apply : Write is_spam=1 on the flagged rows}';

    protected $description = 'Score existing lead rows for spam and report what would be flagged';

    /**
     * Columns to read per table, in the order [name, email, phone, body].
     * A null means the table has no such column.
     */
    private const COLUMN_MAP = [
        'contacts'                    => ['name', 'email', 'mobile',  'message'],
        'inquiry_forms'               => ['name', 'email', 'mobile',  'requirement'],
        'project_forms'               => ['name', 'email', 'mobile',  'requirement'],
        'task_forms'                  => [null,   null,    null,      'task'],
        'real_estate_leads'           => ['name', 'email', 'contact', 'requirement'],
        'video_production_leads'      => ['name', 'email', 'phone',   'message'],
        'advertising_agency_contacts' => ['name', 'email', 'phone',   'message'],
    ];

    public function handle(): int
    {
        $tables = $this->option('table')
            ? [$this->option('table')]
            : config('spamguard.tables');

        $grandTotal = 0;
        $grandFlagged = 0;

        foreach ($tables as $table) {
            if (! Schema::hasTable($table)) {
                $this->warn("skipping {$table} — table does not exist");
                continue;
            }

            if (! Schema::hasColumn($table, 'is_spam')) {
                $this->warn("skipping {$table} — run `php artisan migrate` first");
                continue;
            }

            [$total, $flagged] = $this->scanTable($table);
            $grandTotal   += $total;
            $grandFlagged += $flagged;
        }

        $this->newLine();
        $this->line(str_repeat('=', 60));
        $this->info("Total: {$grandFlagged} of {$grandTotal} rows look like spam");

        if ($grandFlagged > 0 && ! $this->option('apply')) {
            $this->newLine();
            $this->comment('Nothing was written. Re-run with --show to read them,');
            $this->comment('then --apply to mark them as spam (reversible; no deletes).');
        }

        return self::SUCCESS;
    }

    /**
     * @return array{0:int, 1:int} [rows scanned, rows flagged]
     */
    private function scanTable(string $table): array
    {
        [$nameCol, $emailCol, $phoneCol, $bodyCol] = self::COLUMN_MAP[$table]
            ?? [null, null, null, null];

        $query = DB::table($table);

        if ($days = $this->option('days')) {
            $query->where('created_at', '>=', now()->subDays((int) $days));
        }

        $rows = $query->orderBy('id')->get();

        if ($rows->isEmpty()) {
            $this->line("{$table}: empty");
            return [0, 0];
        }

        // Count submissions per IP across the whole set, so a single address
        // responsible for dozens of rows stands out.
        $ipCounts = $rows->groupBy('ip')->map->count();

        // Fingerprint bodies so repeated identical text stands out.
        $bodyCounts = $bodyCol
            ? $rows->groupBy(fn ($r) => Str::lower(trim((string) ($r->{$bodyCol} ?? ''))))->map->count()
            : collect();

        $flagged = [];

        foreach ($rows as $row) {
            $reasons = $this->scoreRow($row, $nameCol, $emailCol, $phoneCol, $bodyCol, $ipCounts, $bodyCounts);

            if ($reasons) {
                $flagged[] = ['row' => $row, 'reasons' => $reasons];
            }
        }

        $count = count($flagged);
        $this->newLine();
        $this->line("<options=bold>{$table}</>: {$count} of {$rows->count()} rows look like spam");

        if ($this->option('show')) {
            foreach ($flagged as $item) {
                $row  = $item['row'];
                $name = $nameCol ? ($row->{$nameCol} ?? '') : '(no name column)';
                $mail = $emailCol ? ($row->{$emailCol} ?? '') : '';
                $body = $bodyCol ? Str::limit((string) ($row->{$bodyCol} ?? ''), 70) : '';

                $this->line(sprintf(
                    '  #%-6s %-24s %-30s %s',
                    $row->id,
                    Str::limit((string) $name, 22),
                    Str::limit((string) $mail, 28),
                    '[' . implode(', ', $item['reasons']) . ']'
                ));

                if ($body !== '') {
                    $this->line('         ' . str_replace(["\n", "\r"], ' ', $body));
                }
            }
        }

        if ($this->option('apply') && $count > 0) {
            foreach (array_chunk($flagged, 200) as $chunk) {
                foreach ($chunk as $item) {
                    DB::table($table)->where('id', $item['row']->id)->update([
                        'is_spam'      => true,
                        'spam_reasons' => json_encode($item['reasons']),
                    ]);
                }
            }
            $this->info("  → marked {$count} rows in {$table} as spam");
        }

        return [$rows->count(), $count];
    }

    /**
     * @return array<int, string> Reasons this row looks like spam; empty if clean.
     */
    private function scoreRow(
        $row,
        ?string $nameCol,
        ?string $emailCol,
        ?string $phoneCol,
        ?string $bodyCol,
        $ipCounts,
        $bodyCounts
    ): array {
        $reasons = [];

        $name  = $nameCol  ? (string) ($row->{$nameCol}  ?? '') : '';
        $email = $emailCol ? (string) ($row->{$emailCol} ?? '') : '';
        $phone = $phoneCol ? (string) ($row->{$phoneCol} ?? '') : '';
        $body  = $bodyCol  ? (string) ($row->{$bodyCol}  ?? '') : '';
        $agent = (string) ($row->user_agent ?? '');

        // --- Behavioural signals (the reliable ones) ---------------------

        if (trim($agent) === '') {
            $reasons[] = 'no-user-agent';
        } elseif ($this->looksLikeBotAgent($agent)) {
            $reasons[] = 'bot-user-agent';
        }

        $ip = $row->ip ?? null;
        if ($ip && ($ipCounts[$ip] ?? 0) >= 10) {
            $reasons[] = 'ip-x' . $ipCounts[$ip];
        }

        if ($body !== '') {
            $key = Str::lower(trim($body));
            if (($bodyCounts[$key] ?? 0) >= 3) {
                $reasons[] = 'repeated-x' . $bodyCounts[$key];
            }
        }

        // --- Content signals (weaker; review before trusting) ------------

        // Links in a message are the single strongest spam tell in practice --
        // SEO and backlink spam exists to place a URL.
        if (preg_match_all('#https?://|www\.#i', $body, $m) && count($m[0]) >= 2) {
            $reasons[] = 'links-x' . count($m[0]);
        }

        // A URL in a *name* field is never legitimate.
        if ($name !== '' && preg_match('#https?://|www\.|\.(com|net|ru|xyz|top|online)\b#i', $name)) {
            $reasons[] = 'url-in-name';
        }

        // BBCode/HTML anchors are pure spam-tooling artefacts.
        if (preg_match('#\[url[=\]]|<a\s+href#i', $body)) {
            $reasons[] = 'markup-in-body';
        }

        // A phone number that contains no digits, or absurdly many.
        if ($phone !== '') {
            $digits = preg_replace('/\D+/', '', $phone);
            if (strlen($digits) < 7 || strlen($digits) > 15) {
                $reasons[] = 'bad-phone';
            }
        }

        // A syntactically invalid email address.
        if ($email !== '' && ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reasons[] = 'bad-email';
        }

        return $reasons;
    }

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
}
