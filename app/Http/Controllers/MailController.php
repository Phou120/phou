<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Jobs\EmailJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendEmail(Request $request)
    {
        dispatch(new EmailJobs($request->all()));

        return 'success';
    }
}
