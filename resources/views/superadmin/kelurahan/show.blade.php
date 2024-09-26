@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Detail Kelurahan: {{ $kelurahan->nama_kel }}</h1>

    <div class="card mb-3">
        <div class="card-header">
            Informasi Kelurahan
        </div>
        <div class="card-body">
            <p><strong>Nomor Kelurahan:</strong> {{ $kelurahan->no_kel }}</p>
            <p><strong>Nama Kelurahan:</strong> {{ $kelurahan->nama_kel }}</p>
            <p><strong>Kecamatan:</strong> {{ $kelurahan->kecamatan->nama_kec }}</p>
            <p><strong>Kabupaten:</strong> {{ $kelurahan->kabupaten->nama_kab }}</p>
            <p><strong>Provinsi:</strong> {{ $kelurahan->provinsi->nama_prop }}</p>
        </div>
    </div>

    <a href="{{ route('superadmin.kelurahan.index') }}" class="btn btn-secondary">Kembali ke Daftar Kelurahan</a>
    <a href="{{ route('superadmin.kelurahan.edit', $kelurahan->no_kel) }}" class="btn btn-warning">Edit Kelurahan</a>

    <form action="{{ route('superadmin.kelurahan.destroy', $kelurahan->no_kel) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelurahan ini?')">Hapus Kelurahan</button>
    </form>
</div>
@endsection