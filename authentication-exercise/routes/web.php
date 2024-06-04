<?php

use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*TODO: Put the homepage here*/
Route::get('/', [UserController::class, 'getUserContacts'])->name('dashboard')->middleware('auth');
/*Show add contact form route*/
Route::get('add-contact', [PhoneBookController::class, 'showAddForm'])->name('contact.create')->middleware('auth');
Route::post('/store-contact', [PhoneBookController::class, 'storeContact'])->name('store-contact');
Route::post('/store', [UserController::class, 'storeUser'])->name('store-user');
Route::post('/authenticate', [UserController::class, 'authenticateUser'])->name('authenticate');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/signin', [UserController::class, 'showSignIn'])->name('signin');
Route::get('/login', [UserController::class, 'showLogIn'])->name('login');
Route::get('/contact', [PhoneBookController::class, 'getUserContacts'])->name('contact.show');
Route::get('/contact/{id}', [PhoneBookController::class, 'getContactById']);
/*Note: Phonebook*/
Route::delete('/delete-contact', [PhoneBookController::class, 'destroyContact'])->name('phonebook.destroy');
Route::post('/edit-contact', [PhoneBookController::class, 'editContact'])->name('phonebook.edit');
