@extends('admin.admin')

@section('main-content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Data Akumulasi</h2>

    <!-- Filter untuk memilih kecamatan, kelurahan, atau keduanya -->
    <form action="{{ route('admin.datakeluargaakumulasi.index') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="filter">Pilih Tampilan:</label>
            <select name="filter" id="filter" class="form-control" onchange="this.form.submit()">
                <option value="" {{ request('filter') === '' ? 'selected' : '' }}>Kecamatan dan Kelurahan</option>
                <option value="kecamatan" {{ request('filter') === 'kecamatan' ? 'selected' : '' }}>Kecamatan Saja</option>
                <option value="kelurahan" {{ request('filter') === 'kelurahan' ? 'selected' : '' }}>Kelurahan Saja</option>
            </select>
        </div>
    </form>

    <div class="d-flex justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered table-sm text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        @if($filter !== 'kelurahan')
                        <th>Kecamatan</th>
                        @endif
                        @if($filter !== 'kecamatan')
                        <th>Kelurahan</th>
                        @endif
                        <th>Total Balita</th>
                        <th>Total PUS</th>
                        <th>Total WUS</th>
                        <th>Total Tiga Buta</th>
                        <th>Total Ibu Hamil</th>
                        <th>Total Ibu Menyusui</th>
                        <th>Total Lansia</th>
                        <th>Total Makanan Pokok</th>
                        <th>Total Jumlah Keluarga</th>
                        <th>Total Jumlah Keluarga (Jumlah)</th>
                        <th>Total Sumber Air Keluarga</th>
                        <th>Total Tempat Sampah Keluarga</th>
                        <th>Total Saluran Air Limbah</th>
                        <th>Total Stiker P4K</th>
                        <th>Total Kriteria Rumah</th>
                        <th>Total Aktivitas UP2K</th>
                        <th>Total Aktivitas Usaha Kesehatan Lingkungan</th>
                        <th>Total Memiliki Tabungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataAkumulasi as $data)
                    <tr>
                        @if($filter !== 'kelurahan')
                        <td>{{ $data->nama_kecamatan }}</td>
                        @endif
                        @if($filter !== 'kecamatan')
                        <td>{{ $data->nama_kelurahan }}</td>
                        @endif
                        <td>{{ $data->total_balita }}</td>
                        <td>{{ $data->total_pus }}</td>
                        <td>{{ $data->total_wus }}</td>
                        <td>{{ $data->total_tiga_buta }}</td>
                        <td>{{ $data->total_ibu_hamil }}</td>
                        <td>{{ $data->total_ibu_menyusui }}</td>
                        <td>{{ $data->total_lansia }}</td>
                        <td>{{ $data->total_makanan_pokok }}</td>
                        <td>{{ $data->total_jumlah_keluarga }}</td>
                        <td>{{ $data->total_jumlah_keluarga_jumlah }}</td>
                        <td>{{ $data->total_sumber_air_keluarga }}</td>
                        <td>{{ $data->total_tempat_sampah_keluarga }}</td>
                        <td>{{ $data->total_saluran_air_limbah }}</td>
                        <td>{{ $data->total_stiker_p4k }}</td>
                        <td>{{ $data->total_kriteria_rumah }}</td>
                        <td>{{ $data->total_aktivitas_up2k }}</td>
                        <td>{{ $data->total_aktivitas_usaha_kesehatan_lingkungan }}</td>
                        <td>{{ $data->total_memiliki_tabungan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <canvas id="myChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        th,
        td {
            white-space: nowrap;
            /* Pastikan teks tidak terpotong */
        }

        .table-responsive {
            overflow-x: auto;
            /* Menambahkan scrollbar horizontal jika tabel terlalu lebar */
        }
    </style>

    <script>
        var labels = JSON.parse('{!! json_encode($mappedData) !!}');
        var totalBalita = JSON.parse('{!! json_encode($totalBalita) !!}');
        var totalPUS = JSON.parse('{!! json_encode($totalPUS) !!}');
        var totalWUS = JSON.parse('{!! json_encode($totalWUS) !!}');
        var totalTigaButa = JSON.parse('{!! json_encode($totalTigaButa) !!}');
        var totalIbuHamil = JSON.parse('{!! json_encode($totalIbuHamil) !!}');
        var totalIbuMenyusui = JSON.parse('{!! json_encode($totalIbuMenyusui) !!}');
        var totalLansia = JSON.parse('{!! json_encode($totalLansia) !!}');
        var totalMakananPokok = JSON.parse('{!! json_encode($totalMakananPokok) !!}');
        var totalJumlahKeluarga = JSON.parse('{!! json_encode($totalJumlahKeluarga) !!}');
        var totalJumlahKeluargaJumlah = JSON.parse('{!! json_encode($totalJumlahKeluargaJumlah) !!}');
        var totalSumberAirKeluarga = JSON.parse('{!! json_encode($totalSumberAirKeluarga) !!}');
        var totalTempatSampahKeluarga = JSON.parse('{!! json_encode($totalTempatSampahKeluarga) !!}');
        var totalSaluranAirLimbah = JSON.parse('{!! json_encode($totalSaluranAirLimbah) !!}');
        var totalStikerP4K = JSON.parse('{!! json_encode($totalStikerP4K) !!}');
        var totalKriteriaRumah = JSON.parse('{!! json_encode($totalKriteriaRumah) !!}');
        var totalAktivitasUP2K = JSON.parse('{!! json_encode($totalAktivitasUP2K) !!}');
        var totalAktivitasUsahaKesehatanLingkungan = JSON.parse('{!! json_encode($totalAktivitasUsahaKesehatanLingkungan) !!}');
        var totalMemilikiTabungan = JSON.parse('{!! json_encode($totalMemilikiTabungan) !!}');

        // Contoh menggunakan Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Total Balita',
                        data: totalBalita,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total PUS',
                        data: totalPUS,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total WUS',
                        data: totalWUS,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Tiga Buta',
                        data: totalTigaButa,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Ibu Hamil',
                        data: totalIbuHamil,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Ibu Menyusui',
                        data: totalIbuMenyusui,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Lansia',
                        data: totalLansia,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Makanan Pokok',
                        data: totalMakananPokok,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Jumlah Keluarga',
                        data: totalJumlahKeluarga,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Jumlah Keluarga (Jumlah)',
                        data: totalJumlahKeluargaJumlah,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Sumber Air Keluarga',
                        data: totalSumberAirKeluarga,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Tempat Sampah Keluarga',
                        data: totalTempatSampahKeluarga,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Saluran Air Limbah',
                        data: totalSaluranAirLimbah,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Stiker P4K',
                        data: totalStikerP4K,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Kriteria Rumah',
                        data: totalKriteriaRumah,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Aktivitas UP2K',
                        data: totalAktivitasUP2K,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Aktivitas Usaha Kesehatan Lingkungan',
                        data: totalAktivitasUsahaKesehatanLingkungan,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Memiliki Tabungan',
                        data: totalMemilikiTabungan,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }
                ]
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
</div>
@endsection