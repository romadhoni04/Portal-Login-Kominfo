@extends('admin.admin')

@section('main-content')

<div class="container mt-5">

    <h2 class="mb-4">Edit Kepala Rumah Tangga untuk Dasa Wisma: {{ $dawisName }}</h2>

    {{-- Menampilkan pesan sukses jika data berhasil diperbarui --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Form untuk mengedit Kepala Rumah Tangga --}}
    <form action="{{ route('admin.kepalaRumahTangga.update', ['id' => $kepalaRumahTangga->id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Input Nama Kepala Rumah Tangga --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kepala Rumah Tangga</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $kepalaRumahTangga->nama) }}" placeholder="Masukkan Nama Kepala Rumah Tangga" required>
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.dasawisma.kepalaRumahTangga', ['dawisId' => $dawisId]) }}" class="btn btn-danger">Kembali</a> {{-- Gantilah dawis_id dengan dawisId --}}
        </div>
    </form>

</div>

@endsection