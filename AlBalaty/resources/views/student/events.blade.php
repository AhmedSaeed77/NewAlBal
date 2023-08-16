@extends('layouts.student-layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets-student/css/custom.css') }}">
<style>
    .myoverlay{
        position: absolute;
top: 0;
width: 100%;
height: 100%;
opacity: .5;
background: black;
z-index: 2;
    }
    .myName{
        position:relative;
        z-index:3;
        color:#FFF;
        width: 100%;
height: 200px;
display: flex;
justify-content: center;
align-items: center;
align-content: center;
cursor: pointer;
font-size: 20px;
font-weight: bold;
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
									<div class="box-body up-mar100 pb-0">
										<div class=" justify-content-center">
											<div>
												<div class="bg-white px-10 text-center pt-15 w-120 ms-20 mb-0 rounded20 mb-20">
													<a href="#" class="w-80">
													  
													</a>
												</div>
											</div>
											<div class="row mt-20 side-block">
											      
											    @foreach($myp as $key => $val)
												<div class="col-3 ">
													<div class="bg-primary-light " style='position:relative; background-position: center;
background-size: cover;
background-repeat: no-repeat;
 background-image:url("{{ url('storage/events/'.basename($val['img']))}}")'>
												<div class='myoverlay'></div>
													 <a href={{ route('student.event',$val['id']) }}>	<p class=" myName" >{{ $val['name'] }}</p>  </a>
													
													</div>
												</div>
												@endforeach
										
											
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
