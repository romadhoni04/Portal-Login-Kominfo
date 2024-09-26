@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1 class="my-3">Daftar Kabupaten</h1>

    <!-- Flash message untuk sukses -->
    <!-- 
    <form method="GET" action="">
        <input type="text" name="search" placeholder="" value="{{ request()->get('search') }}">
        <button type="submit">Cari</button>
    </form>
-->
    <!-- Form pencarian -->
    <form action="{{ route('superadmin.kabupaten.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Kabupaten..." value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('superadmin.kabupaten.create') }}" class="btn btn-primary mb-3">Tambah Kabupaten</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kabupaten</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kabupaten as $kab)
            <tr>
                <td>{{ $kab->no_kab }}</td>
                <td>{{ $kab->nama_kab }}</td>
                <td>{{ $kab->provinsi->nama_prop }}</td>
                <td>
                    <a href="{{ route('superadmin.kabupaten.show', $kab->no_kab) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('superadmin.kabupaten.edit', $kab->no_kab) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('superadmin.kabupaten.destroy', $kab->no_kab) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kabupaten->appends(['search' => request()->get('search')])->links() }}
    {{ $kabupaten->links() }}
</div>
@endsection