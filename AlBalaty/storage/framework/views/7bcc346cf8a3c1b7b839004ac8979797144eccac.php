<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title><?php echo e(env('APP_NAME')); ?></title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?php echo e(asset('assets-student/css/vendors_css.css')); ?>">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?php echo e(asset('assets-student/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets-student/css/skin_color.css')); ?>">
	<?php echo $__env->yieldContent('css'); ?>
	
</head>
<body class="hold-transition theme-primary bg-img rtl" style="background-image: url(<?php echo e(asset('assets-student/login.jpg')); ?>)">
<?php echo $__env->yieldContent('content'); ?>
<script src="<?php echo e(asset('assets-student/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets-student/js/pages/chat-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets-student/assets/icons/feather-icons/feather.min.js')); ?>"></script>

<!-- EduAdmin App -->
<script src="<?php echo e(asset('assets-student/js/template.js')); ?>"></script>

<script src="<?php echo e(asset('assets-student/js/pages/statistic.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
