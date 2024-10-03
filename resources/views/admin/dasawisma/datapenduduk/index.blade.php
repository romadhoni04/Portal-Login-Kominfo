@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Data Penduduk</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('data_penduduk.create') }}" class="btn btn-primary mb-3">Tambah Data Penduduk</a>
    <table class="table">
        <thead>
            <tr>
                <th>No KK</th>
                <th>No KTP</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPenduduk as $penduduk)
            <tr>
                <td>{{ $penduduk->no_kk }}</td>
                <td>{{ $penduduk->no_ktp }}</td>
                <td>{{ $penduduk->nama_lengkap }}</td>
                <td>{{ $penduduk->jenis_kelamin }}</td>
                <td>{{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('data_penduduk.edit', $penduduk->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('data_penduduk.show', $penduduk->id) }}" class="btn btn-info">Show</a>
                    <form action="{{ route('data_penduduk.destroy', $penduduk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dataPenduduk->links() }}
</div>
@endsection