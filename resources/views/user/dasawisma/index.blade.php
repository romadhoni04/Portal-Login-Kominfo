@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Data Dasa Wisma</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif
    @if (isset($dawisList) && $dawisList->isNotEmpty())
    <div class="alert alert-info text-center">
        Anda sudah memiliki data Dasa Wisma. Silakan <a href="{{ route('user.dasawisma.edit', $dawisList->first()->id) }}" class="alert-link">edit</a> jika ingin melakukan perubahan.
    </div>
</div>
@endif
@if ($dawisList->isNotEmpty()) {{-- Pastikan untuk memeriksa apakah ada data untuk ditampilkan --}}
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama Dasa Wisma</th>
            <th>RT</th>
            <th>RW</th>
            <th>Dusun</th>
            <th>Tahun</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dawisList as $item)
        <tr>
            <td>{{ $item->nama_dawis }}</td>
            <td>{{ $item->rt }}</td>
            <td>{{ $item->rw }}</td>
            <td>{{ $item->dusun }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->kel->nama_kel ?? 'Tidak ada' }}</td>
            <td>{{ $item->kec->nama_kec ?? 'Tidak ada' }}</td>
            <td>{{ $item->kab->nama_kab ?? 'Tidak ada' }}</td>
            <td>{{ $item->prop->nama_prop ?? 'Tidak ada' }}</td>
            <td>
                <a href="{{ route('user.dasawisma.show', $item->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('user.dasawisma.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('user.dasawisma.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Anda yakin ingin menghapus Dasa Wisma ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div class="mt-3">
    {{ $dawisList->links() }}
</div>
@else
<div class="alert alert-warning text-center">
    Anda belum memiliki data Dasa Wisma. <a href="{{ route('user.dasawisma.create') }}" class="alert-link">Buat sekarang</a>.
</div>

<div class="mt-4">
    <a href="{{ route('user.dasawisma.create') }}" class="btn btn-success">Tambah Dasa Wisma Baru</a>
</div>
@endif
</div>
</div>
</div>
<style>
    .table {
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .alert {
        margin-bottom: 20px;
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 1.25rem;
    }
</style>
@endsection