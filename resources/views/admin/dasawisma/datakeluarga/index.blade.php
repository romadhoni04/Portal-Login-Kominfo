@extends('admin.admin')

@section('main-content')
<div class="container mt-4">
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <h1 class="text-center mb-4">Data Keluarga</h1>

        <!-- Menampilkan nama Dasa Wisma dan Nama Kepala Rumah Tangga -->
        <h3>Dasa Wisma: <strong>{{ $dawisName }}</strong></h3>
        <h5>Nama Kepala Rumah Tangga: <strong>{{ $kepalaRumahTanggaName }}</strong></h5>

        <!-- Tombol Tambah Data -->
        <div class="d-flex justify-content-start my-3">
            <a href="{{ route('admin.datakeluarga.create', [$dawis_id, $kepala_rumah_tangga_id]) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Data Keluarga
            </a>
        </div>

        <!-- Alert Sukses -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Tabel Data Keluarga -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>No KK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Balita</th>
                        <th>PUS</th>
                        <th>WUS</th>
                        <th>Ibu Hamil</th>
                        <th>Ibu Menyusui</th>
                        <th>Lansia</th>
                        <th>Buta Baca</th>
                        <th>Buta Tulis</th>
                        <th>Buta Hitung</th>
                        <th>Makanan Pokok</th>
                        <th>Makanan Pokok Lain</th>
                        <th>Jamban Keluarga</th>
                        <th>Jumlah jamban Keluarga</th>
                        <th>Sumber Air Keluarga</th>
                        <th>Sumber Air Keluarga Lain</th>
                        <th>Tempat Sampah Keluarga</th>
                        <th>Saluran Air Limbah</th>
                        <th>Stiker P4K</th>
                        <th>Kriteria Rumah</th>
                        <th>Aktivitas UP2K</th>
                        <th>Aktivitas UP2K Lain</th>
                        <th>Aktivitas Usaha Kesehatan Lingkungan</th>
                        <th>Memiliki Tabungan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataKeluarga as $index => $keluarga)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $keluarga->no_kk }}</td>
                        <td>{{ $keluarga->nama_kepala_keluarga }}</td>
                        <td>{{ $keluarga->nama_kel ?? '-' }}</td>
                        <td>{{ $keluarga->nama_kec ?? '-' }}</td>
                        <td>{{ $keluarga->nama_kab ?? '-' }}</td>
                        <td>{{ $keluarga->nama_prop ?? '-' }}</td>
                        <td>{{ $keluarga->balita }}</td>
                        <td>{{ $keluarga->pus ?? 0 }}</td>
                        <td>{{ $keluarga->wus ?? 0 }}</td>
                        <td>{{ $keluarga->ibu_hamil ?? 0 }}</td>
                        <td>{{ $keluarga->ibu_menyusui ?? 0 }}</td>
                        <td>{{ $keluarga->lansia ?? 0 }}</td>
                        <td>{{ $keluarga->buta_baca ?? 0 }}</td>
                        <td>{{ $keluarga->buta_tulis ?? 0 }}</td>
                        <td>{{ $keluarga->buta_hitung ?? 0 }}</td>
                        <td>{{ $keluarga->makanan_pokok === 1 ? 'Beras' : 'Bukan Beras' }}</td>
                        <td>{{ $keluarga->makanan_pokok_lain ?? '-' }}</td>
                        <td>{{ $keluarga->jamban_keluarga === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td>{{ $keluarga->jamban_keluarga_jumlah ?? '-' }}</td>
                        <td>
                            @if($keluarga->sumber_air_keluarga === 1)
                            PDAM
                            @elseif($keluarga->sumber_air_keluarga === 2)
                            Sumur
                            @else
                            Dan lain-lain
                            @endif
                        </td>

                        <td>{{ $keluarga->sumber_air_keluarga_lain }}</td>
                        <td>{{ $keluarga->tempat_sampah_keluarga === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td>{{ $keluarga->saluran_air_limbah === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td>{{ $keluarga->stiker_p4k === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td>{{ $keluarga->kriteria_rumah === 1 ? 'Sehat Layak Huni' : 'Tidak Sehat Kurang Layak Huni' }}</td>
                        <td>{{ $keluarga->aktivitas_up2k === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td>{{ $keluarga->aktivitas_up2k_lain ?? '-' }}</td>
                        <td>{{ $keluarga->aktivitas_usaha_kesehatan_lingkungan === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td>{{ $keluarga->memiliki_tabungan === 1 ? 'Iya' : 'Tidak' }}</td>
                        <td class="text-center">
                            <!-- Tombol Aksi -->
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.datapenduduk.index', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $keluarga->kepala_rumah_tangga_id ?? null, 'no_kk' => $keluarga->no_kk ?? 0]) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-list"></i> Penduduk
                                </a>

                                <a href="{{ route('admin.datakeluarga.show', ['no_kk' => $keluarga->no_kk, 'dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $keluarga->kepala_rumah_tangga_id ?? null]) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>


                                <a href="{{ route('data-keluarga.edit', [$keluarga->no_kk, $keluarga->dawis_id, $keluarga->kepala_rumah_tangga_id ?? 0]) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.datakeluarga.destroy', [$keluarga->no_kk, $keluarga->dawis_id, $keluarga->kepala_rumah_tangga_id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="24" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Tombol Kembali -->
        <div class="card-footer text-center">
            <a href="{{ route('admin.dasawisma.kepalaRumahTangga', $dawis_id) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
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