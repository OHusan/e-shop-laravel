<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class BaseController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'User/ContactUs'
        );
    }

    public function aboutUs()
    {
        return Inertia::render(
            'User/AboutUs'
        );
    }
}
