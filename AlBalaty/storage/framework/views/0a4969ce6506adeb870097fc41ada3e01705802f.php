<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets-student/css/custom.css')); ?>">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content bg-white">
			<div class="row">
				<div class="col-lg-12 col-12 -side-section">
					<div class="mb-30">
						<h1><strong>مرحبا , </strong> <?php echo e(Auth::user()->name); ?> </h1>
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
											      
											    <?php $__currentLoopData = $myp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="col-3 ">
													<div class="bg-primary-light " style='position:relative; background-position: center;
background-size: cover;
background-repeat: no-repeat;
 background-image:url("<?php echo e(url('storage/events/'.basename($val['img']))); ?>")'>
												<div class='myoverlay'></div>
													 <a href=<?php echo e(route('student.event',$val['id'])); ?>>	<p class=" myName" ><?php echo e($val['name']); ?></p>  </a>
													
													</div>
												</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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