@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Detail Kepala Rumah Tangga</h1>

    <div class="card">
        <div class="card-header">
            Data Kepala Rumah Tangga
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $kepalaRumahTangga->nama }}</p>
            <p><strong>Dasa Wisma:</strong> {{ $kepalaRumahTangga->dawis->nama_dawis }}</p>
        </div>
    </div>

    <a href="{{ route('admin.kepala_rumah_tangga.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
</div>
@endsection