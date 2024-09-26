@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1 class="my-4">Edit Provinsi</h1>

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

    <!-- Form edit provinsi -->
    <form action="{{ route('superadmin.provinsi.update', $prop->no_prop) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="no_prop">Nomor Provinsi</label>
            <input type="number" name="no_prop" id="no_prop" class="form-control" value="{{ old('no_prop', $prop->no_prop) }}" required>
        </div>

        <div class="form-group">
            <label for="nama_prop">Nama Provinsi</label>
            <input type="text" name="nama_prop" id="nama_prop" class="form-control" value="{{ old('nama_prop', $prop->nama_prop) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('superadmin.provinsi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection