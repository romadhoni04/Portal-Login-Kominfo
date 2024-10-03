@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Detail Data Penduduk</h1>
    <table class="table">
        <tr>
            <th>No KK</th>
            <td>{{ $penduduk->no_kk }}</td>
        </tr>
        <tr>
            <th>No KTP</th>
            <td>{{ $penduduk->no_ktp }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $penduduk->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $penduduk->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>SHDK</th>
            <td>{{ $penduduk->shdk->nama }}</td>
        </tr>
        <tr>
            <th>Status Perkawinan</th>
            <td>{{ $penduduk->statusKawin->nama }}</td>
        </tr>
        <tr>
            <th>Pendidikan</th>
            <td>{{ $penduduk->pendidikan->nama }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $penduduk->pekerjaan->nama }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $penduduk->keterangan }}</td>
        </tr>
    </table>
    <a href="{{ route('data_penduduk.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection