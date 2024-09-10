@extends('superadmin.admin')

@section('main-content')
<h1>Daftar Pengguna</h1>

<!-- Notifikasi -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('superadmin.users.create') }}" class="btn btn-primary">Tambah Pengguna</a>

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
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('superadmin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('superadmin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection