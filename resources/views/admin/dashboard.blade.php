@extends('admin.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 card-title">{{ __('Dashboard Administartor Dasa Wisma Kabupaten Jepara') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <!-- Card jumlah user -->
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-0 shadow-lg h-100 py-4 bg-gradient-primary text-white position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="row no-gutters align-items-center justify-content-between">
                    <div class="col-lg-8 col-md-8">
                        <div class="text-uppercase mb-1 font-weight-bold" style="font-size: 1.25rem;">Jumlah User</div>
                        <div class="h3 mb-0 font-weight-bold" id="total-users" style="font-size: 2rem;">{{ $widget['total_users'] }}</div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-right">
                        <i class="fas fa-user fa-3x"></i>
                    </div>
                </div>
            </div>
            <!-- Animated background gradient -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, rgba(0, 123, 255, 0.3), rgba(255, 255, 255, 0.1)); transform: scale(1.1); filter: blur(30px); z-index: 0;"></div>
        </div>
    </div>

    <style>
        .card {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            position: relative;
            z-index: 1;
        }

        .card i {
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.3s;
        }

        .card:hover i {
            color: rgba(255, 255, 255, 1);
        }
    </style>

</div>
<div class="row mt-4">
    <div class="col-xl-12 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Daftar Pengguna</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary text-white font-weight-bold">
                            <tr>
                                <th>NO</th>
                                <!--  <th>ID</th> -->
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Email</th>
                                <th>Peran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp <!-- Nomor urut dimulai dari 1 -->
                            @foreach($users as $user)
                            @if($user->role === 'user') <!-- Filter peran "user" -->
                            <tr>
                                <td>{{ $no++ }}</td> <!-- Nomor urut -->
                                <!--  <td>{{ $user->id }}</td> -->
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>

<style>
    .table th,
    .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .card {
        border-radius: 15px;
        /* Membuat sudut kartu melengkung */
    }

    .card-title {
        font-weight: bold;
        font-size: 1.5rem;
        color: #4a5568;
        /* Warna judul */
    }

    .table {
        border-radius: 10px;
        /* Membuat sudut tabel melengkung */
        overflow: hidden;
        /* Memastikan sudut tabel melengkung */
    }
</style>

<div class="row">
    <div class="col-xl-12 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Statistik Tabel Pengguna</h5>
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-7 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Statistik Area Pengguna</h5>
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-5 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Statistik Diagram Pengguna</h5>
                <canvas id="userChartCustom"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });

    const updateChart = () => {

        const totalUsers = document.getElementById('total-users').textContent;


        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jumlah User'],
                datasets: [{
                    label: 'Jumlah',
                    data: [totalUsers],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
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

        const ctxCustom = document.getElementById('userChartCustom').getContext('2d');
        const userChartCustom = new Chart(ctxCustom, {
            type: 'pie',
            data: {
                labels: ['Jumlah User'],
                datasets: [{
                    label: 'Jumlah',
                    data: [totalUsers],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        // Area Chart
        // Update semua chart untuk mencakup lebih banyak opsi styling
        const ctxArea = document.getElementById('areaChart').getContext('2d');
        const areaChart = new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: ['Jumlah User'],
                datasets: [{
                    label: 'Area Jumlah',
                    data: [totalUsers],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: true,
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(255, 159, 64, 1)',
                    pointBorderColor: 'rgba(255, 159, 64, 1)',
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: 'rgba(255, 159, 64, 1)',
                    pointHoverBorderColor: 'rgba(255, 159, 64, 1)',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    };

    document.addEventListener('DOMContentLoaded', updateChart);
</script>


@endsection