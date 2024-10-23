@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <h4 class="mb-4 text-center">Detail Penduduk</h4>

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
                <td>{{ $penduduk->tanggal_lahir }}</td>
            </tr>

            <tr>
                <th>Hubungan dalam Keluarga (SHDK)</th>
                <td>{{ optional($penduduk->refShdk)->nama_shdk ?? 'Tidak ada' }}</td>
            </tr>
            <tr>
                <th>Status Perkawinan</th>
                <td>{{ optional($penduduk->refPerkawinan)->status ?? 'Tidak ada' }}</td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <td>{{ optional($penduduk->refPendidikan)->nama ?? 'Tidak ada' }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td>{{ optional($penduduk->refPekerjaan)->nama ?? 'Tidak ada' }}</td>
            </tr>


            <tr>
                <th>Difabel</th>
                <td>{{ $penduduk->difabel === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Pancasila</th>
                <td>{{ $penduduk->keg_pancasila === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Gotong Royong</th>
                <td>{{ $penduduk->keg_gotong_royong === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Pendidikan</th>
                <td>{{ $penduduk->keg_pendidikan === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Koperasi</th>
                <td>{{ $penduduk->keg_koperasi === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Pangan</th>
                <td>{{ $penduduk->keg_pangan === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Sandang</th>
                <td>{{ $penduduk->keg_sandang === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Kesehatan</th>
                <td>{{ $penduduk->keg_kesehatan === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>
            <tr>
                <th>Kegiatan Perencanaan Sehat</th>
                <td>{{ $penduduk->keg_perencanaan_sehat === 1 ? 'Iya' : 'Tidak' }}</td>
            </tr>

            <tr>
                <th>Keterangan</th>
                <td>{{ $penduduk->keterangan ?? 'Tidak ada' }}</td>
            </tr>
        </table>
        <a href="{{ route('admin.datapenduduk.index', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $keluarga->kepala_rumah_tangga_id ?? null, 'no_kk' => $keluarga->no_kk]) }}" class="btn btn-secondary">Kembali</a>

    </div>
</div>
@endsection