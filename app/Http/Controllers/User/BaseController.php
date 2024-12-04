<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    public function contactUs()
    {
        return Inertia::render(
            'User/ContactUs'
        );
    }

    public function sendMail(Request $request) {
        $name = $request->name;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to('husan.omerinovic@indevitus.com')->send(new ContactUs($name, $subject, $message));
    }

    public function aboutUs()
    {
        return Inertia::render(
            'User/AboutUs'
        );
    }
}
