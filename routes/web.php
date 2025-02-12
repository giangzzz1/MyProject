<?php

use App\Http\Controllers\AccountController\AccountController;
use App\Http\Controllers\ClientController\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Client.Layout.master');
});

//Các route cho client
Route::controller(ClientController::class)->group(function () {

});

// Route cho Account
Route::controller(AccountController::class)->group(function () {
    Route::get('account/login', 'login')->name('login.form');
    Route::post('account/login', 'login_')->name('login');

    Route::get('account/register', 'register')->name('register.form');
    Route::post('account/register', 'register_')->name('register');

    Route::get('account/forgot', 'forgot')->name('forgot.form');
    Route::post('password/forgot', 'forgot_')->name('forgot');

    Route::get('account/password/reset/{token}', 'resetpass')->name('password.reset');
    Route::post('account/password/reset', 'resetpass_')->name('password.update');

    Route::post('account/logout', 'logout')->name('logout');
});
