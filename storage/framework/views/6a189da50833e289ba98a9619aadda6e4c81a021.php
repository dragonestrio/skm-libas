<?php $__env->startSection('app'); ?>

<main class="text-white">
    <div class="container-fluid py-5 shadow">
        <div class="py-5 py-lg-5">
            <div class="px-auto">
                <div class="container">
                    <form action="<?php echo e((isset($login_history)) ? url('login_history/'.$login_history->id) : url('login_history')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($login_history)): ?>
                            <?php echo method_field('put'); ?>
                        <?php endif; ?>
                        <div class="pb-5">
                            <h3 class="text-center text-uppercase fw-bold"><?php echo e((isset($login_history)) ? 'rubah' : 'tambah/buat baru'); ?> data user</h3>
                        </div>
                        
                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">User</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <select name="user_id" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php if(old('user_id') != null): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($items->id == old('user_id')): ?>
                                <?php echo '<option value="'.old('user_id').'">'.ucwords($items->name).'</option>'; ?>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <?php echo (isset($login_history)) ? '<option value="'.$login_history->user_id.'">'. ucwords($login_history->user_id).'</option>' : ''; ?>   
                                <?php endif; ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e(ucwords($item->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                </select>
                            <?php $__errorArgs = ['user_id'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">deskripsi</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <textarea name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" required><?php echo e((old('description') != null) ? old('description') : (isset($login_history) ? $login_history->description : '')); ?></textarea>
                                <?php $__errorArgs = ['description'];
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
                                <button class="btn btn-success form-control text-uppercase fw-bold" role="button"><?php echo e((isset($login_history)) ? 'edit' : 'buat'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/can_a/resources/views/login_history/form.blade.php ENDPATH**/ ?>