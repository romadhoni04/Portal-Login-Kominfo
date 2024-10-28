@extends('admin.admin') <!-- Pastikan ini mengarah ke layout yang benar -->

@section('main-content')

<div class="container">
    <h2>Detail Data Keluarga</h2>
    <table class="table table-bordered">
        <tr>
            <th>No KK</th>
            <td>{{ $dataKeluarga->no_kk }}</td>
        </tr>
        <tr>
            <th>Nama Kepala Keluarga</th>
            <td>{{ $dataKeluarga->nama_kepala_keluarga ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Dawis</th>
            <td>{{ $dataKeluarga->dawis_id ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Kelurahan</th>
            <td>{{ $dataKeluarga->nama_kel ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <td>{{ $dataKeluarga->nama_kec ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Kabupaten</th>
            <td>{{ $dataKeluarga->nama_kab ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $dataKeluarga->nama_prop ?? 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Balita</th>
            <td>{{ $dataKeluarga->balita ?? 0 }}</td>
        </tr>
        <tr>
            <th>PUS</th>
            <td>{{ $dataKeluarga->pus ?? 0 }}</td>
        </tr>
        <tr>
            <th>WUS</th>
            <td>{{ $dataKeluarga->wus ?? 0 }}</td>
        </tr>
        <tr>
            <th>Ibu Hamil</th>
            <td>{{ $dataKeluarga->ibu_hamil ?? 0 }}</td>
        </tr>
        <tr>
            <th>Ibu Menyusui</th>
            <td>{{ $dataKeluarga->ibu_menyusui ?? 0 }}</td>
        </tr>
        <tr>
            <th>Lansia</th>
            <td>{{ $dataKeluarga->lansia ?? 0 }}</td>
        </tr>
        <tr>
            <th>Buta Baca</th>
            <td>{{ $dataKeluarga->buta_baca ?? 0 }}</td>
        </tr>
        <tr>
            <th>Buta Tulis</th>
            <td>{{ $dataKeluarga->buta_tulis ?? 0 }}</td>
        </tr>
        <tr>
            <th>Buta Hitung</th>
            <td>{{ $dataKeluarga->buta_hitung ?? 0 }}</td>
        </tr>
        <tr>
            <th>Sumber Air Keluarga</th>
            <td>
                @if (isset($dataKeluarga->sumber_air_keluarga))
                {{ $dataKeluarga->sumber_air_keluarga === 1 ? 'PDAM' : ($dataKeluarga->sumber_air_keluarga === 2 ? 'Sumur' : 'Dan lain-lain') }}
                @else
                Data tidak tersedia
                @endif
            </td>
        </tr>
        <tr>
            <th>Sumber Air Keluarga Lain</th>
            <td>{{ $dataKeluarga->sumber_air_keluarga_lain ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tempat Sampah Keluarga</th>
            <td>{{ isset($dataKeluarga->tempat_sampah_keluarga) ? ($dataKeluarga->tempat_sampah_keluarga === 1 ? 'Iya' : 'Tidak') : 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Saluran Air Limbah</th>
            <td>{{ isset($dataKeluarga->saluran_air_limbah) ? ($dataKeluarga->saluran_air_limbah === 1 ? 'Iya' : 'Tidak') : 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Stiker P4K</th>
            <td>{{ isset($dataKeluarga->stiker_p4k) ? ($dataKeluarga->stiker_p4k === 1 ? 'Iya' : 'Tidak') : 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Kriteria Rumah</th>
            <td>{{ isset($dataKeluarga->kriteria_rumah) ? ($dataKeluarga->kriteria_rumah === 1 ? 'Sehat Layak Huni' : 'Tidak Sehat Kurang Layak Huni') : 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Aktivitas UP2K</th>
            <td>{{ isset($dataKeluarga->aktivitas_up2k) ? ($dataKeluarga->aktivitas_up2k === 1 ? 'Iya' : 'Tidak') : 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Aktivitas UP2K Lain</th>
            <td>{{ $dataKeluarga->aktivitas_up2k_lain ?? '-' }}</td>
        </tr>
        <tr>
            <th>Aktivitas Usaha Kesehatan Lingkungan</th>
            <td>{{ isset($dataKeluarga->aktivitas_usaha_kesehatan_lingkungan) ? ($dataKeluarga->aktivitas_usaha_kesehatan_lingkungan === 1 ? 'Iya' : 'Tidak') : 'Data tidak tersedia' }}</td>
        </tr>
        <tr>
            <th>Memiliki Tabungan</th>
            <td>{{ isset($dataKeluarga->memiliki_tabungan) ? ($dataKeluarga->memiliki_tabungan === 1 ? 'Iya' : 'Tidak') : 'Data tidak tersedia' }}</td>
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
</div>
@endsection