@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <div class="card shadow-sm mb-4 bg-white rounded">
        <div class="card-header text-center bg-primary text-white">
            <h4>Daftar Penduduk</h4>
        </div>

        <div class="card-body">
            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="d-grid gap-2 mt-4">
                <a href="{{ route('admin.datapenduduk.create', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id, 'no_kk' => $no_kk]) }}" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Tambah Penduduk
                </a>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="bg-primary text-white">

                        <tr class="text-center">
                            <th>No</th>
                            <th>No KK</th>
                            <th>No KTP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>SHDK</th>
                            <th>Status Perkawinan</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Difabel</th>
                            <th>Kegiatan Pancasila</th>
                            <th>Kegiatan Gotong Royong</th>
                            <th>Kegiatan Pendidikan</th>
                            <th>Kegiatan Koperasi</th>
                            <th>Kegiatan Pangan</th>
                            <th>Kegiatan Sandang</th>
                            <th>Kegiatan Kesehatan</th>
                            <th>Kegiatan Perencanaan Sehat</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPenduduk as $index => $penduduk)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $penduduk->no_kk }}</td>
                            <td>{{ $penduduk->no_ktp }}</td>
                            <td>{{ $penduduk->nama_lengkap }}</td>
                            <td>{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $penduduk->tempat_lahir }}</td>
                            <td>{{ $penduduk->tanggal_lahir }}</td>
                            <td>{{ optional($penduduk->refShdk)->nama_shdk ?? 'Tidak ada' }}</td>
                            <td>{{ optional($penduduk->refPerkawinan)->status ?? 'Tidak ada' }}</td>
                            <td>{{ optional($penduduk->refPendidikan)->nama ?? 'Tidak ada' }}</td>
                            <td>{{ optional($penduduk->refPekerjaan)->nama ?? 'Tidak ada' }}</td>
                            <td>{{ $penduduk->difabel === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_pancasila === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_gotong_royong === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_pendidikan === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_koperasi === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_pangan === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_sandang === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_kesehatan === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keg_perencanaan_sehat === 1 ? 'Iya' : 'Tidak' }}</td>
                            <td>{{ $penduduk->keterangan ?? 'Tidak ada' }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.datapenduduk.show', ['id' => $penduduk->id, 'no_kk' => $penduduk->no_kk]) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.datapenduduk.edit', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id, 'no_kk' => $no_kk, 'id' => $penduduk->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.datapenduduk.destroy', ['id' => $penduduk->id, 'no_kk' => $penduduk->no_kk, 'dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer text-center">
            <a href="{{ route('admin.datakeluarga.index', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id]) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    th,
    td {
        white-space: nowrap;
        /* Pastikan teks tidak terpotong */
    }

    .table-responsive {
        overflow-x: auto;
        /* Menambahkan scrollbar horizontal jika tabel terlalu lebar */
    }
</style>

@endsection