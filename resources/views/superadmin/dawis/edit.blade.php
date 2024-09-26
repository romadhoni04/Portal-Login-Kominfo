@extends('superadmin.admin')

@section('main-content')

<div class="container">
    <h1>Edit Dawis</h1>

    <form action="{{ route('superadmin.dawis.update', $dawis->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('superadmin.dawis._form', ['buttonText' => 'Update'])

    </form>
</div>
@endsection