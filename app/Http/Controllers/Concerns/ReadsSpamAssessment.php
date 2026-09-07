<?php

namespace App\Http\Controllers\Concerns;

use App\Http\Middleware\GuardAgainstSpam;
use App\Support\SpamGuard\SpamAssessment;
use Illuminate\Http\Request;

/**
 * Pulls the verdict GuardAgainstSpam attached to the request.
 *
 * Falls back to a clean assessment when the middleware didn't run -- a console
 * call, a test that posts directly, or a route someone adds later and forgets
 * to guard. Better to store the lead unflagged than to fatal.
 */
trait ReadsSpamAssessment
{
    protected function spamAssessment(Request $request): SpamAssessment
    {
        $assessment = $request->attributes->get(GuardAgainstSpam::ATTRIBUTE);

        return $assessment instanceof SpamAssessment ? $assessment : SpamAssessment::clean();
    }
}
