@extends('admin.admin')

@section('main-content')
<div class="container">
    <h2>Detail Data Keluarga: {{ $dataKeluarga->nama_kepala_keluarga }}</h2>

    <table class="table table-bordered">
        <tr>
            <th>Nomor KK</th>
            <td>{{ $dataKeluarga->no_kk }}</td>
        </tr>
        <tr>
            <th>Nama Kepala Keluarga</th>
            <td>{{ $dataKeluarga->nama_kepala_keluarga }}</td>
        </tr>
        <tr>
            <th>Kelurahan</th>
            <td>{{ $dataKeluarga->kelurahan->nama_kel }}</td>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <td>{{ $dataKeluarga->kecamatan->nama_kec }}</td>
        </tr>
        <tr>
            <th>Kabupaten</th>
            <td>{{ $dataKeluarga->kabupaten->nama_kab }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $dataKeluarga->provinsi->nama_prop }}</td>
        </tr>


        <tr>
            <th>Kepala Rumah Tangga</th>
            <td>{{ optional($dataKeluarga->kepalaRumahTangga)->nama ?? 'Tidak tersedia' }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.datakeluarga.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('admin.datakeluarga.edit', $dataKeluarga->no_kk) }}" class="btn btn-warning">Edit</a>
</div>
@endsection