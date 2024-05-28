<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('user')->group(function(){
    Route::get('/signin', [UserController::class, 'showSignIn']);
    Route::post('/store', [UserController::class, 'storeUser'])->name('store-user');
});
