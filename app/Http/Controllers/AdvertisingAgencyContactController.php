<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ReadsSpamAssessment;
use Illuminate\Http\Request;
use App\Models\AdvertisingAgencyContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdvertisingAgencyContactController extends Controller
{
    use ReadsSpamAssessment;

    /**
     * Store a new contact submission
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the following errors',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create the contact record
            $contact = AdvertisingAgencyContact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_name' => $request->company_name,
                'message' => $request->message,
                'selected_package' => $request->selected_package,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->url(),
            ]);

            $contact->applySpamAssessment($this->spamAssessment($request))->save();

            // Flagged submissions are stored for review but never emailed.
            if (! $contact->is_spam) {
                $this->sendNotificationEmail($contact);
            }

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully. We\'ll get back to you soon.'
            ]);

        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    /**
     * Send notification email to admin
     */
    private function sendNotificationEmail($contact)
    {
        try {
            // You can create a mail class for this
            Mail::raw("New contact form submission:\n\nName: {$contact->name}\nEmail: {$contact->email}\nPhone: {$contact->phone}\nCompany: {$contact->company_name}\nMessage: {$contact->message}", function ($message) use ($contact) {
                $message->to('admin@thumbpin.com') // Replace with your admin email
                        ->subject('New Contact Form Submission - Something Page')
                        ->from($contact->email, $contact->name);
            });
        } catch (\Exception $e) {
            // Log the error but don't fail the form submission
            \Log::error('Failed to send notification email: ' . $e->getMessage());
        }
    }
}
