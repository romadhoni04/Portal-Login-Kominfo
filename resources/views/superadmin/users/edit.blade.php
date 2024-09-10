@extends('superadmin.admin')

@section('main-content')
<h1>Edit Pengguna</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('superadmin.users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nama Depan</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="form-group">
        <label for="last_name">Nama Belakang</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="form-group">
        <label for="password">Password (Biarkan kosong jika tidak ingin mengubah)</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection