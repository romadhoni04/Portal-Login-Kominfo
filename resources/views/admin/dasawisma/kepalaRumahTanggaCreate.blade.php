@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Kepala Rumah Tangga untuk Dasa Wisma: {{ $dawisName }}</h2>

    {{-- Menampilkan pesan error jika ada --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Menampilkan pesan sukses jika data berhasil disimpan --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Form untuk menambah Kepala Rumah Tangga --}}
    <form action="{{ route('admin.dasawisma.kepalaRumahTangga.store', ['dawisId' => $dawisId]) }}" method="POST">
        @csrf

        {{-- Input Nama Kepala Rumah Tangga --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kepala Rumah Tangga</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan Nama Kepala Rumah Tangga" required>
            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="{{ route('admin.dasawisma.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </form>
</div>
@endsection