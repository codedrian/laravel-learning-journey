<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [UserController::class, 'showHome'])->name('home');
Route::post('/store-feedback', [UserController::class, 'storeFeedback'])->name('storeFeedback');
Route::get('/user-feedback', [UserController::class, 'showFeedback'])->name('userFeedback');
