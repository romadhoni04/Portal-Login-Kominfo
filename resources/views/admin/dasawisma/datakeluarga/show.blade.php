@extends('admin.admin')

@section('main-content')
<h1>Detail Data Keluarga</h1>

<table class="table table-bordered">
    <!-- No KK -->
    <tr>
        <th>No KK</th>
        <td>{{ $dataKeluarga->no_kk }}</td>
    </tr>

    <!-- Nama Kepala Keluarga -->
    <tr>
        <th>Nama Kepala Keluarga</th>
        <td>{{ $dataKeluarga->nama_kepala_keluarga }}</td>
    </tr>

    <!-- Dawis -->
    <tr>
        <th>Dawis</th>
        <td>{{ $dataKeluarga->dawis_id ?? 'Tidak ada data' }}</td>
    </tr>

    <!-- Kelurahan -->
    <tr>
        <th>Kelurahan</th>
        <td>{{ $dataKeluarga->nama_kel ?? 'Tidak ada data' }}</td>
    </tr>

    <!-- Kecamatan -->
    <tr>
        <th>Kecamatan</th>
        <td>{{ $dataKeluarga->nama_kec ?? 'Tidak ada data' }}</td>
    </tr>

    <!-- Kabupaten -->
    <tr>
        <th>Kabupaten</th>
        <td>{{ $dataKeluarga->nama_kab ?? 'Tidak ada data' }}</td>
    </tr>

    <!-- Provinsi -->
    <tr>
        <th>Provinsi</th>
        <td>{{ $dataKeluarga->nama_prop ?? 'Tidak ada data' }}</td>
    </tr>

    <!-- Kepala Rumah Tangga -->
    <tr>
        <th>Kepala Rumah Tangga</th>
        <td>{{ $dataKeluarga->nama_kepala_rumah_tangga ?? 'Tidak ada data' }}</td>
    </tr>
</table>

<!-- Tombol Kembali -->
<a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>

<!-- Tombol Edit dan Hapus -->
<a href="{{ route('data-keluarga.edit', [$dataKeluarga->no_kk, $dataKeluarga->dawis_id, $dataKeluarga->kepala_rumah_tangga_id ?? 0]) }}" class="btn btn-warning">Edit</a>

<form action="{{ route('admin.datakeluarga.destroy', [$dataKeluarga->no_kk, $dataKeluarga->dawis_id]) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
</form>

@endsection