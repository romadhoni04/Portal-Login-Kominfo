@extends('superadmin.admin')

@section('main-content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Pencarian Pengguna</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" id="search" name="search" placeholder="Masukkan nama atau email..." required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- Menampilkan Notifikasi -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- Menampilkan Hasil Pencarian -->
    @if(isset($results))
    <h2 class="mt-4">Hasil Pencarian</h2>
    @if($results->isEmpty())
    <div class="alert alert-warning">Tidak ada hasil ditemukan.</div>
    @else
    <div class="list-group">
        @foreach($results as $user)
        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">{{ $user->name }}</h5>
                <p class="mb-1 text-muted">{{ $user->email }}</p>
            </div>
            <button class="btn btn-info btn-sm">Lihat Detail</button>
        </a>
        @endforeach
    </div>
    @endif
    @endif
</div>
@endsection