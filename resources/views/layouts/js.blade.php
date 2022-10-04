{{-- Bootstrap core JS --}}
{{-- <script src="{{ url('assets/plugin/bootstrap-5.1.1-dist/js/bootstrap.min.js') }}"></script> --}}

{{-- Core JS Files --}}
<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/plugins/chartjs.min.js') }}"></script>

{{-- Github buttons --}}
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
 
{{-- Custom JS --}}
{{-- <script src="{{ url('assets/js/main.js') }}"></script> --}}
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
@if (isset($report_graphics))
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
        @foreach (array_reverse($report_graphics->gender->label) as $item)
          {!! '"'.ucwords($item).'"' !!},
        @endforeach
      ],
      datasets: [
        @foreach ($report_graphics->gender->data as $key => $value )  
          {
          label: {!! '"'.ucwords($key).'"' !!},
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: {!! '"'.$report_graphics->gender->color->$key.'"' !!},
          backgroundColor: gradientStroke2,
          borderWidth: 3,
          fill: true,
          data: [
            @foreach (array_reverse($report_graphics->gender->data->$key) as $item)
              {!! $item !!},
            @endforeach
          ],
          maxBarThickness: 6
          },
        @endforeach
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
        @foreach ($report_graphics->education->label as $item)
          {!! '"'.ucwords($item).'"' !!},
        @endforeach
      ],
      datasets: [
        {
          label: '',
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          @if (count($report_graphics->education->color) > 0)
          borderColor: {!! '"'.$report_graphics->education->color[array_rand($report_graphics->education->color)].'"' !!},
          @else
          borderColor: 'black',
          @endif
          backgroundColor: gradientStroke2,
          borderWidth: 3,
          fill: true,
          data: [
            @foreach ($report_graphics->education->data as $key => $value )  
            {!! $report_graphics->education->data[$key] !!},
            @endforeach
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
@endif

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>