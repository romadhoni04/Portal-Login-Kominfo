@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Daftar Kelurahan</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('superadmin.kelurahan.create') }}" class="btn btn-primary mb-3">Tambah Kelurahan</a>


    <form method="GET" action="{{ route('superadmin.kelurahan.index') }}">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Cari kecamatan" value="{{ request()->get('search') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @if ($kelurahan->isEmpty())
    <p>Tidak ada data kelurahan.</p>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelurahan as $kel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kel->nama_kel }}</td>
                <td>{{ $kel->kecamatan->nama_kec }}</td>
                <td>{{ $kel->kabupaten->nama_kab }}</td>
                <td>{{ $kel->provinsi->nama_prop }}</td>
                <td>
                    <a href="{{ route('superadmin.kelurahan.show', $kel->no_kel) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('superadmin.kelurahan.edit', $kel->no_kel) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('superadmin.kelurahan.destroy', $kel->no_kel) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kelurahan->links() }}
    @endif
</div>
@endsection