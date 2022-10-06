<?php $__env->startSection('app'); ?>

<main class="text-white">
    <div class="container-fluid py-5 shadow">
        <div class="py-5 py-lg-5">
            <div class="px-auto">
                <div class="container">
                    <h4 class="text-center text-uppercase fw-bold">ringkasan data</h4>
                    <div class="row py-5">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-lg-6 py-2">
                            <a href="<?php echo e(url($item['id'])); ?>" class="text-decoration-none text-white">
                                <div class="container py-3 btn-animate rounded-3 shadow">
                                    <div class="row">
                                        <div class="col-8 col-lg-8 border-2 border-end">
                                            <p class="p-0 m-0 text-capitalize"><?php echo e($item['name']); ?></p>
                                        </div>
                                        <div class="col-4 col-lg-4">
                                            <p class="p-0 m-0 text-capitalize text-center"><?php echo e($item['value']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/can_a/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>