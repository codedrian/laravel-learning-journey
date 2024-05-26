<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::post('/process-bet', [UserController::class, 'processBet'])->name('processBet');
