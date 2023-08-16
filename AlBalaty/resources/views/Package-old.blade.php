@extends('layouts.public')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active"><a href="#">Course Details</a></li>
            </ul><!-- /.list-unstyled -->
            <h2 class="inner-banner__title">Course Details</h2><!-- /.inner-banner__title -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <section class="course-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-details__content">
                        <div class="course-details__top">
                            <div class="course-details__top-left">
                                <h2 class="course-details__title">{{Transcode::evaluate($i->package)['name'] }}</h2>
                                <!-- /.course-details__title -->
                                <div class="course-one__stars">
                                        <span class="course-one__stars-wrap">
                                            @for($j=0; $j< round($i->total_rate); $j++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </span><!-- /.course-one__stars-wrap -->
                                    <span class="course-one__count">{{round($i->total_rate,1)}}</span><!-- /.course-one__count -->
                                    <span class="course-one__stars-count">{{\App\Rating::where('package_id', $i->package->id)->count()}}</span><!-- /.course-one__stars-count -->
                                </div><!-- /.course-one__stars -->
                            </div><!-- /.course-details__top-left -->
                            <div class="course-details__top-right">
                                <a href="#" class="course-one__category">{{Transcode::evaluate(\App\Course::find($i->package->course_id))['title'] }}</a><!-- /.course-one__category -->
                            </div><!-- /.course-details__top-right -->
                        </div><!-- /.course-details__top -->
                        <div class="course-one__image">
                            <img src="{{ url('storage/package/imgs/'.basename($i->package->img_large))}}" alt="">
                            <i class="far fa-heart"></i><!-- /.far fa-heart -->
                        </div><!-- /.course-one__image -->

                        <ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist">
                            <li>
                                <a class="active" role="tab" data-toggle="tab" href="#overview">Overview</a>
                            </li>
                            <li>
                                <a class="" role="tab" data-toggle="tab" href="#curriculum">Curriculum</a>
                            </li>
                            <li>
                                <a class="" role="tab" data-toggle="tab" href="#review">Reviews</a>
                            </li>
                        </ul><!-- /.course-details__tab-navs list-unstyled -->
                        <div class="tab-content course-details__tab-content ">
                            <div class="tab-pane show active  animated fadeInUp" role="tabpanel" id="overview">
                                <h4> {{__('Public/package.description')}} </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->package)['description'] !!}</p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> {{__('Public/package.what-you-learn')}} </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->package)['what_you_learn'] !!}</p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> {{__('Public/package.requirements')}} </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->package)['requirement'] !!}</p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> {{__('Public/package.who-course-for')}} </h4>
                                <p class="course-details__tab-text">{!!  Transcode::evaluate($i->package)['who_course_for'] !!}</p><!-- /.course-details__tab-text -->
                                <br>


                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane  animated fadeInUp" role="tabpanel" id="curriculum">
                                @if($i->package->contant_type == 'video' || $i->package->contant_type == 'combined')
                                    <h3 class="course-details__tab-title">Video Content <small style="float:right;">{{$total_time}} | {{$total_videos_num}} {{__('Public/package.lectures')}}</small> </h3>
                                    <br>
                                    @foreach($chapter_list as $chapter)
                                        @if(count(\App\Video::where('chapter', $chapter->id)->get()) > 0 )
                                            <h3 class="course-details__tab-title">
                                                @if(app()->getLocale() == 'en')
                                                    {{$chapter->name}}
                                                @else
                                                    {{$chapter->name_ar}}
                                                @endif
                                                <small style="float:right;">
                                                    {{count(\App\Video::where('chapter', $chapter->id)->get())}} {{__('Public/package.lecture')}} | {{$chapter->total_hours}} {{__('Public/package.hr')}} {{ $chapter->total_min}} {{__('Public/package.min')}}
                                                </small>
                                            </h3>
                                            <br>
                                            <ul class="course-details__curriculum-list list-unstyled">
                                                @php $demo = \App\Video::where('chapter', $chapter->id)->get(); @endphp
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
                                    @endforeach
                                @endif

                                @if($i->package->contant_type == 'question' || $i->package->contant_type == 'combined')
                                        <h3 class="course-details__tab-title">Question Content
                                            <small style="float:right;">{{$total_question_num}} {{__('Public/package.questions')}}</small>
                                        </h3>
                                        <br>
                                        @if(count($chapter_list) > 0)
                                        <h3 class="course-details__tab-title">
                                            {{__('Public/package.knowledge-area')}}
                                            <small style="float:right;">{{$chapter_data->question_num}} {{__('Public/package.questions')}}</small>
                                        </h3>
                                        <br>
                                        <ul class="course-details__curriculum-list list-unstyled">
                                            @foreach($chapter_list as $chapter)
                                                @if(count(\App\Question::where('chapter', '=', $chapter->id)->get()) > 0)
                                                    <li>
                                                        <div class="course-details__curriculum-list-left">
                                                            <div class="course-details__meta-icon quiz-icon">
                                                                <i class="fas fa-comment"></i><!-- /.fas fa-play -->
                                                            </div><!-- /.course-details__icon -->
                                                            <a href="#">{{$chapter->name}}</a>
                                                        </div><!-- /.course-details__curriculum-list-left -->
                                                        <div class="course-details__curriculum-list-right">{{ round( (count(\App\Question::where('chapter', '=', $chapter->id)->get()) )) }} {{__('Public/package.questions')}}</div>
                                                        <!-- /.course-details__curriculum-list-right -->
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul><!-- /.course-details__curriculum-list -->
                                        <br>
                                        @endif

                                        @if(count($process_list) > 0)
                                            <h3 class="course-details__tab-title">
                                                {{__('Public/package.process-group')}}
                                                <small style="float:right;">{{$process_data->question_num}} {{__('Public/package.questions')}}</small>
                                            </h3>
                                            <br>
                                            <ul class="course-details__curriculum-list list-unstyled">
                                                @foreach($process_list as $process)
                                                    @if(count(\App\Question::where('process_group', '=', $process->id)->get()) > 0)
                                                        <li>
                                                            <div class="course-details__curriculum-list-left">
                                                                <div class="course-details__meta-icon quiz-icon">
                                                                    <i class="fas fa-comment"></i><!-- /.fas fa-play -->
                                                                </div><!-- /.course-details__icon -->
                                                                <a href="#">{{$process->name}}</a>
                                                            </div><!-- /.course-details__curriculum-list-left -->
                                                            <div class="course-details__curriculum-list-right">{{ round( (count(\App\Question::where('process_group', '=', $process->id)->get()) )) }} {{__('Public/package.questions')}}</div>
                                                            <!-- /.course-details__curriculum-list-right -->
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul><!-- /.course-details__curriculum-list -->
                                            <br>
                                        @endif

                                        @if(count($exam_list) > 0)
                                            <h3 class="course-details__tab-title">
                                                {{__('Public/package.exams')}}
                                                <small style="float:right;">{{$exam_data->question_num}} {{__('Public/package.questions')}}</small>
                                            </h3>
                                            <br>
                                            <ul class="course-details__curriculum-list list-unstyled">
                                                @foreach($exam_list as $exam)
                                                    @php $e_count = \App\Question::where(DB::raw("CONCAT(',', TRIM(BOTH '\"' FROM `exam_num`), ',')"), 'LIKE', '%,'.$exam->id.',%')->get()->count(); @endphp
                                                    @if($e_count > 0)
                                                        <li>
                                                            <div class="course-details__curriculum-list-left">
                                                                <div class="course-details__meta-icon quiz-icon">
                                                                    <i class="fas fa-comment"></i><!-- /.fas fa-play -->
                                                                </div><!-- /.course-details__icon -->
                                                                <a href="#">
                                                                    @if(app()->getLocale() == 'en')
                                                                        {{$exam->name}}
                                                                    @else
                                                                        {{$exam->name_ar}}
                                                                    @endif
                                                                </a>
                                                            </div><!-- /.course-details__curriculum-list-left -->
                                                            <div class="course-details__curriculum-list-right">{{ ($e_count)}} {{__('Public/package.questions')}}</div>
                                                            <!-- /.course-details__curriculum-list-right -->
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul><!-- /.course-details__curriculum-list -->
                                            <br>
                                        @endif
                                @endif

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
                                                $reviews_count = count(\App\Rating::where('package_id', $i->package->id)->get());
                                                if( count(\App\Rating::where('package_id', $i->package->id)->get()) ){
                                                    $star5percentage = round(count(\App\Rating::where('package_id', $i->package->id)->where('rate', 5)->get()));
                                                    $star4percentage = round(count(\App\Rating::where('package_id', $i->package->id)->where('rate', 4)->get()));
                                                    $star3percentage = round(count(\App\Rating::where('package_id', $i->package->id)->where('rate', 3)->get()));
                                                    $star2percentage = round(count(\App\Rating::where('package_id', $i->package->id)->where('rate', 2)->get()));
                                                    $star1percentage = round(count(\App\Rating::where('package_id', $i->package->id)->where('rate', 1)->get()));
                                                }
                                            @endphp
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Excellent</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count? round($star5percentage/$reviews_count*100):0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star5percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Very Good</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count? round($star4percentage/$reviews_count*100):0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star4percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Average</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count? round($star3percentage/$reviews_count*100):0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star3percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Poor</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count? round($star2percentage/$reviews_count*100):0 }}%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count">{{$star2percentage}}</p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Terrible</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: {{ $reviews_count? round($star1percentage/$reviews_count*100):0 }}%"></span>
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
                                    @foreach(\App\Rating::where("package_id", $i->package->id)->orderBy('created_at', 'desc')->paginate(8) as $rate)
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
                    @if(Auth::check())
                        <form class="course-details__price" method="POST" action="{{route('urway.pay')}}">
                            @csrf
                            <input type="hidden" name="product_type" value="package">
                            <input type="hidden" name="product_id" value="{{$i->package->id}}">
                            <p class="course-details__price-text">Course price </p><!-- /.course-details__price-text -->
                            <p class="course-details__price-amount">{{$pricing['localized_price'] - $pricing['localized_coupon_discount']}} {{$pricing['currency_code']}}</p><!-- /.course-details__price-amount -->
                            <p class="course-details__price-amount">
                                <s>
                                {{ $pricing['localized_original_price'] }} {{$pricing['currency_code']}}
                                </s>
                            </p><!-- /.course-details__price-amount -->
                            <input type="text" class="form-control" name="coupon" value="{{request()->coupon}}" placeholder="coupon code ..">
                            <input type="submit" class="thm-btn course-details__price-btn" value="Buy This Course"/><!-- /.thm-btn -->
                        </form><!-- /.course-details__price -->
                    @else
                        <div class="course-details__price">
                            <p class="course-details__price-text">Course price </p><!-- /.course-details__price-text -->
                            <p class="course-details__price-amount">{{$pricing['localized_price'] - $pricing['localized_coupon_discount']}} {{$pricing['currency_code']}}</p><!-- /.course-details__price-amount -->
                            <p class="course-details__price-amount">
                                <s>
                                    {{ $pricing['localized_original_price'] }} {{$pricing['currency_code']}}
                                </s>
                            </p><!-- /.course-details__price-amount -->
                            <a type="submit" class="thm-btn course-details__price-btn" href="{{route('login')}}?targetPage=package&pageId={{$i->package->id}}">Buy This Course</a><!-- /.thm-btn -->
                        </div><!-- /.course-details__price -->
                    @endif

                    <div class="course-details__meta">
                        @if($i->package->contant_type == 'video' || $i->package->contant_type == 'combined')
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-clock"></i><!-- /.far fa-clock -->
                                </span><!-- /.course-details__icon -->
                                Durations: <span>{{$package_total_video_time[0]}} hr</span>
                            </a><!-- /.course-details__meta-link -->
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="fas fa-play"></i><!-- /.fas fa-play -->
                                </span><!-- /.course-details__icon -->
                                Lectures: <span>{{$total_videos_num}} {{__('Public/package.lecture')}}</span>
                            </a><!-- /.course-details__meta-link -->

                        @endif

                        @if($i->package->contant_type != 'question' && $i->package->certification)
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="fa fa-certificate"></i><!-- /.far fa-flag -->
                                </span><!-- /.course-details__icon -->
                                    Certification: <span>Yes</span>
                            </a><!-- /.course-details__meta-link -->

                        @endif

                        @if($i->package->contant_type == 'question' || $i->package->contant_type == 'combined')
                        <a href="#" class="course-details__meta-link">
                            <span class="course-details__meta-icon">
                                <i class="fa fa-file"></i><!-- /.far fa-flag -->
                            </span><!-- /.course-details__icon -->
                            {{__('Public/package.practical-test')}}: <span>{{count($chapter_list) + count($process_list) + count($exam_list)}}</span>
                        </a><!-- /.course-details__meta-link -->
                        <a href="#" class="course-details__meta-link">
                            <span class="course-details__meta-icon">
                                <i class="fa fa-file"></i><!-- /.far fa-flag -->
                            </span><!-- /.course-details__icon -->
                            {{__('Public/package.questions')}}: <span>{{$total_question_num}}</span>
                        </a><!-- /.course-details__meta-link -->
                        @endif

                        <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-clock"></i><!-- /.far fa-bell -->
                                </span><!-- /.course-details__icon -->
                                {{__('Public/package.day-access')}}: <span>{{$i->package->expire_in_days}} </span>
                        </a><!-- /.course-details__meta-link -->

                        <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="fa fa-book"></i><!-- /.far fa-bell -->
                                </span><!-- /.course-details__icon -->
                            Language: <span>{{$i->package->lang}}</span>
                        </a><!-- /.course-details__meta-link -->
                    </div><!-- /.course-details__meta -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.course-details -->
@endsection
