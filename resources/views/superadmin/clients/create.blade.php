@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Add New Client</h1>

    <form action="{{ route('superadmin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Client Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="logo">Client Logo</label>
            <input type="file" name="logo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="link">Client Link (Opsional)</label>
            <input type="url" name="link" class="form-control" placeholder="https://example.com">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection