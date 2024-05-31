<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Routing\Controller;


class UserController extends Controller
{
    public function showHome()
    {
        return view('home');
    }
    public function showAbout()
    {;
        return view('about');
    }
    public function showContact()
    {
        return view('contact');
    }
    public function showJob()
    {
        $jobs = User::showJobs();
        return view('job', compact('jobs'));
    }

    public function showJobDetails($id)
    {

        try {
            $job = User::findJob($id);
        } catch (ModelNotFoundException $e) {
           abort(404);
        }

        return view('job-details', compact('job'));
    }
}
