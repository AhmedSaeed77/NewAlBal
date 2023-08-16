@extends('layouts.admin-auth-layout')
@section('title') Login @endsection

@section('content')
    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3>Sign In To Teacher</h3>
            <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
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
        <form class="form" action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
            </div>
            <button id="kt_login_signin_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
        </form>
    </div>
    <!--end::Login Sign in form-->
@endsection
