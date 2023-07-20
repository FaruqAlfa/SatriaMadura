@extends('Tambah.includeAdmin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <canvas id="lapBarangMasukChart"></canvas>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/chart.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var labels = @json($labels);
            var data = @json($data);

            var lapBarangMasukData = {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Barang Masuk',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: data,
                }]
            };

            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            var ctx = document.getElementById('lapBarangMasukChart').getContext('2d');
            new Chart(ctx, {
                type: 'line', // Ubah sesuai dengan jenis grafik yang Anda inginkan (line, bar, dll.)
                data: lapBarangMasukData,
                options: chartOptions
            });
        });
    </script>
@endsection