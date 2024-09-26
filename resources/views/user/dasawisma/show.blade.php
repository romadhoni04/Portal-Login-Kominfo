@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Detail Dasa Wisma</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $dawis->nama_dawis }}</h5>
            <p class="card-text">RT: {{ $dawis->rt }}</p>
            <p class="card-text">RW: {{ $dawis->rw }}</p>
            <p class="card-text">Dusun: {{ $dawis->dusun }}</p>
            <p class="card-text">Tahun: {{ $dawis->tahun }}</p>
            <p class="card-text">Provinsi: {{ $dawis->prop->nama_prop ?? '-' }}</p>
            <p class="card-text">Kabupaten: {{ $dawis->kab->nama_kab ?? '-' }}</p>
            <p class="card-text">Kecamatan: {{ $dawis->kec->nama_kec ?? '-' }}</p>
            <p class="card-text">Kelurahan: {{ $dawis->kel->nama_kel ?? '-' }}</p>

            <a href="{{ route('user.dasawisma.edit', $dawis->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('user.dasawisma.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection