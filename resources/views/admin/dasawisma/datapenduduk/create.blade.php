@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <h4 class="mb-4 text-center">Tambah Data Penduduk</h4>

        <form action="{{ route('admin.datapenduduk.store') }}" method="POST">
            @csrf

            <input type="hidden" name="dawis_id" value="{{ $dawis_id }}">
            <input type="hidden" name="kepala_rumah_tangga_id" value="{{ $kepala_rumah_tangga_id }}">

            <div class="form-group">
                <label for="no_kk">No KK</label>
                <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $no_kk) }}" minlength="16" maxlength="16" required>
                @error('no_kk')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_ktp">Nomor KTP</label>
                <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}" minlength="16" maxlength="16" pattern="\d{16}" required>
                @error('no_ktp')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <!-- Hubungan dalam Keluarga (SHDK) -->
            <div class="form-group mb-3">
                <label for="shdk" class="form-label">Hubungan dalam Keluarga (SHDK)</label>
                <select name="shdk" id="shdk" class="form-control" required>
                    <option value="" disabled selected>-- Pilih SHDK --</option>
                    @foreach($shdks as $shdk)
                    <option value="{{ $shdk->id }}">{{ $shdk->nama_shdk }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Perkawinan -->
            <div class="form-group mb-3">
                <label for="status_kawin" class="form-label">Status Perkawinan</label>
                <select name="status_kawin" id="status_kawin" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Status Perkawinan --</option>
                    @foreach($statusKawin as $kawin)
                    <option value="{{ $kawin->id }}">{{ $kawin->status }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pendidikan -->
            <div class="form-group mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Pendidikan --</option>
                    @foreach($pendidikans as $pendidikan)
                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pekerjaan -->
            <div class="form-group mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kegunaan -->
            <!-- Kegunaan -->
            <div class="form-group mb-3">
                <label for="difabel" class="form-label">Difabel</label>
                <select name="difabel" id="difabel" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Status Difabel --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_pancasila" class="form-label">Kegiatan Pancasila</label>
                <select name="keg_pancasila" id="keg_pancasila" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Pancasila --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_gotong_royong" class="form-label">Kegiatan Gotong Royong</label>
                <select name="keg_gotong_royong" id="keg_gotong_royong" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Gotong Royong --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_pendidikan" class="form-label">Kegiatan Pendidikan</label>
                <select name="keg_pendidikan" id="keg_pendidikan" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Pendidikan --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_koperasi" class="form-label">Kegiatan Koperasi</label>
                <select name="keg_koperasi" id="keg_koperasi" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Koperasi --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_pangan" class="form-label">Kegiatan Pangan</label>
                <select name="keg_pangan" id="keg_pangan" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Pangan --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_sandang" class="form-label">Kegiatan Sandang</label>
                <select name="keg_sandang" id="keg_sandang" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Sandang --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_kesehatan" class="form-label">Kegiatan Kesehatan</label>
                <select name="keg_kesehatan" id="keg_kesehatan" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Kesehatan --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keg_perencanaan_sehat" class="form-label">Kegiatan Perencanaan Sehat</label>
                <select name="keg_perencanaan_sehat" id="keg_perencanaan_sehat" class="form-control" required>
                    <option value="" disabled selected>-- Pilih Kegiatan Perencanaan Sehat --</option>
                    <option value="1">Iya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>


            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Tambahan (Opsional)"></textarea>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                <a href="{{ route('admin.datapenduduk.index', ['dawis_id' => $dawis_id, 'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id, 'no_kk' => $no_kk]) }}" class="btn btn-secondary btn-block">Batal</a>
            </div>


        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection