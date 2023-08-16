   
   <?php $__env->startSection('content'); ?>
        <div class="container h-100 mt-100 ">
            <div class="row align-items-center justify-content-md-center h-p100">
                <div class="col-12">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-5 col-md-5 col-12">
                                <div class="bg-white rounded10 shadow-lg">
                                    <div class="content-top-agile p-20 pb-0">
                                        <h2 class="text-primary">تسجيل الدخول</h2>
                                    </div>
                                    <div class="p-40">
                                        <form action="<?php echo e(route('login')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
										    <?php echo $__env->make('include.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <div class="form-group">
                                                <div class="input-group mb-4">
                                                    <span class="input-group-text bg-transparent">
                                                        <i class="ti-user"></i>
                                                    </span>&nbsp;
                                                    <input type="email" name="email" class="form-control ps-15 bg-transparent h-50" placeholder="اسم المستخدم">
                                                </div>
                                            </div>
                                            <div class="form-group pt-10">
                                                <div class="input-group ">
                                                    <span class="input-group-text  bg-transparent">
                                                        <i class="ti-lock"></i>
                                                    </span>&nbsp;
                                                    <input type="password" name="password" class="form-control ps-15 bg-transparent h-50" placeholder="كلمة المرور">
                                                </div>
                                                
                                            </div>
                                            <div class="col-12 text-center pt-10">
                                                <button type="submit" class="btn btn-info margin-top-10">تسجيل الدخول</button>
                                            </div>
                                        </form>
                                        <div class="text-center pb-10 pt-10">
                                            <p class="mt-15 mb-0">
                                                <a href="reset-password.html" class="hover-warning">
                                                    <i class="ion ion-locked">&nbsp;</i>هل نسيت كلمة المرور؟</a>
                                                <a href="<?php echo e(route('register')); ?>" class="text-warning ms-5">&nbsp;  تسجيل عضوية جديدة !</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
              

<?php echo $__env->make('layouts.layout_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>