<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;
use App\Mail\Contact;


class ContactController extends Controller
{
    public function show()
    {
        return view("contact");
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        // Mail::raw('It works!!', function ($message) {
        //     // $message->from('john@johndoe.com', 'John Doe');
        //     // $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to(request('email'));
        //     // $message->cc('john@johndoe.com', 'John Doe');
        //     // $message->bcc('john@johndoe.com', 'John Doe');
        //     // $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Hello there');
        //     // $message->priority(3);
        //     // $message->attach('pathToFile');
        // });

        // Mail::to(request('email'))
        //     ->send(new ContactMe('shirts'));

        // For markdown email
        Mail::to(request('email'))
            ->send(new Contact());

        return redirect('/contact')
            ->with('message', 'Email Sent!!');
    }
}
