@extends('admin.admin')

@section('main-content')
<h1>Tambah Data Keluarga</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Menampilkan pesan sukses jika ada -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.datakeluarga.store') }}" method="POST">
    @csrf

    <!-- Dawis (Read-Only) -->
    <div class="form-group">
        <label for="dawis_id">Dawis</label>
        <input type="text" class="form-control" value="{{ $dawisName ?? '' }}" readonly>
        <input type="hidden" name="dawis_id" value="{{ $dawisId ?? '' }}">
        @error('dawis_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Kepala Rumah Tangga (Read-Only) -->
    <div class="form-group">
        <label for="kepala_rumah_tangga_id">Kepala Rumah Tangga</label>
        <input type="text" class="form-control" value="{{ $kepalaRumahTanggaName ?? '' }}" readonly>
        <input type="hidden" name="kepala_rumah_tangga_id" value="{{ $kepalaRumahTanggaId ?? '' }}">
        @error('kepala_rumah_tangga_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- No KK -->
    <div class="form-group">
        <label for="no_kk">No KK</label>
        <input type="number" name="no_kk" class="form-control" value="{{ old('no_kk') }}"
            minlength="16" maxlength="16" pattern="\d{16}" title="Nomor KK harus terdiri dari 16 digit angka" required>
        @error('no_kk')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Nama Kepala Keluarga (Editable) -->
    <div class="form-group">
        <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
        <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ old('nama_kepala_keluarga', $namaKepalaKeluarga ?? '') }}" required>
        @error('nama_kepala_keluarga')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Provinsi -->
    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <select name="provinsi" id="provinsi" class="form-control" required>
            <option value="">Pilih Provinsi</option>
            @foreach ($provinsi as $p)
            <option value="{{ $p->no_prop }}">{{ $p->nama_prop }}</option>
            @endforeach
        </select>
    </div>

    <!-- Kabupaten -->
    <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <select name="kabupaten" id="kabupaten" class="form-control" required>
            <option value="">Pilih Kabupaten</option>
        </select>
    </div>

    <!-- Kecamatan -->
    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" id="kecamatan" class="form-control" required>
            <option value="">Pilih Kecamatan</option>
        </select>
    </div>

    <!-- Kelurahan -->
    <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <select name="kelurahan" id="kelurahan" class="form-control" required>
            <option value="">Pilih Kelurahan</option>
        </select>
    </div>

    <!-- Button submit -->
    <button type="submit" class="btn btn-primary">Simpan</button>
    <!-- Tombol Kembali -->
    <a href="{{ route('admin.datakeluarga.index', ['dawis_id' => $dawisId, 'kepala_rumah_tangga_id' => $kepalaRumahTanggaId ?? null]) }}" class="btn btn-secondary" id="btn-kembali">Kembali</a>

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Dynamic fetching of kabupaten, kecamatan, kelurahan data as previously implemented
        $('#provinsi').on('change', function() {
            var provinsiID = $(this).val();
            $('#kabupaten').empty().append('<option value="">-- Pilih Kabupaten --</option>');
            $('#kecamatan').empty().append('<option value="">-- Pilih Kecamatan --</option>');
            $('#kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');

            if (provinsiID) {
                $.ajax({
                    url: '/api/kabupaten/' + provinsiID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#kabupaten').append('<option value="' + value.no_kab + '">' + value.nama_kab + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error retrieving kabupaten data. Please try again.');
                    }
                });
            }
        });

        $('#kabupaten').on('change', function() {
            var kabupatenID = $(this).val();
            $('#kecamatan').empty().append('<option value="">-- Pilih Kecamatan --</option>');
            $('#kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');

            if (kabupatenID) {
                $.ajax({
                    url: '/api/kecamatan/' + kabupatenID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="' + value.no_kec + '">' + value.nama_kec + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error retrieving kecamatan data. Please try again.');
                    }
                });
            }
        });

        $('#kecamatan').on('change', function() {
            var kecamatanID = $(this).val();
            $('#kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');

            if (kecamatanID) {
                $.ajax({
                    url: '/api/kelurahan/' + kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#kelurahan').append('<option value="' + value.no_kel + '-' + value.no_kec + '-' + value.no_kab + '-' + value.no_prop + '">' + value.nama_kel + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error retrieving kelurahan data. Please try again.');
                    }
                });
            }
        });
    });
</script>

@endsection