<?php $__env->startSection('app'); ?>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-sm-12">
            <p class="text-capitalize m-0 p-0">hello, my name is <?php echo e($users->name); ?></p>
            <?php $__currentLoopData = $users->langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="text-capitalize">my primary language is <?php echo e($langs->name); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravela\resources\views/user-show.blade.php ENDPATH**/ ?>