<?php

namespace App\Http\Controllers\AccountController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login()
    {
        return view('User.account.login');
    }
    public function login_(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('user.dashboard')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }

    public function register()
    {
        return view('User.account.register');
    }
    public function register_(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0, // Mặc định là user
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', 'Đăng ký thành công!');
    }

    public function forgot()
    {
        return view('User.account.forgot');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
    
        return redirect('/')->with('success', 'Đăng xuất tài khoản thành công');
    }
}
