@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Kepala Rumah Tangga</h1>

    <form action="{{ route('admin.kepala_rumah_tangga.update', $kepalaRumahTangga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $kepalaRumahTangga->nama }}" required>
        </div>

        <div class="form-group">
            <label for="dawis_id">Dasa Wisma</label>
            <select name="dawis_id" class="form-control" required>
                @foreach($dawis as $d)
                <option value="{{ $d->id }}" {{ $kepalaRumahTangga->dawis_id == $d->id ? 'selected' : '' }}>
                    {{ $d->nama_dawis }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection