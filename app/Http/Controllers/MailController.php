<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendEmailJob;

class MailController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')->get();
        $failedJobs = DB::table('failed_jobs')->get();

        return view('welcome', compact('jobs', 'failedJobs'));
    }

    public function sendMail(Request $request)
    {        
        $request->validate([
            'mail_to' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $dispatchData = [
            'mail_to' => $request->mail_to,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        SendEmailJob::dispatch($dispatchData);

        toastr()->success('Mail sent successfully');
        return redirect('/');
    }
}
