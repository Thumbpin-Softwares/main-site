<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ReadsSpamAssessment;
use Illuminate\Http\Request;
use App\Models\RealEstateLead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RealEstateLeadController extends Controller
{
    use ReadsSpamAssessment;

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string|max:255',
            'company_name'     => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'contact'          => 'required|string|max:20',
            'requirement'      => 'required|string|max:1000',
            'marketing_budget' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill in all required fields.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $lead = RealEstateLead::create([
                'name'             => $request->name,
                'company_name'     => $request->company_name,
                'email'            => $request->email,
                'contact'          => $request->contact,
                'requirement'      => $request->requirement,
                'marketing_budget' => $request->marketing_budget,
                'ip'               => $request->ip(),
                'user_agent'       => $request->userAgent(),
                'url'              => $request->url(),
            ]);

            $lead->applySpamAssessment($this->spamAssessment($request))->save();

            // Flagged leads are stored for review but never emailed.
            if (! $lead->is_spam) {
                $this->sendNotificationEmail($lead);
            }

            return response()->json([
                'success' => true,
                'message' => "Thanks {$lead->name}! We'll be in touch within 24 hours.",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
            ], 500);
        }
    }

    private function sendNotificationEmail($lead)
    {
        try {
            Mail::raw(
                "New Real Estate Video Lead:\n\n" .
                "Name: {$lead->name}\n" .
                "Company: {$lead->company_name}\n" .
                "Email: {$lead->email}\n" .
                "Contact: {$lead->contact}\n" .
                "Requirement: {$lead->requirement}\n" .
                "Marketing Budget: {$lead->marketing_budget}",
                function ($message) use ($lead) {
                    $message->to(env('MAIL_TO_ADDRESS', 'admin@thumbpin.com'))
                            ->subject('New Real Estate Lead — ' . $lead->name)
                            ->replyTo($lead->email, $lead->name);
                }
            );
        } catch (\Exception $e) {
            \Log::error('Failed to send real estate lead email: ' . $e->getMessage());
        }
    }
}
