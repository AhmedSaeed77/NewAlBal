@php

    use App\Models\Library\Path;

    $pathsByCountry = Path::query()->join('countries', 'countries.id', 'paths.country_id')
        ->select(['paths.*', 'countries.name AS country_name'])
        ->orderBy('paths.z_index')
        ->where(function($query){
            if(\Session('country_code')){
                $query->where('code', \Session('country_code'));
            }
        })->get()->groupBy('country_id');

    $promoted = DB::table('coupons')
        ->where('promote', '=', 1)
        ->where('no_use', '>', 0)
        ->where('expire_date', '>', \Carbon\Carbon::now())
        ->leftJoin('packages', 'coupons.package_id', '=', 'packages.id')
        ->limit(1)
        ->select(
            'packages.name AS package_name',
            DB::raw('coupons.id AS coupon_id'),
            DB::raw('coupons.price AS coupon_price'),
            'coupons.code',
            'coupons.no_use',
            'coupons.total_count',
            'packages.slug AS package_slug',
            'coupons.expire_date'
        )
        ->first();

@endphp

        <!DOCTYPE html>
<html class="no-js" lang="zxx" dir="rtl">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME')}} | Online Education Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="facebook-domain-verification" content="ttkj2878s125itm1vl8oxf0jddhe3u" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets-public/images/logo/logo-dark.png')}}">
    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/magnifypopup.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/animation.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/jqueru-ui-min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets-public/css/vendor/tipped.min.css')}}">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets-public/css/app.css')}}">
    <style>
        .header-style-1{
            z-index: unset !important;
        }
    </style>
    <style>
        @font-face {
            font-family: 'Tajawal';
            src: URL('{{asset('fonts/tajawal/Tajawal-Regular.ttf')}}') format('truetype');
        }
        .section-title .subtitle {
            letter-spacing: 0 !important;
        }
        html, body, *:not(i, span){
            font-family: Tajawal !important;
        }
    </style>

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1109703989920914');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=1109703989920914&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

    @yield('head')
</head>

<body class="sticky-header">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div id="edublink-preloader">
    <div class="loading-spinner">
        <div class="preloader-spin-1"></div>
        <div class="preloader-spin-2"></div>
    </div>
    <div class="preloader-close-btn-wraper">
            <span class="btn btn-primary preloader-close-btn">
                Cancel Preloader</span>
    </div>
</div>

<div id="main-wrapper" class="main-wrapper">

    <!--=====================================-->
    <!--=        Header Area Start       	=-->
    <!--=====================================-->
    <header class="edu-header header-style-1 header-fullwidth">
        <div class="header-top-bar">
            <div class="container-fluid">
                <div class="header-top">
                    @if($promoted)
                    <div class="header-top-left">
                        <div class="header-notify">
                            خصم <b>{{round($promoted->coupon_price).'$'}}</b> لأول <b>{{$promoted->total_count}}</b> طالب
                            علي باقة
                            <a href="{{route('public.package.view', $promoted->package_slug).'?coupon='.$promoted->code}}">
                                <b>{{$promoted->package_name}}</b>
                                -
                                اشترك الآن

                            </a>
                        </div>
                    </div>
                    @endif
                    <div class="header-top-right">
                        <ul class="header-info">
                            @if(Auth::guard('admin')->check())
                                <li><a href="{{route('admin.dashboard')}}" style="font-weight:bold;">لوحة التحكم </a></li>
                            @elseif(Auth::guard('super-admin')->check())
                                <li><a href="{{route('super-admin.dashboard')}}" style="font-weight:bold;">لوحة التحكم </a></li>
                            @elseif(Auth::guard('web')->check())
                                <li><a href="{{route('student.dashboard')}}" style="font-weight:bold;">تصفح الحساب</a></li>
                            @else
                                <li><a href="{{route('login')}}" style="font-weight:bold;">تسجيل الدخول للطلبة </a></li>
                                <li><a href="{{route('admin.login')}}" style="font-weight:bold;">تسجيل الدخول للمعلمين </a></li>
                                <li><a href="{{route('register')}}" style="font-weight:bold;"> انشاء حساب جديد</a></li>
                            @endif

                            @if(Session::get('country_code') == 'eg')
                                <li><a href="tel:+201121331340">Call: (+20) 1121331340</a></li>
                            @endif

                            @if(Session::get('country_code') == 'kw')
                                <li><a href="tel:+96599253270">Call: (+965) 99253270</a></li>
                            @endif

                            <li><a href="mailto:info@albalaty.com" target="_blank">Email: info@Albalaty.com</a></li>
                            <li class="social-icon">
                                <a href="https://web.facebook.com/albalatygeneral" target="_blank"><i class="icon-facebook"></i></a>
                                <a href="https://www.instagram.com/albalatykuwait/" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="https://twitter.com/albalatykuwait" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="https://www.linkedin.com/in/albalaty-kuwait-95626a250/" target="_blank"><i class="icon-linkedin2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="edu-sticky-placeholder"></div>
        <div class="header-mainmenu">
            <div class="container-fluid">
                <div class="header-navbar">
                    @php
                        $eg='<img style="width:40px" src="https://flagcdn.com/256x192/eg.png" class="card-img-top">';
                        $kw='<img style="width:40px" src="https://flagcdn.com/256x192/kw.png" class="card-img-top">';
                    @endphp
                    @if(Session::get('country_code') == 'eg')
                        {!! $eg !!}
                    @endif

                    @if(Session::get('country_code') == 'kw')
                        {!! $kw !!}
                    @endif
                    <div class="header-brand">
                        <div class="logo">
                            <a href="{{route('index')}}">
                                <img class="logo-light" src="{{asset('assets-public/images/logo/logo-dark.png')}}" alt="Corporate Logo" style="width: 70px;">
                                <img class="logo-dark" src="{{asset('assets-public/images/logo/logo-white.png')}}" alt="Corporate Logo">
                            </a>
                        </div>
                        <div class="header-category">
                            <nav class="mainmenu-nav">
                                <ul class="mainmenu">
                                    <li class="has-droupdown">
                                        <a href="#"><i class="icon-1"></i>المراحل </a>
                                        <ul class="submenu">
                                            @foreach($pathsByCountry as $paths)
                                                <li><a href="javascript:;" style="font-width: bolder;">
                                                        <h4>{{$paths->first()->country_name}}</h4>
                                                    </a></li>
                                                @foreach($paths as $path)
                                                    <li><a href="{{route('packages-catalog', $path->id)}}">{{$path->title}}</a></li>
                                                @endforeach
                                            @endforeach
                                            <li><a href="{{route('register')}}">دورات أخرى</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-mainnav">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                <li><a href="{{route('index')}}">الرئيسية </a></li>

{{--                                <li class="has-droupdown"><a href="#">المقالات </a>--}}
{{--                                    <ul class="submenu">--}}
{{--                                        <li><a href="blog-standard.html">Blog Standard</a></li>--}}
{{--                                        <li><a href="blog-masonry.html">Blog Masonry</a></li>--}}
{{--                                        <li><a href="blog-list.html">Blog List</a></li>--}}
{{--                                        <li><a href="blog-details.html">Blog Details</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#ChooseCountryModel"> الدولة </a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <ul class="header-action">
                            <li class="search-bar">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="search-btn" type="button"><i class="icon-2"></i></button>
                                </div>
                            </li>
                            <li class="icon search-icon">
                                <a href="javascript:void(0)" class="search-trigger">
                                    <i class="icon-2"></i>
                                </a>
                            </li>
                            {{--                                <li class="icon cart-icon">--}}
                            {{--                                    <a href="cart.html" class="cart-icon">--}}
                            {{--                                        <i class="icon-3"></i>--}}
                            {{--                                        <span class="count">0</span>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            <li class="header-btn">
                                <a href="{{route('register')}}" class="edu-btn btn-medium"> اشترك الان مجانا <i class="icon-4"></i></a>
                            </li>
                            <li class="mobile-menu-bar d-block d-xl-none">
                                <button class="hamberger-button">
                                    <i class="icon-54"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-mobile-menu">
            <div class="inner">
                <div class="header-top">
                    <div class="logo">
                        <a href="{{route('index')}}">
                            <img class="logo-light" src="{{asset('assets-public/images/logo/logo-dark.png')}}" alt="Corporate Logo">
                            <img class="logo-dark" src="{{asset('assets-public/images/logo/logo-white.png')}}" alt="Corporate Logo">
                        </a>
                    </div>
                    <div class="close-menu">
                        <button class="close-button">
                            <i class="icon-73"></i>
                        </button>
                    </div>
                </div>
                <ul class="mainmenu">
                    <li><a href="{{route('index')}}">الرئيسية </a></li>
                    <li>
                        <a href="{{route('register')}}">تسجيل حساب جديد</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}">تسجيل دخول للطلبة</a>
                    </li>
                    <li>
                        <a href="{{route('admin.login')}}">تسجيل دخول للمعلمين</a>
                    </li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#ChooseCountryModel"> الدولة </a></li>
                </ul>
            </div>
        </div>
        <!-- Start Search Popup  -->
        <div class="edu-search-popup">
            <div class="content-wrap">
                <div class="site-logo">
                    <img class="logo-light" src="{{asset('assets-public/images/logo/logo-dark.png')}}" alt="Corporate Logo">
                    <img class="logo-dark" src="{{asset('assets-public/images/logo/logo-white.png')}}" alt="Corporate Logo">
                </div>
                <div class="close-button">
                    <button class="close-trigger"><i class="icon-73"></i></button>
                </div>
                <div class="inner">
                    <form class="search-form" action="#">
                        <input type="text" class="edublink-search-popup-field" placeholder="Search Here...">
                        <button class="submit-button"><i class="icon-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Search Popup  -->
    </header>
@yield('content')
<!--=====================================-->
    <!--=        Footer Area Start       	=-->
    <!--=====================================-->
    <!-- Start Footer Area  -->
    <footer class="edu-footer footer-lighten bg-image footer-style-1">
        <div class="footer-top">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="edu-footer-widget">
                            <div class="logo mb-4">
                                <a href="{{route('index')}}">
                                    <img class="logo-light" src="{{asset('assets-public/images/logo/logo-dark.png')}}" alt="Corporate Logo" style="width: 150px;">
                                    <img class="logo-dark" src="{{asset('assets-public/images/logo/logo-white.png')}}" alt="Corporate Logo">
                                </a>
                            </div>
                            <!-- <p class="description">Lorem ipsum dolor amet consecto adi pisicing elit sed eiusm tempor incidid unt labore dolore.</p> -->
                            <div class="widget-information">
                                <ul class="information-list">
                                    <!-- <li><span>العنوان:</span>70-80 XXXX St XXXXXX</li> -->
                                    <li><span>الجوال المصرى : </span ><a style="direction: ltr;" href="tel:+201121331340">(+20) 1121331340</a></li>
                                    <li><span>الجوال الكويتى : </span><a style="direction: ltr;" href="tel:+96599253270">(+965) 99253270</a></li>
                                    <li><span>الإيميل : </span><a href="mailto:info@albalaty.com" target="_blank">info@albalaty.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="edu-footer-widget explore-widget">
                            <h4 class="widget-title">المنصة التعليمية الرقمية</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="#">من نحن</a></li>
                                    <li><a href="#">الباقات</a></li>
                                    <li><a href="#">المعلمين</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="edu-footer-widget quick-link-widget">
                            <h4 class="widget-title">روابط</h4>
                            <div class="inner">
                                <ul class="footer-link link-hover">
                                    <li><a href="#">اتصل بنا</a></li>
                                    <li><a href="#">الاسالة الاكثر شيوعا</a></li>
                                    <li><a href="{{route('register')}}">الإشتراك بالمنصة</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="edu-footer-widget">
                            <h4 class="widget-title">التواصل</h4>
                            <div class="inner">
                                <p class="description">أدخل عنوان بريدك الإلكتروني</p>
                                <div class="input-group footer-subscription-form">
                                    <input type="email" class="form-control" placeholder="Your email">
                                    <button class="edu-btn btn-medium" type="button">Subscribe <i class="icon-4"></i></button>
                                </div>
                                <ul class="social-share icon-transparent">
                                    <li><a href="https://web.facebook.com/albalatygeneral" class="color-fb"><i class="icon-facebook"></i></a></li>
                                    <li><a href="https://www.linkedin.com/in/albalaty-kuwait-95626a250/" class="color-linkd"><i class="icon-linkedin2"></i></a></li>
                                    <li><a href="https://www.instagram.com/albalatykuwait/" class="color-ig"><i class="icon-instagram"></i></a></li>
                                    <li><a href="https://twitter.com/albalatykuwait" class="color-twitter"><i class="icon-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner text-center">
                            <p>
                                Copyright 2022 <a href="javascript:;" target="_blank">AlBalaty</a>,
                                All Rights Reserved. Powered by
                                <a href="javascript:;">MISK</a> IT Solutions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area  -->



</div>

<div class="rn-progress-parent">
    <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- Modal -->
<div class="modal fade" id="ChooseCountryModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background-image: url('https://albalaty.com/assets-public/images/banner/girl-1.png');height: 350px;background-color: #141231;border-radius:20px">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="row" style="width: 80%">
                    <div class="col-md-6 d-flex justify-content-center">
                        <a href="{{route('set.country-code', 'kw')}}">
                            <div class="card" style="width: 18rem; border: 0;background-color: #141231;">
                                <img style="background-color: #141231;" src="https://flagcdn.com/256x192/kw.png" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">الكويت</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <a href="{{route('set.country-code', 'eg')}}">
                            <div class="card" style="width: 18rem; border: 0;background-color: #141231;">
                                <img style="background-color: #141231;" src="https://flagcdn.com/256x192/eg.png" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-white">مصر</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('assets-public/js/vendor/modernizr.min.js')}}"></script>
<!-- Jquery Js -->

<script src="{{asset('assets-public/js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/sal.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/backtotop.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/magnifypopup.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/odometer.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/isotop.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/imageloaded.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/lightbox.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/paralax.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/paralax-scroll.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/svg-inject.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/vivus.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/tipped.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/smooth-scroll.min.js')}}"></script>
<script src="{{asset('assets-public/js/vendor/isInViewport.jquery.min.js')}}"></script>

<!-- Site Scripts -->
<script src="{{asset('assets-public/js/app.js')}}"></script>
<script>
    $(window).on('load', function() {
        @if(!\Session('country_code'))
        $("#ChooseCountryModel").modal('show');
        @endif
    });
</script>

@yield('jscode')

</body>

</html>
