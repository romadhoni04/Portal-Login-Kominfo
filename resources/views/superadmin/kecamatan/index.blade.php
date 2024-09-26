@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Daftar Kecamatan</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="GET" action="{{ route('superadmin.kecamatan.index') }}">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Cari kecamatan" value="{{ request()->get('search') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <a href="{{ route('superadmin.kecamatan.create') }}" class="btn btn-success my-3">Tambah Kecamatan</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kecamatan as $index => $kec)
            <tr>
                <td>{{ $index + 1 + ($kecamatan->currentPage() - 1) * $kecamatan->perPage() }}</td>
                <td>{{ $kec->nama_kec }}</td>
                <td>{{ $kec->kabupaten->nama_kab }}</td>
                <td>{{ $kec->provinsi->nama_prop }}</td>
                <td>
                    <a href="{{ route('superadmin.kecamatan.show', $kec->no_kec) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('superadmin.kecamatan.edit', $kec->no_kec) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('superadmin.kecamatan.destroy', $kec->no_kec) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kecamatan->links() }} <!-- Pagination links -->
</div>
@endsection