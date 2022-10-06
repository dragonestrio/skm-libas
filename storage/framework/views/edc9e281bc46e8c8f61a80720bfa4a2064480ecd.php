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
                <h4 class="text-capitalize fw-bold">daftar <?php echo e($position); ?></h4>
              </div>
              <div class="col-12 col-lg-12 py-3 px-5">
                <form action="" method="get">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Cari disini..." value="<?php echo e(request()->input('search')); ?>">
                    <button class="btn btn-primary bg-gradient-primary mb-0" type="button">
                      <svg xmlns="http://www.w3.org/2000/svg" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                    </button>
                  </div>
                </form>
              </div>
              <div class="col-12 col-lg-12 pb-3 px-5">
                <a href="<?php echo e(url('respondents/create')); ?>" class="form-control btn btn-primary bg-gradient-primary mb-0">
                  <div class="input-group justify-content-center">
                    <div class="input-group-text bg-transparent border-0 pe-0 text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    </div>
                    <p class="input-group-text p-0 m-0 bg-transparent border-0 text-white text-capitalize fw-bold">tambah</p>
                  </div>
                </a>
              </div>
              <div class="col-12 col-lg-12 py-3">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-capitalize text-xxs text-start">unit</th>
                        <th class="text-capitalize text-xxs text-center">gender</th>
                        <th class="text-capitalize text-xxs text-start">pendidikan</th>
                        <th class="text-capitalize text-xxs text-start">tanggal pengisian</th>
                        <th class="text-capitalize text-xxs text-center">aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $respondent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="fw-bolder">
                        <td class="text-capitalize px-4"><?php echo e($item->units_name); ?></td>
                        <?php switch($item->gender):
                            case ('L'): ?>
                            <td class="text-capitalize text-center px-4">Laki-laki</td>
                            <?php break; ?>

                            <?php case ('P'): ?>
                            <td class="text-capitalize text-center px-4">Perempuan</td>
                                <?php break; ?>

                            <?php default: ?>
                                
                        <?php endswitch; ?>
                        <td class="text-capitalize text-center px-4"><?php echo e($item->education); ?></td>
                        <td class="text-capitalize px-4"><?php echo e(date('d M Y, h:i:s', strtotime($item->created_at))); ?></td>
                        <td>
                          <div class="d-flex justify-content-center">
                            
                            <a href="<?php echo e(url('respondents/'.$item->id.'/edit')); ?>" class="btn shadow-none text-decoration-none fw-bold px-3 py-0">
                              <div class="input-group">
                                <div class="input-group-text bg-transparent border-0 pe-0 text-dark">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                  </svg>
                                </div>
                                <div class="input-group-text bg-transparent border-0 pe-0 text-dark">
                                  <p class="p-0 m-0 text-capitalize">edit</p>
                                </div>
                              </div>
                            </a>
                            <button form="delete-<?php echo e($item->id); ?>" onclick="return confirm('Apakah benar Anda ingin menghapus Responden di Unit <?php echo e($item->units_name); ?> ?')" class="btn shadow-none fw-bold px-3 py-0">
                              <form action="<?php echo e(url('respondents/'.$item->id)); ?>" method="post" enctype="multipart/form-data" class="d-inline" id="delete-<?php echo e($item->id); ?>">
                                <?php echo method_field('delete'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="input-group">
                                  <div class="input-group-text bg-transparent border-0 pe-0 text-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                  </div>
                                  <div class="input-group-text bg-transparent border-0 pe-0 text-danger">
                                    <p class="p-0 m-0 text-capitalize">delete</p>
                                  </div>
                                </div>
                              </form>
                            </button>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center pb-5">

              <?php echo e($respondent->links()); ?>


            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make('partials.footer.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </main>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/respondent/index.blade.php ENDPATH**/ ?>