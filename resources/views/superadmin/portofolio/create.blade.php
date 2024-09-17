<!-- resources/views/superadmin/portofolio/create.blade.php -->
@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Portofolio</h1>

    <form action="{{ route('superadmin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" class="form-control" name="category" value="{{ old('category') }}">
            @error('category')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="client">Klien</label>
            <input type="text" class="form-control" name="client" value="{{ old('client') }}">
            @error('client')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_date">Tanggal Proyek</label>
            <input type="date" class="form-control" name="project_date" value="{{ old('project_date') }}">
            @error('project_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_url">URL Proyek</label>
            <input type="url" class="form-control" name="project_url" value="{{ old('project_url') }}">
            @error('project_url')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="images">Gambar Proyek</label>
            <input type="file" class="form-control" name="images[]" multiple>
            @error('images.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection