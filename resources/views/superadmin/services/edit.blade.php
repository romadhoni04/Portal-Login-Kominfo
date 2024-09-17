@extends('superadmin.admin')

@section('main-content')
<div class="container mt-5">
    <h1>Edit Layanan</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('superadmin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Judul Layanan</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Deskripsi Layanan</label>
            <textarea name="description" class="form-control" rows="5" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
            @if($service->image)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $service->image) }}" width="100" class="img-thumbnail">
                <p>Gambar saat ini</p>
            </div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="catalog_pdf">Katalog PDF (opsional)</label>
            <input type="file" name="catalog_pdf" class="form-control">
            @if($service->catalog_pdf)
            <div class="mt-3">
                <a href="{{ asset('storage/' . $service->catalog_pdf) }}" class="btn btn-info btn-sm" target="_blank">Lihat PDF</a>
                <p>PDF saat ini</p>
            </div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="catalog_doc">Katalog DOC (opsional)</label>
            <input type="file" name="catalog_doc" class="form-control">
            @if($service->catalog_doc)
            <div class="mt-3">
                <a href="{{ asset('storage/' . $service->catalog_doc) }}" class="btn btn-info btn-sm" target="_blank">Lihat DOC</a>
                <p>DOC saat ini</p>
            </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection