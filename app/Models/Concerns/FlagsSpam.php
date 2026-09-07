<?php

namespace App\Models\Concerns;

use App\Support\SpamGuard\SpamAssessment;
use Illuminate\Database\Eloquent\Builder;

/**
 * Shared behaviour for models that store a public form submission.
 *
 * Gives every lead model the same three columns, the same scopes, and one way
 * to record a verdict, so the controllers don't each hand-roll it.
 */
trait FlagsSpam
{
    /**
     * Only genuine-looking submissions. Use this anywhere leads are counted,
     * exported or reported on.
     */
    public function scopeNotSpam(Builder $query): Builder
    {
        return $query->where('is_spam', false);
    }

    /**
     * Only what the guard rejected -- the review queue.
     */
    public function scopeSpam(Builder $query): Builder
    {
        return $query->where('is_spam', true);
    }

    /**
     * Copy a verdict onto this model. Does not save.
     */
    public function applySpamAssessment(SpamAssessment $assessment): self
    {
        foreach ($assessment->toAttributes() as $column => $value) {
            $this->{$column} = $value;
        }

        return $this;
    }

    /**
     * Rule keys that fired, as an array. Empty for clean rows.
     *
     * @return array<int, string>
     */
    public function getSpamReasonListAttribute(): array
    {
        if (empty($this->spam_reasons)) {
            return [];
        }

        return json_decode($this->spam_reasons, true) ?: [];
    }
}
