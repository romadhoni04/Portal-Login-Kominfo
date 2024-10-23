@extends('admin.admin')

@section('main-content')
<div class="container mt-4">
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <h1 class="text-center mb-4">Daftar Kepala Rumah Tangga</h1>

        <!-- Menampilkan nama Dasa Wisma -->
        <h3>Dasa Wisma: <strong>{{ $dawisName }}</strong></h3>

        <!-- Tombol Tambah Kepala Rumah Tangga -->
        <div class="d-flex justify-content-start my-3">
            <a href="{{ route('admin.dasawisma.kepalaRumahTanggaCreate', $dawisId) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Kepala Rumah Tangga
            </a>
        </div>

        <!-- Alert Sukses -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Tabel Kepala Rumah Tangga -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Kepala Rumah Tangga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kepalaRumahTanggaList as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Nomor Urut -->
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">
                            <!-- Tombol Aksi -->
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.datakeluarga.index', ['dawis_id' => $dawisId, 'kepala_rumah_tangga_id' => $item->id]) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-users"></i> Data Keluarga
                                </a>
                                <a href="{{ route('admin.dasawisma.kepalaRumahTanggaShow', ['dawisId' => $dawisId, 'id' => $item->id]) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('admin.dasawisma.kepalaRumahTanggaEdit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.dasawisma.kepalaRumahTangga.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada Kepala Rumah Tangga yang terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination dan Tombol Kembali -->
        <div class="card-footer text-center">
            <a href="{{ route('admin.dasawisma.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            {{ $kepalaRumahTanggaList->links() }}
        </div>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    th,
    td {
        white-space: nowrap;
        /* Pastikan teks tidak terpotong */
    }

    .table-responsive {
        overflow-x: auto;
        /* Menambahkan scrollbar horizontal jika tabel terlalu lebar */
    }
</style>

@endsection