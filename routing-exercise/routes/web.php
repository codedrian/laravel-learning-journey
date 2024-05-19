<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'main']);
Route::get('/main', [UserController::class, 'main']);
Route::get('/say/hello', [UserController::class, 'hello']);
Route::get('/say-anything/{word?}', [UserController::class, 'say_anything']);
Route::get('/danger', [UserController::class, 'danger']);
