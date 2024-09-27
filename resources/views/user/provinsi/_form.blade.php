<form action="{{ route('user.dasawisma.store') }}" method="POST">
    @csrf
    <!-- Dropdown Provinsi -->
    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <select name="provinsi" id="provinsi" class="form-control">
            <option value="">-- Pilih Provinsi --</option>
            @foreach($provinsi as $prop)
            <option value="{{ $prop->no_prop }}" {{ old('provinsi') == $prop->no_prop ? 'selected' : '' }}>{{ $prop->nama_prop }}</option>
            @endforeach
        </select>
    </div>

    <!-- Dropdown Kabupaten -->
    <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <select name="kabupaten" id="kabupaten" class="form-control">
            <option value="">-- Pilih Kabupaten --</option>
        </select>
    </div>

    <!-- Dropdown Kecamatan -->
    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" id="kecamatan" class="form-control">
            <option value="">-- Pilih Kecamatan --</option>
        </select>
    </div>

    <!-- Dropdown Kelurahan -->
    <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <select name="kelurahan" id="kelurahan" class="form-control">
            <option value="">-- Pilih Kelurahan --</option>
        </select>
    </div>


    <div class="form-group">
        <label for="nama_dawis">Nama Dasa Wisma</label>
        <input type="text" name="nama_dawis" id="nama_dawis" class="form-control" value="{{ old('nama_dawis', $dawis ? $dawis->nama_dawis : '') }}" required>
    </div>

    <div class="form-group">
        <label for="rt">RT</label>
        <input type="number" name="rt" id="rt" class="form-control" value="{{ old('rt', $dawis ? $dawis->rt : '') }}">
    </div>

    <div class="form-group">
        <label for="rw">RW</label>
        <input type="number" name="rw" id="rw" class="form-control" value="{{ old('rw', $dawis ? $dawis->rw : '') }}">
    </div>

    <div class="form-group">
        <label for="dusun">Dusun</label>
        <input type="text" name="dusun" id="dusun" class="form-control" value="{{ old('dusun', $dawis ? $dawis->dusun : '') }}">
    </div>

    <div class="form-group">
        <label for="tahun">Tahun</label>
        <input type="number" name="tahun" id="tahun" class="form-control" value="{{ old('tahun', $dawis ? $dawis->tahun : '') }}" min="1900" max="{{ date('Y') }}">
    </div>

    <button type="submit" class="btn btn-primary">{{ $dawis ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('user.dasawisma.index') }}" class="btn btn-secondary">Kembali</a>
</form>

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