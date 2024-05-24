<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function processBet(Request $request)
    {

    }
}
