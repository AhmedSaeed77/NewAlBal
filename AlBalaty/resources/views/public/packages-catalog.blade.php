@extends('layouts.public')
@section('head')
    <style>
        html[dir="rtl"] .edu-course .content .course-meta li {
            margin-right: 15px !important;

        }
    </style>
@endsection
@section('content')
    <div id="app-1">

        <div class="edu-breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-inner">
                    <div class="page-title">
                        <h1 class="title">{{$path->title}}</h1>
                    </div>
                    <ul class="edu-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">الرئيسية</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="#">الباقات</a></li>
                        <li class="separator"><i class="icon-angle-right"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$path->title}}</li>
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
        <!--=        Courses Area Start         =-->
        <!--=====================================-->
        <div class="edu-course-area course-area-1 section-gap-equal">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3">
                        <div class="edu-course-sidebar">
                            <div class="edu-course-widget widget-category">
                                <div class="inner">
                                    <h5 class="widget-title">{{config('library.course.en')}}</h5>
                                    <div class="content" v-for="i,i_idx in courses">
                                        <input type="checkbox" :id="'cat-check-course'+i[0].course_id" :value="i[0].course_id" v-model="selected_course_id">
                                        <label :for="'cat-check-course'+i[0].course_id" style="font-weight: bold; text-align: center;">
                                            @{{ i[0].course_title }}
                                        </label>
                                        <div class="edu-form-check" v-for="x, x_idx in i" v-if="selected_course_id.find(id => id == x.course_id)">
                                            <input type="checkbox" :id="'cat-check-part'+x.part_id" :value="x.part_id" v-model="selected_part_id">
                                            <label :for="'cat-check-part'+x.part_id">
                                                @{{ x.part_title }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edu-course-widget widget-instructor">
                                <div class="inner">
                                    <h5 class="widget-title">المعلمين</h5>
                                    <div class="content">
                                        <div class="edu-form-check" v-for="i, idx in teachers">
                                            <input type="checkbox" :id="'inst-check1-teacher'+idx" :value="i.id" v-model="selected_teacher_id">
                                            <label :for="'inst-check1-teacher'+idx">@{{ i.name }} <span>(@{{ i.admin_package_count }})</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="edu-course-widget widget-language">
                                <div class="inner">
                                    <h5 class="widget-title">Language</h5>
                                    <div class="content">
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="lang-check1">
                                            <label for="lang-check1">English <span>(12)</span></label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="lang-check2">
                                            <label for="lang-check2">Spanish <span>(7)</span></label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="lang-check3">
                                            <label for="lang-check3">German <span>(5)</span></label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="lang-check4">
                                            <label for="lang-check4">Russian <span>(3)</span></label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="lang-check5">
                                            <label for="lang-check5">Korean <span>(2)</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edu-course-widget widget-price">
                                <div class="inner">
                                    <h5 class="widget-title">Price</h5>
                                    <div class="content">
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="price-check1">
                                            <label for="price-check1">All Price</label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="price-check2">
                                            <label for="price-check2">Free</label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="price-check3">
                                            <label for="price-check3">Low to High</label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="price-check4">
                                            <label for="price-check4">High to Low</label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="price-check5">
                                            <label for="price-check5">Paid</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edu-course-widget widget-rating">
                                <div class="inner">
                                    <h5 class="widget-title">Rating</h5>
                                    <div class="content">
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="rating-check1">
                                            <label for="rating-check1">
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <span>(7)</span>
                                            </label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="rating-check2">
                                            <label for="rating-check2">
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <span>(2)</span>
                                            </label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="rating-check3">
                                            <label for="rating-check3">
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <span>(3)</span>
                                            </label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="rating-check4">
                                            <label for="rating-check4">
                                                <i class="icon-23"></i>
                                                <i class="icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <span>(6)</span>
                                            </label>
                                        </div>
                                        <div class="edu-form-check">
                                            <input type="checkbox" id="rating-check5">
                                            <label for="rating-check5">
                                                <i class="icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <i class="off icon-23"></i>
                                                <span>(2)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                    <div class="col-lg-9 col-pl--35">

                        <div class="edu-sorting-area">
                            <div class="sorting-left">
                                <h6 class="showing-text">
                                    <span>@{{ packages?.length }}</span> نتيجة بحث
                                </h6>
                            </div>
                        </div>

                        <div class="row g-5">
                            <!-- Start Single Course  -->
                            <div class="col-md-6 col-lg-4 col-xl-4" v-for="package, idx in packages" :data-sal-delay="100+idx*50" data-sal="slide-up" data-sal-duration="800">
                                <div class="edu-course course-style-1 course-box-shadow hover-button-bg-white">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a :href="'{{route('public.package.view', '')}}/'+package.slug">
                                                <img :src="package.img_url" :alt="package.package_name" style="height: 300px;">
                                            </a>
                                            <div class="time-top">
                                                <span class="duration bg-danger"><i class="icon-50"></i> @{{ package.teacher_name }}</span>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <span class="course-level">@{{ package.lang }}</span>
                                            <h6 class="title">
                                                <a :href="'{{route('public.package.view', '')}}/'+package.slug">@{{ package.package_name }}</a>
                                            </h6>
                                            {{--
                                            <div class="course-rating">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <span class="rating-count">(5.0 /9 Rating)</span>
                                            </div>
                                            --}}
                                            <div class="course-price">@{{ package.pricing.localized_price }} @{{ package.pricing.currency_code }}</div>
                                            <ul class="course-meta d-flex">
                                                <li class="d-flex flex-row-reverse flex-row">
                                                    <i class="icon-24"></i>
                                                    @{{ package.videos_count }}
                                                    فيديو
                                                </li>
                                                <li class="d-flex flex-row-reverse flex-row">
                                                    <i class="icon-25"></i>
                                                    @{{ package.students_count }}
                                                    طالب
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="course-hover-content-wrapper">
                                        <button class="wishlist-btn"><i class="icon-22"></i></button>
                                    </div>
                                    <div class="course-hover-content">
                                        <div class="content">

                                            <span class="course-level">@{{ package.lang }}</span>
                                            <h6 class="title">
                                                <a :href="'{{route('public.package.view', '')}}/'+package.slug">@{{ package.package_name }}</a>
                                            </h6>
                                            <div class="course-price">@{{ package.pricing.localized_price }} @{{ package.pricing.currency_code }}</div>
                                            <p>@{{ package.description_notags }}</p>
                                            <ul class="course-meta d-flex">
                                                <li class="d-flex flex-row-reverse flex-row">
                                                    <i class="icon-24"></i>
                                                    @{{ package.videos_count }}
                                                    فيديو
                                                </li>
                                                <li class="d-flex flex-row-reverse flex-row">
                                                    <i class="icon-25"></i>
                                                    @{{ package.students_count }}
                                                    طالب
                                                </li>
                                            </ul>
                                            <a :href="'{{route('public.package.view', '')}}/'+package.slug" class="edu-btn btn-secondary btn-small">اشترك الان <i class="icon-4"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Course  -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Course Area -->
        <!--=====================================-->
    </div>

@endsection

@section('jscode')
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif

    <script>
        var app = new Vue({
            el: '#app-1',
            data: {
                path_id: '{{$path->id}}',
                courses: [],
                teachers: [],
                packages: [],
                selected_course_id: [{{request()->course_id ? request()->course_id.',': ''}}],
                selected_part_id: [{{request()->part_id ? request()->part_id.',': ''}}],
                selected_teacher_id: [],
                sal: null,

            },
            mounted(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });

                this.init();
            },
            methods: {
                init: async function(){
                    const filterOptions = await this.initFilter();
                    app.courses = filterOptions.courses;
                    app.teachers = filterOptions.teachers;
                    await app.filter();
                },
                initSal: function(){
                    sal({
                        threshold: 0.01,
                        once: true,
                    });
                },
                initFilter:async function(){
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('packages-catalog.filter-options')}}',
                        data: {
                            path_id: this.path_id,
                        },
                    });
                },
                filter: async function(){
                    const res = await this.filterRequest();
                    app.packages = res.packages;
                    setTimeout(() => {
                        app.initSal();
                    }, 200);
                    console.log(res);
                },
                filterRequest: async function(){
                    return $.ajax({
                        type: 'POST',
                        url: '{{route('packages-catalog.query')}}',
                        data: {
                            course_id: this.selected_course_id,
                            part_id: this.selected_part_id,
                            teacher_id: this.selected_teacher_id,
                        },
                    });
                },
            },
            watch: {
                selected_course_id: function(val){
                    this.selected_part_id = [];
                    this.filter();
                },
                selected_part_id: function(val){this.filter();},
                selected_teacher_id: function(val){this.filter();},
            },
        });
    </script>
@endsection
