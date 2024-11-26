<?php

use App\Http\Controllers\Crud\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

#Route::get('/users', [UserController::class, 'index']);

Route::resource('users', UserController::class);