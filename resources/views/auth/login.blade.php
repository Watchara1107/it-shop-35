@extends('layouts.admin.master')
@section('text')
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
            <center>
                <img src="{{asset ('admin/images/logo.png') }}">
            </center>
            <span class="login100-form-title p-b-34 p-t-15">
                Log in
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <input class="input100" type="text" name="username" placeholder="Username">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Login
                </button>
            </div>

            <div class="text-center p-t-10">
                <a class="txt1" href="{{ url('/') }}">
                    go to home
                </a>
            </div>

            <div class="text-center p-t-10">
                <a class="txt1" href="{{ route('register') }}">
                    go to register
                </a>
            </div>

            <div class="text-center p-t-10">
                <a class="txt1" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            </div>
        </form>
@endsection
