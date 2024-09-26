@extends('superadmin.admin')

@section('main-content')

<div class="container">
    <h1>Daftar Dawis</h1>

    <!-- Pencarian -->
    <form action="{{ route('superadmin.dawis.index') }}" method="GET" class="form-inline mb-4">
        <input type="text" name="search" class="form-control mr-2" placeholder="Cari nama Dawis..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="{{ route('superadmin.dawis.index') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>

    <!-- Tambah Dawis -->
    <a href="{{ route('superadmin.dawis.create') }}" class="btn btn-success mb-3">Tambah Dawis</a>

    <!-- Tabel Data Dawis -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Dawis</th>
                <th>RT</th>
                <th>RW</th>
                <th>Dusun</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dawis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_dawis }}</td>
                <td>{{ $item->rt ?? '-' }}</td>
                <td>{{ $item->rw ?? '-' }}</td>
                <td>{{ $item->dusun ?? '-' }}</td>
                <td>{{ $item->kec->nama_kec ?? '-' }}</td>
                <td>{{ $item->kab->nama_kab ?? '-' }}</td>
                <td>{{ $item->prop->nama_prop ?? '-' }}</td>
                <td>{{ $item->tahun }}</td>
                <td>
                    <a href="{{ route('superadmin.dasawisma.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('superadmin.dasawisma.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('superadmin.dasawisma.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10">Tidak ada data Dawis.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $dawis->links() }}
</div>
@endsection