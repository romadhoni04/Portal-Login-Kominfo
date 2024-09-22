@extends('superadmin.admin')

@section('main-content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar About</h1>
        <a href="{{ route('superadmin.about.create') }}" class="btn btn-primary">Tambah About</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abouts as $about)
                <tr>
                    <td><img src="{{ asset('images/' . $about->image) }}" alt="Gambar About" class="img-fluid" style="max-width: 100px;"></td>
                    <td>{{ $about->title }}</td>
                    <td>{{ Str::limit($about->content, 50) }}</td>
                    <td>
                        <a href="{{ route('superadmin.about.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('superadmin.about.destroy', $about->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection