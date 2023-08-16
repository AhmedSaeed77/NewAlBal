@extends('layouts.admin-auth-layout')
@section('title') Reset Password @endsection

@section('content')
    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3>Set New Password</h3>
            <div class="text-muted font-weight-bold">One Final Step:</div>
        </div>
        @if (session('error'))
            <span class="alert alert-danger" style="display:block">
                <strong>{{ session('error') }}</strong>
            </span>
        @endif
        @if (session('success'))
            <span class="alert alert-success" style="display:block">
                <strong>{{ session('success') }}</strong>
            </span>
        @endif
        @if ($errors->has('email'))
            <span class="alert alert-danger" style="display:block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        @if ($errors->has('password'))
            <span class="alert alert-danger" style="display:block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <form class="form" action="{{ route('admin.password.request') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" value="{{ $email ?? old('email') }}" name="email" autocomplete="off" required autofocus />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="New Password" name="password" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" />
            </div>
            <button id="kt_login_signin_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Reset Password</button>
        </form>
    </div>
    <!--end::Login Sign in form-->
@endsection

