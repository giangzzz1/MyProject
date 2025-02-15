<?php

namespace App\Http\Controllers\AccountController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AOuthController extends Controller
{
     // Google
     public function redirectToGoogle()
     {
         return Socialite::driver('google')->redirect();
     }
 
     public function handleGoogleCallback()
     {
         $googleUser = Socialite::driver('google')->user();
         return $this->loginOrCreateUser($googleUser, 'google');
     }
 
     // Facebook
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }
 
     public function handleFacebookCallback()
     {
         $facebookUser = Socialite::driver('facebook')->user();
         return $this->loginOrCreateUser($facebookUser, 'facebook');
     }
 
     // Xử lý đăng nhập hoặc tạo user mới
     private function loginOrCreateUser($providerUser, $provider)
     {
         $user = User::where('provider', $provider)
                     ->where('provider_id', $providerUser->id)
                     ->first();
 
         if (!$user) {
             $user = User::create([
                 'fullname' => $providerUser->name,
                 'email' => $providerUser->email,
                 'password' => Hash::make(uniqid()), // Tạo mật khẩu ngẫu nhiên
                 'avatar' => $providerUser->avatar,
                 'provider' => $provider,
                 'provider_id' => $providerUser->id,
                 'role' => 0, // Mặc định là user
             ]);
         }
 
         Auth::login($user);
         return redirect()->route('user.dashboard'); // Điều hướng sau khi đăng nhập
     }
}
