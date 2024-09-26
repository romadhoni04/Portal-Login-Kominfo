@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Detail Kabupaten</h1>

    <p><strong>Nama Kabupaten:</strong> {{ $kab->nama_kab }}</p>
    <p><strong>Provinsi:</strong> {{ $kab->provinsi->nama_prop }}</p>

    <a href="{{ route('superadmin.kabupaten.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection