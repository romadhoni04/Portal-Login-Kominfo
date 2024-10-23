@extends('admin.admin')

@section('main-content')

<div class="container" style="margin-left: 10px;">
    <h1>Data Dasa Wisma</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif



    <!-- Form pencarian -->
    <form action="{{ route('admin.dasawisma.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Dasa Wisma..." value="{{ request()->get('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>
    <!-- Cek jika ada data secara keseluruhan -->
    @if ($dasawisma->isEmpty() && !request()->has('search'))
    <div class="alert alert-warning text-center">
        Tidak ada data Dasa Wisma. <a href="{{ route('admin.dasawisma.create') }}" class="alert-link">Buat sekarang</a>.
    </div>
    @endif
    <!-- Tombol "Tambah Dasa Wisma Baru" hanya muncul jika tidak ada pencarian -->
    @if (!request()->has('search'))
    <div class="mt-4">
        <a href="{{ route('admin.dasawisma.create') }}" class="btn btn-success">Tambah Dasa Wisma Baru</a>
    </div>
    <div class="mt-2">
        <a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>
    @endif


    <br>
    <!-- Cek jika tidak ada hasil pencarian -->
    <!-- Cek jika tidak ada hasil pencarian -->
    @if ($dasawisma->isEmpty() && request()->has('search'))
    <div class="alert alert-warning">
        Tidak ada data yang sesuai dengan pencarian atau filter yang dipilih.
    </div>
    <!-- Tambahkan tombol kembali jika pencarian tidak menghasilkan data -->
    <div class="mt-3">
        <a href="{{ route('admin.dasawisma.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    @endif

    <!-- Tampilkan tabel jika ada data -->
    @if ($dasawisma->isNotEmpty())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th style="width: 200px; white-space: nowrap;">Nama Dasa Wisma</th>
                <th>RT</th>
                <th>RW</th>
                <th>Dusun</th>
                <th>Tahun</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dasawisma as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_dawis }}</td>
                <td>{{ $item->rt }}</td>
                <td>{{ $item->rw }}</td>
                <td>{{ $item->dusun }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->nama_prop }}</td>
                <td>{{ $item->nama_kab }}</td>
                <td>{{ $item->nama_kec }}</td>
                <td>{{ $item->nama_kel }}</td>



                <td>
                    <div class="btn-group" style="display: flex; justify-content: center; align-items: center; gap: 5px;">
                        <a href="{{ route('admin.dasawisma.kepalaRumahTangga', $item->id) }}" class="btn btn-primary">KRT</a>
                        <a href="{{ route('admin.dasawisma.show', $item->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('admin.dasawisma.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.dasawisma.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus Dasa Wisma ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    @endif

</div>
<!-- Bootstrap 5 JavaScript CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93FUTfN7uZeWkh5f6vPuqG8tj1wC1rPZQx40L+qOFRp1lH3FIBczuWwZ5yJvN" crossorigin="anonymous"></script>
<!-- Popper.js (required for Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<!--
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
-->

<style>
    .table {
        width: 100%;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        border: 1px solid #eaeaea;
        margin-top: 10px;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-overflow: ellipsis;
        text-align: center;
        padding: auto;
        /* Padding yang lebih kecil */
        font-size: 1rem;
        /* Ukuran font yang lebih kecil */
        position: relative;
    }

    .table th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-transform: uppercase;
        /* Huruf kapital untuk header */

    }

    .btn-group .btn {
        font-size: 1rem;
        /* Ukuran font tombol yang lebih kecil */
    }

    .table tbody tr {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .table td {
        border-top: 1px solid #eaeaea;
    }

    .table td:last-child {
        border-right: none;
    }

    .alert {
        margin-bottom: 20px;
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 1.25rem;
    }

    .btn-info,
    .btn-warning,
    .btn-danger {
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-info:hover {
        background-color: #0056b3;
        transform: translateY(-1px);
    }

    .btn-warning:hover {
        background-color: #b05e00;
        transform: translateY(-1px);
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-1px);
    }
</style>

@endsection