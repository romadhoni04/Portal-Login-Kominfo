@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Kelurahan</h1>

    <form method="POST" action="{{ route('superadmin.kelurahan.store') }}">
        @csrf

        <div class="form-group">
            <label for="no_kel">Nomor Kelurahan</label>
            <input type="text" name="no_kel" class="form-control" value="{{ old('no_kel') }}" required>
            @error('no_kel')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama_kel">Nama Kelurahan</label>
            <input type="text" name="nama_kel" class="form-control" value="{{ old('nama_kel') }}" required>
            @error('nama_kel')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="no_kec">Kecamatan</label>
            <select name="no_kec" class="form-control">
                @foreach ($kec as $kec)
                <option value="{{ $kec->no_kec }}">{{ $kec->nama_kec }}</option>
                @endforeach
            </select>
            @error('no_kec')
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

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('superadmin.kelurahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection