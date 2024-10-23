@extends('admin.admin')

@section('main-content')
<h1>Edit Data Keluarga</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.datakeluarga.update', ['no_kk' => $keluarga->no_kk, 'dawis_id' => $dawisId]) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- No KK (editable) -->
    <div class="form-group">
        <label for="no_kk">No KK</label>
        <input type="number" name="no_kk" class="form-control" value="{{ $keluarga->no_kk }}">
    </div>

    <!-- Nama Kepala Keluarga (editable) -->
    <div class="form-group">
        <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
        <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ $keluarga->nama_kepala_keluarga ?? '' }}">
    </div>


    <!-- Dawis (non-editable) -->
    <div class="form-group">
        <label for="dawis_id">Dawis</label>
        <input type="text" class="form-control" value="{{ $dawisName ?? '' }}" readonly>
        <input type="hidden" name="dawis_id" value="{{ $dawisId ?? '' }}">
    </div>
    <!-- Kepala Rumah Tangga (Read-Only) -->
    <div class="form-group">
        <label for="kepala_rumah_tangga_id">Kepala Rumah Tangga</label>
        <input type="text" class="form-control" value="{{ $kepalaRumahTanggaName }}" readonly>
        <input type="hidden" name="kepala_rumah_tangga_id" value="{{ $kepala_rumah_tangga_id }}">

        @error('kepala_rumah_tangga_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Provinsi -->
    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <select name="provinsi" id="provinsi" class="form-control" required>
            <option value="">Pilih Provinsi</option>
            @foreach ($provinsi as $p)
            <option value="{{ $p->no_prop }}" {{ old('provinsi', $keluarga->no_prop) == $p->no_prop ? 'selected' : '' }}>{{ $p->nama_prop }}</option>
            @endforeach
        </select>
    </div>

    <!-- Kabupaten -->
    <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <select name="kabupaten" id="kabupaten" class="form-control" required>
            <option value="">Pilih Kabupaten</option>
            @foreach ($kabupaten as $k)
            <option value="{{ $k->no_kab }}" {{ old('kabupaten', $keluarga->no_kab) == $k->no_kab ? 'selected' : '' }}>{{ $k->nama_kab }}</option>
            @endforeach
        </select>
    </div>

    <!-- Kecamatan -->
    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" id="kecamatan" class="form-control" required>
            <option value="">Pilih Kecamatan</option>
            @foreach ($kecamatan as $kc)
            <option value="{{ $kc->no_kec }}" {{ old('kecamatan', $keluarga->no_kec) == $kc->no_kec ? 'selected' : '' }}>{{ $kc->nama_kec }}</option>
            @endforeach
        </select>
    </div>

    <!-- Kelurahan -->
    <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <select name="kelurahan" id="kelurahan" class="form-control" required>
            <option value="">Pilih Kelurahan</option>
            @foreach ($kelurahan as $kl)
            <option value="{{ $kl->no_kel }}-{{ $kl->no_kec }}-{{ $kl->no_kab }}-{{ $kl->no_prop }}" {{ old('kelurahan', $keluarga->no_kel . '-' . $keluarga->no_kec . '-' . $keluarga->no_kab . '-' . $keluarga->no_prop) == ($kl->no_kel . '-' . $kl->no_kec . '-' . $kl->no_kab . '-' . $kl->no_prop) ? 'selected' : '' }}>{{ $kl->nama_kel }}</option>
            @endforeach
        </select>
    </div>



    <!-- Button submit -->
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

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