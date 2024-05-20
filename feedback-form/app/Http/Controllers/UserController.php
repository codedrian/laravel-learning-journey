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
        return view('feedback');
    }

    public function storeFeedback(storeFeedbackRequest $request): RedirectResponse
    {
        /*To retrieve the validated request*/
        $validatedData = $request->validated();
        return redirect()->route('userFeedback')->with('feedback', $validatedData);
    }
}
