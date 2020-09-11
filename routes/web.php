<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/link/{uid}', [LoginController::class, 'sendLink'])->name('login-link');

Route::get(config('laravel-passwordless-login.login_route').'/{expires}/{uid}', function (Request $request) {
    abort_if(!$request->hasValidSignature(), 401);
    $user_model = config('laravel-passwordless-login.user_model');
    Auth::guard(config('laravel-passwordless-login.user_guard'))
        ->login($user_model::find($request->uid), 'laravel-passwordless-login.remember_login');
    return redirect(config('laravel-passwordless-login.redirect_on_success'));
})->name(config('laravel-passwordless-login.login_route_name'));
