@extends('admin.admin')

@section('main-content')

<div class="container mt-5">

    <h2 class="mb-4">Daftar Kepala Rumah Tangga untuk Dasa Wisma: {{ $dawisName }}</h2>

    {{-- Menampilkan pesan sukses jika ada --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Tombol untuk menambahkan Kepala Rumah Tangga baru --}}
    <div class="mb-3">
        <a href="{{ route('admin.dasawisma.kepalaRumahTanggaCreate', $dawisId) }}" class="btn btn-primary">Tambah Kepala Rumah Tangga</a>
    </div>

    {{-- Tabel Daftar Kepala Rumah Tangga --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kepala Rumah Tangga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kepalaRumahTanggaList as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <a href="{{ route('admin.datakeluarga.index') }}" class="btn btn-primary">Data Keluarga</a>

                    <a href="{{ route('admin.dasawisma.kepalaRumahTanggaShow', ['dawisId' => $dawisId, 'id' => $item->id]) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('admin.dasawisma.kepalaRumahTanggaEdit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.dasawisma.kepalaRumahTangga.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada Kepala Rumah Tangga yang terdaftar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $kepalaRumahTanggaList->links() }} <!-- Untuk pagination -->

</div>

@endsection