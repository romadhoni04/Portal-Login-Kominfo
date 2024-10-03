@extends('admin.admin')

@section('main-content')
<div class="container">
    <h2>Edit Data Keluarga: {{ $dataKeluarga->nama_kepala_keluarga }}</h2>

    <form action="{{ route('admin.datakeluarga.update', $dataKeluarga->no_kk) }}" method="POST" id="edit-dasawisma-form">
        @csrf
        @method('PUT')

        <!-- Hidden input for related data -->
        <input type="hidden" name="dawis_id" value="{{ $dawisId ?? null }}">
        <input type="hidden" name="kepala_rumah_tangga_id" value="{{ $kepalaRumahTanggaId ?? null }}">

        <!-- Nomor KK input -->
        <div class="mb-3">
            <label for="no_kk" class="form-label">Nomor KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $dataKeluarga->no_kk }}" readonly>
        </div>

        <!-- Nama Kepala Keluarga input -->
        <div class="mb-3">
            <label for="nama_kepala_keluarga" class="form-label">Nama Kepala Keluarga</label>
            <input type="text" class="form-control @error('nama_kepala_keluarga') is-invalid @enderror" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga', $dataKeluarga->nama_kepala_keluarga) }}">
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
                <option value="{{ $p->no_prop }}" {{ old('provinsi', $dataKeluarga->no_prop) == $p->no_prop ? 'selected' : '' }}>{{ $p->nama_prop }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <select name="kabupaten" id="kabupaten" class="form-control" required>
                <option value="">Pilih Kabupaten</option>
                @foreach ($kabupaten as $k)
                <option value="{{ $k->no_kab }}" {{ old('kabupaten', $dataKeluarga->no_kab) == $k->no_kab ? 'selected' : '' }}>{{ $k->nama_kab }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control" required>
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $kc)
                <option value="{{ $kc->no_kec }}" {{ old('kecamatan', $dataKeluarga->no_kec) == $kc->no_kec ? 'selected' : '' }}>{{ $kc->nama_kec }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kelurahan">Kelurahan</label>
            <select name="kelurahan" id="kelurahan" class="form-control" required>
                <option value="">Pilih Kelurahan</option>
                @foreach ($kelurahan as $kl)
                <option value="{{ $kl->no_kel }}" {{ old('kelurahan', $dataKeluarga->no_kel) == $kl->no_kel ? 'selected' : '' }}>{{ $kl->nama_kel }}</option>

                @endforeach
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
            if (provinsiID) {
                $.ajax({
                    url: '/api/kabupaten/' + provinsiID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#kabupaten').empty().append('<option value="">-- Pilih Kabupaten --</option>');
                        $.each(data, function(key, value) {
                            $('#kabupaten').append('<option value="' + value.no_kab + '">' + value.nama_kab + '</option>');
                        });
                    }
                });
            } else {
                $('#kabupaten').empty().append('<option value="">-- Pilih Kabupaten --</option>');
            }
            $('#kecamatan').empty().append('<option value="">-- Pilih Kecamatan --</option>');
            $('#kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');
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
                        const uniqueKelurahan = {};
                        $.each(data, function(key, value) {
                            if (!uniqueKelurahan[value.no_kel]) {
                                uniqueKelurahan[value.no_kel] = value.nama_kel;
                            }
                        });

                        $.each(uniqueKelurahan, function(no_kel, nama_kel) {
                            $('#kelurahan').append('<option value="' + no_kel + '">' + nama_kel + '</option>');
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