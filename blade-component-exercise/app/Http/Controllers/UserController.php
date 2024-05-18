<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UserController extends Controller
{
    public function showAbout()
    {
        return view('about');
    }
    public function showContact()
    {
        return view('contact');
    }

    public function showHome()
    {
        return view('home');
    }
}
