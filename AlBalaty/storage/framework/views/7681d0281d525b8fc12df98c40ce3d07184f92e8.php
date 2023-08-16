
<?php $__env->startSection('pageTitle'); ?> Events <?php $__env->stopSection(); ?>

<?php $__env->startSection('subheaderTitle'); ?>
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Code\Question-circle.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"/>
                        <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z" fill="#000000" opacity="0.3"/>
                        <path d="M13,5.06189375 C12.6724058,5.02104333 12.3386603,5 12,5 C11.6613397,5 11.3275942,5.02104333 11,5.06189375 L11,4 L10,4 C9.44771525,4 9,3.55228475 9,3 C9,2.44771525 9.44771525,2 10,2 L14,2 C14.5522847,2 15,2.44771525 15,3 C15,3.55228475 14.5522847,4 14,4 L13,4 L13,5.06189375 Z" fill="#000000"/>
                        <path d="M16.7099142,6.53272645 L17.5355339,5.70710678 C17.9260582,5.31658249 18.5592232,5.31658249 18.9497475,5.70710678 C19.3402718,6.09763107 19.3402718,6.73079605 18.9497475,7.12132034 L18.1671361,7.90393167 C17.7407802,7.38854954 17.251061,6.92750259 16.7099142,6.53272645 Z" fill="#000000"/>
                        <path d="M11.9630156,7.5 L12.0369844,7.5 C12.2982526,7.5 12.5154733,7.70115317 12.5355117,7.96165175 L12.9585886,13.4616518 C12.9797677,13.7369807 12.7737386,13.9773481 12.4984096,13.9985272 C12.4856504,13.9995087 12.4728582,14 12.4600614,14 L11.5399386,14 C11.2637963,14 11.0399386,13.7761424 11.0399386,13.5 C11.0399386,13.4872031 11.0404299,13.4744109 11.0414114,13.4616518 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        <h3 class="card-label pr-2">Events</h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">Events</a>
        </li>

    </ul>
    <!--end::Breadcrumb-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                    </span>
                        <h3 class="card-label">All Online Interactive Courses</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable1">
                            <thead>
                            <tr>
                                <td>Title</td>
                                <td>Start At</td>
                                <td>End At</td>
                                <td> teacher </td>
                                <td>Action</td>
                            </tr>
                            </thead>

                            <tbody>

                            <?php if(count(\App\Event::all()) > 0): ?>
                                <?php $__currentLoopData = \App\Event::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($event->name); ?></td>
                                        <td><?php echo e($event->start); ?></td>
                                        <td><?php echo e($event->end); ?></td>
                                        <td><?php echo e($event->teacher->name ?? ''); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('super-admin.event.edit', $event->id)); ?>">Edit</a> |
                                            <a href="javascript:;" onclick="AVUtil().deleteConfirmation('<?php echo e(route('event.delete', $event->id)); ?>', deleteCallback)" >Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p>No Content !</p>
                            <?php endif; ?>


                            </tbody>

                        </table>

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div id="content-data"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscode'); ?>
    <script>
        function deleteCallback(url){
            $.ajax({
                type: 'GET',
                url,
                success: function(res){
                    console.log(res);
                }
                
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super-admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>