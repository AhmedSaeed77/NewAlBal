
<?php $__env->startSection('css'); ?>
<style>
.accordion-button::after {
    margin-right: auto;
    margin-left: 0 !important;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Main content -->
        <section class="content bg-white ">
            <h3 class="box-title mb-20 fw-500 me-4">جميع المواد الدراسية</h3>
            <div class="row container">
                <?php $__currentLoopData = $userPartsByPackage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3 class="box-title mb-20 fw-500"><?php echo e($package->first()->package_name); ?></h3>
                    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                                    
                                    <a type="button" href="<?php echo e(route('student.package.details', [$part->package_id, $part->part_id])); ?>" class="btn-primary waves-effect waves-light btn  bg-green mb-5 px-25 py-8">استمرار</a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets-student/assets/vendor_plugins/weather-icons/WeatherIcon.js')); ?>"></script>
<script src="<?php echo e(asset('assets-student/js/pages/weather.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>