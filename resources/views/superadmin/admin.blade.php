<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login Portal Dasa Wisma Kominfo Jepara">
    <meta name="author" content="Diskominfo Jepara">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Tambahkan ini di bagian <head> di layout Anda -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                <div class="sidebar-brand-icon">
                    <img src="https://sippn.menpan.go.id/images/article/large/logo-jepara-11.png" alt="Logo" style="max-height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">
                    @if(auth()->user()->hasRole('superadmin'))
                    Superadmin <sup>Dasa Wisma</sup>
                    @elseif(auth()->user()->hasRole('administrator'))
                    Administrator <sup>Dasa Wisma</sup>
                    @elseif(auth()->user()->hasRole('user'))
                    User <br><sup>Dasa Wisma</sup>
                    @endif
                </div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Nav::isRoute('superadmin.dashboard') }}">
                <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>
            <!-- Divider -->

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Management Halaman Utama') }}
            </div>
            <!-- Nav Item - User & Admin Management -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManagement"
                    aria-expanded="true" aria-controls="collapseManagement">
                    <i class="fas fa-fw fa-cogs"></i> <!-- Ikon yang lebih relevan untuk manajemen -->
                    <span>Management Index</span>
                </a>
                <div id="collapseManagement" class="collapse" aria-labelledby="headingManagement" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Sections:</h6>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.blog.index') }}" href="{{ route('superadmin.blog.index') }}">
                            <i class="fas fa-fw fa-blog"></i> Manage Blogs <!-- Ikon blog -->
                        </a>

                        <a class="collapse-item {{ Nav::isRoute('superadmin.services.index') }}" href="{{ route('superadmin.services.index') }}">
                            <i class="fas fa-fw fa-concierge-bell"></i> Manage Layanan <!-- Ikon layanan -->
                        </a>

                        <a class="collapse-item {{ Nav::isRoute('superadmin.portofolio.index') }}" href="{{ route('superadmin.portofolio.index') }}">
                            <i class="fas fa-fw fa-briefcase"></i> Manage Portfolios <!-- Ikon portofolio -->
                        </a>

                        <a class="collapse-item {{ Nav::isRoute('superadmin.about.index') }}" href="{{ route('superadmin.about.index') }}">
                            <i class="fas fa-fw fa-info-circle"></i> Manage Tentang <!-- Ikon about -->
                        </a>

                        <a class="collapse-item {{ Nav::isRoute('superadmin.clients.index') }}" href="{{ route('superadmin.clients.index') }}">
                            <i class="fas fa-fw fa-building"></i> Manage Client <!-- Ikon about -->
                        </a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Management User -->
            <!-- Heading -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                {{ __('Management Dasa Wisma') }}
            </div>

            <!-- Nav Item - Management Dasa Wisma -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDasaWisma"
                    aria-expanded="false" aria-controls="collapseDasaWisma">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Management Dasa Wisma</span>
                </a>
                <div id="collapseDasaWisma" class="collapse" aria-labelledby="headingDasaWisma" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Dasa Wisma:</h6>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.provinsi.index') }}" href="{{ route('superadmin.provinsi.index') }}">
                            <i class="fas fa-fw fa-map-signs"></i> Manage Provinsi
                        </a>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.kabupaten.index') }}" href="{{ route('superadmin.kabupaten.index') }}">
                            <i class="fas fa-fw fa-map"></i> Manage Kabupaten
                        </a>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.kecamatan.index') }}" href="{{ route('superadmin.kecamatan.index') }}">
                            <i class="fas fa-fw fa-map-marker-alt"></i> Manage Kecamatan
                        </a>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.kelurahan.index') }}" href="{{ route('superadmin.kelurahan.index') }}">
                            <i class="fas fa-fw fa-home"></i> Manage Kelurahan
                        </a>
                    </div>
                </div>
            </li>





            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('User & Admin Setting') }}
            </div>

            <!-- Nav Item - User & Admin Management -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserAdmin"
                    aria-expanded="false" aria-controls="collapseUserAdmin">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Management User & Admin </span>
                </a>
                <div id="collapseUserAdmin" class="collapse" aria-labelledby="headingUserAdmin" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Roles:</h6>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.admins.index') }}" href="{{ route('superadmin.admins.index') }}">
                            <i class="fas fa-fw fa-user-shield"></i> Administrator
                        </a>
                        <a class="collapse-item {{ Nav::isRoute('superadmin.users.index') }}" href="{{ route('superadmin.users.index') }}">
                            <i class="fas fa-fw fa-user"></i> User
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Account Management') }}
            </div>

            <!-- Nav Item - Profile -->
            <li class="nav-item {{ Nav::isRoute('superadmin.profile') }}">
                <a class="nav-link" href="{{ route('superadmin.profile') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{ __('Profile') }}</span>
                </a>
            </li>
            <li class="nav-item {{ Nav::isRoute('superadmin.dawis.index') }}">
                <a class="nav-link" href="{{ route('superadmin.dawis.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>{{ __('Dawis') }}</span>
                </a>
            </li>


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('superadmin.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search" action="{{ route('superadmin.search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->fullName }}<br>
                                    <small class="font-weight-bold text-center" style="display: block;">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </small> <!-- Display the role -->
                                </span>
                                @if (Auth::user()->profile_photo)
                                <img class="img-profile rounded-circle" src="{{ asset('storage/profile_photos/' . Auth::user()->profile_photo) }}" alt="Profile Photo">
                                @else
                                <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('superadmin.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('superadmin.settings') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Settings') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('superadmin.activitylog') }}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Activity Log') }}
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('main-content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://github.com/Romadhoni04" target="_blank">Kominfo Jepara</a> {{ now()->year }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('Select "Logout" below if you are ready to end your current session.') }}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Memanggil jQuery sekali -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Pastikan Bootstrap ditambahkan setelah jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @yield('scripts')
    @yield('styles')

</body>

</html>