<?php

namespace App\Http\Middleware;

use App\Support\SpamGuard\SpamGuard;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Runs SpamGuard over an incoming form post and attaches the verdict to the
 * request, so controllers can persist it without each one re-implementing the
 * checks.
 *
 * Apply with the 'spamguard' route middleware. The optional parameters are the
 * field names that make up the body of that form, used for duplicate
 * detection:
 *
 *     Route::post('/contact', ...)->middleware('spamguard:name,email,message');
 *
 * In 'flag' mode this never rejects anything -- it only annotates. In 'block'
 * mode a spam verdict is turned away here and the controller never runs.
 */
class GuardAgainstSpam
{
    /** Request attribute the verdict is stored under. */
    public const ATTRIBUTE = 'spam_assessment';

    /** @var SpamGuard */
    private $guard;

    public function __construct(SpamGuard $guard)
    {
        $this->guard = $guard;
    }

    public function handle(Request $request, Closure $next, ...$contentFields)
    {
        $assessment = $this->guard->assess($request, $contentFields);

        $request->attributes->set(self::ATTRIBUTE, $assessment);

        if ($assessment->isSpam()) {
            Log::info('SpamGuard: ' . config('spamguard.mode') . ' — score ' . $assessment->summary(), [
                'ip'    => $request->ip(),
                'route' => $request->path(),
            ]);

            if (config('spamguard.mode') === 'block') {
                return $this->reject($request);
            }
        }

        return $next($request);
    }

    /**
     * Deliberately indistinguishable from success.
     *
     * Telling a bot "you look like a bot" is free feedback for tuning its way
     * past us; a human hitting a false positive sees the same thank-you they
     * would have seen anyway. The submission is simply not stored.
     */
    private function reject(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! We\'ll be in touch shortly.',
            ]);
        }

        return redirect(route('thank-you'));
    }
}
