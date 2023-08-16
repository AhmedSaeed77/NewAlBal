<?php $__env->startSection('pageTitle'); ?> All Users <?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- BEGIN PAGE TITLE-->
        <div class="col-md-12">

            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon-search-magnifier-interface-symbol"></i>
                    </span>
                        <h3 class="card-label">Search </h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="<?php echo e(route('search.user.by.email')); ?>" class="" style=" background-color: white; padding: 20px 20px;">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <lable class="col-md-2">E-Mail:</lable>
                            <input type="text" name="email" placeholder="Email .."  class="col-md-6 form-control">
                            <input type="submit" value="Search" class="btn btn-success offset-md-1 col-md-1">
                        </div>
                    </form>

                    <form method="GET" action="<?php echo e(route('search.user.by.package')); ?>"  style=" background-color: white; padding: 20px 20px;">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <lable class="col-md-2">Package:</lable>
                            <select class="col-md-6 form-control" name="package_id" id="package_id">
                                <?php $__currentLoopData = \App\Models\Package\Packages::where('active','=', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            <?php if($package->id == Illuminate\Support\Facades\Input::get('package_id')): ?>
                                            selected
                                            <?php endif; ?>
                                            value="<?php echo e($package->id); ?>"><?php echo e($package->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="submit" value="Search" class="btn btn-success offset-md-1 col-md-1">
                        </div>
                    </form>


                </div>
            </div>




            <div class="card card-custom mt-5">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon-users-1"></i>
                    </span>
                        <h3 class="card-label">Students </h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>

                            <th>Email</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Last IP</th>
                            <th>Last Sever IP</th>
                            <th>Last Action</th>
                            <th>Last Login</th>
                            <th>Sales Status</th>
                            <th>Created At</th>
                            <th>--</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!count($users)): ?>
                            <p>nothing !</p>
                        <?php endif; ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td class="editableEmail" data-key="<?php echo e($user->id); ?>"><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->country); ?></td>
                                <td><?php echo e($user->city); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e($user->last_ip); ?></td>
                                <td><?php echo e($user->last_server_ip); ?></td>
                                <td><?php echo e($user->last_action); ?></td>
                                <td>
                                    <?php if($user->last_login != ''): ?>
                                        <?php echo e(\Carbon\Carbon::parse($user->last_login)->diffForHumans()); ?>

                                    <?php else: ?>
                                        --
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <i class="fa fa-dollar-sign"
                                       <?php if(\App\Payments::where('user_id','=', $user->id)->get()->first()): ?>
                                       style="color: goldenrod"
                                            <?php endif; ?>
                                    ></i>
                                </td>
                                <td><?php echo e(\Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.user.manual.add.package', $user->id)); ?>">Add Package/Event</a> -
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <center>

                    </center>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscode'); ?>
    <script src="<?php echo e(asset('assets-admin/js/pages/crud/datatables/extensions/buttons.js?v=7.0.4')); ?>"></script>
    <script src="<?php echo e(asset('assets-admin/plugins/custom/datatables/datatables.bundle.js?v=7.0.4')); ?>"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="<?php echo e(asset('js/jquery.editable.min.js')); ?>"></script>
    <script>
        $(function(){
            $(".editableEmail").editable({
                event: 'dblclick',
                touch: true,
                closeOnEnter: true,
                lineBreaks: false,
                emptyMessage: 'enter Email',
                callback: function(data){

                    newEmailValue = data.$el[0].textContent;
                    userId = data.$el[0].attributes['data-key'].nodeValue;
                    thisEle = $("[data-key="+userId+"]")[0]; // .innerText



                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });

                    $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('update.email')); ?>',
                        data: {
                            newEmailValue: newEmailValue,
                            userId: userId,
                        },
                        success: function (res) {
                            swal({
                                title: res[0].code == 200 ? res[0].success : res[0].error,
                                type: res[0].code == 200 ? 'success':'warning',
                                confirmButtonText: 'Ok'
                            });
                            thisEle.innerText = res[0].data['email'];
                        },
                        error: function (error) {
                            console.log('Error: ', error);
                        }
                    });


                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super-admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>