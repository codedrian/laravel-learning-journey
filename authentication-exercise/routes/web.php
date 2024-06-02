<?php

use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*TODO: Put the homepage here*/
    Route::get('/', [UserController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
    /*Show add contact form route*/
    Route::get('add-contact', [PhoneBookController::class, 'showAddForm'])->name('add-contact');
    Route::post('/store-contact', [PhoneBookController::class, 'storeContact'])->name('store-contact');
    Route::post('/store', [UserController::class, 'storeUser'])->name('store-user');
    Route::post('/authenticate', [UserController::class, 'authenticateUser'])->name('authenticate');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/signin', [UserController::class, 'showSignIn'])->name('signin');
    Route::get('/login', [UserController::class, 'showLogIn'])->name('login');
    Route::get('/contact', [PhoneBookController::class, 'getUserContacts']);
    Route::get('/getContactById/{id}', [PhoneBookController::class, 'getContactById']);
