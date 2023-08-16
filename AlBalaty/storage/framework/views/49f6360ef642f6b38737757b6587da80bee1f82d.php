
<?php $__env->startSection('css'); ?>
<style>
  .accordion-button::after{
    margin-right:auto;
    margin-left: 0 !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h3 class="page-title"><?php echo e($currentVideo->title); ?></h3>
					<div class="d-inline-block align-items-center">
						<nav class="text-bold">
							<ol class="breadcrumb">
								<li class="breadcrumb-item" aria-current="page">
									<a href="#"><i class="mdi mdi-map"></i>
										<?php echo e($currentVideo->path_title); ?>

									</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									<a href="#"><i class="mdi mdi-library"></i>
                                      <?php echo e($currentVideo->course_title); ?>

									</a>
								</li>
								<li class="breadcrumb-item" aria-current="page">
									<a href="#"><i class="mdi mdi-play-circle"></i> <?php echo e($currentVideo->part_title); ?></a>
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
                <?php $__currentLoopData = $packageVideos->groupBy('chapter_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="box bg-primary-light group-section mb-35 m-2 ">
                    <div class="box-body px-0 pb-15 ">
                        <h4 class="box-title ps-10"><?php echo e($chapter->first()->chapter_title); ?></h4>
                    </div>

                    <div class="box-body bg-white m-2">
                        <?php $__currentLoopData = $packageVideos->groupBy('topic_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion my-2" id="accordionPanelsStayOpenExample">
                              <div class="accordion-item border-0">
                                <h2 class="accordion-header mt-0">
                                      <button class="accordion-button p-0 bg-white border-0 no-shadow "  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-<?php echo e($topics->first()->topic_id); ?>" aria-expanded="<?php echo e($loop->first ? 'true': 'false'); ?>" aria-controls="panelsStayOpen--<?php echo e($topics->first()->topic_id); ?>">
                                        <div class="d-flex align-items-center  rtl">
                                            <div class="ms-15  bg-warning h-50 w-50 l-h-60 rounded text-center">
                                                <span class="icon-Book-open fs-24 ">
                                                    <span class="path1"></span><span class="path2"></span></span>
                                            </div>
                                           
                                            <div class="d-flex flex-column fw-500 ">
                                                <a href="#" class="text-dark hover-primary mb-1  fs-16 px-3"><?php echo e($topics->first()->topic_title); ?></a>
                                            </div>
                                            
                                        </div>
                                      </button>
                                </h2>
                                <div id="panelsStayOpen-<?php echo e($topics->first()->topic_id); ?>" class="accordion-collapse  <?php echo e($loop->first? 'collapse show': ''); ?> " aria-labelledby="panelsStayOpen--<?php echo e($topics->first()->topic_id); ?>">
                                      <div class="accordion-body p-0">
                                        <div class="media-list media-list-hover">
                                            <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('student.package.details', [$package_id, $part_id]).'?video_id='.$video->video_id); ?>" class="media d-flex my-5 rounded text-fade hover-primary <?php echo e($currentVideo->video_id == $video->video_id ? 'text-primary': ''); ?>">
                                                  <i class="fa fa-book m-1" aria-hidden="true"></i>
                                                  <strong><?php echo e($video->title); ?></strong>
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>  
            <div class="col-xl-8 col-lg-12 col-12 ">
                <div class="d-flex">
                    <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a target="_blank" href="<?php echo e($material->download_url); ?>" class="btn btn-primary mx-2"><?php echo e($material->title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Default box -->
                <div class="box">
                  <div class="box-body" style="text-align:center">
                    <!-- <img  src="../images/placeholder.jpg" alt="..." > -->
                    <?php echo $videoIframe; ?>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="row align-items-center">
                        <?php echo $currentVideo->description; ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

   <script src="<?php echo e(asset('assets-student/assets/vendor_plugins/weather-icons/WeatherIcon.js')); ?>"></script>
    <script src="<?php echo e(asset('assets-student/js/pages/weather.js')); ?>"></script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>