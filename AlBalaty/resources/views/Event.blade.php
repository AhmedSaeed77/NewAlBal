@extends('layouts.public')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{route('index')}}"> الرئيسيه </a></li>
                <li class="active"><a href="#"> تفاصيل المراجعه </a></li>
            </ul><!-- /.list-unstyled -->
            <h2 class="inner-banner__title">تفاصيل المراجعه  </h2><!-- /.inner-banner__title -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <section class="course-details" id='app-1'>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-details__content">
                        <div class="course-details__top">
                            <div class="course-details__top-left">
                                <h2 class="course-details__title">
                                    {{Transcode::evaluate($i->event)['name'] }}

                                </h2>
                                <small>
                                    <b>من:</b> {{$i->event->start}}  |  <b>إلى:</b> {{$i->event->end}}
                                </small>
                                <!-- /.course-details__title -->
                                <div class="course-one__stars">
                                        <span class="course-one__stars-wrap">
                                            @for($j=0; $j< round($i->total_rate); $j++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </span><!-- /.course-one__stars-wrap -->
                                    <span class="course-one__count">{{round($i->total_rate,1)}}</span><!-- /.course-one__count -->
                                    <span class="course-one__stars-count">{{\App\Rating::where('event_id', $i->event->id)->count()}}</span><!-- /.course-one__stars-count -->
                                </div><!-- /.course-one__stars -->
                            </div><!-- /.course-details__top-left -->
                            <div class="course-details__top-right">
                           
                            </div><!-- /.course-details__top-right -->
                        </div><!-- /.course-details__top -->
                        <div class="course-one__image">
                            <img src="{{ url('storage/events/'.basename($i->event->img))}}" alt="">
                            <i class="far fa-heart"></i><!-- /.far fa-heart -->
                        </div><!-- /.course-one__image -->

                        <!--<ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist">-->
                        <!--    <li>-->
                        <!--        <a class="active" role="tab" data-toggle="tab" href="#overview">Overview</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a class="" role="tab" data-toggle="tab" href="#curriculum">Curriculum</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a class="" role="tab" data-toggle="tab" href="#Schedule">Schedule</a>-->
                        <!--    </li>-->

                        <!--    <li>-->
                        <!--        <a class="" role="tab" data-toggle="tab" href="#review">Reviews</a>-->
                        <!--    </li>-->
                        <!--</ul><!-- /.course-details__tab-navs list-unstyled -->
                        <div class="tab-content course-details__tab-content ">
                            <div class="tab-pane show active  animated fadeInUp" role="tabpanel" id="overview">
                                <h4> حول هذه الباقة </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['description'] !!}</p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> ماذا ستتعلم </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['what_you_learn'] !!}</p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> المتطلبات </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['requirement'] !!}</p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> لمن هذه الباقة </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['who_course_for'] !!}</p><!-- /.course-details__tab-text -->
                                <br>


                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane  animated fadeInUp" role="tabpanel" id="curriculum">

                                <h3 class="course-details__tab-title">Video Content <small style="float:right;">{{$i->event->total_time}} | {{$i->event->total_lecture}} {{__('Public/package.lectures')}}</small> </h3>
                                <br>
                                @foreach(\App\Chapters::where(['course_id' => $i->event->course_id])->get() as $chapter)
                                    @if(count(\App\Video::where('chapter', $chapter->id)->get()) > 0 )
                                        @php $demo = \App\Video::where(['chapter' => $chapter->id, 'event_id' => $i->event->id])->get(); @endphp
                                        @if(count($demo))
                                        <h3 class="course-details__tab-title">
                                            {{Transcode::evaluate($chapter)['name']}}
                                            <small style="float:right;">
                                                {{count($demo)}} {{__('Public/package.lecture')}}
                                            </small>
                                        </h3>
                                        <br>
                                        <ul class="course-details__curriculum-list list-unstyled">
                                            @foreach($demo as $video)
                                                <li>
                                                    <div class="course-details__curriculum-list-left">
                                                        <div class="course-details__meta-icon video-icon">
                                                            <i class="fas fa-play"></i><!-- /.fas fa-play -->
                                                        </div><!-- /.course-details__icon -->
                                                        <a href="#">{{Transcode::evaluate($video)['title']}}</a>
                                                        {{--                                                        <span>Preview</span>--}}
                                                    </div><!-- /.course-details__curriculum-list-left -->
                                                    <div class="course-details__curriculum-list-right">{{\Carbon\Carbon::parse($video->duration)->format('i')}} {{__('Public/package.min')}}</div>
                                                    <!-- /.course-details__curriculum-list-right -->
                                                </li>
                                            @endforeach
                                        </ul><!-- /.course-details__curriculum-list -->
                                        <br>
                                        @endif
                                    @endif
                                @endforeach


                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane   animated fadeInUp" role="tabpanel" id="Schedule">
                                <div class="t-container ">

                                    <table style="width: 80%; ">
                                        <thead>
                                            <td>التاريخ</td>
                                            <td>من</td>
                                            <td>الي</td>
                                        </thead>
                                        @foreach(\App\EventTime::where('event_id', $i->event->id)->orderBy('day')->get() as $t)
                                            <tr>
                                                <td>{{$t->day}}</td>
                                                <td>{{$t->from}}</td>
                                                <td>{{$t->to}}</td>
                                            </tr>
                                        @endforeach


                                    </table>

                                </div>

                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane  animated fadeInUp" role="tabpanel" id="review">
                                <div class="row">
                                    <div class="col-xl-7 d-flex">
                                        <div class="course-details__progress my-auto">
                                            @php
                                                $star5percentage = 0;
                                                $star4percentage = 0;
                                                $star3percentage = 0;
                                                $star2percentage = 0;
                                                $star1percentage = 0;
                                                $reviews_count = count(\App\Rating::where('event_id', $i->event->id)->get());
                                                if( count(\App\Rating::where('event_id', $i->event->id)->get()) ){
                                                    $star5percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 5)->get()));
                                                    $star4percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 4)->get()));
                                                    $star3percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 3)->get()));
                                                    $star2percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 2)->get()));
                                                    $star1percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 1)->get()));
                                                }

                                            @endphp
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Excellent</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count ? round($star5percentage/$reviews_count*100): 0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star5percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Very Good</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count ? round($star4percentage/$reviews_count*100): 0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star4percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Average</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count ? round($star3percentage/$reviews_count*100): 0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star3percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Poor</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count ? round($star2percentage/$reviews_count*100): 0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star2percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Terrible</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count ? round($star1percentage/$reviews_count*100): 0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star1percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                        </div><!-- /.course-details__progress -->
                                    </div><!-- /.col-lg-8 -->
                                    <div class="col-xl-5 justify-content-xl-end justify-content-sm-center d-flex">
                                        <div class="course-details__review-box">
                                            <p class="course-details__review-count">{{round($i->total_rate, 1) }}</p>
                                            <!-- /.course-details__review-count -->
                                            <div class="course-details__review-stars">
                                                @for($j=0; $j<floor($i->total_rate); $j++)
                                                    <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                @endfor
                                            </div><!-- /.course-details__review-stars -->
                                            <p class="course-details__review-text">{{$reviews_count}} reviews</p>
                                            <!-- /.course-details__review-text -->
                                        </div><!-- /.course-details__review-box -->
                                    </div><!-- /.col-lg-4 -->
                                </div><!-- /.row -->
                                <div class="course-details__comment">
                                    @foreach(\App\Rating::where("event_id", $i->event->id)->orderBy('created_at', 'desc')->paginate(8) as $rate)
                                        @if(\App\Models\Auth\User::find($rate->user_id))
                                            @php
                                                $pic = asset('storage/icons/user/'.rand(1,3).'.png');
                                                if(\App\UserDetail::where('user_id', $rate->user_id)->first()){
                                                    if(\App\UserDetail::where('user_id', $rate->user_id)->get()->first()->profile_pic != null ){
                                                        $pic = url('storage/profile_picture/'.basename(\App\UserDetail::where('user_id', $rate->user_id)->get()->first()->profile_pic));
                                                    }
                                                }
                                            @endphp
                                            <div class="course-details__comment-single">
                                                <div class="course-details__comment-top">
                                                    <div class="course-details__comment-img">
                                                        <img src="{{$pic}}" alt="">
                                                    </div><!-- /.course-details__comment-img -->
                                                    <div class="course-details__comment-right">
                                                        <h2 class="course-details__comment-name">{{\App\Models\Auth\User::find($rate->user_id)->name}}</h2>
                                                        <!-- /.course-details__comment-name -->
                                                        <div class="course-details__comment-meta">
                                                            <p class="course-details__comment-date">{{$rate->created_at->diffForHumans()}}</p>
                                                            <!-- /.course-details__comment-date -->
                                                            <div class="course-details__comment-stars">
                                                                @for($j=0; $j< round($rate->rate); $j++)
                                                                    <i class="fa fa-star"></i><!-- /.fa fa-star -->
                                                                @endfor
                                                            </div><!-- /.course-details__comment-stars -->
                                                        </div><!-- /.course-details__comment-meta -->
                                                    </div><!-- /.course-details__comment-right -->
                                                </div><!-- /.course-details__comment-top -->
                                                <p class="course-details__comment-text">
                                                    {{$rate->review}}
                                                </p>
                                                <!-- /.course-details__comment-text -->
                                            </div><!-- /.course-details__comment-single -->
                                        @endif
                                    @endforeach
                                </div><!-- /.course-details__comment -->
                            </div><!-- /.course-details__tab-content -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.course-details__content -->
                </div><!-- /.col-lg-8 -->
               <div class="col-lg-4">
                    <div class="course-sidebar-3">
                        <div class="edu-course-widget widget-course-summery">
                            <div class="inner">
                                <div >
                                    <img src="{{$i->event->img}}" alt="Courses">
                                    <!--<a href="javascript:;" class="play-btn"><i class="icon-18"></i></a>-->
                                </div>
                                <div class="content">
                                    <h4 class="widget-title">تفاصي الباقة</h4>
                                    <ul class="course-item">
                                        <li>
                                            <span class="label"><i class="icon-60"></i>السعر</span>
                                            <span class="value price">
                                                {{ $pricing['localized_price'] - $pricing['localized_coupon_discount']}} {{$pricing['currency_code']}}
                                            </span>
                                        </li>
                                        @if($pricing['localized_coupon_discount'])
                                            <li>
                                                <span class="label"><i class="icon-60"></i>قيمة الخصم</span>
                                                <span class="value">
                                                {{$pricing['localized_coupon_discount'] }} {{$pricing['currency_code']}}
                                            </span>
                                            </li>
                                        @endif
                                        @if($pricing['renew_period_in_days'])
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value">{{ $i->event->expire_in_days }} يوم </span>
                                        </li>
                                        @else
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value">مدا الحياة</span>
                                        </li>
                                        @endif
                                        <li>
                                            <span class="label"><i class="icon-62"></i>المُعلم</span>
                                            <span class="value">{{$i->event->teacher->name}}</span>
                                        </li>

                                        <li>
                                            <span class="label"><i class="icon-59"></i>اللغة</span>
                                            <span class="value">{{$i->event->lang}}</span>
                                        </li>

                                    <input type="text" class="form-control" style="border: 1px solid #ced4da;" placeholder="Coupon Code" v-model="coupon">
                                    <div class="read-more-btn">
                                        <a href="#" class="edu-btn" data-bs-toggle="modal" data-bs-target="#paymentModel" @click="regenerate_price">ابدا الان <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div><!-- /.row -->
        </div><!-- /.container -->
        
        <div class="modal fade" id="paymentModel" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <!-- Close -->
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <!-- Heading -->
                        <h2 class="fw-bold text-center mb-1" id="modalExampleTitle">
                            الدفع
                        </h2>

                        <!-- Text -->
                        <p class="font-size-lg text-center text-muted mb-6 mb-md-8">
                            ابدا عملية الدفع
                        </p>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Visa/Master Card</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p class="alert alert-danger" v-if="error != ''">@{{ error }}</p>
                                    <div>
                                        {{--                                        <button class="btn btn-warning btn-lg w-100" @click="myfatoorah_charge">{{__('Public/package.buy-now')}}</button>--}}
                                        <div id="myfatoorah-card-element"></div>

                                        <button @click="myfatoorahSubmit()" class="btn btn-warning btn-lg">Pay Now</button>

                                    </div>

                                </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.course-details -->
@endsection

@section('jscode')

    @if(env('APP_ENV') == 'local')
        <script src="https://demo.myfatoorah.com/cardview/v1/session.js"></script>
    @else
        @if($i->event->pricing['country_code'] == 'sa')
            <script src="https://sa.myfatoorah.com/cardview/v1/session.js"></script>
        @else
            <script src="https://portal.myfatoorah.com/cardview/v1/session.js"></script>
        @endif
    @endif

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        var app = new Vue({

            el: '#app-1',
            data: {
                error: '',
                package_id: {{$i->event->id}},
                paymentMethod: 'null',
                coupon: '{{Illuminate\Support\Facades\Input::get('coupon')}}',
                price: 0,
                discount: 0,
                newPrice: 0,
                visa_generated: 0,
                auth: @if(Auth::check()) 1 @else 0 @endif,
                myfatoorah: {
                    SessionId: '',
                    CountryCode: '',
                },
            },
            mounted(){
                this.initSal();
            },
            methods: {
                initSal: function(){
                    sal({
                        threshold: 0.01,
                        once: true,
                    });
                },
                {{--getVideo: function(video_id){--}}
                {{--    document.getElementById('videoContainer').innerHTML = '<p class="mx-auto">Loading...</p>';--}}
                {{--    $.ajaxSetup({--}}
                {{--        headers: {--}}
                {{--            'X-CSRF-TOKEN': '{{csrf_token()}}'--}}
                {{--        }--}}
                {{--    });--}}

                {{--    $.ajax ({--}}
                {{--        type: 'POST',--}}
                {{--        url: '{{ route('public.package.view.video')}}',--}}
                {{--        data: {--}}
                {{--            video_id,--}}
                {{--        },--}}
                {{--        success: function(res) {--}}
                {{--            if(res)--}}
                {{--                document.getElementById('videoContainer').innerHTML = res['html'];--}}
                {{--        },--}}
                {{--        error: function(err){--}}
                {{--            console.log(err);--}}
                {{--        }--}}
                {{--    });--}}
                {{--},--}}
                regenerate_price: function(){


                    if(!this.auth){
                        window.location.replace('{{route('login')}}');
                    }

                    Data = {
                        package_id: app.package_id,
                        coupon_code: app.coupon,
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });

                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('myfatoorah.price.details')}}',
                        data: Data,
                        success: function(res) {
                            console.log(res);

                            if(res.error != ''){
                                app.error = res.error;
                                return;
                            }

                            if(res.paid == true){
                                window.location.replace('{{route('student.courses')}}');
                                return;
                            }

                            app.price = Number(res.price);
                            app.discount = Number(res.discount);

                            if (app.price > app.discount) {
                                app.newPrice = app.price - app.discount;
                            } else {

                                app.newPrice = 0;
                            }

                            if(app.myfatoorah.SessionId == ''){
                                $.ajax ({
                                    type: 'POST',
                                    url: '{{ route('myfatoorah.init.session')}}',
                                    success: function (res) {
                                        app.myfatoorah.SessionId = res['SessionId'];
                                        app.myfatoorah.CountryCode = res['CountryCode'];
                                        var config = {
                                            countryCode: res['CountryCode'], // Here, add your Country Code you receive from InitiateSession Endpoint.
                                            sessionId: res['SessionId'], // Here you add the "SessionId" you receive from InitiateSession Endpoint.
                                            cardViewId: "myfatoorah-card-element",

                                            style: {
                                                direction: "ltr",
                                                cardHeight: 130,
                                                input: {
                                                    color: "black",
                                                    fontSize: "13px",
                                                    fontFamily: "sans-serif",
                                                    inputHeight: "32px",
                                                    inputMargin: "0px",
                                                    borderColor: "c7c7c7",
                                                    borderWidth: "1px",
                                                    borderRadius: "8px",
                                                    boxShadow: "",
                                                    placeHolder: {
                                                        holderName: "Name On Card",
                                                        cardNumber: "Number",
                                                        expiryDate: "MM / YY",
                                                        securityCode: "CVV",
                                                    }
                                                },
                                            },

                                            label: {
                                                display: false,
                                                color: "black",
                                                fontSize: "13px",
                                                fontWeight: "normal",
                                                fontFamily: "sans-serif",
                                                text: {
                                                    holderName: "Card Holder Name",
                                                    cardNumber: "Card Number",
                                                    expiryDate: "Expiry Date",
                                                    securityCode: "Security Code",
                                                },
                                            },

                                            error: {
                                                borderColor: "red",
                                                borderRadius: "8px",
                                                boxShadow: "0px",
                                            },
                                        };
                                        myFatoorah.init(config);
                                    }
                                });
                            }

                        },
                        error: function(res){
                            console.log('Error:', res);
                        }
                    });



                },
                myfatoorahSubmit: function(){
                    myFatoorah.submit()
                    // On success
                        .then(function (response) {
                            // Here you need to pass session id to you backend here
                            var sessionId = response.SessionId;
                            var cardBrand = response.CardBrand;
                            app.myfatoorah_charge(sessionId);
                        })
                        // In case of errors
                        .catch(function (error) {
                            console.log(error);
                        });
                },

                myfatoorah_charge: function(sessionId = 'false'){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });


                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('myfatoorah.charge')}}',
                        data: {
                            item_id: app.package_id,
                            item_type: 'event',
                            coupon_code: app.coupon,
                            sessionId,
                            // user_id: '{{Auth::user()? Auth::user()->id:''}}',
                        },
                        success: function (res) {
                            if(res.error == ''){
                                window.location.replace(res.url);
                            }else{
                                // console.log(res);
                                swal({
                                    title: res.error,
                                    type: 'error',
                                    //   confirmButtonColor: '#DD6B55',
                                    confirmButtonText: 'Ok',
                                });
                            }
                        },
                        error: function (error) {
                            console.log(error)
                        },
                    });
                },
            }
        });
    </script>
@endsection

