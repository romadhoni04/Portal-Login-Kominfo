@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Data Penduduk</h1>
    <form action="{{ route('data_penduduk.update', $penduduk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="no_kk" class="form-label">No KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $penduduk->no_kk }}" required>
        </div>
        <div class="mb-3">
            <label for="no_ktp" class="form-label">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ $penduduk->no_ktp }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $penduduk->nama_lengkap }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L" {{ $penduduk->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $penduduk->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}" required>
        </div>
        <div class="mb-3">
            <label for="shdk" class="form-label">SHDK</label>
            <select class="form-select" id="shdk" name="shdk" required>
                @foreach($shdks as $shdk)
                <option value="{{ $shdk->id }}" {{ $shdk->id == $penduduk->shdk ? 'selected' : '' }}>{{ $shdk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status_kawin" class="form-label">Status Perkawinan</label>
            <select class="form-select" id="status_kawin" name="status_kawin" required>
                @foreach($statusKawin as $kawin)
                <option value="{{ $kawin->id }}" {{ $kawin->id == $penduduk->status_kawin ? 'selected' : '' }}>{{ $kawin->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-select" id="pendidikan" name="pendidikan" required>
                @foreach($pendidikans as $pendidikan)
                <option value="{{ $pendidikan->id }}" {{ $pendidikan->id == $penduduk->pendidikan ? 'selected' : '' }}>{{ $pendidikan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                @foreach($pekerjaans as $pekerjaan)
                <option value="{{ $pekerjaan->id }}" {{ $pekerjaan->id == $penduduk->pekerjaan ? 'selected' : '' }}>{{ $pekerjaan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $penduduk->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('data_penduduk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection