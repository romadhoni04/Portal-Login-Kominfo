@extends('admin.admin')

@section('main-content')
<div class="container">
    <h1>Edit Data Dasa Wisma</h1>
    <form action="{{ route('admin.dasawisma.update', $dawis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_dawis">Nama Dasa Wisma</label>
            <input type="text" name="nama_dawis" id="nama_dawis" class="form-control" value="{{ old('nama_dawis', $dawis->nama_dawis) }}" required>
        </div>

        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <select name="provinsi" id="provinsi" class="form-control" required>
                <option value="">Pilih Provinsi</option>
                @foreach ($provinsi as $p)
                <option value="{{ $p->no_prop }}" {{ old('provinsi', $dawis->no_prop) == $p->no_prop ? 'selected' : '' }}>{{ $p->nama_prop }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <select name="kabupaten" id="kabupaten" class="form-control" required>
                <option value="">Pilih Kabupaten</option>
                @foreach ($kabupaten as $k)
                <option value="{{ $k->no_kab }}" {{ old('kabupaten', $dawis->no_kab) == $k->no_kab ? 'selected' : '' }}>{{ $k->nama_kab }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control" required>
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $kc)
                <option value="{{ $kc->no_kec }}" {{ old('kecamatan', $dawis->no_kec) == $kc->no_kec ? 'selected' : '' }}>{{ $kc->nama_kec }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kelurahan">Kelurahan</label>
            <select name="kelurahan" id="kelurahan" class="form-control" required>
                <option value="">Pilih Kelurahan</option>
                @foreach ($kelurahan as $kl)
                <option value="{{ $kl->no_kel }}" {{ old('kelurahan', $dawis->no_kel) == $kl->no_kel ? 'selected' : '' }}>{{ $kl->nama_kel }}</option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rt">RT</label>
            <input type="number" name="rt" id="rt" class="form-control" value="{{ old('rt', $dawis->rt) }}" required>
        </div>

        <div class="form-group">
            <label for="rw">RW</label>
            <input type="number" name="rw" id="rw" class="form-control" value="{{ old('rw', $dawis->rw) }}" required>
        </div>

        <div class="form-group">
            <label for="dusun">Dusun</label>
            <input type="text" name="dusun" id="dusun" class="form-control" value="{{ old('dusun', $dawis->dusun) }}">
        </div>

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ old('tahun', $dawis->tahun) }}" required>
        </div>

        <div class="mt-4">
            <!-- Membuat kedua tombol dalam satu baris (berdampingan) -->
            <button type="submit" class="btn btn-primary d-inline-block">Perbarui</button>
            <a href="{{ route('admin.dasawisma.index') }}" class="btn btn-secondary d-inline-block ml-2">Kembali ke Daftar Dasa Wisma</a>
        </div>


    </form>
</div>

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
                        $('#kabupaten').empty();
                        $('#kabupaten').append('<option value="">-- Pilih Kabupaten --</option>');
                        $.each(data, function(key, value) {
                            $('#kabupaten').append('<option value="' + value.no_kab + '">' + value.nama_kab + '</option>');
                        });
                    }
                });
            } else {
                $('#kabupaten').empty();
                $('#kabupaten').append('<option value="">-- Pilih Kabupaten --</option>');
            }
            $('#kecamatan').empty().append('<option value="">-- Pilih Kecamatan --</option>');
            $('#kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');
        });

        // Ambil kecamatan berdasarkan kabupaten yang dipilih
        $('#kabupaten').on('change', function() {
            var kabupatenID = $(this).val();
            if (kabupatenID) {
                $.ajax({
                    url: '/api/kecamatan/' + kabupatenID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#kecamatan').empty();
                        $('#kecamatan').append('<option value="">-- Pilih Kecamatan --</option>');
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="' + value.no_kec + '">' + value.nama_kec + '</option>');
                        });
                    }
                });
            } else {
                $('#kecamatan').empty();
                $('#kecamatan').append('<option value="">-- Pilih Kecamatan --</option>');
            }
            $('#kelurahan').empty().append('<option value="">-- Pilih Kelurahan --</option>');
        });

        // Ambil kelurahan berdasarkan kecamatan yang dipilih
        $('#kecamatan').on('change', function() {
            var kecamatanID = $(this).val();
            if (kecamatanID) {
                $.ajax({
                    url: '/api/kelurahan/' + kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#kelurahan').empty();
                        $('#kelurahan').append('<option value="">-- Pilih Kelurahan --</option>');
                        $.each(data, function(key, value) {
                            $('#kelurahan').append('<option value="' + value.no_kel + '">' + value.nama_kel + '</option>');
                        });
                    }
                });
            } else {
                $('#kelurahan').empty();
                $('#kelurahan').append('<option value="">-- Pilih Kelurahan --</option>');
            }
        });
    });
</script>
@endsection