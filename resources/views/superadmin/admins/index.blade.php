@extends('superadmin.admin')

@section('main-content')
<h1>Daftar Administrator</h1>

<!-- Notifikasi -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('superadmin.admins.create') }}" class="btn btn-primary">Tambah Administrator</a>

<table class="table">
    <thead>
        <tr>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->last_name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <a href="{{ route('superadmin.admins.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('superadmin.admins.destroy', $admin->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus administrator ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection