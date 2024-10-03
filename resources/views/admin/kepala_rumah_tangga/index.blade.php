@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Daftar Kepala Rumah Tangga</h1>
    <a href="{{ route('admin.kepala_rumah_tangga.create') }}" class="btn btn-primary">Tambah Kepala Rumah Tangga</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Dasa Wisma</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kepalaRumahTangga as $kepala)
            <tr>
                <td>{{ $kepala->nama }}</td>
                <td>{{ $kepala->dawis->nama_dawis }}</td>
                <td>
                    <!-- Perbaiki di sini: gunakan $kepala->id -->
                    <a href="{{ route('admin.kepala_rumah_tangga.show', $kepala->id) }}" class="btn btn-info">Lihat Detail</a>

                    <a href="{{ route('admin.kepala_rumah_tangga.edit', $kepala->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('admin.kepala_rumah_tangga.destroy', $kepala->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection