@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Kepala Rumah Tangga</h2>

    {{-- Menampilkan pesan sukses jika ada --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Menampilkan informasi Kepala Rumah Tangga --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Informasi Kepala Rumah Tangga</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">Nama: {{ $kepalaRumahTangga->nama }}</h6>
            <p class="card-text"><strong>Dasa Wisma:</strong> {{ $dawisName }}</p>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="mt-4">
        <a href="{{ route('admin.dasawisma.kepalaRumahTanggaEdit', $kepalaRumahTangga->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('admin.dasawisma.kepalaRumahTangga.destroy', $kepalaRumahTangga->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus Kepala Rumah Tangga ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <a href="{{ route('admin.dasawisma.kepalaRumahTangga', ['dawisId' => $dawisId]) }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
</div>
@endsection