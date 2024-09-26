@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Provinsi</h1>

    <form method="POST" action="{{ route('provinsi.store') }}">
        @csrf
        <div class="form-group">
            <label for="no_prop">Nomor Provinsi</label>
            <input type="text" name="no_prop" class="form-control" required>
            @error('no_prop')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama_prop">Nama Provinsi</label>
            <input type="text" name="nama_prop" class="form-control" required>
            @error('nama_prop')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection