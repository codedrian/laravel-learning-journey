<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showSignIn(): View
    {
        return view('auth.signin');
    }
    /*Created a custom Form Request to validate the signin form*/
    public function storeUser(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = new User();
        $createdUser = $user->storeUser($validated);
        dd($createdUser);
    }
}
