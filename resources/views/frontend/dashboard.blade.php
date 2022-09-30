@extends('layouts.app')

@section('content')

<section>
<link rel="preconnect" href="https://fonts.gstatic.com" />

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
/>
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
crossorigin="anonymous"
></script>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>  
<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-12">
          <h3 class="text-center w-100 my-4" style="font-weight: 700">
              Survei Kepuasan Masyarakat Satuan Lalulintas Polrestabes Semarang Maret 2021
          </h3>
          <hr class="mb-4 w-100" />
      </div>
  </div>
  <div class="row justify-content-center">
      <div class="col-12 col-md-6 table-responsive">
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Unsur</th>
                      <th>Mean</th>
                      <th>Nilai Penimbang</th>
                      <th>SKM</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Kesesuaian Persyaratan dengan Jenis Pelayanan</td>
                      <td>3.41</td>
                      <td>0.111</td>
                      <td>0.38</td>
                  </tr>
                  <tr>
                      <td>Kemudahan Prosedur Pelayanan</td>
                      <td>3.59</td>
                      <td>0.111</td>
                      <td>0.4</td>
                  </tr>
                  <tr>
                      <td>Kecepatan Pelayanan</td>
                      <td>3.53</td>
                      <td>0.111</td>
                      <td>0.39</td>
                  </tr>
                  <tr>
                      <td>Kewajaran Biaya/Tariff</td>
                      <td>3.06</td>
                      <td>0.111</td>
                      <td>0.34</td>
                  </tr>
                  <tr>
                      <td>Kesesuaian Standar Pelayanan</td>
                      <td>3.66</td>
                      <td>0.111</td>
                      <td>0.41</td>
                  </tr>
                  <tr>
                      <td>Kompetensi/Kemampuan Petugas</td>
                      <td>3.66</td>
                      <td>0.111</td>
                      <td>0.41</td>
                  </tr>
                  <tr>
                      <td>Kesopanan dan Keramahan Petugas</td>
                      <td>3.91</td>
                      <td>0.111</td>
                      <td>0.43</td>
                  </tr>
                  <tr>
                      <td>Kualitas Sarana dan Prasarana</td>
                      <td>3.78</td>
                      <td>0.111</td>
                      <td>0.42</td>
                  </tr>
                  <tr>
                      <td>Penanganan Pengaduan untuk Pengguna Pelayanan</td>
                      <td>3.84</td>
                      <td>0.111</td>
                      <td>0.43</td>
                  </tr>
              </tbody>
          </table>
      </div>
      <div class="col-12 col-md-6">
          <form >
            <div class="row form-group d-flex justify-content-end mb-3">
                <label for="date" class="col-sm-2 col-lg-1 col-form-label">Tanggal</label>
                <div class="col-sm-5 mx-sm-3 mx-lg-4">
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" />
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                 </div>
             </div>
          </form>
          <canvas class="w-100" id="ikm-mei-chart"></canvas>
          <table class="table table-responsive table-bordered w-100 mt-4">
              <thead>
                  <tr>
                      <th>Nilai</th>
                      <th>Mutu</th>
                      <th>Kinerja</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>90.25</td>
                      <td>A</td>
                      <td>Sangat Baik</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
</section>
<style>
body {
      font-family: "Quicksand", sans-serif;
  }
</style>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"
            integrity="sha512-yadYcDSJyQExcKhjKSQOkBKy2BLDoW6WnnGXCAkCoRlpHGpYuVuBqGObf3g/TdB86sSbss1AOP4YlGSb6EKQPg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script type="text/javascript">
          $(function () {
              $("#datepicker").datepicker();
          });
        </script>
        <script>
            var ctx = document.getElementById("ikm-mei-chart").getContext("2d");
            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: [
                        "Kesesuaian P.",
                        "Kemudahan Prosedur P.",
                        "Kecepatan P.",
                        "Kewajaran Biaya",
                        "Kesesuaian Standar",
                        "Kompetensi Petugas",
                        "Kesopanan dan Keramahan",
                        "Kualisan S&P",
                        "Penanganan Pengaduan",
                    ],
                    datasets: [
                        {
                            label: "Indeks Kepuasan Masyarakat",
                            data: [3.41, 3.59, 3.53, 3.06, 3.66, 3.66, 3.91, 3.78, 3.84],
                            backgroundColor: [
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(255, 206, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                            ],
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        </script>
@endsection