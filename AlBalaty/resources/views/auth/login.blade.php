<!doctype html>
<html lang="en" @if(app()->getLocale() == 'ar') dir="rtl" @endif>

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>{{env('APP_NAME')}} | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{env('APP_NAME')}}">

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
    <style>
        .socialLogin{
            display:flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }
        /* Shared */
        .loginBtn {
            box-sizing: border-box;
            position: relative;
            /* width: 13em;  - apply for fixed size */
            margin: 0.2em;
            padding: 0 15px 0 46px;
            border: none;
            text-align: left;
            line-height: 34px;
            white-space: nowrap;
            border-radius: 0.2em;
            font-size: 16px;
            color: #FFF;
        }
        .loginBtn:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 0;
            left: 0;
            width: 34px;
            height: 100%;
        }
        .loginBtn:focus {
            outline: none;
        }
        .loginBtn:active {
            box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
        }


        /* Facebook */
        .loginBtn--facebook {
            background-color: #4C69BA;
            background-image: linear-gradient(#4C69BA, #3B55A0);
            /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
            text-shadow: 0 -1px 0 #354C8C;
        }
        .loginBtn--facebook:before {
            border-right: #364e92 1px solid;
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
        }
        .loginBtn--facebook:hover,
        .loginBtn--facebook:focus {
            color: white;
            background-color: #5B7BD5;
            background-image: linear-gradient(#5B7BD5, #4864B1);
        }


        /* Google */
        .loginBtn--google {
            /*font-family: "Roboto", Roboto, arial, sans-serif;*/
            background: #DD4B39;
        }
        .loginBtn--google:before {
            border-right: #BB3F30 1px solid;
            background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
        }
        .loginBtn--google:hover,
        .loginBtn--google:focus {
            background: #E74B37;
        }
        .text-hr {
            margin-bottom: 30px;
        }
        .text-hr h5, .text-hr hr {
            margin: 0;
            padding: 0;
        }
        .text-hr h5 {
            margin-left: 50%;
            position: relative;
            top:12px;
            background-color: white;
            padding-left: 10px;
            width:45px;
        }
    </style>

</head>


<body>


<!-- Content
================================================== -->
<div uk-height-viewport class="uk-flex uk-flex-middle">
    <div class="uk-width-2-3@m uk-width-1-2@s m-auto rounded">
        <div class="uk-child-width-1-2@m uk-grid-collapse" uk-grid style="display:flex; justify-content: center;" >
            <!-- column two -->
            <div class="uk-card-default p-5 rounded">

                <div class="mb-4 uk-text-center">
                    <h3 class="mb-0">{{__('Public/auth.welcome-back')}}</h3>
                    <p class="my-2">{{__('Public/auth.login-to-account')}}</p>
                </div>
                <!-- Social Network Login -->
{{--                <div class="socialLogin">--}}
{{--                    <a href="{{route('social.login', 'facebook')}}" class="loginBtn loginBtn--facebook">--}}
{{--                        {{__('Public/auth.login-facebook')}}--}}
{{--                    </a>--}}
{{--                    <a href="{{route('social.login', 'google')}}" class="loginBtn loginBtn--google" >--}}
{{--                        {{__('Public/auth.login-google')}}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="text-hr">--}}
{{--                    <h5>{{__('Public/auth.or')}}</h5>--}}
{{--                    <hr>--}}
{{--                </div>--}}
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
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    @php  
                        $targetPage = request()->targetPage;
                        $pageId     = request()->pageId;
                    @endphp
                    @if($targetPage && $pageId)
                        <input type="hidden" name="pageId" value="{{$pageId}}"/>
                        <input type="hidden" name="targetPage" value="{{$targetPage}}"/>
                    @endif
                    <div class="uk-form-group">
                        <label class="uk-form-label"> {{__('Public/auth.email')}}</label>

                        <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-mail"></i>
                                </span>
                            <input class="uk-input {{ $errors->has('email') ? ' is-invalid' : '' }} " type="email" autocomplete="off" placeholder="{{__('Public/auth.email')}}" name="email" value="{{ old('email') }}" required autofocus />
                        </div>

                    </div>

                    <div class="uk-form-group">
                        <label class="uk-form-label"> {{__('Public/auth.password')}}</label>

                        <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-lock"></i>
                                </span>
                            <input class="uk-input{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" autocomplete="off" placeholder="{{__('Public/auth.password')}}" name="password" required/>
                        </div>

                    </div>

                    <div class="mt-4 uk-flex-middle uk-grid-small" uk-grid>
                        <div class="uk-width-expand@s">
                            <p> {{__('Public/auth.dont-have-account')}} <a href="{{ route('register') }}">{{__('Public/auth.sign-up')}}</a></p>
                        </div>
                        <div class="uk-width-auto@s">
                            <button type="submit" class="btn btn-default">{{__('Public/auth.get-start')}}</button>
                        </div>
                    </div>
                    <div class="uk-width-expand@s">
                        <p> {{__('Public/auth.forget-password')}} <a href="{{ route('password.request') }}">{{__('Public/auth.reset')}}</a></p>
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
