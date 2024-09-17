<!-- resources/views/superadmin/portofolio/index.blade.php -->
@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Daftar Portofolio</h1>

    <a href="{{ route('superadmin.portofolio.create') }}" class="btn btn-primary mb-3">Tambah Portofolio</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Klien</th>
                <th>Tanggal Proyek</th>
                <th>URL Proyek</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $index => $portfolio)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $portfolio->title }}</td>
                <td>{{ $portfolio->description }}</td>
                <td>{{ $portfolio->category }}</td>
                <td>{{ $portfolio->client }}</td>
                <td>{{ $portfolio->project_date }}</td>
                <td><a href="{{ $portfolio->project_url }}" target="_blank">{{ $portfolio->project_url }}</a></td>
                <td>
                    @foreach($portfolio->images as $image)
                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="Image" style="width: 100px;">
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('superadmin.portofolio.edit', $portfolio->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('superadmin.portofolio.destroy', $portfolio->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection