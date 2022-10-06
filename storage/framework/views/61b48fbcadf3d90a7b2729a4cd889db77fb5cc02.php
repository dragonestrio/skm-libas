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
                  <h4 class="text-center text-capitalize fw-bolder">perbarui kata sandi</h4>
              </div>
              <div class="col-12 col-lg-12 py-3 px-5">
                <form action="<?php echo e(url('users/'.$users->id.'/change_password')); ?>" method="post" enctype="multipart/form-data" id="form">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($users)): ?>
                        <?php echo method_field('put'); ?>
                    <?php endif; ?>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/users/change_passwd.blade.php ENDPATH**/ ?>