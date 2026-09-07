<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ReadsSpamAssessment;
use App\Mail\ContactMail;
use App\Mail\InquiryMail;
use App\Mail\TaskMail;
use App\Mail\ProjectFormMail;
use App\Models\Contact;
use App\Models\InquiryForm;
use App\Models\ProjectForm;
use App\Models\TaskForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use ReadsSpamAssessment;

    public function contact(Request $request){

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mobile'  => 'required|string|max:20',
            'message' => 'nullable|string|max:5000',
        ]);

        $contact = new Contact();
        $contact->name = request()->input('name');
        $contact->email = request()->input('email');
        $contact->mobile = request()->input('mobile');
        $contact->message = request()->input('message');
        $contact->url = request()->input('url');
        $contact->ip = $request->ip();
        $contact->user_agent = $request->userAgent();
        $contact->applySpamAssessment($this->spamAssessment($request));
        $contact->save();

        $data = array(
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'mobile' => $contact->mobile,
            'message' => $contact->message,
            'url' => $contact->url,
            'type' => 'Contact Form'
        );

        // Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($data));

        return redirect(route('thank-you'));

    }

    public function inquiry_form(Request $request){

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'mobile'      => 'required|string|max:20',
            'country'     => 'nullable|string|max:100',
            'requirement' => 'nullable|string|max:5000',
        ]);

        $contact = new InquiryForm();
        $contact->name = request()->input('name');
        $contact->email = request()->input('email');
        $contact->mobile = request()->input('mobile');
        $contact->country = request()->input('country');
        $contact->requirement = request()->input('requirement');
        $contact->url = request()->input('url');
        $contact->ip = $request->ip();
        $contact->user_agent = $request->userAgent();
        $contact->applySpamAssessment($this->spamAssessment($request));
        $contact->save();

        $data = array(
            'id' => $contact->id,
            'name' => $contact->name,
            'country' => $contact->country,
            'email' => $contact->email,
            'mobile' => $contact->mobile,
            'requirement' => $contact->requirement,
            'url' => $contact->url,
            'type' => 'Side Form'
        );

        // Mail::to(env('MAIL_TO_ADDRESS'))->send(new InquiryMail($data));

        return redirect(route('thank-you'));

    }

    public function task_submit(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:5000',
        ]);

        $task = new TaskForm();
        $task->task = request()->input('task');
        $task->url = request()->input('url');
        $task->ip = $request->ip();
        $task->user_agent = $request->userAgent();
        $task->applySpamAssessment($this->spamAssessment($request));

        $images = '';
        if (request()->hasFile('file')) {
            $voyagerData = [];
            $image = request()->file('file');
            $newImage = time() . '.' . $image->getClientOriginalExtension();
            $images = $image->move('storage/task_file', $newImage);

            $f = [];
            $f['download_link'] = 'task_file/'.$newImage;
            $f['original_name'] = $image->getClientOriginalName();
            array_push($voyagerData, $f);
            $task->image = json_encode($voyagerData);
        }

        $task->save();

        $data = array(
            'id' => $task->id,
            'task' => $task->task,
            'file' => $images,
            'url' => $task->url,
            'type' => 'task form'
        );

        // Flagged submissions are stored but never emailed -- the whole point
        // is to keep the inbox clean. Review them in Voyager instead.
        if (! $task->is_spam) {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new TaskMail($data));
        }

        return redirect(route('thank-you'));
    }
    public function project_form(Request $request){
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'mobile'      => 'required|numeric|digits_between:10,15',
            'company_name'=> 'nullable|string|max:255',
            'requirement' => 'nullable|string|max:5000',
        ]);

        $project = new ProjectForm();
        $project->name = request()->input('name');
        $project->company_name = request()->input('company_name');
        $project->email = request()->input('email');
        $project->mobile = request()->input('mobile');
        $project->requirement = request()->input('requirement');
        $project->url = request()->input('url');
        $project->ip = $request->ip();
        $project->user_agent = $request->userAgent();
        $project->applySpamAssessment($this->spamAssessment($request));
        $project->save();

        $data = array(
            'id' => $project->id,
            'name' => $project->name,
            'company_name' => $project->company_name,
            'email' => $project->email,
            'requirement' => $project->requirement,
            'url' => $project->url,
            'type' => 'Index Form'
        );

        // Mail::to(env('MAIL_TO_ADDRESS'))->send(new ProjectFormMail($data));

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Thank you! We\'ll be in touch shortly.']);
        }

        return redirect(route('thank-you'));

    }
}
