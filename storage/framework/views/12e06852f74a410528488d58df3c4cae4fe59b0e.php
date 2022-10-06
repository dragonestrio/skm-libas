<?php $__env->startSection('app'); ?>

<main class="text-white">
    <div class="container-fluid py-5 shadow">
        <div class="row">
            <div class="py-5 py-lg-5">
                <div class="px-auto">
                    <div class="container">
                        <div class="py-2">
                            <div class="container py-3 rounded-3">
                                <form action="" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari disini...." value="<?php echo e(request()->input('search')); ?>">
                                        <div class="input-group-append">
                                            <button class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="py-3">
                                    <a href="<?php echo e(url('users/create')); ?>" class="btn btn-success form-control text-decoration-none text-center text-uppercase fw-bold shadow">tambah/buat data baru</a>
                                </div>
                            </div>
                        </div>

                        <div class="row py-5">

                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-lg-6 py-2 shadow">
                                <a href="<?php echo e(url('users/'.$item->id.'/edit')); ?>" class="text-decoration-none text-white">
                                    <div class="container py-3 btn-animate rounded-3 shadow">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 border-1 border-bottom">
                                                <p class="p-0 m-0 text-center text-truncate"><?php echo e($item->email); ?></p>
                                            </div>
                                            <div class="col-12 col-lg-12 border-1 border-bottom">
                                                <p class="p-0 m-0 text-capitalize text-center text-truncate"><?php echo e($item->name); ?></p>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <p class="p-0 m-0 text-capitalize text-center text-truncate">jabatan : <?php echo e($item->level); ?></p>
                                            </div>
                                            <div class="col-12 col-lg-12">
                                                <div class="row py-3">
                                                    <div class="col-6 col-lg-6">
                                                        <a href="<?php echo e(url('users/'.$item->id.'/edit')); ?>" class="form-control btn btn-success text-decoration-none text-uppercase fw-bold">edit</a>
                                                    </div>
                                                    <div class="col-6 col-lg-6">
                                                        <form action="<?php echo e(url('users/'. $item->id)); ?>" method="post" enctype="multipart/form-data" class="d-inline">
                                                            <?php echo method_field('delete'); ?>
                                                            <?php echo csrf_field(); ?>
                                                            <button onclick="return confirm('Apakah benar Anda ingin menghapus data <?php echo e($item->email); ?> ?')" class="form-control btn btn-danger text-decoration-none text-uppercase fw-bold">delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo e($users->links()); ?>

        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/can_a/resources/views/users/index.blade.php ENDPATH**/ ?>