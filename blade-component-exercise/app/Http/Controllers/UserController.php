<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function showAbout()
    {
        $pageName = 'About';
        $nameLength = strlen($pageName);
        return view('about')->with('pageName', $pageName)->with('nameLength', $nameLength);
    }

    public function showContact()
    {
        $pageName = 'Contact';
        $nameLength = strlen($pageName);
        return view('contact')->with('pageName', $pageName)->with('nameLength', $nameLength);
    }

    public function showHome()
    {
        $pageName = 'Home';
        $nameLength = strlen($pageName);
        return view('home')->with('pageName', $pageName)->with('nameLength', $nameLength);
    }
}
