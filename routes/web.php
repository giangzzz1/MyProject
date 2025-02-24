<?php

use App\Http\Controllers\AccountController\AccountController;
use App\Http\Controllers\AccountController\AOuthController;

use App\Http\Controllers\AdminController\AdminController;
use App\Http\Controllers\UserController\UserController;

use App\Http\Controllers\SpotifyController\SpotifyController;

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
Route::get('/search', [SpotifyController::class, 'search'])->name('spotify.search');

Route::get('/', function () {
    return view('Client.Layout.master');
});

//Các route cho client
Route::controller(ClientController::class)->group(function () {

});

// Route cho Account
Route::controller(AccountController::class)->group(function () {
    // Google Login
    Route::get('auth/google', [AOuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [AOuthController::class, 'handleGoogleCallback']);

    // Facebook Login
    Route::get('auth/facebook', [AOuthController::class, 'redirectToFacebook'])->name('facebook.login');;
    Route::get('auth/facebook/callback', [AOuthController::class, 'handleFacebookCallback']);

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

//Các route cho User
Route::controller(AdminController::class)->group(function () {
    Route::get('user/dashboard', 'index')->name('user.dashboard');
});

    //Các route cho Admin
Route::controller(UserController::class)->group(function () {
    Route::get('admin/dashboard', 'index')->name('admin.dashboard');
});
