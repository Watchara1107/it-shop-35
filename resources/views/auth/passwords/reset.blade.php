@extends('layouts.admin.master')
@section('text')
        <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <center>
                <img src="{{asset ('admin/images/logo.png') }}">
            </center>
            <span class="login100-form-title p-b-34 p-t-15">
                Reset Password
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Enter email">
                <input class="input100" type="email" name="email" value="{{ $email ?? old('email') }}"  placeholder="Email">
                <span class="focus-input100" data-placeholder="&#xf2da;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password confirmation">
                <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Reset Password
                </button>
            </div>


        </form>
@endsection
