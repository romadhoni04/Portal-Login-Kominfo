@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Daftar Dasa Wisma</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif

    <a href="{{ route('user.dasawisma.create') }}" class="btn btn-primary mb-3">Tambah Dasa Wisma</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Nama Dasa Wisma</th>
                <th>RT</th>
                <th>RW</th>
                <th>Dusun</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dawis as $d)
            <tr>
                <td>{{ $d->prop->nama_prop ?? '-' }}</td>
                <td>{{ $d->kab->nama_kab ?? '-' }}</td>
                <td>{{ $d->kec->nama_kec ?? '-' }}</td>
                <td>{{ $d->kel->nama_kel ?? '-' }}</td>

                <td>{{ $d->nama_dawis }}</td>
                <td>{{ $d->rt }}</td>
                <td>{{ $d->rw }}</td>
                <td>{{ $d->dusun }}</td>
                <td>{{ $d->tahun }}</td>
                <td>
                    <a href="{{ route('user.dasawisma.show', $d->id) }}" class="btn btn-info me-2">Lihat</a>
                    <a href="{{ route('user.dasawisma.edit', $d->id) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('user.dasawisma.destroy', $d->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection