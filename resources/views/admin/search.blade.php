@extends('admin.admin')

@section('main-content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Pencarian Pengguna</h1>

    <form action="{{ route('admin.search') }}" method="GET" class="mb-4">
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

    @if(isset($users))
    <h2 class="mt-4">Hasil Pencarian</h2>

    <!-- Hasil Pencarian Pengguna -->
    @if($users->isNotEmpty())
    <h3>Pengguna</h3>
    <div class="list-group mb-4">
        @foreach($users as $user)
        @if($user->role === 'user')
        <!-- Tampilkan user biasa -->
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $user->name }} {{ $user->last_name }}</h5>
                <p class="mb-1 text-muted">{{ $user->email }}</p>
                <small class="text-muted">Role: {{ $user->role }}</small>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @elseif($user->role === 'administrator' && $user->id === auth()->user()->id)
        <!-- Tampilkan administrator yang sedang login -->
        <a href="{{ route('admin.profile', $user->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center animated-item">
            <div>
                <h5 class="mb-1">{{ $user->name }} {{ $user->last_name }}</h5>
                <p class="mb-1 text-muted">{{ $user->email }}</p>
                <small class="text-muted">Role: {{ $user->role }}</small>
            </div>
            <button class="btn btn-info btn-sm">Lihat Profil Saya</button>
        </a>
        @endif
        @endforeach
    </div>
    @endif

    @if($users->isEmpty())
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