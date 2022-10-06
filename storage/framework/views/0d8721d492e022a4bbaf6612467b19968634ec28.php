<?php $__env->startSection('app'); ?>

<main class="text-white">
    <div class="container-fluid py-5 shadow">
        <div class="py-5 py-lg-5">
            <div class="px-auto">
                <div class="container">
                    <form action="<?php echo e(url('profile')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php if(isset($users)): ?>
                            <?php echo method_field('put'); ?>
                        <?php endif; ?>
                        <div class="pb-5">
                            <h3 class="text-center text-uppercase fw-bold"><?php echo e((isset($users)) ? 'rubah' : 'tambah/buat baru'); ?> data user</h3>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">email</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="email" name="email" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((old('email') != null) ? old('email') : (isset($users) ? $users->email : '')); ?>" required autofocus>
                                <?php $__errorArgs = ['email'];
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
                        <?php endif; ?>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">nama</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="text" name="name" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((old('name') != null) ? old('name') : (isset($users) ? $users->name : '')); ?>" required>
                                <?php $__errorArgs = ['name'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">nomor telepon</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="number" name="phone" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((old('phone') != null) ? old('phone') : (isset($users) ? $users->phone : '')); ?>" required>
                                <?php $__errorArgs = ['phone'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">jenis kelamin</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <select name="gender" class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    
                                    <?php if(old('gender') != null): ?>
                                        <?php switch(old('gender')):
                                            case ('L'): ?>
                                                <option value="L">Laki-laki</option>    
                                                <?php break; ?>
                                            <?php case ('P'): ?>
                                                <option value="P">Perempuan</option>    
                                                <?php break; ?>
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                    <?php else: ?>
                                        <?php if(isset($users)): ?>
                                        <?php switch($users->gender):
                                            case ('L'): ?>
                                                <option value="L">Laki-laki</option>    
                                                <?php break; ?>
                                            <?php case ('P'): ?>
                                                <option value="P">Perempuan</option>    
                                                <?php break; ?>
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                            
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <option value="L">Laki-laki</option>    
                                    <option value="P">Perempuan</option>    
                                </select>
                                <?php $__errorArgs = ['gender'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">tanggal lahir</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="date" name="date_born" class="form-control <?php $__errorArgs = ['date_born'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e((old('date_born') != null) ? old('date_born') : (isset($users) ? $users->date_born : '')); ?>" required>
                                <?php $__errorArgs = ['date_born'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">alamat</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <textarea name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" required><?php echo e((old('address') != null) ? old('address') : (isset($users) ? $users->address : '')); ?></textarea>
                                <?php $__errorArgs = ['address'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">Foto Profile</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="file" name="profile_pic" class="form-control <?php $__errorArgs = ['profile_pic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".jpg, .jpeg, .png" value="<?php echo e(old('profile_pic')); ?>" <?php echo e((isset($users)) ? '' : 'required'); ?>>
                                <?php $__errorArgs = ['profile_pic'];
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
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">Jabatan</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <select name="level" class="form-control <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php if(old('level') != null): ?>
                                <?php echo '<option value="'.old('level').'">'.ucwords(old('level')).'</option>'; ?>

                                <?php else: ?>
                                <?php echo (isset($users)) ? '<option value="'.$users->level.'">'. ucwords($users->level).'</option>' : ''; ?>   
                                <?php endif; ?>
                                <option value="admin">Admin</option>    
                                <option value="user">User</option>    
                                </select>
                            <?php $__errorArgs = ['level'];
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
                        <?php endif; ?>

                        <div class="row py-2">
                            <div class="col-4 col-lg-4">
                                <p class="text-capitalize fs-5 p-0 m-0">password</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="password" name="password" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" required>
                                <?php $__errorArgs = ['password'];
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
                                <p class="text-capitalize fs-5 p-0 m-0">password konfirmasi</p>
                            </div>
                            <div class="col-8 col-lg-8">
                                <input type="password" name="password_confirmation" class="form-control bg-transparent border-0 border-bottom rounded-0 shadow-none text-light <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password_confirmation')); ?>" required>
                                <?php $__errorArgs = ['password_confirmation'];
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
                                <button class="btn btn-success form-control text-uppercase fw-bold" role="button"><?php echo e((isset($users)) ? 'edit' : 'buat'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/can_a/resources/views/users/profile.blade.php ENDPATH**/ ?>