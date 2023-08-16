

<?php $__env->startSection('pageTitle'); ?> Videos <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?>
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon svg-icon svg-icon-lg svg-icon-primary">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <rect fill="#000000" x="2" y="6" width="13" height="12" rx="2" />
                        <path d="M22,8.4142119 L22,15.5857848 C22,16.1380695 21.5522847,16.5857848 21,16.5857848 C20.7347833,16.5857848 20.4804293,16.4804278 20.2928929,16.2928912 L16.7071064,12.7071013 C16.3165823,12.3165768 16.3165826,11.6834118 16.7071071,11.2928877 L20.2928936,7.70710477 C20.683418,7.31658067 21.316583,7.31658098 21.7071071,7.70710546 C21.8946433,7.89464181 22,8.14899558 22,8.4142119 Z" fill="#000000" opacity="0.3" />
                    </g>
                </svg>
            </span>
        <h3 class="card-label pr-2 m-0">Videos</h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">All Videos</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderNav'); ?>
    <a href="<?php echo e(route('video.create')); ?>" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon-->
    </span>Add New Video</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header-form'); ?>
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
        <span class="card-icon">
            <i class="text-primary flaticon-search"></i>
        </span>
        Search
    </h5>
    <!--end::Page Title-->
    <!--begin::Actions-->
    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
    <form action="<?php echo e(route('video.index')); ?>" method="GET" class="d-flex" id="searchForm">
        <input type="text" name="word" placeholder="Text.." class="form-control form-control-sm mr-3">
        <select class="form-control form-control-sm mr-3" id="path_id" name="path_id" v-on:change="getCourses" v-model="path_id">
            <option value=""><?php echo e(config('library.path.en')); ?></option>
            <?php $__currentLoopData = \App\Models\Library\Path::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($path->id); ?>"><?php echo e($path->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select class="form-control form-control-sm mr-3" name="course" v-model="course_id">
            <option value=""><?php echo e(config('library.course.en')); ?></option>
            <option v-for="i in course_data" :value="i.id">{{i.title}}</option>
        </select>
        <input type="submit" value="Search" class="btn btn-primary btn-sm">
    </form>

    <!--end::Actions-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45 symbol-light mr-5">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Clipboard.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="2" y="6" width="13" height="12" rx="2" />
                                            <path d="M22,8.4142119 L22,15.5857848 C22,16.1380695 21.5522847,16.5857848 21,16.5857848 C20.7347833,16.5857848 20.4804293,16.4804278 20.2928929,16.2928912 L16.7071064,12.7071013 C16.3165823,12.3165768 16.3165826,11.6834118 16.7071071,11.2928877 L20.2928936,7.70710477 C20.683418,7.31658067 21.316583,7.31658098 21.7071071,7.70710546 C21.8946433,7.89464181 22,8.14899558 22,8.4142119 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder"><?php echo e(substr($q->title, 0, 80)); ?></a>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <span class="svg-icon svg-icon-md svg-icon-primary pr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-arrange.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"></path>
                                                    <path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="text-muted font-weight-bold">
                                            الماده
                                        </span>
                                    </div>
                                </div>
                                <span class="text-muted font-weight-bold">
                                    الدرس
                                </span>
                            </div>
                            <!--end::Info-->
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-header font-weight-bold py-5">
                                            <span class="font-size-lg">Quick Actions:</span>
                                        </li>
                                        <li class="navi-separator mb-3 opacity-70"></li>
                                        <li class="navi-item">






                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="modal" data-target="#DeleteModal-<?php echo e($q->id); ?>">
                                                <span class="navi-icon">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <span class="navi-text">Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Bottom-->
                        <div class="pt-3">
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-295px" style="background-image: url(<?php echo e($q->cover_image); ?>)"></div>
                        </div>
                        <!--end::Bottom-->
                        <!--begin::Separator-->
                        <div class="separator separator-solid mt-5 mb-4"></div>
                        <!--end::Separator-->
                        <!--begin::Editor-->
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center pr-5">
                                <span class="svg-icon svg-icon-primary svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Time-schedule.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                        <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                                <span class="text-muted font-weight-bold"><?php echo e($q->created_at); ?></span>
                            </div>
                            <div class="d-flex align-items-center pr-5">
                            <span class="svg-icon svg-icon-md svg-icon-primary pr-1">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Clock.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"></path>
                                        <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                                <span class="text-muted font-weight-bold"><?php echo e($q->duration); ?></span>
                            </div>
                        </div>

                        <!--edit::Editor-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="modal fade" id="DeleteModal-<?php echo e($q->id); ?>" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left;">
                            <h4 class="modal-title">Are You Sure ?</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo e($q->title); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right;">Close</button>
                            <?php echo Form::open(['action'=>['Admin\VimeoController@destroy', $q->id], 'method'=>'POST']); ?>

                            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                            <?php echo e(Form::submit('Delete', ['class'=>'btn btn-danger', 'style'=>'float:right;'])); ?>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--begin::Pagination-->
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin::Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap mr-3">
                            <!-- Pagination here -->
                            <?php echo e($videos->appends(request()->all())->links()); ?>

                        </div>
                        <form class="d-flex align-items-center" method="GET" action="<?php echo e(route('video.index')); ?>">
                            <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" name="pagination" onchange="this.form.submit()">
                                <option value="1" <?php echo e(request()->pagination == 10 ? 'selected': ''); ?>>10</option>
                                <option value="2" <?php echo e(request()->pagination == 20 ? 'selected': ''); ?>>20</option>
                                <option value="30" <?php echo e(request()->pagination == 30 ? 'selected': ''); ?>>30</option>
                                <option value="50" <?php echo e(request()->pagination == 50 ? 'selected': ''); ?>>50</option>
                                <option value="100" <?php echo e(request()->pagination == 100 ? 'selected': ''); ?>>100</option>
                            </select>
                            <span class="text-muted">Displaying <?php echo e($result_counter); ?> of <?php echo e($videos->total()); ?> records</span>
                        </form>
                    </div>
                    <!--end:: Pagination-->
                </div>
            </div>
        </div>
        <!--end::Pagination-->

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscode'); ?>
    <script src="<?php echo e(asset('assets/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>

        var app = new Vue({
            el: '#searchForm',
            data:{
                path_id: '<?php echo e(request()->course_id); ?>',
                course_id: '<?php echo e(request()->chapter); ?>',
                course_data: [],
            },
            mounted(){
                this.getCourses();
            },
            methods: {
                getCourses:async function(){
                    this.chapter_data = await this.fetchLibrary(this.path_id, 'course');
                },
                fetchLibrary: function(parent_topic_id, topic_required){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('library.fetch')); ?>',
                        data: {
                            parent_topic_id,
                            topic_required,
                        },
                    });
                },
            },

        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>