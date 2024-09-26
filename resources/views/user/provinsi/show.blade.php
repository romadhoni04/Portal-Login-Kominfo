@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Detail Provinsi</h1>

    <table class="table">
        <tr>
            <th>Nomor Provinsi</th>
            <td>{{ $prop->no_prop }}</td>
        </tr>
        <tr>
            <th>Nama Provinsi</th>
            <td>{{ $prop->nama_prop }}</td>
        </tr>
    </table>

    <a href="{{ route('provinsi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection