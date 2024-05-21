<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function incrementCount(Request $request)
    {
        /*If counter session variable is present increment it otherwise set it to 0*/
        if ($request->session()->has('counter')) {
            $request->session()->increment('counter');
        } else {
            $request->session()->put('counter', 1);
        }
        $ticketNumber = $this->createTicketNumber();
        $request->session()->flash('ticketNumber', $ticketNumber);
        return redirect()->back();
    }

    public function destroyCount(Request $request)
    {
        /*If counter session variable is present destroy it*/
        if ($request->session()->has('counter')) {
            $request->session()->forget('counter');
        }
        return redirect()->back();
    }

    public function createTicketNumber()
    {
        return rand(100000, 1000000);
    }
}
