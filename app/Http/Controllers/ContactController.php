<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request)

    {
        $details = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $responseMail = [
            'name' => 'Reeya Chhetri',
            'regards'=> config('response.Regards'),
            'email' => 'hr@blogstation.com',
            'subject' => config('response.subject'),
            'message' => config('response.message')
        ];
        Mail::to($request->email)->send(new ContactMailable($responseMail));
        Mail::to(config('sms.email'))->send(new ContactMailable($details));

        return back()->with('message_sent','Thank you, we will contact you soon.');
    }
}
