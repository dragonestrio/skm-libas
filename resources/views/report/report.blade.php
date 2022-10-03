@extends('layouts.template')
@section('app')

<main>
  {{-- @include('partials.sidebar.custom') --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="text-center text-capitalize w-100 my-4" style="font-weight: 700;">
                    Survei Kepuasan Masyarakat Satuan Lalulintas Polrestabes Semarang {{ $report->selected_date }}
                </h3>
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