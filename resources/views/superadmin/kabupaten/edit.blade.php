@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Kabupaten</h1>

    <form method="POST" action="{{ route('superadmin.kabupaten.update', $kab->no_kab) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_kab">Nama Kabupaten</label>
            <input type="text" name="nama_kab" class="form-control" value="{{ $kab->nama_kab }}" required>
        </div>

        <div class="form-group">
            <label for="no_prop">Provinsi</label>
            <select name="no_prop" class="form-control" required>
                @foreach($provinsi as $prop)
                <option value="{{ $prop->no_prop }}" {{ $prop->no_prop == $kab->no_prop ? 'selected' : '' }}>{{ $prop->nama_prop }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('superadmin.kabupaten.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection