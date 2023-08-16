<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>{{env('APP_NAME')}} | Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assetsV2/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assetsV2/css/night-mode.css')}}">
    <link rel="stylesheet" href="{{asset('assetsV2/css/framework.css')}}">
    <link rel="stylesheet" href="{{asset('assetsV2/css/bootstrap.css')}}">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assetsV2/css/icons.css')}}">


</head>


<body>



<!-- Content
================================================== -->
<div uk-height-viewport class="uk-flex uk-flex-middle">
    <div class="uk-width-2-3@m uk-width-1-2@s m-auto rounded">
        <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid style="display:flex; justify-content: center;">


            <!-- column two -->
            <div class="uk-card-default p-5 rounded">
                <div class="mb-4 uk-text-center">
                    <h3 class="mb-0"> Forget Password</h3>
                    <p class="my-2">Reset your account password.</p>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
                <form class="uk-child-width-1-1 uk-grid-small" uk-grid action="{{ route('password.request') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="uk-form-group">
                        <label class="uk-form-label"> Email</label>

                        <div class="uk-position-relative w-100">
                            <span class="uk-form-icon">
                                <i class="icon-feather-mail"></i>
                            </span>
                            <input id="email" type="email" class="uk-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="E-mail" required autofocus>
                        </div>

                    </div>
                    <div class="uk-width-1-2@s">
                        <div class="uk-form-group">
                            <label class="uk-form-label"> New Password</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-lock"></i>
                                </span>
                                <input class="uk-input{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" />
                            </div>

                        </div>
                    </div>
                    <div class="uk-width-1-2@s">
                        <div class="uk-form-group">
                            <label class="uk-form-label">New Confirm password</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-lock"></i>
                                </span>
                                <input id="password-confirm" type="password" class="uk-input {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Password confirmation" required>
                            </div>

                        </div>
                    </div>

                    <div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>

                        <div class="uk-width-auto@s">
                            <button type="submit" class="btn btn-default">Reset Password</button>
                        </div>
                    </div>

                </form>
            </div><!--  End column two -->

        </div>
    </div>
</div>

<!-- Content -End
================================================== -->


<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('night-mode');
            if (document.documentElement.classList.contains('night-mode')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>


<!-- javaScripts
================================================== -->
<script src="{{asset('assetsV2/js/framework.js')}}"></script>
<script src="{{asset('assetsV2/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assetsV2/js/simplebar.js')}}"></script>
<script src="{{asset('assetsV2/js/main.js')}}"></script>
<script src="{{asset('assetsV2/js/bootstrap-select.min.js')}}"></script>


</body>

</html>
