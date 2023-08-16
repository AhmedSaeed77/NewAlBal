@php

    $thisUser = Auth::user();
    $userCourses = Cache::remember('userCoursesCached'.$thisUser->id, 1440, function()use($thisUser){
        return \Illuminate\Support\Facades\DB::table('user_packages')
            ->where('user_packages.user_id', '=', $thisUser->id)
            ->join('packages', 'user_packages.package_id', '=', 'packages.id')
            ->join('courses', 'packages.course_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.title'
            )
            ->groupBy('courses.id')
            ->get();
    });


@endphp


<!doctype html>
<html lang="en" @if(app()->getLocale()  == 'ar') dir="rtl" @endif>

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>{{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

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

    <style>
        @media (max-width: 1220px) and (min-width: 640px){
            .header .header-widget {
                top: -7px !important;
            }
        }

        @if(app()->getLocale() == 'ar')
        @media (max-width: 1220px) and (min-width: 640px){
            .header-widget {
                right:auto !important;
            }
        }
        @endif
    </style>

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
        input[type=submit]{
            cursor: pointer !important;
        }
        @media print {
            body {
                display:none;
            }
        }
        
        body, html{     
            /* Prevent selection */
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;  
        }
    </style>
    @yield('head')
</head>

<body style="-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
    <div id="loading" style="display:flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div uk-spinner></div>
    </div>
    <div id="wrapper" class="admin-panel" style="display:none;">


        <!-- menu -->
        <div class="page-menu" @if(app()->getLocale() == 'ar') style="z-index: 2000;" @endif>
            <!-- btn close on small devices -->
            <span class="btn-menu-close" uk-toggle="target: #wrapper ; cls: mobile-active" style="z-index: 3000;"></span>
            <!-- traiger btn -->
            <span class="btn-menu-trigger" uk-toggle="target: .page-menu ; cls: menu-large"></span>


            <!-- logo -->
            <div class="logo uk-visible@s">
                <a href="{{route('index')}}"> <i class=" uil-graduation-hat"></i> <span> {{env('APP_NAME')}}</span> </a>
            </div>
            <div class="page-menu-inner" data-simplebar>
                <ul class="mt-0">
                    <li><a href="{{route('user.dashboard')}}"><i class="icon-material-outline-dashboard"></i> <span> {{__('User/layout.dashboard')}}</span></a> </li>
                    <li><a href="{{route('my.package.view')}}"><i class="uil-play-circle"></i> <span> {{__('User/layout.my-courses')}}</span></a> </li>
                    <li><a href="{{route('flashCard.index')}}"><i class="icon-feather-zap"></i> <span> {{__('User/layout.flash-card')}}</span></a> </li>
                             <li><a href="{{route('flashCard.index')}}"><i class="icon-feather-zap"></i> <span> {{__('User/layout.flash-card')}}</span></a> </li>
                    <li class="#"><a href="#"><i class="icon-brand-telegram-plane"></i> <span> {{__('User/layout.study-plan')}}
                            </span></a>
                        <ul>
                            @foreach(\App\Course::where('private', 0)->get() as $c)
                                <li>
                                    <a href="{{ route('studyPlan.show', $c->id) }}"><i class="uil-brush-alt "></i> {{Transcode::evaluate($c)['title']}} </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="#"><a href="#"><i class="icon-feather-file-text"></i> <span> {{__('User/layout.study-material')}}
                            </span></a>
                        <ul>
                            @foreach($userCourses as $c)
                                <li>
                                    <a href="{{ route('material.show', $c->id) }}"><i class="uil-brush-alt "></i> {{Transcode::evaluate(\App\Course::find($c->id))['title']}} </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('QuizHistoryShow')}}"><i class="icon-line-awesome-bar-chart"></i> <span> {{__('User/layout.exam-analytics')}}</span></a> </li>
                    <li><a href="{{ route('faq.index') }}"><i class="icon-feather-rss"></i> <span> {{__('User/layout.faq')}}</span></a> </li>
                    <li><a href="{{ route('user.feedback.index') }}"><i class="icon-material-outline-feedback"></i> <span> {{__('User/layout.feedback')}}</span></a> </li>
                    <li><a href="{{ route('set.localization', app()->getLocale() == 'en'? 'ar': 'en') }}"><i class="icon-material-outline-language"></i> <span class="tooltips"> {{app()->getLocale() == 'en'? 'Arabic': 'English'}}</span></a> </li>

                </ul>

                <ul data-submenu-title="Say Goodbye">
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="uil-sign-out-alt"></i>
                            <span> {{__('User/layout.sign-out')}}</span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>

            </div>
        </div>

        <header class="header uk-light" uk-sticky="top:20 ; cls-active:header-sticky" style="@if(app()->getLocale() == 'ar') left @else right @endif :0;">
            <div class="container" style="max-width: 100vw;">
                <nav uk-navbar>
                    <!-- left Side Content -->
                    <div class="uk-navbar-left">
                        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>

                        <!-- logo -->
                        <a href="{{route('user.dashboard')}}" class="logo">
                            <img src="{{asset('assetsV2/images/logo-dark.svg')}}" alt="">
                            <span> Courseplus</span>
                        </a>

                    </div>

                    <!--  Right Side Content   -->
                    <div class="uk-navbar-right">
                        <div class="header-widget">
                            <!-- User icons close mobile-->
                            <span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"></span>
                            <a href="#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21">
                                <i class="icon-material-baseline-notifications-none"></i>
                            </a>
                            <!-- notificiation dropdown -->
                            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small"
                                 class="dropdown-notifications">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>{{__('User/layout.notifications')}} </h4>

                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar>

                                    <!-- notiviation list -->
                                    <ul>
{{--                                        <li class="notifications-not-read">--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="notification-icon btn btn-soft-danger disabled">--}}
{{--                                                        <i class="icon-feather-thumbs-up"></i></span>--}}
{{--                                                <span class="notification-text">--}}
{{--                                                        <strong>Adrian Mohani</strong> Like Your Comment On Course--}}
{{--                                                        <span class="text-primary">Javascript Introduction </span>--}}
{{--                                                        <br> <span class="time-ago"> 9 hours ago </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="notification-icon btn btn-soft-primary disabled">--}}
{{--                                                    <i class="icon-feather-message-circle"></i></span>--}}
{{--                                                <span class="notification-text">--}}
{{--                                                    <strong>Stella Johnson</strong> Replay Your Comments in--}}
{{--                                                    <span class="text-primary">Programming for Games</span>--}}
{{--                                                    <br> <span class="time-ago"> 12 hours ago </span>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="notification-icon btn btn-soft-success disabled">--}}
{{--                                                        <i class="icon-feather-star"></i></span>--}}
{{--                                                <span class="notification-text">--}}
{{--                                                        <strong>Alex Dolgove</strong> Added New Review In Course--}}
{{--                                                        <span class="text-primary">Full Stack PHP Developer</span>--}}
{{--                                                        <br> <span class="time-ago"> 19 hours ago </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="notifications-not-read">--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="notification-icon btn btn-soft-danger disabled">--}}
{{--                                                        <i class="icon-feather-share-2"></i></span>--}}
{{--                                                <span class="notification-text">--}}
{{--                                                        <strong>Jonathan Madano</strong> Shared Your Discussion On Course--}}
{{--                                                        <span class="text-primary">Css Flex Box </span>--}}
{{--                                                        <br> <span class="time-ago"> Yesterday </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                    </ul>

                                </div>


                            </div>
                            <!-- Message  -->
                            @if(Auth::check())
                            <a href="#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21">
                                <i class="icon-line-awesome-envelope-o"></i>
                                @if( count(\App\Message::where('to_user_type','=','user')
                                        ->where('sight','=',0)
                                        ->where('to_user_id', '=', Auth::user()->id)
                                        ->get() )
                                        )
                                    <span> {{count(\App\Message::where('to_user_type','=','user')->where('sight','=',0)->where('to_user_id', '=', Auth::user()->id)->get())}} </span>
                                @endif

                            </a>

                            <!-- Message  notificiation dropdown -->
                            <div uk-dropdown=" pos: top-right;mode:click" class="dropdown-notifications">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>{{__('User/layout.messages')}}</h4>
                                </div>

                                <div class="dropdown-notifications-footer">
                                    <a href="#" class="massage_make_as_read"> {{__('User/layout.make-read')}}</a>
                                </div>
                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar>

                                    <!-- notiviation list -->
                                    <ul>
                                        @foreach(\App\Message::where('to_user_type','=','user')->where('to_user_id', '=',Auth::user()->id)->orderBy('created_at','desc')->get()->take(30) as $msg)
                                        <li class="notifications-not-read">
                                            <a href="{{route('user.inboxv2')}}?user_id={{$msg->from_user_id}}">
                                                    <span class="notification-avatar">
                                                        <img src="{{asset('assets/layouts/layout3/img/avatar2.jpg')}}" alt="">
                                                    </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>{{\App\Admin::find($msg->from_user_id)->name}}</strong>
                                                    <p>
                                                        {!! $msg->message !!}
                                                    </p>
                                                    <span class="time-ago"> {{ $msg->created_at->diffForHumans() }} </span>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>

                            </div>


                            <!-- profile-icon-->
                            @php

                                $profile_pic =asset('assets/layouts/layout/img/avatar3_small.jpg');
                                if(Auth::check()){
                                    if(\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first() ){
                                        if(\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first()->profile_pic){
                                            $profile_pic =url('storage/profile_picture/'.basename(\App\UserDetail::where('user_id','=',Auth::user()->id)->get()->first()->profile_pic));
                                        }
                                    }
                                }

                            @endphp


                            <div class="dropdown-user-details">
                                <div class="dropdown-user-avatar">
                                    <img src="{{$profile_pic}}" alt="">
                                </div>
                                <div class="dropdown-user-name">
                                    {{Auth::user()->name}} <span>{{__('User/layout.student')}}</span>
                                </div>
                            </div>

                            <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small">
                                <!-- User menu -->
                                <ul class="dropdown-user-menu">
                                    <li><a href="{{route('user.dashboard')}}" style="display:flex; gap: 12px;">
                                            <i class="icon-material-outline-dashboard"></i> {{__('User/layout.dashboard')}}</a>
                                    </li>
                                    <li><a href="{{route('show.profile')}}" style="display:flex; gap: 12px;">
                                            <i class="icon-line-awesome-user"></i> {{__('User/layout.my-profile')}} </a>
                                    </li>
                                    <li><a href="{{route('user.inboxv2')}}" style="display:flex; gap: 12px;">
                                            <i class="icon-line-awesome-envelope-o"></i> {{__('User/layout.inbox')}}</a>
                                    </li>
                                    <li>
                                        <a href="#" id="night-mode" class="btn-night-mode" style="display:flex; gap: 12px;">
                                            <i class="icon-feather-moon"></i> {{__('User/layout.night-mode')}}
                                            <span class="btn-night-mode-switch" @if(app()->getLocale() == 'ar') style="left: 25px; right: auto;" @endif>
                                                    <span class="uk-switch-button"></span>
                                                </span>
                                        </a>
                                    </li>
                                    <li class="menu-divider">
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display:flex; gap: 12px;">
                                        <i class="icon-feather-log-out"></i> {{__('User/layout.sign-out')}}</a>
                                    </li>
                                </ul>


                            </div>
                            @endif

                        </div>



                        <!-- icon search-->
                        <a class="uk-navbar-toggle uk-hidden@s"
                           uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
                            <i class="uil-search icon-small"></i>
                        </a>

                        <!-- User icons -->
                        <a href="#" class="uil-user icon-small uk-hidden@s"
                           uk-toggle="target: .header-widget ; cls: is-active">
                        </a>

                    </div>
                    <!-- End Right Side Content / End -->


                </nav>

            </div>
            <!-- container  / End -->

        </header>

        <!-- overlay seach on mobile-->
        <div class="nav-overlay uk-navbar-left uk-position-relative uk-flex-1 bg-grey uk-light p-2" hidden
             style="z-index: 10000;">
            <div class="uk-navbar-item uk-width-expand" style="min-height: 60px;">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
                </form>
            </div>
            <a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade"
               href="#"></a>
        </div>

        <!-- search overlay-->
        <div id="searchbox">

            <div class="search-overlay"></div>

            <div class="search-input-wrapper">
                <div class="search-input-container">
                    <div class="search-input-control">
                            <span class="icon-feather-x btn-close uk-animation-scale-up"
                                  uk-toggle="target: #searchbox; cls: is-active"></span>
                        <div class=" uk-animation-slide-bottom">
                            <input type="text" name="search" autofocus required>
                            <p class="search-help">Type the name of the Course and book you are looking for</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- content -->
        <div class="page-content">
            <div class="container " id="prsc-msg" style=" display:none; background: #fff; color: red; padding: 20px; min-width:100px; min-height: 40px; margin: 30px auto;">
                <div class="row" style="padding: 20px;">
                    <b>{{__('User/layout.content-is-protected')}}</b>
                    <br/><br/>
                    <p>
                        <b>{{__('User/layout.note')}}:</b>
                        <br/>
                        {{__('User/layout.action-description')}}
                        <br/>
                        {{__('User/layout.action-description2')}}
                        {{__('User/layout.click-go-back')}}
                    </p>   

                </div>
                <div class="row" style="padding: 20px;">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{__('User/layout.go-back')}} </a>
                </div>
            </div>

            @include('include.msg')

            <div class="fluid-container" id="page-content" style="padding-top: 20px;">

            @yield('content')


            </div>
            <div class="footer">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand@s uk-first-column">
                        <p>© 2020-2021 <strong>{{env('APP_NAME')}}</strong>. {{__('User/layout.right-statement')}}</p>
                    </div>
                    <div class="uk-width-auto@s">
                        <nav class="footer-nav-icon">
                            <ul>
                                <li><a href="#"><i class="icon-brand-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-brand-youtube"></i></a></li>
                                <li><a href="#"><i class="icon-brand-twitter"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176072046-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-176072046-1');
      console.log('works');
    </script>

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

    <script>
        (function() {
            setTimeout(function(){
                $('#wrapper').show();
                $('#loading').hide();
            }, 1000);

        })();
        // var checkMe = setInterval(function(){
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax ({
        //         type: 'POST',

        //         success: function(res){
        //             if(res != 200){
        //                 document.location.href = "{{route('login')}}";
        //             }
        //         },
        //         error: function(res){
        //             console.log('Error:', res);
        //         }
        //     });
        // }, 10000); // 30 sec

        document.addEventListener('contextmenu', event => event.preventDefault());

        $(window).keyup(function(e){
            if(e.keyCode == 44){
                $("#page-content").hide();
                $("#prsc-msg").show();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax ({
                    type: 'GET',
                    url: '{{ route('ScreenShot') }}',
                    success: function(res){
                        if(res == 'disabled'){
                            window.location.href = '{{route('login')}}';
                        }
                    },
                    error: function(res){
                        console.log('Error:', res);
                    }
                });

            }
        });

        // if( navigator.userAgent.match(/Android/i)
        // || navigator.userAgent.match(/webOS/i)
        // || navigator.userAgent.match(/iPhone/i)
        // || navigator.userAgent.match(/iPad/i)
        // || navigator.userAgent.match(/iPod/i)
        // || navigator.userAgent.match(/BlackBerry/i)
        // || navigator.userAgent.match(/Windows Phone/i)
        // ){
        //     @if(\Illuminate\Support\Facades\Input::get('ignore') != 1)
        //         window.location = '{{ route('mobile.redirect') }}';
        //     @endif







        // }

        @if(Auth::user())
            target = '{{ route('show.profile') }}';

        @if(!\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first())
        // if(window.location.href != target){
        //     window.location = target;
        // }
        @endif
        @endif

        $('.makeAsRead').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax ({
                type: 'POST',
                url: '{{ route('MakeRead') }}',
                success: function(res){
                    $('.pending_notification').html('<span class="bold">0 pending</span> notifications');
                    $('.pendingg_notification_count').remove();
                },
                error: function(res){
                    console.log('Error:', res);
                }
            });
        });

        $('.massage_make_as_read').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax ({
                type: 'POST',
                url: '{{ route('MakeReadMsg') }}',
                success: function(res){
                    $('.pending_msg_edit').html('<span class="bold">0 New</span> messages');
                    $('.pending_msg_remove').remove();
                },
                error: function(res){
                    console.log('Error:', res);
                }
            });
        });

    </script>

    <script>
        @php
            $thisUser = Auth::user();
            $runChat = false;
        @endphp

                @if($runChat)
            window.intercomSettings = {
            app_id: "ucdz3okj",
            @if($thisUser)
            name: "{{$thisUser->name}}",
            email: "{{$thisUser->email}}",
            created_at: "{{\Carbon\Carbon::parse($thisUser->created_at)->timestamp}}",
            user_id: {{$thisUser->id}},
            @endif
        };
        @endif
    </script>

    <script>
        // We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/ucdz3okj'
        (function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/ucdz3okj';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
    </script>

    @yield('jscode')

</body>

</html>
