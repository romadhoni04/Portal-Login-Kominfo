@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Detail Data Dasa Wisma: {{ $dawis->nama_dawis }}</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Field</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Nama Dasa Wisma</th>
                <td>{{ $dawis->nama_dawis }}</td>
            </tr>
            <tr>
                <th>RT</th>
                <td>{{ $dawis->rt }}</td>
            </tr>
            <tr>
                <th>RW</th>
                <td>{{ $dawis->rw }}</td>
            </tr>
            <tr>
                <th>Dusun</th>
                <td>{{ $dawis->dusun }}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td>{{ $dawis->provinsi->nama_prop }}</td>
            </tr>
            <tr>
                <th>Kabupaten</th>
                <td>{{ $dawis->kabupaten->nama_kab }}</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>{{ $dawis->kecamatan->nama_kec }}</td>
            </tr>
            <tr>
                <th>Kelurahan</th>
                <td>{{ $dawis->kelurahan->nama_kel }}</td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td>{{ $dawis->tahun }}</td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('admin.dasawisma.edit', $dawis->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('admin.dasawisma.destroy', $dawis->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus Dasa Wisma ini?');">Hapus</button>
        </form>
    </div>

    <div class="mt-2">
        <a href="{{ route('admin.dasawisma.index') }}" class="btn btn-secondary">Kembali ke Daftar Dasa Wisma</a>
    </div>
</div>
@endsection