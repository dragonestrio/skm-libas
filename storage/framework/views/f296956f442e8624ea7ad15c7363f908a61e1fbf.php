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
                  <h4 class="text-center text-capitalize fw-bolder">detail <?php echo e($position); ?></h4>
              </div>
              <div class="col-12 col-lg-12 py-3 px-5">
                <div class="row">
                    <?php if($users->profile_pic != ''): ?>
                    <div class="col-12 col-lg-12 py-3">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo e(url('media/upload/profile/'.$users->profile_pic)); ?>" class="img-view rounded-3 shadow">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="col-12 col-lg-12 py-3">
                        <p class="p-0 m-0 text-capitalize fw-light">nama lengkap</p>
                        <p class="p-0 m-0 text-capitalize text-break fw-bold"><?php echo e($users->name); ?></p>
                    </div>
                    <div class="col-6 col-lg-6 py-3">
                        <p class="p-0 m-0 text-capitalize fw-light">email</p>
                        <p class="p-0 m-0 text-break fw-bold"><?php echo e($users->email); ?></p>
                    </div>
                    <div class="col-6 col-lg-6 py-3">
                        <p class="p-0 m-0 text-capitalize fw-light">nomor telepon</p>
                        <p class="p-0 m-0 text-capitalize text-break fw-bold"><?php echo e($users->phone); ?></p>
                    </div>
                    <div class="col-6 col-lg-6 py-3">
                        <p class="p-0 m-0 text-capitalize fw-light">jenis kelamin</p>
                        <?php switch($users->gender):
                            case ('L'): ?>
                                <p class="p-0 m-0 text-capitalize text-break fw-bold">laki-laki</p>
                                <?php break; ?>
                            <?php case ('P'): ?>
                                <p class="p-0 m-0 text-capitalize text-break fw-bold">perempuan</p>
                                <?php break; ?>
                            <?php default: ?>
                                
                        <?php endswitch; ?>
                    </div>
                    <div class="col-6 col-lg-6 py-3">
                        <p class="p-0 m-0 text-capitalize fw-light">tanngal lahir</p>
                        <p class="p-0 m-0 text-capitalize text-break fw-bold"><?php echo e(date('d M Y', strtotime($users->date_born))); ?></p>
                    </div>
                    <div class="col-12 col-lg-12">
                        <a href="<?php echo e(url('users/'.$users->id.'/change_password')); ?>" class="form-control btn btn-primary bg-gradient-primary text-capitalize text-light fw-bolder">ganti kata sandi</a>
                    </div>
                    <div class="col-12 col-lg-12 py-3">
                        <p class="p-0 m-0 text-capitalize fw-light">catatan aktifitas login</p>
                    </div>
                    <div class="col-12 col-lg-12 py-3">
                        <div class="table-responsive">
                            <div class="img-view">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-xxs text-center text-uppercase fw-bolder">no</th>
                                            <th class="text-xxs text-start text-uppercase fw-bolder">aktifitas</th>
                                            <th class="text-xxs text-center text-uppercase fw-bolder">waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $__currentLoopData = $login_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->user_id == $users->id): ?>
                                        <tr>
                                            <td class="text-capitalize fw-normal text-center"><?php echo e($no++); ?></td>
                                            <td class="text-capitalize fw-bolder text-break"><?php echo e($item->description); ?></td>
                                            <td class="text-capitalize fw-bolder text-center"><?php echo e(date('d-M-Y, h:m:i',strtotime($item->created_at))); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/users/show.blade.php ENDPATH**/ ?>