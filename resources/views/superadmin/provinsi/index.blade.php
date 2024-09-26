@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1 class="my-4">Daftar Provinsi</h1>

    <!-- Flash message untuk sukses -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form pencarian -->
    <form action="{{ route('superadmin.provinsi.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama Provinsi..." value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <!-- Tombol tambah provinsi -->
    <a href="{{ route('superadmin.provinsi.create') }}" class="btn btn-success mb-3">Tambah Provinsi</a>

    <!-- Tabel daftar provinsi -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($provinsi as $prop)
            <tr>
                <td>{{ $prop->no_prop }}</td>
                <td>{{ $prop->nama_prop }}</td>
                <td>
                    <a href="{{ route('superadmin.provinsi.show', $prop->no_prop) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('superadmin.provinsi.edit', $prop->no_prop) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('superadmin.provinsi.destroy', $prop->no_prop) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus provinsi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data provinsi</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $provinsi->appends(['search' => request()->get('search')])->links() }}
</div>
@endsection