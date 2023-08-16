@extends('layouts.student-layout')
@section('css')
<style>
  .accordion-button::after{
    margin-right:auto;
    margin-left: 0 !important;
    }
</style>
@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title">{{$currentVideo->title}}</h3>
					<div class="d-inline-block align-items-center">
						<nav class="text-bold">
							<ol class="breadcrumb">
								<li class="breadcrumb-item" aria-current="page">
									<a href="#"><i class="mdi mdi-map"></i>
										{{$currentVideo->path_title}}
									</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="#"><i class="mdi mdi-library"></i>
                                      {{$currentVideo->course_title}}
									</a>
								</li>
								<li class="breadcrumb-item" aria-current="page">
									<a href="#"><i class="mdi mdi-play-circle"></i> {{$currentVideo->part_title}}</a>
								</li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Weather widgets</li>
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Widgets</li>
								<li class="breadcrumb-item active" aria-current="page">Weather widgets</li> -->
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content"> 
		  <div class="row">
			
			
            <div class="col-xxl-4 col-xl-4 col-lg-6 col-12 pe-15 -side-section ">
                @foreach($packageVideos->groupBy('chapter_id') as $chapter)
                <div class="box bg-primary-light group-section mb-35 m-2 ">
                    <div class="box-body px-0 pb-15 ">
                        <h4 class="box-title ps-10">{{$chapter->first()->chapter_title}}</h4>
                    </div>

                    <div class="box-body bg-white m-2">
                        @foreach($packageVideos->groupBy('topic_id') as $topics)
                        <div class="accordion my-2" id="accordionPanelsStayOpenExample">
                              <div class="accordion-item border-0">
                                <h2 class="accordion-header mt-0">
                                      <button class="accordion-button p-0 bg-white border-0 no-shadow "  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{$topics->first()->topic_id}}" aria-expanded="{{$loop->first ? 'true': 'false'}}" aria-controls="panelsStayOpen--{{$topics->first()->topic_id}}">
                                        <div class="d-flex align-items-center  rtl">
                                            <div class="ms-15  bg-warning h-50 w-50 l-h-60 rounded text-center">
                                                <span class="icon-Book-open fs-24 ">
                                                    <span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                           
                                            <div class="d-flex flex-column fw-500 ">
                                                <a href="#" class="text-dark hover-primary mb-1  fs-16 px-3">{{$topics->first()->topic_title}}</a>
                                            </div>
                                            
                                        </div>
                                      </button>
                                </h2>
                                <div id="panelsStayOpen-{{$topics->first()->topic_id}}" class="accordion-collapse  {{$loop->first? 'collapse show': ''}} " aria-labelledby="panelsStayOpen--{{$topics->first()->topic_id}}">
                                      <div class="accordion-body p-0">
                                        <div class="media-list media-list-hover">
                                            @foreach($topics as $video)
                                            <a href="{{route('student.package.details', [$package_id, $part_id]).'?video_id='.$video->video_id}}" class="media d-flex my-5 rounded text-fade hover-primary {{ $currentVideo->video_id == $video->video_id ? 'text-primary': '' }}">
                                                  <i class="fa fa-book m-1" aria-hidden="true"></i>
                                                  <strong>{{$video->title}}</strong>
                                            </a>
                                            @endforeach
                                        </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>  
            <div class="col-xl-8 col-lg-12 col-12 ">
                <div class="d-flex">
                    @foreach($materials as $material)
                        <a target="_blank" href="{{$material->download_url}}" class="btn btn-primary mx-2">{{$material->title}}</a>
                    @endforeach
                </div>
                <!-- Default box -->
                <div class="box">
                  <div class="box-body" style="text-align:center">
                    <!-- <img  src="../images/placeholder.jpg" alt="..." > -->
                    {!! $videoIframe !!}
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="row align-items-center">
                        {!! $currentVideo->description !!}
                    </div>
                 </div>
               <!-- /.box-footer-->
                </div>
              <!-- /.box --> 			                    
              </div>    
		  </div>
		  <!-- /.row -->  
			

		  <!-- /.row -->

		</section>
		<!-- /.content -->	  
	  </div>
  </div>
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@endsection

@section('script')

   <script src="{{ asset('assets-student/assets/vendor_plugins/weather-icons/WeatherIcon.js') }}"></script>
    <script src="{{ asset('assets-student/js/pages/weather.js') }}"></script>
 @endsection
