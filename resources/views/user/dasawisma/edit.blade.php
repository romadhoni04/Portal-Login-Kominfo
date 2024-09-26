@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Edit Dasa Wisma</h1>
    @include('user.dasawisma._form', ['dawis' => $dawis,'provinsi' => $provinsi])
</div>
@endsection