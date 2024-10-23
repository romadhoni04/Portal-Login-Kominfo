@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <h4 class="mb-4 text-center">Edit Data Penduduk</h4>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{ route('admin.datapenduduk.update', ['no_kk' => $penduduk->no_kk]) }}" method="POST">
            @csrf
            @method('PUT')


            <input type="hidden" name="dawis_id" value="{{ $dawis_id }}">
            <input type="hidden" name="kepala_rumah_tangga_id" value="{{ $kepala_rumah_tangga_id }}">

            <div class="form-group mb-3">
                <label for="no_kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $penduduk->no_kk }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $penduduk->no_ktp }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $penduduk->nama_lengkap }}" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ $penduduk->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $penduduk->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}" required>
            </div>

            <!-- Hubungan dalam Keluarga (SHDK) -->
            <div class="form-group mb-3">
                <label for="shdk" class="form-label">Hubungan dalam Keluarga (SHDK)</label>
                <select name="shdk" id="shdk" class="form-control" required>
                    <option value="" disabled>-- Pilih SHDK --</option>
                    @foreach($shdks as $shdk)
                    <option value="{{ $shdk->id }}" {{ $shdk->id == $penduduk->shdk ? 'selected' : '' }}>{{ $shdk->nama_shdk }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Perkawinan -->
            <div class="form-group mb-3">
                <label for="status_kawin" class="form-label">Status Perkawinan</label>
                <select name="status_kawin" id="status_kawin" class="form-control" required>
                    <option value="" disabled>-- Pilih Status Perkawinan --</option>
                    @foreach($statusKawin as $kawin)
                    <option value="{{ $kawin->id }}" {{ $kawin->id == $penduduk->status_kawin ? 'selected' : '' }}>{{ $kawin->status }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pendidikan -->
            <div class="form-group mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control" required>
                    <option value="" disabled>-- Pilih Pendidikan --</option>
                    @foreach($pendidikans as $pendidikan)
                    <option value="{{ $pendidikan->id }}" {{ $pendidikan->id == $penduduk->pendidikan ? 'selected' : '' }}>{{ $pendidikan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pekerjaan -->
            <div class="form-group mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                    <option value="" disabled>-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}" {{ $pekerjaan->id == $penduduk->pekerjaan ? 'selected' : '' }}>{{ $pekerjaan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kegunaan -->
            <div class="form-group mb-3">
                <label for="difabel" class="form-label">Difabel</label>
                <select name="difabel" id="difabel" class="form-control" required>
                    <option value="" disabled>-- Pilih Status Difabel --</option>
                    <option value="1" {{ $penduduk->difabel == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->difabel == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Pancasila -->
            <div class="form-group mb-3">
                <label for="keg_pancasila" class="form-label">Kegiatan Pancasila</label>
                <select name="keg_pancasila" id="keg_pancasila" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Pancasila --</option>
                    <option value="1" {{ $penduduk->keg_pancasila == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_pancasila == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Gotong Royong -->
            <div class="form-group mb-3">
                <label for="keg_gotong_royong" class="form-label">Kegiatan Gotong Royong</label>
                <select name="keg_gotong_royong" id="keg_gotong_royong" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Gotong Royong --</option>
                    <option value="1" {{ $penduduk->keg_gotong_royong == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_gotong_royong == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Pendidikan -->
            <div class="form-group mb-3">
                <label for="keg_pendidikan" class="form-label">Kegiatan Pendidikan</label>
                <select name="keg_pendidikan" id="keg_pendidikan" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Pendidikan --</option>
                    <option value="1" {{ $penduduk->keg_pendidikan == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_pendidikan == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Koperasi -->
            <div class="form-group mb-3">
                <label for="keg_koperasi" class="form-label">Kegiatan Koperasi</label>
                <select name="keg_koperasi" id="keg_koperasi" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Koperasi --</option>
                    <option value="1" {{ $penduduk->keg_koperasi == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_koperasi == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Sosial -->
            <!-- Kegiatan Pangan -->
            <div class="form-group mb-3">
                <label for="keg_pangan" class="form-label">Kegiatan Pangan</label>
                <select name="keg_pangan" id="keg_pangan" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Pangan --</option>
                    <option value="1" {{ $penduduk->keg_pangan == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_pangan == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Sandang -->
            <div class="form-group mb-3">
                <label for="keg_sandang" class="form-label">Kegiatan Sandang</label>
                <select name="keg_sandang" id="keg_sandang" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Sandang --</option>
                    <option value="1" {{ $penduduk->keg_sandang == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_sandang == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Kesehatan -->
            <div class="form-group mb-3">
                <label for="keg_kesehatan" class="form-label">Kegiatan Kesehatan</label>
                <select name="keg_kesehatan" id="keg_kesehatan" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Kesehatan --</option>
                    <option value="1" {{ $penduduk->keg_kesehatan == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_kesehatan == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Kegiatan Perencanaan Sehat -->
            <div class="form-group mb-3">
                <label for="keg_perencanaan_sehat" class="form-label">Kegiatan Perencanaan Sehat</label>
                <select name="keg_perencanaan_sehat" id="keg_perencanaan_sehat" class="form-control" required>
                    <option value="" disabled>-- Pilih Kegiatan Perencanaan Sehat --</option>
                    <option value="1" {{ $penduduk->keg_perencanaan_sehat == 1 ? 'selected' : '' }}>Iya</option>
                    <option value="0" {{ $penduduk->keg_perencanaan_sehat == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>




            <!-- Kegiatan Lainnya -->
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Tambahan (Opsional)">{{ old('keterangan', $penduduk->keterangan) }}</textarea>
            </div>


            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Update Data Penduduk</button>
                <a href="{{ route('admin.datapenduduk.index', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $keluarga->kepala_rumah_tangga_id ?? null, 'no_kk' => $keluarga->no_kk]) }}" class="btn btn-secondary btn-block">Batal</a>
            </div>

        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection