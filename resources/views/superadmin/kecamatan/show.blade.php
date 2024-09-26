@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Detail Kecamatan</h1>

    <table class="table">
        <tr>
            <th>Nama Kecamatan</th>
            <td>{{ $kecamatan->nama_kec }}</td>
        </tr>
        <tr>
            <th>Kabupaten</th>
            <td>{{ $kecamatan->kabupaten->nama_kab }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $kecamatan->provinsi->nama_prop }}</td>
        </tr>
        <tr>
            <th>Kelurahan</th>
            <td>
                <ul>
                    @foreach ($kecamatan->kelurahan as $kel)
                    <li>{{ $kel->nama_kel }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>

    <a href="{{ route('superadmin.kecamatan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection