@extends('superadmin.admin')

@section('main-content')

<!-- Page Heading -->

<h1 class="h3 mb-4  card-title">{{ __('Dashboard Super Admin Dasa Wisma Kabupaten Jepara') }}</h1>

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
    <!-- Card jumlah pengguna -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-lg h-100 py-2 bg-gradient-primary text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold" id="total-pengguna">{{ $widget['total_pengguna'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card jumlah user -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow-lg h-100 py-2 bg-gradient-success text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah User</div>
                        <div class="h5 mb-0 font-weight-bold" id="total-users">{{ $widget['total_users'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card jumlah administrator -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow-lg h-100 py-2 bg-gradient-warning text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Administrator</div>
                        <div class="h5 mb-0 font-weight-bold" id="total-admins">{{ $widget['total_admins'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card jumlah superadmin -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow-lg h-100 py-2 bg-gradient-danger text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Superadmin</div>
                        <div class="h5 mb-0 font-weight-bold" id="total-superadmin">{{ $widget['total_superadmin'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                                <!--  <td>{{ $user->id }}</td> -->
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                            </tr>
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



<!-- <small class="text-muted">Menampilkan aktivitas penting atau perubahan status.</small> -->



<div class="row">
    <div class="col-xl-12 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Timeline Absensi</h5>
                <div class="timeline" id="absensiTimeline">
                    <!-- Absensi akan di-generate di sini -->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-7 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Statistik Tabel Pengguna</h5>
                <canvas id="userChart"></canvas>
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



<div class="row">
    <div class="col-xl-6 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Statistik Area Pengguna</h5>
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-6 mb-4">
        <div class="card shadow-lg h-100 py-2">
            <div class="card-body">
                <h5 class="card-title">Statistik Pengguna</h5>
                <canvas id="ChartBiasa"></canvas>
            </div>
        </div>

    </div>
</div>




<!-- 
// Custom chart
        const ctxCustom = document.getElementById('userChartCustom').getContext('2d');
        const userChartCustom = new Chart(ctxCustom, {
            type: 'line', // Contoh tipe grafik yang berbeda
            data: {
                labels: ['Total Pengguna', 'Jumlah User', 'Jumlah Administrator', 'Jumlah Superadmin'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        totalPengguna,
                        totalUsers,
                        totalAdmins,
                        totalSuperadmin
                    ],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
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
    -->

@endsection

@section('styles')
<style>
    .timeline {
        position: relative;
        padding: 20px 0;
        list-style-type: none;
    }

    .container {
        padding: 10px 20px;
        position: relative;
        margin: 10px 0;
        border-radius: 8px;
        transition: background-color 0.3s;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease-in-out;
    }

    .container.show {
        opacity: 1;
        transform: translateY(0);
    }

    .container:hover {
        background-color: #f0f0f0;
    }

    .left {
        left: 0;
    }

    .right {
        left: 50%;
    }

    .content {
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        position: relative;
        width: 45%;
    }

    .content h2 {
        margin: 0 0 10px;
        color: #007bff;
    }

    .content p {
        margin: 0;
        color: #333;
    }

    /* Garis Tengah */
    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        height: 100%;
        border-left: 4px dashed #007bff;
        top: 0;
        width: 0;
        z-index: 1;

    }

    .timeline .container .content {
        padding: 10px;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    /* Mengatur posisi kontainer */
    .container.left .content {
        margin-left: 10px;
    }

    .container.right .content {
        margin-right: 10px;
    }
</style>
<script>
    window.addEventListener('scroll', function() {
        const containers = document.querySelectorAll('.container');
        containers.forEach(container => {
            const containerTop = container.getBoundingClientRect().top;
            const screenPosition = window.innerHeight;
            if (containerTop < screenPosition) { // Hapus "script" yang tidak diperlukan
                container.classList.add('show');
            }
        });
    });
</script>

<script>
    const absensiData = [{
            date: '27 Agustus 2024',
            name: 'Anwar',
            reason: 'Sakit'
        },
        {
            date: '28 Agustus 2024',
            name: 'Anam',
            reason: 'Izin'
        },
        {
            date: '29 Agustus 2024',
            name: 'Anwar',
            reason: 'Tanpa Alasan'
        },
        {
            date: '2 September 2024',
            name: 'Anam',
            reason: 'Tanpa Alasan (Bangun Kesiangan)'
        },
        {
            date: '9 September 2024',
            name: 'Anam',
            reason: 'Izin Menyelesaikan KRS'
        },
        {
            date: '9 September 2024',
            name: 'Dony',
            reason: 'Izin Menyelesaikan KRS'
        },
        {
            date: '9 September 2024',
            name: 'Anwar',
            reason: 'Izin Menyelesaikan KRS'
        },
        {
            date: '10 September 2024',
            name: 'Anam',
            reason: 'Tanpa Alasan'
        },
        {
            date: '10 September 2024',
            name: 'Anam',
            reason: 'Tanpa Alasan'
        },
    ];

    const absensiTimeline = document.getElementById('absensiTimeline');
    absensiData.forEach((item, index) => {
        const container = document.createElement('div');
        container.className = index % 2 === 0 ? 'container left' : 'container right';

        const content = document.createElement('div');
        content.className = 'content';
        content.innerHTML = `<h2>${item.date}</h2><p>${item.name}: ${item.reason}</p>`;

        container.appendChild(content);
        absensiTimeline.appendChild(container);
    });
</script>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    const updateChart = () => {
        const totalPengguna = document.getElementById('total-pengguna').textContent;
        const totalUsers = document.getElementById('total-users').textContent;
        const totalAdmins = document.getElementById('total-admins').textContent;
        const totalSuperadmin = document.getElementById('total-superadmin').textContent;

        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Pengguna', 'Jumlah User', 'Jumlah Administrator', 'Jumlah Superadmin'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        totalPengguna,
                        totalUsers,
                        totalAdmins,
                        totalSuperadmin
                    ],
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
                labels: ['Total Pengguna', 'Jumlah User', 'Jumlah Administrator', 'Jumlah Superadmin'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        totalPengguna,
                        totalUsers,
                        totalAdmins,
                        totalSuperadmin
                    ],
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

        // Custom chart
        const ctxCustom2 = document.getElementById('ChartBiasa').getContext('2d');
        const ChartBiasa = new Chart(ctxCustom2, {
            type: 'line', // Contoh tipe grafik yang berbeda
            data: {
                labels: ['Total Pengguna', 'Jumlah User', 'Jumlah Administrator', 'Jumlah Superadmin'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        totalPengguna,
                        totalUsers,
                        totalAdmins,
                        totalSuperadmin
                    ],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
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

        // Area Chart
        // Update semua chart untuk mencakup lebih banyak opsi styling
        const ctxArea = document.getElementById('areaChart').getContext('2d');
        const areaChart = new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: ['Total Pengguna', 'Jumlah User', 'Jumlah Administrator', 'Jumlah Superadmin'],
                datasets: [{
                    label: 'Area Jumlah',
                    data: [totalPengguna, totalUsers, totalAdmins, totalSuperadmin],
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