@extends('superadmin.admin')

@section('main-content')
<div class="container mt-5">
    <h1>Tambah Layanan Baru</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('superadmin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Judul Layanan</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Deskripsi Layanan</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="catalog_pdf">Katalog PDF (opsional)</label>
            <input type="file" name="catalog_pdf" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="catalog_doc">Katalog DOC (opsional)</label>
            <input type="file" name="catalog_doc" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection