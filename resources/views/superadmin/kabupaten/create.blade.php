@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Kabupaten</h1>

    <form method="POST" action="{{ route('superadmin.kabupaten.store') }}">
        @csrf

        <div class="form-group">
            <label for="no_kab">No Kabupaten</label>
            <input type="number" name="no_kab" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nama_kab">Nama Kabupaten</label>
            <input type="text" name="nama_kab" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="no_prop">Provinsi</label>
            <select name="no_prop" class="form-control" required>
                @foreach($provinsi as $prop)
                <option value="{{ $prop->no_prop }}">{{ $prop->nama_prop }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('superadmin.kabupaten.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection