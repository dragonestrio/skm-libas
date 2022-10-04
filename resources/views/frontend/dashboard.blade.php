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
      <div class="col-12" id="title">

          <hr class="mb-4 w-100" />
      </div>
  </div>
  <div class="row justify-content-center">
      <div class="col-12 col-md-6 table-responsive">
          <div class="mx-sm-3 mx-lg-4 mb-2" id="select-option">
              <p>Unit Fokus</p>
            <select class="form-select" aria-label="Default select example" id="select"></select>
            </select>
          </div>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Unsur</th>
                      <th>Mean</th>
                      <th>Nilai Penimbang</th>
                      <th>SKM</th>
                  </tr>
              </thead>
              <tbody id="total_survey">
                  {{-- <tr>
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
                  </tr> --}}
              </tbody>
          </table>
      </div>
      <div class="col-12 col-md-6">
          <form >
            <div class="row form-group d-flex justify-content-end mb-3">
                <label for="date" class="col-sm-2 col-lg-1 col-form-label">Tanggal</label>
                <div class="col-sm-5 col-lg-4 mx-sm-3 mx-lg-4">
                    <div class="input-group date" id="datepicker">
                        <input onchange="getDateValue()" id="date" type="text" class="form-control" />
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                 </div>
             </div>
          </form>
          <div id="wrap-chart">
              <canvas class="w-100" id="ikm-mei-chart"></canvas>
          </div>
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

  .select {
    padding: 9px;
    /* margin-top: 10rem; */
    border: none;
    background: #545c62;
    color: white;
    border-radius: 7px;
}

#select-option p {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
}

.form-select {
    width: auto;
}
</style>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"
            integrity="sha512-yadYcDSJyQExcKhjKSQOkBKy2BLDoW6WnnGXCAkCoRlpHGpYuVuBqGObf3g/TdB86sSbss1AOP4YlGSb6EKQPg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script>
            const title = document.querySelector('#title')
            const datatable = document.querySelector('#total_survey')
            const ListchartName = document.querySelector('#ikm-mei-chart')
            const ListUnits = document.querySelector('#select')
            const currentMonth = new Date().getMonth() + 1
            const currentYear = new Date().getFullYear()
            let filterDate = `${currentMonth}-${currentYear}`
            let unitId = 1

            $(function () {
              $("#datepicker").datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months"
              });
            });

            const getlist = () => {
                let link = `https://admin.skm.pcctabessmg.xyz/api/respondent/result/1/${filterDate}`
                fetch((link))
                .then((response) => {
                    return response.json();
                }).then((responseJson) => {
                    getunit()
                    showListTitle(responseJson.data.selected_date);
                    getGraphic(responseJson.data.list_cart_name, responseJson.data.list_cart_value)
                    showListTable(responseJson.data.respondents);
                }).catch((err) => {
                    console.error(err);
                });
            }

            const getunit = () => {
                const linkUnits = `https://admin.skm.pcctabessmg.xyz/api/unit`
                fetch((linkUnits))
                .then((response) => {
                    return response.json();
                }).then((responseJson) => {
                    showSelectOption(responseJson.data)
                }).catch((err) => {
                    console.error(err);
                });
            }


            const showSelectOption = SelectOption => {
                let sel = document.querySelector('#select');
                SelectOption.forEach((unit)=>{
                let opt = document.createElement('option');
                opt.value=unit.id;
                let name=document.createTextNode(unit.name);
                opt.appendChild(name);
                sel.appendChild(opt);
                });
            }
  

            const showListTitle = Calendar => {
                title.innerHTML = "";
                title.innerHTML += `
                <h3 class="text-center w-100 my-4" style="font-weight: 700">
                    Survei Kepuasan Masyarakat Polrestabes Semarang ${Calendar}
                </h3>
                `
                };

            const showListTable = ListTab => {
                datatable.innerHTML = "";
                ListTab.forEach(item => {
                    datatable.innerHTML += `
                    <tr>
                        <td>${item.category.name}</td>
                        <td>${item.rata_rata}</td>
                        <td>0.111</td>
                        <td>${item.ikm}</td>
                    </tr>
                    `
                });
            }

            const getGraphic = (labels, datasets) => {
                $("canvas#ikm-mei-chart").remove();
                $("#wrap-chart").append('<canvas class="w-100" id="ikm-mei-chart"></canvas>');
                var ctx = document.getElementById("ikm-mei-chart").getContext("2d");

                new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: "Indeks Kepuasan Masyarakat",
                                    data: datasets,
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

            }

            const getDateValue = (value) => {
                filterDate = $("#date").val()

                getlist()
            }

            document.addEventListener("DOMContentLoaded", () => {
                getlist()
                    
            });
        </script>
@endsection
