@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Kecamatan</h1>

    <form method="POST" action="{{ route('superadmin.kecamatan.update', $kecamatan->no_kec) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="no_kec">Nomor Kecamatan</label>
            <input type="text" name="no_kec" class="form-control" value="{{ old('no_kec', $kecamatan->no_kec) }}" required>
            @error('no_kec')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama_kec">Nama Kecamatan</label>
            <input type="text" name="nama_kec" class="form-control" value="{{ old('nama_kec', $kecamatan->nama_kec) }}" required>
            @error('nama_kec')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="no_kab">Kabupaten</label>
            <select name="no_kab" class="form-control">
                @foreach ($kab as $kab)
                <option value="{{ $kab->no_kab }}" {{ $kab->no_kab == $kecamatan->no_kab ? 'selected' : '' }}>
                    {{ $kab->nama_kab }}
                </option>
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
                <option value="{{ $prop->no_prop }}" {{ $prop->no_prop == $kecamatan->no_prop ? 'selected' : '' }}>
                    {{ $prop->nama_prop }}
                </option>
                @endforeach
            </select>
            @error('no_prop')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('superadmin.kecamatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection