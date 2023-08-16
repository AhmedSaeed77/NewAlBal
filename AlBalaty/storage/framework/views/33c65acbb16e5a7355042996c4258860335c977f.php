
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets-student/css/custom.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content bg-white">
			<div class="row">
				<div class="col-xl-4 col-lg-12 col-12 -side-section">
					<div class="mb-30">
						<h1><strong>مرحبا , </strong> <?php echo e(Auth::user()->name); ?> </h1>
					</div>
					<div>

						<?php $counter = 0; ?>
						<?php $__currentLoopData = $userPartsByPackage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<h3 class="box-title mb-20 fw-500"><?php echo e($package->first()->package_name); ?></h3>
							<?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $counter++ ?>
							<div class="box-body bg-primary-light mb-30 px-xl-5 px-xxl-20 pull-up">
								<div class="d-flex align-items-center ps-xl-20">
									<div class="d-flex flex-column w-75">
										<a href="#" class="text-dark hover-primary mb-5 fw-600 fs-18">
											<?php echo e($part->part_title); ?>

											<h4>
												<small><?php echo e($part->teacher_name); ?></small>
											</h4>
										</a>

										<div class="row p-left-10">
											<div class="col-xxl-6 col-xl-12 col-lg-6 col-md-6 text-fade">
												<p class="my-10"><span class="m-left-5">5  فيديو</span><span><i class="si-book-open si"></i></span></p>

											</div>
											<div class="col-xxl-6 col-xl-12 col-lg-6 col-md-6 text-fade">
												<p class="my-10"> <span class="m-left-5">50 دقيقة</span><span><i class="si-clock si"></i></span></p>

											</div>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-between  mx-lg-10 mt-10">
									<h2 class="my-5 c-green"></h2>
									<div class="text-center">

										<a type="button" href="<?php echo e(route('student.package.details', [$part->package_id, $part->part_id])); ?>" class="waves-effect waves-light btn  bg-green mb-5 px-25 py-8">استمرار</a>
									</div>
								</div>
							</div>
								<?php if($counter > 2): ?>
									<?php break; ?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php if($counter > 2): ?>
								<?php break; ?>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
   
            
  
           <?php if(Session::has('error')): ?>
            <div>
                <h1 style="background-color:red;"> <?php echo e(Session::get('error')); ?> </h1>
            </div>
        <?php endif; ?>
					<div class="mt-25 design-tab">
						<a href="<?php echo e(route('student.courses')); ?>">
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
							 
							       <?php
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
                                    ?>
							</h3>
							
							     <span class="badge badge-soft-danger mt-n1"> <?php echo e(__('User/dashboard.expired')); ?> <?php echo e($expired_events_count); ?></span>
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





												<div class="ms-30 mb-15">
													<h5 class="my-10 mb-0 fw-500 fs-18"><a class="text-dark" href="#"><?php echo e(Auth::user()->name); ?></a></h5>

												</div>
											</div>
											<div class="row mt-20 side-block">
												<div class="col-6 ">
													<div class="bg-primary-light side-block-left rounded20 pull-up">
														<i class="si-book-open si bg-white p-10 rounded10"></i>
														<h3 class="mb-0"><?php echo e(count($userPartsByPackage ?? [])); ?></h3>
														<p class="m-0 text-fade">الباقات</p>
													</div>
												</div>
												<div class="col-6 ">
													<div class="bg-primary-light side-block-right rounded20 pull-up">
														<i class="ti-crown bg-white p-10 rounded10"></i>
														<h3 class="mb-0"><?php echo e($partsCount); ?></h3>
														<p class="m-0 text-fade">المواد</p>
													</div>
												</div>
												<div class="col-6 ">
													<div class="bg-primary-light side-block-right rounded20 pull-up">
														<i class="ti-crown bg-white p-10 rounded10"></i>
														<h3 class="mb-0"><?php echo e($total_events_count); ?></h3>
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



























					</div>






































				</div>
			

			</div>			
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	


	<script src="<?php echo e(asset('assets-student/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/jquery.peity/jquery.peity.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/chart.js-master/Chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/d3/d3.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/d3/d3_tooltip.js')); ?>"></script>

	<script src="<?php echo e(asset('assets-student/assets/vendor_components/raphael/raphael.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets-student/assets/vendor_components/morris.js/morris.min.js')); ?>"></script>
	
	<script src="<?php echo e(asset('assets-student/js/pages/dashboard8.js')); ?>"></script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>