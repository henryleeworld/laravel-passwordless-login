<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login/link/{uid}', [LoginController::class, 'sendLink'])->name('login-link');
Route::get('/', function () {
    return view('welcome');
});
