@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Client</h1>

    <form action="{{ route('superadmin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Client Name</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
        </div>

        <div class="form-group">
            <label for="logo">Client Logo (optional)</label>
            <input type="file" name="logo" class="form-control">
            <img src="{{ asset('storage/' . $client->logo) }}" width="100" alt="{{ $client->name }}">
        </div>

        <div class="form-group">
            <label for="link">Client Link (Opsional)</label>
            <input type="url" name="link" class="form-control" value="{{ $client->link }}" placeholder="https://example.com">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection