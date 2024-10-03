@extends('admin.admin')

@section('main-content')
<div class="container mt-5">
    <div class="card shadow-sm p-4 mb-4 bg-white rounded">
        <h4 class="mb-4 text-center">Tambah Data Penduduk</h4>

        <form action="{{ route('data_penduduk.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="no_kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Masukkan No KK" required>
            </div>

            <div class="form-group mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukkan No KTP" required>
            </div>

            <div class="form-group mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="form-group mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
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

            <div class="form-group mb-3">
                <label for="shdk" class="form-label">Hubungan dalam Keluarga (SHDK)</label>
                <select class="form-select" id="shdk" name="shdk" required>
                    <option value="" disabled selected>-- Pilih SHDK --</option>
                    @foreach($shdks as $shdk)
                    <option value="{{ $shdk->id }}">{{ $shdk->nama_shdk }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="status_kawin" class="form-label">Status Perkawinan</label>
                <select class="form-select" id="status_kawin" name="status_kawin" required>
                    <option value="" disabled selected>-- Pilih Status Perkawinan --</option>
                    @foreach($statusKawin as $kawin)
                    <option value="{{ $kawin->id }}">{{ $kawin->status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <select class="form-select" id="pendidikan" name="pendidikan" required>
                    <option value="" disabled selected>-- Pilih Pendidikan --</option>
                    @foreach($pendidikans as $pendidikan)
                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                    <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                    @foreach($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Tambahan (Opsional)"></textarea>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                <a href="{{ route('data_penduduk.index') }}" class="btn btn-secondary btn-block">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection