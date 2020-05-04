<?php

namespace App\Http\Controllers;

use App\Mail\DummyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::to("testing@example.com")->send(new DummyEmail());
        return view('emails.sent');
    }
}
