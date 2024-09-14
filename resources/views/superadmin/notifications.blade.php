<!-- resources/views/superadmin/notifications.blade.php -->
@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Notifikasi Terbaru</h1>
    <ul class="list-group">
        @foreach ($notifications as $notification)
        <li class="list-group-item">
            <strong>{{ $notification->title }}</strong> - {{ $notification->description }}
            <br>
            <small>{{ $notification->created_at->diffForHumans() }}</small>
        </li>
        @endforeach
    </ul>
</div>
@endsection