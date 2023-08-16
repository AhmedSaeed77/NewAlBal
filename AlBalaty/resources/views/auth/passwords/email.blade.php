<!doctype html>
<html lang="en" @if(app()->getLocale()  == 'ar') dir="rtl" @endif>

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
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assetsV2/css/style-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('assetsV2/css/night-mode.css')}}">
        <link rel="stylesheet" href="{{asset('assetsV2/css/framework-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('assetsV2/css/bootstrap.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assetsV2/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assetsV2/css/night-mode.css')}}">
        <link rel="stylesheet" href="{{asset('assetsV2/css/framework.css')}}">
        <link rel="stylesheet" href="{{asset('assetsV2/css/bootstrap.css')}}">
    @endif

    @if(app()->getLocale() == 'ar')
        <style>
            @font-face {
                font-family: 'Tajawal';
                src: URL('{{asset('fonts/tajawal/Tajawal-Regular.ttf')}}') format('truetype');
            }
            .section-title .subtitle {
                letter-spacing: 0 !important;
            }
            html, body, span{
                font-family: Tajawal !important;
            }
        </style>
    @endif

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assetsV2/css/icons.css')}}">


</head>


<body>



<!-- Content
================================================== -->
<div uk-height-viewport class="uk-flex uk-flex-middle">
    <div class="uk-width-2-3@m uk-width-1-2@s m-auto rounded">
        <div class="uk-child-width-1-2@m uk-grid-collapse " uk-grid style="display:flex; justify-content: center;">


            <!-- column two -->
            <div class="uk-card-default p-5 rounded">
                <div class="mb-4 uk-text-center">
                    <h3 class="mb-0"> {{__('Public/auth.forget-password')}}</h3>
                    <p class="my-2">{{__('Public/auth.reset-account-password')}}</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->has('email'))
                    <span class="alert alert-danger" style="display: block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <form action="{{ route('password.email') }}" method="post">
                    {{ csrf_field() }}
                    <div class="uk-form-group">
                        <label class="uk-form-label"> {{__('Public/auth.email')}}</label>

                        <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-mail"></i>
                                </span>
                            <input class="uk-input" type="text" autocomplete="off" placeholder="{{__('Public/auth.email')}}" name="email" value="{{ old('email') }}" required />
                        </div>

                    </div>

                    <div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>
                        <div class="uk-width-expand@s">
                            <p> {{__('Public/auth.dont-have-account')}} <a href="{{ route('register') }}">{{__('Public/auth.sign-up')}}</a></p>
                        </div>
                        <div class="uk-width-auto@s">
                            <button type="submit" class="btn btn-default">{{__('Public/auth.reset')}}</button>
                        </div>
                    </div>
                    <div class="uk-width-expand@s">
                        <p> {{__('Public/auth.already-have-account')}} <a href="{{ route('login') }}">{{__('Public/auth.get-start')}}</a></p>
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
