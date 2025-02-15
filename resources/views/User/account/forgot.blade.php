@extends('user.account.master')

@section('title')
    forgot
@endsection

@section('content')
    <form class="login100-form validate-form" action="{{route('forgot')}}" method="post">
        @csrf
        <span class="login100-form-title p-b-49">Forgot</span>

        <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
            <span class="label-input100">Email</span>
            <input class="input100" type="email" name="email" placeholder="Type your Email" value="{{ old('email') }}">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>

        <div class="d-flex justify-content-between p-t-8 p-b-31">
            <a href="{{ route('login.form') }}" class="left-link">Login</a>
            <a href="{{ route('register.form') }}" class="right-link">Register</a>
        </div>
        
        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="submit">Forgot</button>
            </div>
        </div>
    </form>
@endsection

