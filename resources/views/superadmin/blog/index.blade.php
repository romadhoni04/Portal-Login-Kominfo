@extends('superadmin.admin')

@section('main-content')
<div class="container">

    <!-- Notifikasi -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1>Manage Blogs</h1>
    <a href="{{ route('superadmin.blog.create') }}" class="btn btn-primary mb-3">Create New Blog</a>

    @if($blogs->isEmpty())
    <p>No blogs available.</p>
    @else
    @foreach($blogs as $blog)
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title">{{ $blog->title }}</h2>
            <p class="card-text">{{ Str::limit($blog->content, 150) }}</p>
            <a href="{{ route('superadmin.blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('superadmin.blog.destroy', $blog->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection