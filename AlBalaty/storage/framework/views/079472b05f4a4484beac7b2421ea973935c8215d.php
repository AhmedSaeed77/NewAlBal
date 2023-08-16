

<?php $__env->startSection('pageTitle'); ?> Teacher <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?>
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon">
                <i class="flaticon-business icon-2x"></i>
            </span>
        <h3 class="card-label pr-2">Package Manager </h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('super-admin.dashboard')); ?>" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">All Packages</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderNav'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon-search"></i>
                    </span>
                <h3 class="card-label">Search</h3>
            </div>
        </div>
        <div class="card-body">
            <?php echo Form::open(['action'=>'\App\Http\Controllers\SuperAdmin\PackageManagerController@index', 'method'=>'GET', 'class'=>'', 'style'=>'margin: 10px 0 20px 0;']); ?>

            <div class="row">
                <div class="form-group col-md-12" style="">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Package Name :</strong>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(request()->name); ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12" style="">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Teacher :</strong>
                        </div>
                        <div class="col-md-10">
                            <select name="teacher_id" id="teacher_id" class="form-control" name="teacher_id">
                                <option value=""></option>
                                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($teacher->id); ?>" <?php echo e(request()->teacher_id == $teacher->id ? 'selected':''); ?>><?php echo e($teacher->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-1 offset-md-11">
                    <?php echo e(Form::submit('search', ['class'=>'btn btn-success float-right', 'style'=>''])); ?>

                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

    <div class="card card-custom my-3">
        <div class="card-header">
            <div class="card-title">
                    <span class="card-icon">
                        <i class="text-primary flaticon-business icon-2x"></i>
                    </span>
                <h3 class="card-label">Packages</h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <td>Package</td>
                    <td>Teacher</td>
                    <td>Active</td>
                    <td>Approved</td>
                    <td>Take Action</td>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($package->name); ?></td>
                            <td><?php echo e($package->teacher_name); ?></td>
                            <td><?php echo e($package->active ? 'Active': 'Disabled by teacher'); ?></td>
                            <td><?php echo e($package->approved ? 'Approved': 'Not Approved'); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('super-admin.package-manager.edit', $package->id)); ?>">
                                    <i class="flaticon-settings-1 text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--begin::Pagination-->
    <div class="card card-custom">
        <div class="card-body">
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    <!-- Pagination here -->
                    <?php echo e($packages->appends(request()->all())->links()); ?>

                </div>
                <form class="d-flex align-items-center" method="GET" action="<?php echo e(request()->fullUrl()); ?>">
                    <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" name="pagination" onchange="this.form.submit()">
                        <option value="10" <?php echo e(request()->pagination == 10 ? 'selected': ''); ?>>10</option>
                        <option value="20" <?php echo e(request()->pagination == 20 ? 'selected': ''); ?>>20</option>
                        <option value="30" <?php echo e(request()->pagination == 30 ? 'selected': ''); ?>>30</option>
                        <option value="50" <?php echo e(request()->pagination == 50 ? 'selected': ''); ?>>50</option>
                        <option value="100" <?php echo e(request()->pagination == 100 ? 'selected': ''); ?>>100</option>
                    </select>
                    <?php $__currentLoopData = request()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span class="text-muted">Displaying <?php echo e(count($packages)); ?> of <?php echo e($packages->total()); ?> records</span>
                </form>
            </div>
            <!--end:: Pagination-->
        </div>
    </div>
    <!--end::Pagination-->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('jscode'); ?>
    <?php if(env('APP_ENV') == 'local'): ?>
        <script src="<?php echo e(asset('helper/js/vue-dev.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('helper/js/vue-prod.min.js')); ?>"></script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super-admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>