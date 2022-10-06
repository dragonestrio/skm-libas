
<?php $__env->startSection('app'); ?>

<main>
  
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="<?php echo e(url('reports')); ?>" class="text-decoration-none text-dark">
                    <h3 class="text-center text-capitalize w-100 my-4" style="font-weight: 700;">
                        Survei Kepuasan Masyarakat Satuan Lalulintas Polrestabes Semarang <?php echo e($report->selected_date); ?>

                    </h3>
                </a>
                <div class="container">
                    <div class="accordion-item">
                        <div class="accordion-header d-flex justify-content-center">
                          <button class="btn bg-transparent btn-outline-dark text-dark text-capitalize fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#flush-one" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                              <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            filters
                          </button>
                        </div>
                        <div id="flush-one" class="accordion-collapse collapse">
                            <form action="" method="get">
                                <div class="d-flex">
                                    <select name="unit" class="form-control text-center justify-content-start" onchange="change_unit()">
                                        <?php if($unit_current != null): ?>
                                            <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->id == $unit_current): ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e(ucwords($item->name)); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e(ucwords($item->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="month" name="date" class="form-control justify-content-end" onchange="change_date()" 
                                    min="2000-01" value="<?php echo e(($date_current == null) ?'': $date_current); ?>">
                                    <input type="submit" id="submit" value="cari" class="d-none">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="mb-5 w-100">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-start text-capitalize">Unsur</th>
                            <th class="text-center text-capitalize">Mean</th>
                            <th class="text-center text-capitalize">Nilai Penimbang</th>
                            <th class="text-center text-capitalize">SKM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $report->respondents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                        <tr>
                            <td class="text-start text-capitalize"><?php echo e($item->questions_categorie->name); ?></td>
                            <td class="text-center text-capitalize"><?php echo e($item->rata_rata); ?></td>
                            <td class="text-center text-capitalize"><?php echo e($item->nilai_penimbang); ?></td>
                            <td class="text-center text-capitalize"><?php echo e($item->skm); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-6">
                <canvas class="w-100" id="ikm-mei-chart"></canvas>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"
        integrity="sha512-yadYcDSJyQExcKhjKSQOkBKy2BLDoW6WnnGXCAkCoRlpHGpYuVuBqGObf3g/TdB86sSbss1AOP4YlGSb6EKQPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctx = document.getElementById('ikm-mei-chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php $no_a = 0; ?>
                    <?php $__currentLoopData = $report_graphic['label']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo '"'.$item.'"'; ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    label: <?php echo '"'.$title.'"'; ?>,
                    data: [
                    <?php $no_a = 0; ?>
                    <?php $__currentLoopData = $report_graphic['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $item; ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    backgroundColor: [
                    <?php $no_a = 0; ?>
                    <?php $__currentLoopData = $report_graphic['bg_color']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo '"'.$item.'"'; ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/report/report.blade.php ENDPATH**/ ?>