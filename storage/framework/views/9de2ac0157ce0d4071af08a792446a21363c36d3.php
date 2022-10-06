<?php $__env->startSection('app'); ?>

<div class="container-fluid">
    <div class="row">
        
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="col-sm-12">
            <p class="text-capitalize m-0 p-0">hello, my name is <?php echo e($users->name); ?></p>
            
        </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravela\resources\views/user.blade.php ENDPATH**/ ?>