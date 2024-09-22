<!-- resources/views/superadmin/portofolio/create.blade.php -->
@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Portofolio</h1>

    <form action="{{ route('superadmin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan judul portofolio">
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Masukkan deskripsi">{{ old('description') }}</textarea>
            @error('description')
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
            <input type="file" name="images[]" class="form-control" id="images" multiple>
            @error('images.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <small class="form-text text-muted">Anda dapat mengunggah beberapa gambar (max 2MB per gambar).</small>
        </div>
        <script>
            document.getElementById('imageUpload').addEventListener('change', function(event) {
                const preview = document.getElementById('imagePreview');
                preview.innerHTML = ''; // Hapus preview sebelumnya
                const files = event.target.files;

                for (const file of files) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.margin = '5px';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
        <button type="reset" class="btn btn-secondary">Reset</button>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection