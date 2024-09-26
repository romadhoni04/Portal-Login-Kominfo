@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Dasa Wisma</h1>
    @include('user.dasawisma._form', ['dawis' => null, 'provinsi' => $provinsi]) <!-- Mengirimkan variabel provinsi -->
</div>

@endsection