@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Daftar Provinsi</h1>

    <form method="GET" action="{{ route('provinsi.index') }}">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Cari provinsi" value="{{ request()->get('search') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Provinsi</th>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($provinsi as $index => $prop)
            <tr>
                <td>{{ $index + 1 + ($provinsi->currentPage() - 1) * $provinsi->perPage() }}</td>
                <td>{{ $prop->no_prop }}</td>
                <td>{{ $prop->nama_prop }}</td>
                <td>
                    <a href="{{ route('provinsi.show', $prop->id) }}" class="btn btn-info">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $provinsi->links() }} <!-- Pagination links -->
</div>
@endsection