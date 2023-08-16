<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Frost- Multipurpose Coming Soon" />
    <meta property="og:title" content="Frost- Multipurpose Coming Soon" />
    <meta property="og:description" content="Frost- Multipurpose Coming Soon" />
    <meta property="og:image" content="Frost- Multipurpose Coming Soon" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('soon-assets/images/favicon.ico')}}" type="image/x-icon" />
    

    <!-- PAGE TITLE HERE -->
    <title>ALBALATY</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!--[if lt IE 9]>
    <script src="{{asset('soon-assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('soon-assets/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- STYLESHEETS -->

    <link rel="stylesheet" type="text/css" href="{{asset('soon-assets/css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('soon-assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('soon-assets/css/templete.min.css')}}">
    <link rel="stylesheet" type="text/css" class="skin" href="{{asset('soon-assets/css/skin/skin-11.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('soon-assets/css/jquery.localizationTool.css')}}">
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body id="bg" class="font-poppins">
<div id="loading-area">
    <div></div>
</div>
<div class="page-wraper">
    <canvas class="site-nav-canvas" style="display: none;"></canvas>
    <!-- Content -->
    <!-- Side Nav -->
    <div class="about-sidebox">
        <a href="javascript:void(0)" class="closebtn bg-primary">×</a>
        <div class="about-section">
            <div class="contact-box">
                <div class="contact-form">
                    <form method="POST" class="dezPlaceAni" action="{{route('public.admin.register')}}">

                    </form>
                    <div class="map-box">
                        <iframe src="https://maps.google.com/maps?q=26.120856, 34.273242&t=&z=13&ie=UTF8&iwloc=&output=embed" class="align-self-stretch radius-sm" style="border:0;" allowfullscreen></iframe>
                    </div>
                    <!-- <div class="map-box"><div class="gmap_canvas align-self-stretch radius-sm" allowfullscreen><iframe   id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div> -->

                    <!-- <a href="#" class="site-button map-btn"><span>View Map</span><span>Close</span></a> -->
                </div>
                <div class="contact-info">
                    <!-- <div class="col">
                        <div>
                            <h5 class="title">Location</h5>
                            <p>Red Sea-Elqussier-22 - 10Ramadan St.
                            </p>
                        </div>
                    </div>
                    <div class="col"> -->
                    <div class="ml-4">
                        <h5 class="title">Email</h5>
                        <a href="#">info@ALBALATY.com</a>
                    </div>
                    <!-- </div> -->
                </div>
            </div>

        </div>
    </div>
    <!-- Side Nav End-->
    <!-- Coming Soon Contant -->
    <div class="dez-coming-soon style-7 wow fadeIn snakecolor" data-wow-duration="0.80s" data-wow-delay="0.50s">
        <canvas id="canvas3"></canvas>
        <div class="clearfix dez-coming-bx">

            <div class="dez-content top-center posi-center">
                <div class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.0s">
                    <a href="index.html"><img src="{{asset('soon-assets/images/Asset 3.png')}}" alt="" height="120" width="250" class="mb-2"></a>
                </div>
                <h2 class="dez-title ml2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.5s">Coming Soon</h2>
                <!-- <p class="wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.7s">Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt labore dolore.</p> -->
                <div class="countdown count-1">
                    <div class="date wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.0s">
                        <span class="days time"></span>
                        <span>Days</span>
                    </div>
                    <div class="date wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.3s">
                        <span class="hours time"></span>
                        <span>Hours</span>
                    </div>
                    <div class="date wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <span class="mins time"></span>
                        <span>Minutes</span>
                    </div>
                    <div class="date wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.9s">
                        <span class="secs time"></span>
                        <span>Second</span>
                    </div>
                </div>

                <a href="javascript:void(0);" class="site-button gradient button-lg radius-md m-r10" data-toggle="modal" data-target="#exampleModal" id="btnX">Register A Teacher</a>
                <a href="{{url('/teacher')}}" class="site-button gradient button-lg radius-md m-r10">Teacher</a>
                <a href="{{url('/super-admin')}}" class="site-button button-lg outline radius-md">Super Admin</a>

                <div class="modal fade subscribe-box" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{route('public.admin.register')}}" class="dzSubscribe modal-content" method="post">
                            <div class="modal-header">
                                <img src="images/bell14.png" alt="" />
                                <h5 class="modal-title" id="exampleModalLabel">Register A Teacher</h5>
                                @if(session('error'))
                                    <p class="text-danger">{{session('error')}}</p>
                                @endif
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input name="name" type="text" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Your Email Address</label>
                                            <input name="email" type="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" type="text" required class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Gender</label>
                                        <div class="form-group">
                                            <select name="gender" class="form-control form-control-lg" required>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Country</label>
                                        <div class="form-group">
                                            <select name="country" class="form-control form-control-lg" required>
                                                @foreach(\App\Country::all() as $country)
                                                    <option value="{{$country->code}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Teaching Language</label>
                                        <div class="form-group">
                                            <select name="teachingLang" class="form-control form-control-lg" required>
                                                <option value="arabic">عربي</option>
                                                <option value="english">English</option>
                                                <option value="french">French</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input name="password_conf" type="password" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Qualification & Certificates</label>
                                            <textarea name="description" rows="4" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="site-button gradient radius-md button-lg shadow">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- JavaScript  files ========================================= -->
<script src="{{asset('soon-assets/js/jquery.min.js')}}"></script>
<!-- JQUERY.MIN JS -->
<script src="{{asset('soon-assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<!-- POPPER.MIN JS -->
<script src="{{asset('soon-assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('soon-assets/plugins/countdown/jquery.countdown.js')}}"></script>
<!-- JQUERY COUNTDOWN -->
<script src="{{asset('soon-assets/plugins/scroll/scrollbar.min.js')}}"></script>
<!-- SCROLLBAR -->
<script src="{{asset('soon-assets/plugins/imagesloaded/imagesloaded.js')}}"></script>
<!-- IMAGESLOADED -->
<script src="{{asset('soon-assets/plugins/masonry/masonry-3.1.4.js')}}"></script>
<!-- MASONRY -->
<script src="{{asset('soon-assets/plugins/masonry/masonry.filter.js')}}"></script>
<!-- MASONRY -->
<script src="{{asset('soon-assets/plugins/lightgallery/js/lightgallery-all.min.js')}}"></script>
<!-- LIGHTGALLERY -->
<script src="{{asset('soon-assets/plugins/colorful-snakes/colorful-snakes.js')}}"></script>
<!-- Colorful Snakes JS -->
<script src="{{asset('soon-assets/plugins/colorful-snakes/colorful-snakes.app.js')}}"></script>
<!-- Colorful Snakes JS -->
<script src="{{asset('soon-assets/js/jquery.localizationTool.js')}}"></script>
<!-- localizationTool JS -->
<script src="{{asset('soon-assets/js/translator.js')}}"></script>
<!-- Translator JS -->
<script src="{{asset('soon-assets/js/custom.js')}}"></script>
<!-- CUSTOM FUCTIONS  -->
<script src="{{asset('soon-assets/js/dz.ajax.js')}}"></script>
<!-- CONTACT JS  -->
<script src="{{asset('soon-assets/js/wow.js')}}"></script>
<!-- WOW JS -->
<script src="{{asset('soon-assets/plugins/anime/anime.min.js')}}"></script>
<!-- CUSTOM FUCTIONS  -->
<script src="{{asset('soon-assets/plugins/anime/app.js')}}"></script>
<!-- CUSTOM FUCTIONS  -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Google API For Recaptcha  -->
<div class="site-nav-overlay js-nav" style="opacity: 0;"></div>


<script>
    $(document).ready(function() {
        @if(session('error'))
            $("#btnX").click();
        @endif
    });
</script>
</body>

</html>
