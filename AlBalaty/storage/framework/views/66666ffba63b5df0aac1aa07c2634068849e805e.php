<?php $__env->startSection('pageTitle'); ?> All Packages <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?>
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon svg-icon svg-icon-lg svg-icon-primary">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                <i class="text-primary flaticon2-box"></i>
                <!--end::Svg Icon-->
            </span>
        <h3 class="card-label pr-2 m-0">Packages</h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">All Packages</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderNav'); ?>
    <a href="<?php echo e(route('packages.create')); ?>" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon-->
    </span>Create New Package</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon2-box"></i>
                    </span>
                        <h3 class="card-label">Packages</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Original price</th>
                            <th>Discount</th>
                            <th>Edit</th>
                            <th>State</th>
                            <th>Approved</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php if(count($packages) > 0): ?>
                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($package->name); ?></td>
                                    <?php if($package->approved): ?>
                                        <td><?php echo e($package->price); ?> $</td>
                                        <td><?php echo e($package->original_price); ?> $</td>
                                        <td><?php echo e($package->discount); ?> %</td>
                                    <?php else: ?>
                                        <td>--</td>
                                        <td>--</td>
                                        <td>--</td>
                                    <?php endif; ?>
                                    <td>

                                        --
                                    </td>
                                    <td>
                                        <?php if($package->active == 1): ?>
                                            Enabled
                                        <?php else: ?>
                                            Disabled
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($package->approved ? 'Approved': 'Not Approved Yet'); ?>

                                    </td>
                                    <td style="font-size: 22px; display:flex; ">
                                        <?php if($package->approved): ?>
                                            <a data-toggle="modal" data-target="#DeleteModal-<?php echo e($package->id); ?>" style="cursor:pointer;">
                                                <?php if($package->active == 1): ?>
                                                    <i class="fa fa-trash" style="color: #5bc0de;"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-eye" style="color: #ccc;"></i>
                                                <?php endif; ?>
                                            </a>

                                            <div class="modal fade" id="DeleteModal-<?php echo e($package->id); ?>" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="text-align: left;">
                                                            <h4 class="modal-title">Warning</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php if($package->active == 0): ?>
                                                                <p>
                                                                    This package is already Disabled. Do you like to Enable it Again ?
                                                                </p>
                                                            <?php else: ?>
                                                                <p>
                                                                    Deleting the package means that no one have the chooise to buy this package
                                                                    but it still available for the current users who already bought it.
                                                                    Are You sure ?
                                                                </p>
                                                            <?php endif; ?>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <?php echo Form::open(['action'=>['Admin\PackageController@destroy', $package->id], 'method'=>'POST']); ?>

                                                            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                                            <?php if($package->active == 0): ?>
                                                                <?php echo e(Form::submit('Enable', ['class'=>'btn btn-primary'])); ?>

                                                            <?php else: ?>
                                                                <?php echo e(Form::submit('Disable', ['class'=>'btn btn-danger'])); ?>

                                                            <?php endif; ?>
                                                            <?php echo Form::close(); ?>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p>No Content !</p>
                        <?php endif; ?>


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscode'); ?>
    <script src="<?php echo e(asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>