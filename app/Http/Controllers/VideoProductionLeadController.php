<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ReadsSpamAssessment;
use Illuminate\Http\Request;
use App\Models\VideoProductionLead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VideoProductionLeadController extends Controller
{
    use ReadsSpamAssessment;

    /**
     * Store a new video production lead submission
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'video_type'   => 'required|string|max:100',
            'budget_range' => 'required|string|max:100',
            'message'      => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the following errors',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $lead = VideoProductionLead::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'company_name' => $request->company_name,
                'video_type'   => $request->video_type,
                'budget_range' => $request->budget_range,
                'message'      => $request->message,
                'ip'           => $request->ip(),
                'user_agent'   => $request->userAgent(),
                'url'          => $request->url(),
            ]);

            $lead->applySpamAssessment($this->spamAssessment($request))->save();

            // Flagged leads are stored for review but never emailed.
            if (! $lead->is_spam) {
                $this->sendNotificationEmail($lead);
            }

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your brief has been received. We\'ll get back to you within 24 hours.',
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to store video production lead: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    private function sendNotificationEmail($lead)
    {
        try {
            Mail::raw(
                "New Video Production Lead:\n\n" .
                "Name: {$lead->name}\n" .
                "Email: {$lead->email}\n" .
                "Phone: {$lead->phone}\n" .
                "Company: {$lead->company_name}\n" .
                "Video Type: {$lead->video_type}\n" .
                "Budget: {$lead->budget_range}\n" .
                "Message: {$lead->message}",
                function ($message) use ($lead) {
                    $message->to('admin@thumbpin.com')
                            ->subject('New Video Production Lead - ' . $lead->video_type)
                            ->from($lead->email, $lead->name);
                }
            );
        } catch (\Exception $e) {
            \Log::error('Failed to send video production lead email: ' . $e->getMessage());
        }
    }
}
