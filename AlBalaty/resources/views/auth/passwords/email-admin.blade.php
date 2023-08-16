@extends('layouts.admin-auth-layout')
@section('title') Forget Password @endsection

@section('content')
    <div class="login-signin">
        <div class="mb-20">
            <h3>Teacher Rest Password</h3>
            <div class="text-muted font-weight-bold">We will send you email with password reset link.</div>
        </div>
        @if (session('status'))
            <span class="alert alert-info" style="display:block">
                <strong>{{ session('status') }}</strong>
            </span>
        @endif
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
        <form class="form" action="{{ route('admin.password.email') }}" method="POST">
            @csrf
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" value="{{old('email')}}" />
            </div>
            <button id="kt_login_signin_submit" type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Send Password Reset Link</button>
        </form>
    </div>

@endsection
