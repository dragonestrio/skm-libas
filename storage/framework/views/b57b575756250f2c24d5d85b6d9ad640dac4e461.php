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
    <div class="container-fluid pb-4">
      <div class="accordion-item">
        <div class="accordion-header d-flex justify-content-end">
          <button class="btn bg-transparent btn-outline-light text-capitalize text-light fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-one" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
              <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
            filters
          </button>
        </div>
        <div id="flush-one" class="accordion-collapse collapse">
          <form action="" method="get" class="pb-5">
            <div class="row text-light">

              <div class="col-6 col-lg-4">
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <p class="p-0 m-0 text-capitalize fw-bolder">filter unit</p>
                  </div>
                  <div class="col-12 col-lg-12">
                    <select name="unit" class="form-select text-center">
                      <?php if(request()->input('unit') != null): ?>
                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->id == request()->input('unit')): ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e(ucwords($item->name)); ?></option>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                      <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item->id); ?>"><?php echo e(ucwords($item->name)); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-6 col-lg-4">
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <p class="p-0 m-0 text-capitalize fw-bolder">berdasarkan</p>
                  </div>
                  <div class="col-12 col-lg-12">
                    <select name="date" class="form-select text-center">
                      <?php if(request()->input('date') != null): ?>
                        <?php switch(request()->input('date')):
                            case ('time'): ?>
                                <option value="time"><?php echo e(ucwords('jam')); ?></option>
                                <?php break; ?>
                            <?php case ('day'): ?>
                                <option value="day"><?php echo e(ucwords('hari')); ?></option>
                                <?php break; ?>
                            <?php case ('month'): ?>
                                <option value="month"><?php echo e(ucwords('bulan')); ?></option>
                                <?php break; ?>
                            <?php case ('year'): ?>
                                <option value="year"><?php echo e(ucwords('tahun')); ?></option>
                                <?php break; ?>
                            <?php default: ?>
                                
                        <?php endswitch; ?>
                      <?php endif; ?>
                      <option value="time"><?php echo e(ucwords('jam')); ?></option>
                      <option value="day"><?php echo e(ucwords('hari')); ?></option>
                      <option value="month"><?php echo e(ucwords('bulan')); ?></option>
                      <option value="year"><?php echo e(ucwords('tahun')); ?></option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-4">
                <div class="row">
                  <div class="col-12 col-lg-12">
                    <p class="p-0 m-0 text-capitalize fw-bolder">&nbsp;</p>
                  </div>
                  <div class="col-12 col-lg-12">
                    <button class="form-control btn btn-success text-capitalize text-center fw-bolder mb-0">muat</button>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
      <div class="row">

        <?php $__currentLoopData = $report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-lg-4 mb-xl-0 mb-4">
          <div class="card shadow">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold"><?php echo e($item->label); ?></p>
                    <h5 class="font-weight-bolder">
                      <?php echo e($item->total); ?>

                    </h5>
                    <p class="mb-0">
                      <span class="text-sm font-weight-bolder <?php if($item->different < 0 || $item->different == 0): ?>
                        text-danger
                      <?php else: ?>
                        text-success
                      <?php endif; ?>"><?php if($item->different < 0): ?>
                        <?php echo e($item->different); ?>

                      <?php else: ?>
                        <?php echo '+'.$item->different; ?>

                      <?php endif; ?></span>
                      dari <?php echo e($item->label); ?> sebelumnya
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape <?php echo e($item->color); ?> shadow-primary text-center rounded-circle">
                    <div class="text-lg text-light opacity-10 pt-2">
                      <svg xmlns="http://www.w3.org/2000/svg" height="22" fill="currentColor" class="bi" viewBox="0 0 16 16">
                        <?php echo $item->icon; ?>

                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <div class="row mt-4 mt-lg-5">

        <div class="col-12 col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">responden berdasarkan jenis kelamin</h6>
              <p class="text-sm mb-0">
                <i class="fa <?php if($report->total->different > 0): ?>
                  fa-arrow-up text-success
                <?php elseif($report->total->different == 0): ?>
                text-danger
                <?php else: ?>
                  fa-arrow-down text-danger
                <?php endif; ?>"></i>
                <span class="font-weight-bold"><?php echo e($report->total->different); ?></span> pertambahan
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-12 col-lg-5">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">responden berdasarkan pendidikan</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="education" class="chart-canvas" height="300"></canvas>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>