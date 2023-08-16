

<?php $__env->startSection('pageTitle'); ?> Coupons <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?> Coupons <?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row" style="background-color: white; padding: 0 0;">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-3x  text-primary flaticon-gift"></i>
                    </span>
                        <h3 class="card-label">Coupons</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Owner/Teacher</th>
                            <th>Code</th>
                            <th>Link</th>
                            <th>Coupon Price</th>
                            <th>Available Count</th>
                            <th>Sold Count</th>
                            <th>Expire In</th>
                            <th>Promoted</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($coupons) ): ?>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr
                                        <?php if(\Carbon\Carbon::parse($coupon->expire_date)->lt(\Carbon\Carbon::now()) || ($coupon->no_use) == 0): ?>
                                        style="background-color: tomato; color:snow;"
                                        <?php endif; ?>
                                >
                                    <td><?php echo e($coupon->id); ?></td>
                                    <td>
                                        <?php echo e($coupon->package_name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($coupon->teacher_name); ?>

                                    </td>
                                    <td><?php echo e($coupon->code); ?></td>
                                    <td>
                                        <?php echo e(route('generate.payment.with.coupon', $coupon->code)); ?>

                                    </td>
                                    <td><?php echo e($coupon->price); ?></td>
                                    <td><?php echo e($coupon->no_use); ?></td>
                                    <td><?php echo e($coupon->total_count - $coupon->no_use); ?></td>
                                    <?php if(\Carbon\Carbon::parse($coupon->expire_date)->lt(\Carbon\Carbon::now()) || ($coupon->no_use) == 0 ): ?>
                                        <td>Expired  </td>
                                    <?php else: ?>
                                        <td><?php echo e($coupon->expire_date); ?></td>
                                    <?php endif; ?>
                                    <td class="<?php echo e($coupon->promote? 'bg-warning':''); ?>">
                                        <?php if($coupon->promote): ?>
                                            <a href="<?php echo e(route('coupon.demote', $coupon->id)); ?>">Demote</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('coupon.promote', $coupon->id)); ?>">Promote</a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($coupon->created_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('coupon.destroy', $coupon->id)); ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p>noting to show !</p>

                        <?php endif; ?>
                        </tbody>
                    </table>

                    <center>
                        <?php echo e(\App\Coupon::orderBy('created_at', 'desc')->paginate(25)->links()); ?>

                    </center>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('jscode'); ?>
    <script src="<?php echo e(asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super-admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>