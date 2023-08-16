<?php $__env->startSection('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="d-flex align-items-center">
            <div class="me-auto">
              <h2 class="page-title p-2"><a href="#"><i class="mdi mdi-home-outline"></i></a>الموارد الدراسية</h2>
              <div class="d-inline-block align-items-center">
                <nav>
                  <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"></li>
                  </ol> -->
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <section class="content">


    <?php $__currentLoopData = $materialsByPart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materials): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- START Card BOOKs -->
        <div class="card  container">
            <div class="card-header align-item-center">
                <h2 class="card-title "><?php echo e($materials->first()->part_title); ?></h2>
            </div>
            <?php $__currentLoopData = $materials->groupBy('chapter_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h4><?php echo e($material->first()->chapter_title); ?></h4>
                <div class="row fx-element-overlay ms-2 mt-2 ">
                    <?php $__currentLoopData = $material; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-lg-6 col-xl-3 mt-10">
                        <div class="box pull-up">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1">
                                    <img src="<?php echo e($m->cover_url); ?>" alt="user" class="bbsr-0 bber-0 h-250">
                                    <div class="fx-overlay scrl-up">
                                        <ul class="fx-info">
                                        <li><a class="btn btn-outline" target="_blank" href="<?php echo e(route('student.material.preview', $m->id)); ?>"><i class="fa fa-download"></i></a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content text-start ">
                                    <div class="product-text">
                                        <h2 class="pro-price text-blue"></h2>
                                        <h4 class="box-title mb-0"><?php echo e($m->title); ?></h4>
                                        <small class="text-muted db"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




          <!-- END Card BOOKS -->







































































































































































































































          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')); ?>"></script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>