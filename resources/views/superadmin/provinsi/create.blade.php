@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1 class="my-4">Tambah Provinsi</h1>

    <!-- Menampilkan error validasi -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form tambah provinsi -->
    <form action="{{ route('superadmin.provinsi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_prop">Nomor Provinsi</label>
            <input type="number" name="no_prop" id="no_prop" class="form-control" value="{{ old('no_prop') }}" required>
        </div>

        <div class="form-group">
            <label for="nama_prop">Nama Provinsi</label>
            <input type="text" name="nama_prop" id="nama_prop" class="form-control" value="{{ old('nama_prop') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('superadmin.provinsi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection