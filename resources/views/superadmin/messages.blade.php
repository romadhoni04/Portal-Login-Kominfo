<!-- resources/views/superadmin/messages.blade.php -->
@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Pesan Terbaru</h1>
    <ul class="list-group">
        @foreach ($messages as $message)
        <li class="list-group-item">
            <strong>Nama: </strong>{{ $message->name }}<br>
            <strong>Email: </strong>{{ $message->email }}<br>
            <strong>Subjek: </strong>{{ $message->subject }}<br>
            <strong>Pesan: </strong>{{ $message->message }}<br>
            <small>{{ $message->created_at->diffForHumans() }}</small>
        </li>
        @endforeach
    </ul>
</div>
@endsection