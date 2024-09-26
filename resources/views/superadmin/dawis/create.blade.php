@extends('superadmin.admin')

@section('main-content')

<div class="container">
    <h1>Tambah Dawis</h1>

    <form action="{{ route('superadmin.dawis.store') }}" method="POST">
        @csrf

        @include('superadmin.dawis._form', ['buttonText' => 'Tambah'])

    </form>
</div>
@endsection