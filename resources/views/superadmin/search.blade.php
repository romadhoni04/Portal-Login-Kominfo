@extends('superadmin.admin')

@section('main-content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Pencarian Pengguna</h1>

    <form action="{{ route('superadmin.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Masukkan nama atau email..." required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>


    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(isset($users) || isset($blogs) || isset($services) || isset($about) || isset($clients) || isset($portofolios))
    <h2 class="mt-4">Hasil Pencarian</h2>

    <!-- Hasil Pencarian Pengguna -->
    @if($users->isNotEmpty())
    <h3>Pengguna</h3>
    <div class="list-group mb-4">
        @foreach($users as $user)
        <a href="{{ $user->role === 'superadmin' ? route('superadmin.profile', $user->id) : ($user->role === 'administrator' ? route('superadmin.admins.index') : route('superadmin.users.index')) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $user->name }} {{ $user->last_name }}</h5>
                <p class="mb-1 text-muted">{{ $user->email }}</p>
                <small class="text-muted">Role: {{ $user->role }}</small>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>


    @endif

    <!-- Hasil Pencarian Blog -->
    @if($blogs->isNotEmpty())
    <h3>Blog</h3>
    <div class="list-group mb-4">
        @foreach($blogs as $blog)
        <a href="{{ route('blog.show', $blog->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item" target="_blank">
            <div>
                <h5 class="mb-1">{{ $blog->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    <!-- Untuk superadmin.blog -->
    <h3>Blog (Superadmin)</h3>
    <div class="list-group mb-4">
        @foreach($blogs as $blog)
        <a href="{{ route('superadmin.blog.index', $blog->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $blog->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>
    @endif

    <!-- Hasil Pencarian Layanan -->
    @if($services->isNotEmpty())
    <h3>Layanan</h3>
    <div class="list-group mb-4">
        @foreach($services as $service)
        <a href="{{ route('services-details', $service->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item" target="_blank">
            <div>
                <h5 class="mb-1">{{ $service->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    <!-- Untuk superadmin.services.index -->
    <h3>Layanan (Superadmin)</h3>
    <div class="list-group mb-4">
        @foreach($services as $service)
        <a href="{{ route('superadmin.services.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $service->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    @endif

    <!-- Hasil Pencarian Tentang -->
    @if($about->isNotEmpty())
    <h3>Tentang</h3>
    <div class="list-group mb-4">
        @foreach($about as $item)
        <a href="{{ route('about', $item->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item" target="_blank">
            <div>
                <h5 class="mb-1">{{ $item->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    <!-- Untuk superadmin.about -->
    <h3>Tentang (Superadmin)</h3>
    <div class="list-group mb-4">
        @foreach($about as $item)
        <a href="{{ route('superadmin.about.index', $item->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $item->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    @endif

    <!-- Hasil Pencarian Klien -->
    @if($clients->isNotEmpty())
    <h3>Klien</h3>
    <div class="list-group mb-4">
        @foreach($clients as $client)
        <a href="{{ route('about', $client->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item" target="_blank">
            <div>
                <h5 class="mb-1">{{ $client->name }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    <!-- Untuk superadmin.client -->
    <h3>Klien (Superadmin)</h3>
    <div class="list-group mb-4">
        @foreach($clients as $client)
        <a href="{{ route('superadmin.clients.index', $client->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $client->name }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    @endif

    <!-- Hasil Pencarian Portofolio -->
    @if($portofolios->isNotEmpty())
    <h3>Portofolio</h3>
    <div class="list-group mb-4">
        @foreach($portofolios as $portofolio)
        <a href="{{ route('portfolio.show', $portofolio->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item" target="_blank">
            <div>
                <h5 class="mb-1">{{ $portofolio->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    <!-- Untuk superadmin.portfolios -->
    <h3>Portofolio (Superadmin)</h3>
    <div class="list-group mb-4">
        @foreach($portofolios as $portofolio)
        <a href="{{ route('superadmin.portofolio.index', $portofolio->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $portofolio->title }}</h5>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>

    @endif

    @if($users->isEmpty() && $blogs->isEmpty() && $services->isEmpty() && $about->isEmpty() && $clients->isEmpty() && $portofolios->isEmpty())
    <div class="alert alert-warning">Tidak ada hasil ditemukan.</div>
    @endif
    @endif
</div>

<style>
    .animated-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .animated-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
</style>

@endsection