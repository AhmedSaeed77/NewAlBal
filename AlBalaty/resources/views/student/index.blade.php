@extends('layouts.student-layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets-student/css/custom.css') }}">
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content bg-white">
			<div class="row">
				<div class="col-xl-4 col-lg-12 col-12 -side-section">
					<div class="mb-30">
						<h1><strong>مرحبا , </strong> {{Auth::user()->name}} </h1>
					</div>
					<div>

						@php $counter = 0; @endphp
						@foreach($userPartsByPackage as $package)
							<h3 class="box-title mb-20 fw-500">{{$package->first()->package_name}}</h3>
							@foreach($package as $part)
							@php $counter++ @endphp
							<div class="box-body bg-primary-light mb-30 px-xl-5 px-xxl-20 pull-up">
								<div class="d-flex align-items-center ps-xl-20">
									<div class="d-flex flex-column w-75">
										<a href="#" class="text-dark hover-primary mb-5 fw-600 fs-18">
											{{ $part->part_title }}
											<h4>
												<small>{{$part->teacher_name}}</small>
											</h4>
										</a>

										<div class="row p-left-10">
											<div class="col-xxl-6 col-xl-12 col-lg-6 col-md-6 text-fade">
												<p class="my-10"><span class="m-left-5">5  فيديو</span><span><i class="si-book-open si"></i></span></p>
{{--												<p> <span class="m-left-5">5 إختبار</span> <span><i class="si-note si"></i></span></p>--}}
											</div>
											<div class="col-xxl-6 col-xl-12 col-lg-6 col-md-6 text-fade">
												<p class="my-10"> <span class="m-left-5">50 دقيقة</span><span><i class="si-clock si"></i></span></p>
{{--												<p><span class="m-left-5">312 طالب</span><span><i class="si-people si"></i></span></p>--}}
											</div>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-between  mx-lg-10 mt-10">
									<h2 class="my-5 c-green"></h2>
									<div class="text-center">
{{--										<a type="button" href="course_metrial.html"  class="waves-effect waves-light btn rounded10  me-xxl-25 me-lg-15 me-15 bg-green-br text-fade mb-5 px-25 py-8">المحتوي</a>--}}
										<a type="button" href="{{ route('student.package.details', [$part->package_id, $part->part_id]) }}" class="waves-effect waves-light btn  bg-green mb-5 px-25 py-8">استمرار</a>
									</div>
								</div>
							</div>
								@if($counter > 2)
									@break
								@endif
							@endforeach
							@if($counter > 2)
								@break
							@endif
						@endforeach
					</div>
   
            
  
           @if(Session::has('error'))
            <div>
                <h1 style="background-color:red;"> {{ Session::get('error') }} </h1>
            </div>
        @endif
					<div class="mt-25 design-tab">
						<a href="{{ route('student.courses') }}">
							<h3 class="box-title mb-0 fw-500  text-right">عر ض جميع المواد</h3>
						</a>
							<div class="box-body px-0">
							<!-- Nav tabs -->
							<!-- <ul class="nav mb-20 list-inline d-block ">
								<li class="nav-item p-0"> <a href="#navpills-1" class="nav-link p-5 px-sm-10 active" data-bs-toggle="tab" aria-expanded="false">الجميع</a> </li>
								<li class="nav-item p-0"> <a href="#navpills-2" class="nav-link p-5 px-sm-10" data-bs-toggle="tab" aria-expanded="false">تصميم</a> </li>
								<li class="nav-item p-0"> <a href="#navpills-3" class="nav-link p-5 px-sm-10" data-bs-toggle="tab" aria-expanded="true">علوم</a> </li>
								<li class="nav-item p-0"> <a href="#navpills-4" class="nav-link p-5 px-sm-10" data-bs-toggle="tab" aria-expanded="true">الترميز</a> </li>
								<ul class="box-controls pull-right d-md-flex">
								  <li>
								  	<i class="fa fa-sliders text-primary btn btn-light btn-sm" data-bs-toggle="tooltip" title data-bs-original-title="More info"></i>
									
								  </li>
								  <li class="mx-10">
									<i class="fa fa-filter text-primary btn btn-light btn-sm" data-bs-toggle="tooltip" title data-bs-original-title="More info" aria-hidden="true"></i>
								  </li>
								</ul>
							</ul> -->

							<!-- Tab panes -->
							<h3>
							 
							       @php
                                        $myEvents = \App\EventUser::where(['user_id'=> Auth::user()->id])->get();
                                        $expired_events_count = 0;
                                        $total_events_count = $myEvents->count();
                                        foreach($myEvents as $userEvent){
                                            $event__ = Cache::remember('event_'.$userEvent->event_id, 1440, function() use($userEvent){
                                                return \App\Event::find($userEvent->event_id);
                                            });
                                            if($event__){
                                                if(\Carbon\Carbon::parse($event__->end)->lte(\Carbon\Carbon::now())){
                                                    $expired_events_count++;
                                                }
                                            }

                                        }
                                    @endphp
							</h3>
							
							     <span class="badge badge-soft-danger mt-n1"> {{__('User/dashboard.expired')}} {{$expired_events_count}}</span>
						</div>
					</div>
				</div>
				<div class="col-xxl-8 col-xl-8 col-lg-12 col-12 ">

					<div class="bg-primary-light rounded20 mt-5  big-side-section">
						<div class="row">
							<div class="col-xxl-5 col-xl-5 col-lg-12">
								<div class="box">
									<div class="text-white box-body bg-img text-center py-65" style="background-image: url(../images/gallery/creative/img-12.jpg);">
									</div>
									<div class="box-body up-mar100 pb-0">
										<div class=" justify-content-center">
											<div>
{{--												<div class="bg-white px-10 text-center pt-15 w-120 ms-20 mb-0 rounded20 mb-20">--}}
{{--													<a href="#" class="w-80">--}}
{{--													  <img class="avatar avatar-xxl rounded20 bg-light img-fluid" src="{{asset('assets-student/images/avatar/avatar-16.png')}}" alt="">--}}
{{--													</a>--}}
{{--												</div>--}}
												<div class="ms-30 mb-15">
													<h5 class="my-10 mb-0 fw-500 fs-18"><a class="text-dark" href="#">{{Auth::user()->name}}</a></h5>
{{--													<span class="text-fade mt-5"> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;البحر الاحمر - مصر </span>--}}
												</div>
											</div>
											<div class="row mt-20 side-block">
												<div class="col-6 ">
													<div class="bg-primary-light side-block-left rounded20 pull-up">
														<i class="si-book-open si bg-white p-10 rounded10"></i>
														<h3 class="mb-0">{{count($userPartsByPackage ?? [])}}</h3>
														<p class="m-0 text-fade">الباقات</p>
													</div>
												</div>
												<div class="col-6 ">
													<div class="bg-primary-light side-block-right rounded20 pull-up">
														<i class="ti-crown bg-white p-10 rounded10"></i>
														<h3 class="mb-0">{{$partsCount}}</h3>
														<p class="m-0 text-fade">المواد</p>
													</div>
												</div>
												<div class="col-6 ">
													<div class="bg-primary-light side-block-right rounded20 pull-up">
														<i class="ti-crown bg-white p-10 rounded10"></i>
														<h3 class="mb-0">{{$total_events_count}}</h3>
														<p class="m-0 text-fade">  المراجعات  </p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl-7 col-xl-7 col-lg-12 ps-xxl-30">

								<div class="row mt-xl-35">
									<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 px-xxl-12 pt-xxl-10 pe-xxl-20">
										<div class="box pull-up">
											<div class="box-body bg-warning " style="height: 16rem;">
												<div class="d-flex flex-row justify-content-between">
													<div class="ps-20">
														<i class="mdi mdi-arrow-top-right px-5 py-1 bg-white text-warning rounded10 "></i>
													</div>
												</div>
												<div class="mt-40">
													<div class="col b-r">
														<h4 class="font-light fw-500">استشارات</h4>
														<p>احصل على مرشد يساعدك في عملية التعلم الخاصة بك</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 px-xxl-12 pt-xxl-10 ps-xxl-20">
										<div class="box pull-up">
											<div class="box-body bg-pink " style="height: 16rem;">
												<div class="d-flex flex-row justify-content-between">
													<div class="ps-20">
														<i class="mdi mdi-arrow-top-right px-5 py-1 bg-white text-warning rounded10 "></i>
													</div>
												</div>
												<div class="mt-40">
													<div class="col b-r">
														<h4 class="font-light fw-500">الهدف المحدد</h4>
														<p>حدد الهدف والتذكير ووقت الدراسة</p>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
					<div class="bg-primary-light rounded20 mt-5  big-side-section">
						<div class="box bg-transparent no-shadow mb-20">
							<div class="box-header no-border pb-0 ps-0">
								<h4 class="box-title">أخر الفيديوهات مشاهده</h4>
								<ul class="box-controls pull-right d-md-flex d-none">
									<li>
										<button class="btn btn-primary-light me-10 p-10">Show All</button>
									</li>
								</ul>
							</div>
						</div>
						<p class="mb-5">الثلاثاء</p>
						<small class="table-scroll-contant">***Drag a table to scroll***</small>
{{--						<div class="box mb-15 pull-up">--}}
{{--							<div>--}}
{{--								<div class="table-responsive">--}}
{{--									<table class="table no-border mb-0">--}}
{{--										<tbody>--}}
{{--										<tr>--}}
{{--											<td class="min-w-50">--}}
{{--												<div class="bg-primary-light h-50 w-50 l-h-50 rounded text-center">--}}
{{--													<span class="icon-Book-open fs-24"><i class="fa fa-calendar-minus-o fs-16" aria-hidden="true"></i></span>--}}
{{--												</div>--}}
{{--											</td>--}}
{{--											<td class="fw-600 min-w-170">--}}
{{--												<div class="d-flex flex-column fw-600">--}}
{{--													<a href="#" class="text-dark hover-primary mb-1 fs-16">2:00 PM - 3:00 PM</a>--}}
{{--													<span class="text-fade">4.1 A Gllileo</span>--}}
{{--												</div>--}}
{{--											</td>--}}
{{--											<td class="fw-600 fs-16 min-w-150 text-center"><i class="fa fa-fw fa-circle text-primary fs-12"></i> Lesson 30</td>--}}
{{--											<td class="fw-400 fs-16 min-w-150 text-center">Online Classes</td>--}}
{{--											<td class="text-primary fw-600 fs-16 min-w-150 text-end">Zoom <i class="fa fa-fw fa-angle-right fs-24"></i></td>--}}
{{--										</tr>--}}
{{--										</tbody>--}}
{{--									</table>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}

					</div>
{{--					<div class="bg-primary-light mt-5 rounded20  big-side-section">--}}
{{--						<h4 class="box-title">Materials</h4>--}}
{{--						<div class="row">--}}
{{--							<div class="col-xl-4 col-lg-4">--}}
{{--								<div class="box pull-up">--}}
{{--									<div class="card-body d-flex p-0">--}}
{{--										<div class="flex-grow-1 bg-primary flex-grow-1 bg-img min-h-350" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 75%; background-image: url(../images/edu-1.png)">--}}

{{--											<p class="text-white pt-10 mb-0 fw-500 l-h-25">Explore English</p>--}}
{{--											<p class="text-white fw-400 l-h-20">WorkBook</p>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="col-xl-4 col-lg-4">--}}
{{--								<div class="box pull-up">--}}
{{--									<div class="card-body d-flex p-0">--}}
{{--										<div class="flex-grow-1 bg-primary-light flex-grow-1 bg-img min-h-350" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 75%; background-image: url(../images/edu-2.png)">--}}

{{--											<p class="text-primary pt-10 mb-0 fw-500 l-h-25">Explore English</p>--}}
{{--											<p class="text-primary fw-400 l-h-20">Student's Book</p>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--							<div class="col-xl-4 col-lg-4">--}}
{{--								<div class="box pull-up">--}}
{{--									<div class="card-body d-flex p-0">--}}
{{--										<div class="flex-grow-1 bg-primary-light flex-grow-1 bg-img min-h-350" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 75%; background-image: url(../images/edu-3.png)">--}}

{{--											<p class="text-primary pt-10 mb-0 fw-500 l-h-25">Games</p>--}}
{{--											<p class="text-primary fw-400 l-h-20">Online Activities</p>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
				</div>
			

			</div>			
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

     
@endsection

@section('script')
	


	<script src="{{ asset('assets-student/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/jquery.peity/jquery.peity.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/chart.js-master/Chart.min.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/d3/d3.min.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/d3/d3_tooltip.js') }}"></script>

	<script src="{{ asset('assets-student/assets/vendor_components/raphael/raphael.min.js') }}"></script>
	<script src="{{ asset('assets-student/assets/vendor_components/morris.js/morris.min.js') }}"></script>
	
	<script src="{{ asset('assets-student/js/pages/dashboard8.js') }}"></script>
 @endsection
