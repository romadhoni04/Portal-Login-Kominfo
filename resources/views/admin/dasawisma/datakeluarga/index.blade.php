@extends('admin.admin')

@section('main-content')
<div class="container">
    <h2>Daftar Data Keluarga</h2>

    <!-- Tombol untuk menambah data baru -->
    <a href="{{ route('admin.datakeluarga.create') }}" class="btn btn-primary mb-3">Tambah Data Keluarga</a>

    <!-- Tabel untuk menampilkan data keluarga -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No KK</th>
                <th>Nama Kepala Keluarga</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataKeluarga as $keluarga)
            <tr>
                <td>{{ $keluarga->no_kk }}</td>
                <td>{{ $keluarga->nama_kepala_keluarga }}</td>
                <td>{{ optional($keluarga->kelurahan)->nama_kel ?? 'N/A' }}</td>
                <td>{{ optional($keluarga->kecamatan)->nama_kec ?? 'N/A' }}</td>
                <td>{{ optional($keluarga->kabupaten)->nama_kab ?? 'N/A' }}</td>
                <td>{{ optional($keluarga->provinsi)->nama_prop ?? 'N/A' }}</td>
                <td>
                    <!-- Tombol Aksi -->

                    <a href="{{ route('data_penduduk.index') }}" class="btn btn-info btn-sm">Lihat Data Penduduk</a>
                    <a href="{{ route('admin.datakeluarga.show', $keluarga->no_kk) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin.datakeluarga.edit', $keluarga->no_kk) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.datakeluarga.destroy', $keluarga->no_kk) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data keluarga yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $dataKeluarga->links() }}
    </div>
</div>
@endsection