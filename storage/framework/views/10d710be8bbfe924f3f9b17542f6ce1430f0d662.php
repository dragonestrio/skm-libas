



<script src="<?php echo e(url('assets/js/core/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/core/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/plugins/smooth-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/plugins/chartjs.min.js')); ?>"></script>


<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(url('assets/js/argon-dashboard.min.js?v=2.0.4')); ?>"></script>
 


<script>
  let unit = null;
  let date = null;

  function change_unit() {
    unit = true;

    check_params();
  }

  function change_date() {
    date = true;

    check_params();
  }

  function check_params() {
    if (unit == true && date == true) {
      document.getElementById('submit').click();
    }
  }
</script>

<script>
   var win = navigator.platform.indexOf('Win') > -1;
   if (win && document.querySelector('#sidenav-scrollbar')) {
     var options = {
       damping: '0.5'
     }
     Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
   }
</script>
<?php if(isset($report_graphics)): ?>
<script>
  var ctx2 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke2.addColorStop(0, 'rgba(94, 114, 228, 0)');
  new Chart(ctx2, {
    type: "line",
    data: {
      labels: [
        <?php $__currentLoopData = array_reverse($report_graphics->gender->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo '"'.ucwords($item).'"'; ?>,
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ],
      datasets: [
        <?php $__currentLoopData = $report_graphics->gender->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
          {
          label: <?php echo '"'.ucwords($key).'"'; ?>,
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: <?php echo '"'.$report_graphics->gender->color->$key.'"'; ?>,
          backgroundColor: gradientStroke2,
          borderWidth: 3,
          fill: true,
          data: [
            <?php $__currentLoopData = array_reverse($report_graphics->gender->data->$key); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo $item; ?>,
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ],
          maxBarThickness: 6
          },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<script>
  var ctx2 = document.getElementById("education").getContext("2d");

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke2.addColorStop(0, 'rgba(94, 114, 228, 0)');
  new Chart(ctx2, {
    type: "bar",
    data: {
      labels: [
        <?php $__currentLoopData = $report_graphics->education->label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo '"'.ucwords($item).'"'; ?>,
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ],
      datasets: [
        {
          label: '',
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          <?php if(count($report_graphics->education->color) > 0): ?>
          borderColor: <?php echo '"'.$report_graphics->education->color[array_rand($report_graphics->education->color)].'"'; ?>,
          <?php else: ?>
          borderColor: 'black',
          <?php endif; ?>
          backgroundColor: gradientStroke2,
          borderWidth: 3,
          fill: true,
          data: [
            <?php $__currentLoopData = $report_graphics->education->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
            <?php echo $report_graphics->education->data[$key]; ?>,
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ],
          maxBarThickness: 6
          },
    ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<?php endif; ?>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script><?php /**PATH /Users/satrionugroho/Sites/localhost/skm_libas/resources/views/layouts/js.blade.php ENDPATH**/ ?>