<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeFeedbackRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showHome(): View
    {
        return view('home');
    }

    public function showFeedback()
    {
        $status = session('status');
        $user_feedback = session('user_feedback');
        return view('feedback', compact('status', 'user_feedback'));
    }

    public function storeFeedback(storeFeedbackRequest $request): RedirectResponse
    {
        /*To retrieve the validated request*/
        $validatedData = $request->validated();
        $request->session()->flash('status', 'Feedback submitted successfully.');
        $request->session()->flash('user_feedback', $validatedData);
        return redirect()->route('userFeedback');
    }
}
