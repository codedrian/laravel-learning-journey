<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::post('/incrementCount', [UserController::class, 'incrementCount'])->name('incrementCount');
Route::post('/destroyCount', [UserController::class, 'destroyCount'])->name('destroyCount');
