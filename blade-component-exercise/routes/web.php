<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [UserController::class, 'showHome']);
Route::get('/about', [UserController::class, 'showAbout']);
Route::get('/contact', [UserController::class, 'showContact']);
