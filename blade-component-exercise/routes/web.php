<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [UserController::class, 'showHome'])->name('home');
Route::controller(UserController::class)->prefix('user')->group(function() {
    Route::get('/about', 'showAbout')->name('about');
    Route::get('/job', 'showJob')->name('job');
    Route::get('/job/{id}', 'showJobDetails');
    Route::get('/contact', 'showContact')->name('contact');
});
