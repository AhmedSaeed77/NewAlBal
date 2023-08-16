@extends('layouts.student-layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets-student/css/custom.css') }}">
<style>
    .divStyle{
        background: #e8e8e8;
        padding: 10px;
        border-radius: 5px;
        color:#000
    }
</style>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content bg-white">
			<div class="row">
				<div class="col-lg-12 col-12 -side-section">
					<div class="mb-30">
						<h1><strong>مرحبا , </strong> {{Auth::user()->name}} </h1>
					</div>
					<div>



				</div>
				<div class="  col-lg-12 col-12 ">

					<div class="bg-primary-light rounded20 mt-5  big-side-section">
						<div class="row">
							<div class=" col-lg-12">
								<div class="box">
									<div class="text-white box-body bg-img text-center py-65" style="background-image: url(../images/gallery/creative/img-12.jpg);">
									</div>
				''					<div class="box-body up-mar100 pb-0">
										<div class=" justify-content-center">
											<div>
												<div class="bg-white px-10 text-center pt-15 w-120 ms-20 mb-0 rounded20 mb-20">
													   <h2 class="course-details__title">{{Transcode::evaluate($i->event)['name'] }} </h2>
												</div>
												<!--<div class="ms-30 mb-15">-->
												<!--	<h5 class="my-10 mb-0 fw-500 fs-18"><a class="text-dark" href="#">{{Auth::user()->name}}</a></h5>-->
												<!--	<span class="text-fade mt-5"> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;البحر الاحمر - مصر </span>-->
												<!--</div>-->
											</div>
											<div class="row mt-20 side-block">
											          <div class="tab-pane   animated fadeInUp" role="tabpanel" id="Schedule">
                                                        <div class="t-container ">
                        
                                                            
                           <!--<div class="content">-->
                           <!--         <h4 class="widget-title">تفاصيل الباقة</h4>-->
                           <!--         <ul class="course-item">-->
                           <!--             <li>-->
                           <!--                 <span class="label"><i class="icon-60"></i>السعر</span>-->
                           <!--                 <span class="value price">-->
                           <!--                     {{ $pricing['localized_price'] - $pricing['localized_coupon_discount']}} {{$pricing['currency_code']}}-->
                           <!--                 </span>-->
                           <!--             </li>-->
                           <!--             @if($pricing['localized_coupon_discount'])-->
                           <!--                 <li>-->
                           <!--                     <span class="label"><i class="icon-60"></i>قيمة الخصم</span>-->
                           <!--                     <span class="value">-->
                           <!--                     {{$pricing['localized_coupon_discount'] }} {{$pricing['currency_code']}}-->
                           <!--                 </span>-->
                           <!--                 </li>-->
                           <!--             @endif-->
                           <!--             @if($pricing['renew_period_in_days'])-->
                           <!--             <li>-->
                           <!--                 <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>-->
                           <!--                 <span class="value">{{ $i->event->expire_in_days }} يوم </span>-->
                           <!--             </li>-->
                           <!--             @else-->
                           <!--             <li>-->
                           <!--                 <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>-->
                           <!--                 <span class="value">مدا الحياة</span>-->
                           <!--             </li>-->
                           <!--             @endif-->
                           <!--             <li>-->
                           <!--                 <span class="label"><i class="icon-62"></i>المُعلم</span>-->
                           <!--                 <span class="value">{{$i->event->teacher->name}}</span>-->
                           <!--             </li>-->

                           <!--             <li>-->
                           <!--                 <span class="label"><i class="icon-59"></i>اللغة</span>-->
                           <!--                 <span class="value">{{$i->event->lang}}</span>-->
                           <!--             </li>-->

                           <!--     </div>-->
                                <div class="row">
                              
                                    <div class='col-md-6 mt-1 '>
                                    <div class="bg-primary-light side-block-left rounded20 pull-up">
                                         <h4> حول هذه الباقة </h4>
                                        <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['description'] !!}</p>
                                    </div>
                                </div>
                                <div class='col-md-6 mt-1 '>
                                    <div class="bg-primary-light side-block-left rounded20 pull-up">
                                         <h4> المتطلبات  </h4>
                                        <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['requirement'] !!}</p>
                                    </div>
                                </div>
                                <div class='col-md-6 mt-1 '>
                                    <div class=" bg-primary-light side-block-left rounded20 pull-up">
                                            <h4> ماذا ستتعلم  </h4>
                                            <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['what_you_learn'] !!}</p>
                                    </div>
                                </div>
                                <div class='col-md-6 mt-1 '>
                                    <div class="bg-primary-light side-block-left rounded20 pull-up">
                                            <h4> لمن هذه الباقة   </h4>
                                            <p class="course-details__tab-text">{!!  Transcode::evaluate($i->event)['who_course_for'] !!}</p>
                                    </div>
                                </div>
                                
                                
                                </div>
                                <!-- <h4> enroll_msg  </h4>-->
                                <!--<p class="course-details__tab-text">{!!  $i->event['enroll_msg'] !!}</p><!-- /.course-details__tab-text -->
                                <!--<br>-->
                                <div class='row'>
                                    <div class='col-md-3 mt-4 '>
                                        <div class='bg-primary-light side-block-left rounded20 pull-up'>
                                            <h4>  الوقت </h4>
                                            <p class="course-details__tab-text">{!! $i->event['total_time'] !!}</p>
                                        </div>
                                            
                                    </div>
                                     <div class='col-md-3 mt-4'>
                                         <div class=' bg-primary-light side-block-left rounded20 pull-up '>
                                              <h4>  اللغه </h4>
                                            <p class="course-details__tab-text">{!! $i->event['lang'] !!}</p>
                                         </div>
                                    </div>
                                    
                                    
                                    <div class='col-md-3 mt-4 '>
                                        <div class="bg-primary-light side-block-left rounded20 pull-up">
                                             <h4>  جروب الواتساب </h4>
                                            <p class="course-details__tab-text">{!! $i->event['whatsapp'] !!}</p>
                                        </div>
                                           
                                    </div>
                                    <div class='col-md-3 mt-4 '>
                                        <div class="bg-primary-light side-block-left rounded20 pull-up">
                                             <h4>  جوجل ميتنج  </h4>
                                            <p class="course-details__tab-text">{!! $i->event['zoom'] !!}</p>
                                        </div>
                                    </div>
                                     <div class='col-md-3 mt-4 '>
                                         <div class="bg-primary-light side-block-left rounded20 pull-up">
                                             <h4>   المعلم  </h4>
                                            <p class="course-details__tab-text">{{$i->event->teacher->name}}</p>
                                         </div>
                                    </div>
                                    
                           
                             </div>
<table class="table mb-5">
  <thead class="thead-dark">
    <tr>
      <th scope="col">التاريخ</th>
      <th scope="col">من</th>
      <th scope="col">الي</th>
    </tr>
  </thead>
  <tbody>
     @foreach(\App\EventTime::where('event_id', $i->event->id)->orderBy('day')->get() as $t)
            <tr>
                <td>{{$t->day}}</td>
                <td>{{$t->from}}</td>
                <td>{{$t->to}}</td>
            </tr>
     @endforeach
   
  </tbody>
</table>


                                 <!-- /.course-details__tab-text -->
                            </div><!-- /.course-details__tab-content -->
                                                        </div>
                        
                                                    </div>
											
										
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
