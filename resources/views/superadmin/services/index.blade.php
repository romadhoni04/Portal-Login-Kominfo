@extends('superadmin.admin')

@section('main-content')
<div class="container mt-5">
    <h1>Daftar Layanan</h1>
    <a href="{{ route('superadmin.services.create') }}" class="btn btn-primary mb-3">Tambah Layanan</a>

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
                <th>Gambar</th>
                <th>Katalog PDF</th>
                <th>Katalog DOC</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->title }}</td>
                <td>{{ Str::limit($service->description, 50) }}</td>
                <td>
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" width="100" alt="{{ $service->title }}">
                    @else
                    <span>No Image</span>
                    @endif
                </td>
                <td>
                    @if($service->catalog_pdf)
                    <a href="{{ asset('storage/' . $service->catalog_pdf) }}" class="btn btn-info btn-sm" target="_blank">Lihat PDF</a>
                    @else
                    <span>--</span>
                    @endif
                </td>
                <td>
                    @if($service->catalog_doc)
                    <a href="{{ asset('storage/' . $service->catalog_doc) }}" class="btn btn-info btn-sm" target="_blank">Lihat DOC</a>
                    @else
                    <span>--</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('superadmin.services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('superadmin.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
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