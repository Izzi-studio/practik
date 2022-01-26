<?php

namespace App\Http\Controllers\Front;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function callback()
    {
        return view('front.callback');
    }

    public function sendEmail(Request $request){
        $details =[
            'email' =>$request->email,
            'message' =>$request->message,
            'phone' =>$request->phone,
            'name' =>$request->name
        ];
        
        Mail::to('evamadani03@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent successfully!');
    }
}
