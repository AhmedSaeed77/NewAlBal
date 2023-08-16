dear, <?php echo e($data['name']); ?> Welcome to <?php echo e(env('APP_NAME')); ?>.
<a href="<?php echo e(route('activateAccount',$data['id'])); ?>?hash=<?php echo e($data['hash']); ?>"> Click Here to Confirm You Account</a>
