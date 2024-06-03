<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showSignIn(): View
    {
        return view('auth.signin');
    }

    public function showLogIn(): View
    {
        return view('login');
    }

    public function storeUser(StoreUserRequest $request): RedirectResponse
    {
        $validated = $this->getValidated($request);
        $user = new User();
        $user->storeUser($validated);

        return redirect()->route('dashboard');
    }

    public function authenticateUser(LoginUserRequest $request)
    {
        $validatedData = $this->getValidated($request);
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /*  public function showDashboard(): View
      {
          return view('dashboard');
      }*/
    public function getUserContacts()
    {
        $user = Auth::id();
        $contacts = (new User())->getUserContacts($user);

        return view('dashboard', compact('contacts'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * @param  LoginUserRequest  $request
     */
    public function getValidated(FormRequest $request): mixed
    {
        return $request->validated();
    }
}
