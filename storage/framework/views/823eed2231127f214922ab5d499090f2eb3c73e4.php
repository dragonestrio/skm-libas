<?php $__env->startSection('app'); ?>

<main class="text-white">
    <div class="container-fluid py-5 shadow">
        <div class="py-5 py-lg-5">
            <div class="px-auto">
                <div class="container">
                    <form action="<?php echo e((isset($mhs)) ? url('mhs/'.$mhs->id) : url('mhs')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($mhs)): ?>
                            <?php echo method_field('put'); ?>
                        <?php endif; ?>
                        <div class="pb-5">
                            <h3 class="text-center text-uppercase fw-bold"><?php echo e((isset($mhs)) ? 'rubah' : 'tambah/buat baru'); ?> data mahasiswa</h3>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">nim</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="text" name="nim" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['nim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((old('nim') != null) ? old('nim') : (isset($mhs) ? $mhs->nim : '')); ?>" required autofocus>
                                <?php $__errorArgs = ['nim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="p-0 m-0 text-danger text-input-failed"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">nama</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="text" name="nama" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((old('nama') != null) ? old('nama') : (isset($mhs) ? $mhs->nama : '')); ?>" required>
                                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="p-0 m-0 text-danger text-input-failed"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        
                        <div class="row py-5">
                            <div class="col-12 col-lg-12">
                                <button class="btn btn-success form-control text-uppercase fw-bold" role="button"><?php echo e((isset($mhs)) ? 'edit' : 'buat'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/can_a/resources/views/mhs/form.blade.php ENDPATH**/ ?>