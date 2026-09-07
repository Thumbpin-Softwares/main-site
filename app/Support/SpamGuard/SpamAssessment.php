<?php

namespace App\Support\SpamGuard;

/**
 * The verdict on a single form submission.
 *
 * Deliberately dumb: it carries a score and the list of rules that fired, and
 * knows how to hand those to a model as column values. All the judgement lives
 * in SpamGuard.
 */
class SpamAssessment
{
    /** @var int */
    public $score;

    /** @var array<int, string> Rule keys that fired, e.g. ['honeypot', 'too_fast'] */
    public $reasons;

    /** @var int Score at or above which this counts as spam */
    public $threshold;

    public function __construct(int $score = 0, array $reasons = [], int $threshold = 100)
    {
        $this->score     = $score;
        $this->reasons   = $reasons;
        $this->threshold = $threshold;
    }

    /**
     * A clean verdict, used when the guard is disabled entirely.
     */
    public static function clean(): self
    {
        return new self(0, [], PHP_INT_MAX);
    }

    public function isSpam(): bool
    {
        return $this->score >= $this->threshold;
    }

    /**
     * Column values to merge into the row being written.
     *
     * spam_reasons is stored as JSON so Voyager shows it as readable text and
     * you can see at a glance *why* something was flagged.
     */
    public function toAttributes(): array
    {
        return [
            'is_spam'      => $this->isSpam(),
            'spam_score'   => $this->score,
            'spam_reasons' => $this->reasons ? json_encode(array_values($this->reasons)) : null,
        ];
    }

    /**
     * Human-readable summary, for log lines and the report command.
     */
    public function summary(): string
    {
        if (! $this->reasons) {
            return 'clean';
        }

        return $this->score . ' (' . implode(', ', $this->reasons) . ')';
    }
}
