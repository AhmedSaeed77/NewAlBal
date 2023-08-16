@extends('layouts.public')

@section('content')
    <div class="edu-breadcrumb-area breadcrumb-style-3">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="edu-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">الرئيسية</a></li>
                    <li class="separator"><i class="icon-angle-left"></i></li>
                    <li class="breadcrumb-item"><a href="{{route('index')}}">الكورسات</a></li>
                    <li class="separator"><i class="icon-angle-left"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">عرض التفاصيل</li>
                </ul>
                <div class="page-title">
                    <h1 class="title">{{$package->package_name}}</h1>
                </div>
                <ul class="course-meta">
                    <li><i class="icon-58"></i>بواسطة {{$package->teacher_name}}</li>
                    <li><i class="icon-59"></i>{{$package->lang}}</li>

                </ul>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1">
                <span></span>
            </li>
            <li class="shape-2 scene"><img data-depth="2" src="{{asset('assets-public/images/about/shape-13.png')}}" alt="shape"></li>
            <li class="shape-3 scene"><img data-depth="-2" src="{{asset('assets-public/images/about/shape-15.png')}}" alt="shape"></li>
            <li class="shape-4">
                <span></span>
            </li>
            <li class="shape-5 scene"><img data-depth="2" src="{{asset('assets-public/images/about/shape-07.png')}}" alt="shape"></li>
        </ul>
    </div>

    <!--=====================================-->
    <!--=     Courses Details Area Start    =-->
    <!--=====================================-->
    <section class="edu-section-gap course-details-area" id="app-1">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-8">
                    <div class="course-details-content course-details-2">
                        <div class="course-overview">
                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">حول هذه الباقة</h3>
                            <p data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                {!! $package->description !!}
                            </p>

                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">المتطلبات</h3>
                            <p class="mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                {!! $package->requirement !!}
                            </p>
                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">ماذا ستتعلم</h3>
                            <p class="mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                {!! $package->what_you_learn !!}
                            </p>

                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">لمن هذه الباقة</h3>
                            <p class="mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                {!! $package->who_course_for !!}
                            </p>
                        </div>
{{--                        <div class="course-curriculam mb--90">--}}
{{--                            <div class="accordion edu-accordion" id="accordionExample" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h3 class="accordion-header" id="headingOne">--}}
{{--                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                            Course Introduction--}}
{{--                                        </button>--}}
{{--                                    </h3>--}}
{{--                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <div class="course-lesson">--}}
{{--                                                <ul>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Introduction</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Overview</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Local Development Environment Tools</div>--}}
{{--                                                        <div class="badge-list">--}}
{{--                                                            <span class="badge badge-primary">0 Question</span>--}}
{{--                                                            <span class="badge badge-secondary">10 Minutes</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Exercise / Reference Files</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Code Editor Installation (Optional if you have one)</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Embedding PHP in HTML</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingTwo">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                            JavaScript Language Basics--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <div class="course-lesson">--}}
{{--                                                <ul>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Introduction</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Overview</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Local Development Environment Tools</div>--}}
{{--                                                        <div class="badge-list">--}}
{{--                                                            <span class="badge badge-primary">0 Question</span>--}}
{{--                                                            <span class="badge badge-secondary">10 Minutes</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Exercise / Reference Files</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Code Editor Installation (Optional if you have one)</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Embedding PHP in HTML</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingThree">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                            Components & Databinding--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <div class="course-lesson">--}}
{{--                                                <ul>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Introduction</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Overview</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Local Development Environment Tools</div>--}}
{{--                                                        <div class="badge-list">--}}
{{--                                                            <span class="badge badge-primary">0 Question</span>--}}
{{--                                                            <span class="badge badge-secondary">10 Minutes</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Exercise / Reference Files</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Code Editor Installation (Optional if you have one)</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Embedding PHP in HTML</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="accordion-item">--}}
{{--                                    <h2 class="accordion-header" id="headingFour">--}}
{{--                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">--}}
{{--                                            Product Management Leadership--}}
{{--                                        </button>--}}
{{--                                    </h2>--}}
{{--                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">--}}
{{--                                        <div class="accordion-body">--}}
{{--                                            <div class="course-lesson">--}}
{{--                                                <ul>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Introduction</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Overview</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Local Development Environment Tools</div>--}}
{{--                                                        <div class="badge-list">--}}
{{--                                                            <span class="badge badge-primary">0 Question</span>--}}
{{--                                                            <span class="badge badge-secondary">10 Minutes</span>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Course Exercise / Reference Files</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Code Editor Installation (Optional if you have one)</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="text"><i class="icon-65"></i> Embedding PHP in HTML</div>--}}
{{--                                                        <div class="icon"><i class="icon-68"></i></div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="course-instructor-wrap mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <h3 class="heading-title">أساتذتك</h3>
                            <div class="course-instructor">
                                <div class="thumbnail">
                                    <img src="{{asset('assets-public/images/course/author-01.png')}}" alt="Author Images">
                                </div>
                                <div class="author-content">
                                    <h6 class="title">{{$package->teacher_name}}</h6>
                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercitation ulla mco laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate.</p>
                                    <ul class="social-share">
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="course-review" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <h3 class="heading-title">اراء الطلاب</h3>
                            <p>5.00 average rating based on 7 rating</p>
                            <div class="border-box">

                                <!-- Start Comment Area  -->
                                <div class="comment-area">
                                    <div class="comment-list-wrapper">
                                        <!-- Start Single Comment  -->
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="{{asset('assets-public/images/blog/comment-01.jpg')}}" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <h5 class="title">Haley Bennet</h5>
                                                <span class="date">Oct 10, 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Comment  -->
                                        <!-- Start Single Comment  -->
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="{{asset('assets-public/images/blog/comment-02.jpg')}}" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <h5 class="title">Simon Baker</h5>
                                                <span class="date">Oct 10, 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Comment  -->
                                        <!-- Start Single Comment  -->
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="{{asset('assets-public/images/blog/comment-03.jpg')}}" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <h6 class="title">Richard Gere</h6>
                                                <span class="date">Oct 10, 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Comment  -->
                                    </div>
                                </div>
                                <!-- End Comment Area  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-sidebar-3">
                        <div class="edu-course-widget widget-course-summery">
                            <div class="inner">
                                <div class="thumbnail">
                                    <img src="{{$package->img_url}}" alt="Courses">
                                    <a href="javascript:;" class="play-btn"><i class="icon-18"></i></a>
                                </div>
                                <div class="content">
                                    <h4 class="widget-title">تفاصيل الباقة</h4>
                                    <ul class="course-item">
                                        <li>
                                            <span class="label"><i class="icon-60"></i>السعر</span>
                                            <span class="value price">
                                                {{ max($package->pricing['localized_price'] - $package->pricing['localized_coupon_discount'], 0) }} {{$package->pricing['currency_code']}}
                                            </span>
                                        </li>
                                        @if($package->pricing['localized_coupon_discount'])
                                            <li>
                                                <span class="label"><i class="icon-60"></i>قيمة الخصم</span>
                                                <span class="value">
                                                {{$package->pricing['localized_coupon_discount'] }} {{$package->pricing['currency_code']}}
                                            </span>
                                            </li>
                                        @endif
                                        @if($package->pricing['renew_period_in_days'])
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value">{{$package->pricing['renew_period_in_days'] }} يوم </span>
                                        </li>
                                        @else
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value">مدا الحياة</span>
                                        </li>
                                        @endif
                                        <li>
                                            <span class="label"><i class="icon-62"></i>المُعلم</span>
                                            <span class="value">{{$package->teacher_name}}</span>
                                        </li>
{{--                                        <li>--}}
{{--                                            <span class="label"><i class="icon-61"></i>Duration:</span>--}}
{{--                                            <span class="value">3 weeks</span>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <span class="label"><img class="svgInject" src="{{asset('assets-public/images/svg-icons/books.svg')}}" alt="book icon">Lessons:</span>--}}
{{--                                            <span class="value">8</span>--}}
{{--                                        </li>--}}
                                        <li>
                                            <span class="label"><i class="icon-63"></i>عدد الطلبة</span>
                                            <span class="value">{{$package->students_count}} طلاب</span>
                                        </li>
                                        <li>
                                            <span class="label"><i class="icon-59"></i>اللغة</span>
                                            <span class="value">{{$package->lang}}</span>
                                        </li>
{{--                                        <li>--}}
{{--                                            <span class="label"><i class="icon-64"></i>Certificate:</span>--}}
{{--                                            <span class="value">Yes</span>--}}
{{--                                        </li>--}}
                                    </ul>
                                    <input type="text" class="form-control" style="border: 1px solid #ced4da;" placeholder="Coupon Code" v-model="coupon">
                                    <div class="read-more-btn">

                                        <a href="#" class="edu-btn" data-bs-toggle="modal" data-bs-target="#paymentModel" @click="regenerate_price">ابدا الان <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </section>
@endsection

@section('jscode')

    @if(env('APP_ENV') == 'local')
        <script src="https://demo.myfatoorah.com/cardview/v1/session.js"></script>
    @else
        @if($package->pricing['country_code'] == 'sa')
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
                package_id: {{$package->id}},
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
                            item_type: 'package',
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
