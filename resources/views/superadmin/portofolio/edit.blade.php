@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Portofolio</h1>

    <form action="{{ route('superadmin.portofolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $portfolio->title) }}">
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category', $portfolio->category) }}">
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description">{{ old('description', $portfolio->description) }}</textarea>
            @error('description')
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
            <label for="images" class="form-label">Gambar Proyek</label>
            <input type="file" name="images[]" class="form-control" id="images" multiple>
            <div>
                @foreach($portfolio->images as $image)
                <div style="display: inline-block; margin: 5px;">
                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="Image" style="width: 100px;">
                    <div>
                        <label>
                            <input type="checkbox" name="remove_images[]" value="{{ $image->id }}"> Hapus gambar ini
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            @error('images.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <small class="form-text text-muted">Anda dapat mengunggah beberapa gambar (max 2MB per gambar).</small>
        </div>

        <script>
            document.querySelector('form').addEventListener('submit', function(e) {
                if (!confirm('Apakah Anda yakin ingin memperbarui portofolio ini?')) {
                    e.preventDefault();
                }
            });
        </script>
        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection