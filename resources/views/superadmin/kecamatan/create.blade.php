@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Kecamatan</h1>

    <form method="POST" action="{{ route('superadmin.kecamatan.store') }}">
        @csrf
        <div class="form-group">
            <label for="no_kec">Nomor Kecamatan</label>
            <input type="text" name="no_kec" class="form-control" required>
            @error('no_kec')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama_kec">Nama Kecamatan</label>
            <input type="text" name="nama_kec" class="form-control" required>
            @error('nama_kec')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="no_kab">Kabupaten</label>
            <select name="no_kab" class="form-control">
                @foreach ($kab as $kab)
                <option value="{{ $kab->no_kab }}">{{ $kab->nama_kab }}</option>
                @endforeach
            </select>
            @error('no_kab')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="no_prop">Provinsi</label>
            <select name="no_prop" class="form-control">
                @foreach ($prop as $prop)
                <option value="{{ $prop->no_prop }}">{{ $prop->nama_prop }}</option>
                @endforeach
            </select>
            @error('no_prop')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('superadmin.kecamatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection