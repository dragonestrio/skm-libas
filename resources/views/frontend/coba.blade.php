@extends('frontend.layouts.app')

@section('content')

<section>
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link
  href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&display=swap"
/>
  {{-- <div class="btn-group">
    <form >
        <label class="btn-radio">
            <input type="radio" name="radio" checked />
            <span>HTML</span>
        </label>
        <label class="btn-radio">
            <input type="radio" name="radio" />
            <span>CSS</span>
        </label>
        <label class="btn-radio">
            <input type="radio" name="radio" />
            <span>Javascript</span>
        </label>
    </form>
</div>
  <div class="btn-group">
    <form >
        <label class="btn-radio">
            <input type="radio" name="radio" checked />
            <span>HTML</span>
        </label>
        <label class="btn-radio">
            <input type="radio" name="radio" />
            <span>CSS</span>
        </label>
        <label class="btn-radio">
            <input type="radio" name="radio" />
            <span>Javascript</span>
        </label>
    </form>
</div> --}}

<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-12">
          <h3 class="text-center w-100 my-4" style="font-weight: 700">
              Survei Kepuasan Masyarakat Satuan Lalulintas Polrestabes Semarang Maret 2021
          </h3>
          <hr class="mb-5 w-100" />
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
/* 
.btn-group > form {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column

}
.btn-radio {
  flex: inline-block;
  cursor: pointer;
  font-weight: 500;
  position: relative;
  overflow: hidden;
  margin-bottom: 0.375em;
}
.btn-radio input {
  position: absolute;
  left: -9999px;
}
.btn-radio input:checked + span {
  background-color: #d6d6e5;
}
.btn-radio input:checked + span:before {
  box-shadow: inset 0 0 0 0.4375em #00005c;
}
.btn-radio span {
  display: flex;
  align-items: center;
  padding: 0.375em 0.75em 0.375em 0.375em;
  border-radius: 99em;
  transition: 0.25s ease;
}
.btn-radio span:hover {
  background-color: #d6d6e5;
}
.btn-radio span:before {
  display: inline-block;
  flex-shrink: 0;
  content: "";
  background-color: #fff;
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  margin-right: 0.375em;
  transition: 0.25s ease;
  box-shadow: inset 0 0 0 0.125em #00005c;
} */

  /* .btn-group {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    
  } */

</style>
<script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"
            integrity="sha512-yadYcDSJyQExcKhjKSQOkBKy2BLDoW6WnnGXCAkCoRlpHGpYuVuBqGObf3g/TdB86sSbss1AOP4YlGSb6EKQPg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
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