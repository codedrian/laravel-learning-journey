<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*TODO: Put the homepage here*/
Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
    Route::get('/storeContact', [PhoneBookController::class, 'storeContact']);
});
    Route::post('/store', [UserController::class, 'storeUser'])->name('store-user');
    Route::post('/authenticate', [UserController::class, 'authenticateUser'])->name('authenticate');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/signin', [UserController::class, 'showSignIn'])->name('signin');
    Route::get('/login', [UserController::class, 'showLogIn'])->name('login');
