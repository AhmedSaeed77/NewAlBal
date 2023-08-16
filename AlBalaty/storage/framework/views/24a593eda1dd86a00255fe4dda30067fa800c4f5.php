

<?php $__env->startSection('pageTitle'); ?> Teacher <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?>
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
        <h3 class="card-label pr-2">Teacher Manager </h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('super-admin.dashboard')); ?>" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">All Teacher</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderNav'); ?>
    <a href="#" onclick="AVUtil().redirectionConfirmation('<?php echo e(route('teacher.create')); ?>')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#F64E60"></path>
                <rect fill="#F64E60" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Add Teacher</a>
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
            <?php echo Form::open(['action'=>'\App\Http\Controllers\SuperAdmin\TeacherManagerController@index', 'method'=>'GET', 'class'=>'', 'style'=>'margin: 10px 0 20px 0;']); ?>

            <div class="row">
                <div class="form-group col-md-12" style="">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Name :</strong>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(request()->name); ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12" style="">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Email :</strong>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo e(request()->email); ?>"/>
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
    <div class="row my-5" id="app-1">

        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::User-->
                    <div class="d-flex align-items-end mb-7">
                        <!--begin::Pic-->
                        <div class="d-flex align-items-center">
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">
                                    <?php echo e($teacher->name); ?>

                                </a>
                                <span class="text-muted font-weight-bold"><?php echo e($teacher->phone); ?></span>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::User-->
                    <!--begin::Info-->
                    <div class="mb-7">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                            <a href="#" class="text-muted text-hover-primary"><?php echo e($teacher->email); ?></a>
                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 font-weight-bolder mr-2">Country:</span>
                            <a href="#" class="text-muted text-hover-primary"><?php echo e($teacher->country); ?></a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Gender:</span>
                            <span class="text-muted font-weight-bold"><?php echo e($teacher->gender); ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">Joined:</span>
                            <span class="text-muted font-weight-bold"><?php echo e(\Carbon\Carbon::parse($teacher->created_at)->diffForHumans()); ?></span>
                        </div>
                    </div>
                    <!--end::Info-->
                    <a href="<?php echo e(route('teacher.edit', $teacher->id)); ?>" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4">Edit</a>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <!--begin::Pagination-->
    <div class="card card-custom">
        <div class="card-body">
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    <!-- Pagination here -->
                    <?php echo e($teachers->appends(request()->all())->links()); ?>

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
                    <span class="text-muted">Displaying <?php echo e(count($teachers)); ?> of <?php echo e($teachers->total()); ?> records</span>
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