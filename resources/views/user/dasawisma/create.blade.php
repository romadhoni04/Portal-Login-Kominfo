@extends('user.admin')

@section('main-content')
<div class="container">
    <h1>Buat Data Dasa Wisma</h1>
    <form action="{{ route('user.dasawisma.store') }}" method="POST" id="dasawisma-form">
        @csrf
        <div class="form-group">
            <label for="nama_dawis">Nama Dasa Wisma</label>
            <input type="text" name="nama_dawis" id="nama_dawis" class="form-control" required>
        </div>
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
        <div class="form-group">
            <label for="rt">RT</label>
            <input type="number" name="rt" id="rt" class="form-control" required min="1">
        </div>
        <div class="form-group">
            <label for="rw">RW</label>
            <input type="number" name="rw" id="rw" class="form-control" required min="1">
        </div>
        <div class="form-group">
            <label for="dusun">Dusun</label>
            <input type="text" name="dusun" id="dusun" class="form-control">
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" required min="1900" max="{{ date('Y') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

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

        // Validasi form sebelum submit
        $('#dasawisma-form').on('submit', function(e) {
            if ($('#nama_dawis').val().trim() === '') {
                e.preventDefault();
                alert('Nama Dasa Wisma harus diisi.');
            }
        });
    });
</script>
@endsection