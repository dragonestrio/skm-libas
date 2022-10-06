<?php if(request()->session()->has('notif-y')): ?>
    <br>
    <notification>
        <div class="mt-5 mt-lg-2 shadow">
            <div class="mt-0 mb-0 text-capitalize text-center text-break text-light fw-bold alert alert-success" role="alert">
                <?php echo e(session('notif-y')); ?>

            </div>
        </div>
    </notification>
<?php elseif(request()->session()->has('notif-x')): ?>
<br>
<notification>
    <div class="mt-5 mt-lg-2 shadow">
        <div class="mt-0 mb-0 text-capitalize text-center text-break text-light fw-bold alert alert-danger" role="alert">
            <?php echo e(session('notif-x')); ?>

        </div>
    </div>
</notification>
<?php endif; ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/layouts/notif.blade.php ENDPATH**/ ?>