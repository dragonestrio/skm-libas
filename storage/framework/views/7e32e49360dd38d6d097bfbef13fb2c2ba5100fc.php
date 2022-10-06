<div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?php echo e(url('/')); ?>" target="_blank">
        <img src="<?php echo e(url('media/logo/cropped-kepolisian-negara-republik-indonesia-logo-483CE3543A-seeklogo.com_-180x180.png')); ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold"><?php echo e($app); ?></span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($position == 'dashboard'): ?>
            active
          <?php endif; ?>" href="<?php echo e((auth()->check() == true) ? url('dashboard') : ''); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Dashboard</span>
          </a>
        </li>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('auth')): ?>
        <li class="nav-item">
          <a class="nav-link <?php if($position == 'admin'): ?>
            active
          <?php endif; ?>" href="<?php echo e(url('users')); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Admin</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($position == 'responden'): ?>
            active
          <?php endif; ?>" href="<?php echo e(url('respondents')); ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Responden</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kuesioner</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($position == 'unit fokus'): ?>
              active
            <?php endif; ?>" href="<?php echo e(url('units')); ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1 text-capitalize">Unit Fokus</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($position == 'kategori pertanyaan'): ?>
              active
            <?php endif; ?>" href="<?php echo e(url('questions_categories')); ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-book-bookmark text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1 text-capitalize">Kategori Pertanyaan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($position == 'pertanyaan'): ?>
              active
            <?php endif; ?>" href="<?php echo e(url('questions')); ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-bullet-list-67 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1 text-capitalize">Pertanyaan</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($position == 'laporan kuesioner'): ?>
            active
          <?php endif; ?>" href="<?php echo e(url('reports')); ?>" target="_blank">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-archive-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-capitalize">Laporan Kuesioner</span>
          </a>
        </li>
        <?php endif; ?>
    </ul>
    </div>
  </aside><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/partials/sidebar/custom.blade.php ENDPATH**/ ?>