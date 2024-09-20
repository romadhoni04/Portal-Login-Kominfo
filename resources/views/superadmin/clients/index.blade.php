@extends('superadmin.admin')

@section('main-content')
<div class="container">
    <h1>Clients</h1>
    <a href="{{ route('superadmin.clients.create') }}" class="btn btn-primary mb-3">Add New Client</a>

    <div class="row mt-4">
        @foreach($clients as $client)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-light">
                @if($client->link)
                <a href="{{ $client->link }}" target="_blank">
                    <img src="{{ asset('storage/' . $client->logo) }}" class="card-img-top" alt="{{ $client->name }}" style="object-fit: cover; height: 200px;">
                </a>
                @else
                <img src="{{ asset('storage/' . $client->logo) }}" class="card-img-top" alt="{{ $client->name }}" style="object-fit: cover; height: 200px;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $client->name }}</h5>
                    <div class="mt-auto d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <a href="{{ route('superadmin.clients.edit', $client->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('superadmin.clients.destroy', $client->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <h5 class="card-title">{{ $client->link }}</h5>
                        @if($client->link)
                        <a href="{{ $client->link }}" target="_blank" class="btn btn-outline-primary btn-sm">Visit Site</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection