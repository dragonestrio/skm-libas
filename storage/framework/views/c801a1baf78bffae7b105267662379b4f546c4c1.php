<?php if(request()->session()->has('notif-y')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e($request->session()->get('notif-y')); ?>

    </div>
<?php elseif(request()->session()->has('notif-x')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e($request->session()->get('notif-x')); ?>

    </div>
<?php endif; ?><?php /**PATH /Users/satrionugroho/Sites/localhost/laravela/resources/views/layouts/notif.blade.php ENDPATH**/ ?>