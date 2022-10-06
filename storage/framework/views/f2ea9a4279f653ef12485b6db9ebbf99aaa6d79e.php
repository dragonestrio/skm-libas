<?php $__env->startSection('app'); ?>

<main>
  <?php echo $__env->make('partials.sidebar.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white text-capitalize">Admin</a></li>
              <li class="breadcrumb-item text-sm text-white text-capitalize active"><?php echo e($position); ?></li>
            </ol>
            <h6 class="font-weight-bolder text-white text-capitalize mb-0"><?php echo e($position); ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">

            <?php if(auth()->guard()->check()): ?>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="<?php echo e(url('login')); ?>" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none text-capitalize"><?php echo e(auth()->user()->name); ?></span>
                </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a href="<?php echo e(url('profile')); ?>" class="dropdown-item border-radius-md">
                    <div class="d-flex justify-content-center text-capitalize fw-bold">
                        <i class="fa fa-user pe-2 pt-1"></i>
                        <span class="">Profile</span>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <form action="<?php echo e(url('logout')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <button class="dropdown-item form-control btn btn-primary bg-primary text-center text-capitalize fw-bold border-radius-md">logout</button>
                  </form>
                </li>
              </ul>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <?php else: ?>
            <li class="nav-item">
              <a href="<?php echo e(url('login')); ?>" class="nav-link text-white p-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="ps-2">Sign In</span>
              </a>
            </li>
            <?php endif; ?>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4 text-dark">
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="row pt-4">
              <div class="col-12 col-lg-12 py-3 px-5">
                <?php switch($state):
                    case ('update'): ?>
                        <h4 class="text-center text-capitalize fw-bolder">perbarui <?php echo e($position); ?></h4>
                        <?php break; ?>
                    <?php case ('create'): ?>
                        <h4 class="text-center text-capitalize fw-bolder">tambah <?php echo e($position); ?></h4>
                        <?php break; ?>
                    <?php default: ?>
                        
                <?php endswitch; ?>
              </div>
              <div class="col-12 col-lg-12 py-3 px-5">
                <form action="<?php echo e((isset($users)) ? url('users/'.$users->id) : url('users')); ?>" method="post" enctype="multipart/form-data" id="form">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($users)): ?>
                        <?php echo method_field('put'); ?>
                    <?php endif; ?>
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">email</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
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
    
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">nama</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
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
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">nomor telepon</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="number" name="phone" class="form-control <?php $__errorArgs = ['phone'];
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
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">jenis kelamin</p>
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
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">tanggal lahir</p>
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
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">alamat</p>
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
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">Foto Profile</p>
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
                    
                    <?php if(auth()->user()->level == 'admin' || auth()->user()->level == 'superadmin'): ?>
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">Jabatan</p>
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
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                            <option value="superadmin">Superadmin</option>    
                            <?php endif; ?>
                            <option value="admin">Admin</option>    
                            
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
    
                    <?php if($state != 'update'): ?>
                    <div class="row py-2">
                        <div class="col-4 col-lg-4">
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">password</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
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
                            <p class="text-capitalize fs-5 p-0 m-0 text-sm fw-bold">password konfirmasi</p>
                        </div>
                        <div class="col-8 col-lg-8">
                            <input type="password" name="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
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
                    <?php endif; ?>
                </form>
                <div class="row py-5">
                    <div class="col-6 col-lg-6">
                        <button onclick="history.back()" class="btn btn-success bg-gradient-success form-control text-uppercase fw-bold" role="button">kembali</button>
                    </div>
                    <div class="col-6 col-lg-6">
                        <button form="form" class="btn btn-primary bg-gradient-primary form-control text-uppercase fw-bold" role="button"><?php echo e((isset($users)) ? 'perbarui' : 'buat'); ?></button>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make('partials.footer.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </main>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/users/form.blade.php ENDPATH**/ ?>