<!-- resources/views/superadmin/portofolio/edit.blade.php -->
@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Portofolio</h1>

    <form action="{{ route('superadmin.portofolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $portfolio->title) }}">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description">{{ old('description', $portfolio->description) }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" class="form-control" name="category" value="{{ old('category', $portfolio->category) }}">
            @error('category')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="client">Klien</label>
            <input type="text" class="form-control" name="client" value="{{ old('client', $portfolio->client) }}">
            @error('client')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_date">Tanggal Proyek</label>
            <input type="date" class="form-control" name="project_date" value="{{ old('project_date', $portfolio->project_date) }}">
            @error('project_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_url">URL Proyek</label>
            <input type="url" class="form-control" name="project_url" value="{{ old('project_url', $portfolio->project_url) }}">
            @error('project_url')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="images">Gambar Proyek</label>
            <input type="file" class="form-control" name="images[]" multiple>
            @foreach($portfolio->images as $image)
            <img src="{{ asset('storage/' . $image->image_url) }}" alt="Image" style="width: 100px;">
            @endforeach
            @error('images.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection