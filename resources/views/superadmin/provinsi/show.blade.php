@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1 class="my-4">Detail Provinsi</h1>

    <!-- Menampilkan detail provinsi -->
    <div class="card">
        <div class="card-header">
            Provinsi: {{ $prop->nama_prop }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Nomor Provinsi: {{ $prop->no_prop }}</h5>
            <p class="card-text">Nama Provinsi: {{ $prop->nama_prop }}</p>
        </div>
    </div>

    <a href="{{ route('superadmin.provinsi.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection