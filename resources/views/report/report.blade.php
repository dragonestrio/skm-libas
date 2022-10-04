@extends('layouts.template')
@section('app')

<main>
  {{-- @include('partials.sidebar.custom') --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ url('reports') }}" class="text-decoration-none text-dark">
                    <h3 class="text-center text-capitalize w-100 my-4" style="font-weight: 700;">
                        Survei Kepuasan Masyarakat Satuan Lalulintas Polrestabes Semarang {{ $report->selected_date }}
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
                                        @if ($unit_current != null)
                                            @foreach ($unit as $item)
                                                @if ($item->id == $unit_current)
                                                <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                        @foreach ($unit as $item)
                                        <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="month" name="date" class="form-control justify-content-end" onchange="change_date()" 
                                    min="2000-01" value="{{ ($date_current == null) ?'': $date_current }}">
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
                        @foreach ($report->respondents as $item)                            
                        <tr>
                            <td class="text-start text-capitalize">{{ $item->questions_categorie->name }}</td>
                            <td class="text-center text-capitalize">{{ $item->rata_rata }}</td>
                            <td class="text-center text-capitalize">{{ $item->nilai_penimbang }}</td>
                            <td class="text-center text-capitalize">{{ $item->skm }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-6">
                <canvas class="w-100" id="ikm-mei-chart"></canvas>
                <table class="table table-responsive table-bordered w-100 mt-4">
                    <thead>
                        <tr>
                            <th class="text-center text-capitalize">Nilai</th>
                            <th class="text-center text-capitalize">Mutu</th>
                            <th class="text-center text-capitalize">Kinerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center text-capitalize">{{ $report->total_nilai }}</td>
                            <td class="text-center text-capitalize">A</td>
                            <td class="text-center text-capitalize">Sangat Baik</td>
                        </tr>
                    </tbody>
                </table>
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
                    @foreach ($report_graphic['label'] as $item)
                        {!! '"'.$item.'"' !!},
                    @endforeach
                ],
                datasets: [{
                    label: {!! '"'.$title.'"' !!},
                    data: [
                    <?php $no_a = 0; ?>
                    @foreach ($report_graphic['data'] as $item)
                        {!! $item !!},
                    @endforeach
                    ],
                    backgroundColor: [
                    <?php $no_a = 0; ?>
                    @foreach ($report_graphic['bg_color'] as $item)
                        {!! '"'.$item.'"' !!},
                    @endforeach
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

@endsection