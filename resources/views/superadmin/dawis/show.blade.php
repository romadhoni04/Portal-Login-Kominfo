@extends('superadmin.admin')

@section('main-content')

<div class="container">
    <h1>Detail Dawis</h1>

    <table class="table table-bordered">
        <tr>
            <th>Nama Dawis</th>
            <td>{{ $dawis->nama_dawis }}</td>
        </tr>
        <tr>
            <th>RT</th>
            <td>{{ $dawis->rt ?? '-' }}</td>
        </tr>
        <tr>
            <th>RW</th>
            <td>{{ $dawis->rw ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dusun</th>
            <td>{{ $dawis->dusun ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kelurahan</th>
            <td>{{ $dawis->kel->nama_kel ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <td>{{ $dawis->kec->nama_kec ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kabupaten</th>
            <td>{{ $dawis->kab->nama_kab ?? '-' }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $dawis->prop->nama_prop ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td>{{ $dawis->tahun }}</td>
        </tr>
    </table>

    <a href="{{ route('superadmin.dawis.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection