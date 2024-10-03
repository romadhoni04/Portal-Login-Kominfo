@extends('admin.admin')

@section('main-content')
<div class="container">
    <h2>Tambah Data Keluarga</h2>

    <form action="{{ route('admin.datakeluarga.store') }}" method="POST" id="dasawisma-form">
        @csrf

        <!-- Hidden input for related data -->
        <!-- Hidden input for related data -->
        <input type="hidden" name="dawis_id" value="{{ $dawisId ?? null }}">
        <input type="hidden" name="kepala_rumah_tangga_id" value="{{ $kepalaRumahTanggaId ?? null }}">


        <!-- Nomor KK input -->
        <div class="mb-3">
            <label for="no_kk" class="form-label">Nomor KK</label>
            <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{ old('no_kk') }}">
            @error('no_kk')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Kepala Keluarga input -->
        <div class="mb-3">
            <label for="nama_kepala_keluarga" class="form-label">Nama Kepala Keluarga</label>
            <input type="text" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga') }}">
            @error('nama_kepala_keluarga')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Provinsi dropdown -->
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <select name="provinsi" id="provinsi" class="form-control" required>
                <option value="">Pilih Provinsi</option>
                @foreach ($provinsi as $p)
                <option value="{{ $p->no_prop }}">{{ $p->nama_prop }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <select name="kabupaten" id="kabupaten" class="form-control" required>
                <option value="">Pilih Kabupaten</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control" required>
                <option value="">Pilih Kecamatan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kelurahan">Kelurahan</label>
            <select name="kelurahan" id="kelurahan" class="form-control" required>
                <option value="">Pilih Kelurahan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- AJAX Script for dynamic dropdowns -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ambil kabupaten berdasarkan provinsi yang dipilih
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

        // Ambil kecamatan berdasarkan kabupaten yang dipilih
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

        // Ambil kelurahan berdasarkan kecamatan yang dipilih
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
                            $('#kelurahan').append('<option value="' + value.no_kel + '">' + value.nama_kel + '</option>');
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