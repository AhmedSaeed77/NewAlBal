@extends('layouts.public')

@section('content')
	<section class="inner-banner">
		<div class="container">
			<ul class="list-unstyled thm-breadcrumb">
				<li><a href="{{route('index')}}">Home</a></li>
				<li class="active"><a href="#">Courses</a></li>
			</ul><!-- /.list-unstyled -->
			<h2 class="inner-banner__title">
                {{Transcode::evaluate(\App\Course::find(request()->course_id))['title']}}
            </h2><!-- /.inner-banner__title -->
		</div><!-- /.container -->
	</section><!-- /.inner-banner -->
	<section class="course-one course-page">
		<div class="container">
            <h3>Packages</h3>
			<div class="row">
                @foreach($best_sell as $i)
				    <div class="col-lg-4">
                        <div class="course-one__single">
                            <div class="course-one__image">
                                <img src="{{ url('storage/package/imgs/'.basename($i->package->img))}}" alt="">
                                <i class="far fa-heart"></i><!-- /.far fa-heart -->
                            </div><!-- /.course-one__image -->
                            <div class="course-one__content">
                                <a href="{{route('public.package.view', $i->package->id)}}" class="course-one__category">
                                    {{Transcode::evaluate(\App\Course::find(request()->course_id))['title']}}
                                </a><!-- /.course-one__category -->

                                <h2 class="course-one__title"><a href="{{route('public.package.view', $i->package->id)}}">{{Transcode::evaluate($i->package)['name'] }}</a></h2>
                                <!-- /.course-one__title -->
                                <div class="course-one__stars">
                                        <span class="course-one__stars-wrap">
                                            @for($j = 0 ; $j<$i->total_rate; $j++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </span><!-- /.course-one__stars-wrap -->
                                    <span class="course-one__count">{{ round($i->total_rate, 2) }}</span><!-- /.course-one__count -->
                                </div><!-- /.course-one__stars -->
                                <div class="course-one__meta">
                                    <a href="{{route('public.package.view', $i->package->id)}}"><i class="far fa-user"></i> {{$i->users_no}}</a>
                                </div><!-- /.course-one__meta -->
                                <a href="{{route('public.package.view', $i->package->id)}}" class="course-one__link">Course Details</a><!-- /.course-one__link -->
                            </div><!-- /.course-one__content -->
                        </div><!-- /.course-one__single -->
                    </div><!-- /.col-lg-4 -->
                @endforeach
			</div><!-- /.row -->
		</div><!-- /.container -->
        <hr>
        <div class="container">
            <h3>Events</h3>
            <div class="row">
                @foreach($best_sell_event as $i)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="blog-two__single" style="background-image: url({{ url('storage/events/'.basename($i->event->img))}});">
                                <div class="blog-two__inner">
                                    <a href="{{route('public.event.view', $i->event->id)}}" class="blog-two__date">
                                        <span>{{\Carbon\Carbon::parse($i->event->start)->format('d')}}</span>
                                        {{\Carbon\Carbon::parse($i->event->start)->format('F')}}
                                    </a><!-- /.blog-two__date -->
                                    <div class="blog-two__meta">
                                        <a href="{{route('public.event.view', $i->event->id)}}">by Eng. Ali Naser</a>
                                        <a href="{{route('public.event.view', $i->event->id)}}">
                                            <i class="fa fa-user" style="margin-top: 7px;padding: 0 5px;"></i>
                                            <span >{{$i->users_no}} student</span>
                                        </a>
                                    </div><!-- /.blog-two__meta -->
                                    <h3 class="blog-two__title">
                                        <a href="{{route('public.event.view', $i->event->id)}}">
                                            {{Transcode::evaluate($i->event)['name'] }}
                                        </a>
                                    </h3><!-- /.blog-two__title -->
                                </div><!-- /.blog-two__inner -->
                            </div><!-- /.blog-two__single -->
                        </div><!-- /.item -->
                    </div>
                @endforeach
            </div>
        </div>
	</section><!-- /.course-one course-page -->

@endsection
