<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix('user')->group(function() {
    Route::get('/home', 'showHome')->name('home');
    Route::get('/about', 'showAbout')->name('about');
    Route::get('/job', 'showJob')->name('job');
    Route::get('/job-details/{id}', 'showJobDetails');
    Route::get('/contact', 'showContact')->name('contact');
});
