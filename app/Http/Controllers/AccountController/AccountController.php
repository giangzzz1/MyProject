<?php

namespace App\Http\Controllers\AccountController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login()
    {
        return view('User.account.login');
    }

    public function register()
    {
        return view('User.account.register');
    }

    public function forgot()
    {
        return view('User.account.forgot');
    }
}
