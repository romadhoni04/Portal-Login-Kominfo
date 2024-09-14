@extends('superadmin.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard Dasa Wisma Kabupaten Jepara') }}</h1>

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

    <!-- Total Program Card Example 
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-lg h-100 py-2 bg-gradient-primary text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Program</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $widget['total_program'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Partisipasi Card Example 
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow-lg h-100 py-2 bg-gradient-success text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Partisipasi</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $widget['total_partisipasi'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Number of Users Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow-lg h-100 py-2 bg-gradient-info text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $widget['total_pengguna'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x"></i> <!-- Ikon pengguna untuk semua pengguna -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Number of Users Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-lg h-100 py-2 bg-gradient-primary text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah User</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $widget['total_users'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x"></i> <!-- Ikon pengguna untuk user -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Number of Administrators Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow-lg h-100 py-2 bg-gradient-warning text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Administrator</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $widget['total_admins'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-shield fa-2x"></i> <!-- Ikon pengguna dengan pelindung untuk administrator -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Number of Superadmins Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow-lg h-100 py-2 bg-gradient-danger text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Superadmin</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $widget['total_superadmin'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x"></i> <!-- Ikon pengguna dengan dasi untuk superadmin -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="row">

    <!-- Program Statistics -->
    <div class="col-lg-6 mb-4">

        <!-- Program Status Card -->
        <div class="card shadow-lg mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Status Program</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Pendidikan <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Kesehatan <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Ekonomi <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Lingkungan <span class="float-right">90%</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow-lg">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow-lg">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow-lg">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow-lg">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow-lg">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow-lg">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <!-- Dasa Wisma Overview -->
        <div class="card shadow-lg mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Overview Dasa Wisma</h6>
            </div>
            <div class="card-body">
                <p>Dasa Wisma Kabupaten Jepara adalah inisiatif luar biasa untuk meningkatkan kualitas hidup masyarakat di Kabupaten Jepara melalui berbagai program berbasis komunitas. Website ini dirancang dan dikembangkan oleh Diskominfo Jepara untuk menyediakan informasi terkini, pelacakan kemajuan program, dan memfasilitasi partisipasi aktif masyarakat.</p>
                <p>Jelajahi dashboard ini untuk mendapatkan wawasan mengenai aktivitas terbaru, kemajuan program, dan informasi penting lainnya. Kami berkomitmen untuk transparansi dan pemberdayaan komunitas, dan kami sangat menghargai dukungan Anda dalam mewujudkan visi bersama untuk Kabupaten Jepara yang lebih baik.</p>
                <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut →</a>
            </div>
        </div>

        <!-- Development Approach -->
        <div class="card shadow-lg mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Pendekatan Pengembangan</h6>
            </div>
            <div class="card-body">
                <p>Website ini memanfaatkan berbagai teknologi terbaru untuk memastikan kinerja dan keamanan yang optimal. Kami menggunakan Bootstrap 4 dan custom CSS untuk menciptakan antarmuka yang responsif dan mudah digunakan, serta memanfaatkan library dan framework terkini untuk memaksimalkan efisiensi dan efektivitas.</p>
                <p class="mb-0">Kami berkomitmen untuk terus mengembangkan dan memperbarui website ini sesuai dengan kebutuhan dan masukan dari komunitas, untuk memberikan pengalaman terbaik bagi semua pengguna.</p>
            </div>
        </div>

    </div>
</div>

@endsection