@extends('superadmin.admin')

@section('main-content')
<h1>Pengaturan</h1>

<!-- Notifikasi -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Formulir Pengaturan -->
<form action="{{ route('superadmin.settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Contoh Pengaturan: Nama Aplikasi -->
    <div class="form-group">
        <label for="app_name">Nama Aplikasi</label>
        <input type="text" class="form-control" id="app_name" name="app_name" value="{{ config('app.name') }}">
    </div>

    <!-- Contoh Pengaturan: Email Kontak -->
    <div class="form-group">
        <label for="contact_email">Email Kontak</label>
        <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ config('mail.from.address') }}">
    </div>

    <!-- Tombol Simpan -->
    <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
</form>
@endsection