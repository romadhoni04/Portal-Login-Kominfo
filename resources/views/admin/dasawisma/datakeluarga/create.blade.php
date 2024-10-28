@extends('admin.admin')

@section('main-content')
<h1>Tambah Data Keluarga & Akumulasi</h1>

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

    <!-- Form Data Keluarga -->
    <h3>Data Keluarga</h3>

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
        <input type="number" name="no_kk" class="form-control" value="{{ old('no_kk') }}" minlength="16" maxlength="16" pattern="\d{16}" title="Nomor KK harus terdiri dari 16 digit angka" required>
        @error('no_kk')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Nama Kepala Keluarga -->
    <div class="form-group">
        <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
        <input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ old('nama_kepala_keluarga', $namaKepalaKeluarga ?? '') }}" required>
        @error('nama_kepala_keluarga')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Provinsi, Kabupaten, Kecamatan, Kelurahan -->
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

    <!-- Form Data Keluarga Akumulasi 
    <h3>Data Keluarga Akumulasi</h3> -->

    <!-- Balita -->
    <div class="form-group">
        <label for="balita">Jumlah Balita</label>
        <input type="number" name="balita" class="form-control" value="{{ old('balita') }}" required>
        @error('balita')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- PUS -->
    <div class="form-group">
        <label for="pus">Jumlah PUS</label>
        <input type="number" name="pus" class="form-control" value="{{ old('pus') }}" required>
        @error('pus')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- WUS -->
    <div class="form-group">
        <label for="wus">Jumlah WUS</label>
        <input type="number" name="wus" class="form-control" value="{{ old('wus') }}" required>
        @error('wus')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Tiga Buta -->

    <div class="form-group">
        <label for="buta_baca">Jumlah Buta Baca</label>
        <input type="number" name="buta_baca" class="form-control" value="{{ old('buta_baca') }}" required>
        @error('buta_baca')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="buta_tulis">Jumlah Buta Tulis</label>
        <input type="number" name="buta_tulis" class="form-control" value="{{ old('buta_tulis') }}" required>
        @error('buta_tulis')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="buta_hitung">Jumlah Buta Hitung</label>
        <input type="number" name="buta_hitung" class="form-control" value="{{ old('buta_hitung') }}" required>
        @error('buta_hitung')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Ibu Hamil -->
    <div class="form-group">
        <label for="ibu_hamil">Jumlah Ibu Hamil</label>
        <input type="number" name="ibu_hamil" class="form-control" value="{{ old('ibu_hamil') }}" required>
        @error('ibu_hamil')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Ibu Menyusui -->
    <div class="form-group">
        <label for="ibu_menyusui">Jumlah Ibu Menyusui</label>
        <input type="number" name="ibu_menyusui" class="form-control" value="{{ old('ibu_menyusui') }}" required>
        @error('ibu_menyusui')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Lansia -->
    <div class="form-group">
        <label for="lansia">Jumlah Lansia</label>
        <input type="number" name="lansia" class="form-control" value="{{ old('lansia') }}" required>
        @error('lansia')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Makanan Pokok -->
    <div class="form-group">
        <label for="makanan_pokok">Makanan Pokok</label>
        <select name="makanan_pokok" id="makanan_pokok" class="form-control" required>
            <option value="">Pilih Makanan Pokok</option>
            <option value="1">Beras</option> <!-- ID untuk Beras -->
            <option value="2">Bukan Beras</option> <!-- ID untuk Bukan Beras -->
        </select>
        @error('makanan_pokok')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Makanan Pokok Lain -->
    <div class="form-group">
        <label for="makanan_pokok_lain">Makanan Pokok Lain</label>
        <input type="text" name="makanan_pokok_lain" id="makanan_pokok_lain" class="form-control" value="{{ old('makanan_pokok_lain') }}" readonly>
        @error('makanan_pokok_lain')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Apakah Keluarga Memiliki Jamban -->
    <div class="form-group">
        <label for="jamban_keluarga">Apakah Keluarga Memiliki Jamban?</label>
        <select name="jamban_keluarga" id="jamban_keluarga" class="form-control" required onchange="toggleJambanInput()">
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('jamban_keluarga')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Jumlah Jamban Keluarga -->
    <div class="form-group">
        <label for="jamban_keluarga_jumlah">Jumlah Jamban Keluarga</label>
        <input type="number" name="jamban_keluarga_jumlah" id="jamban_keluarga_jumlah" class="form-control" value="{{ old('jamban_keluarga_jumlah') }}" readonly>
        @error('jamban_keluarga_jumlah')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Sumber Air -->
    <div class="form-group">
        <label for="sumber_air_keluarga">Sumber Air Keluarga</label>
        <select name="sumber_air_keluarga" id="sumber_air_keluarga" class="form-control" required onchange="updateSumberAirLain()">
            <option value="" disabled selected>Pilih...</option>
            <option value="1">PDAM</option> <!-- ID untuk PDAM -->
            <option value="2">Sumur</option> <!-- ID untuk Sumur -->
            <option value="3">Lain-lain</option> <!-- ID untuk Lain-lain -->
        </select>
        @error('sumber_air_keluarga')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Sumber Air Keluarga Lain -->
    <div class="form-group">
        <label for="sumber_air_keluarga_lain">Sumber Air Keluarga Lain</label>
        <input type="text" name="sumber_air_keluarga_lain" id="sumber_air_keluarga_lain" class="form-control" value="{{ old('sumber_air_keluarga_lain') }}" readonly>
        @error('sumber_air_keluarga_lain')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Tempat Sampah Keluarga -->
    <div class="form-group">
        <label for="tempat_sampah_keluarga">Tempat Sampah Keluarga</label>
        <select name="tempat_sampah_keluarga" id="tempat_sampah_keluarga" class="form-control" required>
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('tempat_sampah_keluarga')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Saluran Air Limbah -->
    <div class="form-group">
        <label for="saluran_air_limbah">Saluran Air Limbah</label>
        <select name="saluran_air_limbah" id="saluran_air_limbah" class="form-control" required>
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('saluran_air_limbah')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Stiker P4K -->
    <div class="form-group">
        <label for="stiker_p4k">Stiker P4K</label>
        <select name="stiker_p4k" id="stiker_p4k" class="form-control" required>
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('stiker_p4k')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Kriteria Rumah -->
    <div class="form-group">
        <label for="kriteria_rumah">Kriteria Rumah</label>
        <select name="kriteria_rumah" id="kriteria_rumah" class="form-control" required>
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Sehat Layak Huni</option>
            <option value="0">Tidak Sehat Kurang Layak</option>
        </select>
        @error('kriteria_rumah')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Aktivitas UP2K -->
    <div class="form-group">
        <label for="aktivitas_up2k">Aktivitas UP2K</label>
        <select name="aktivitas_up2k" id="aktivitas_up2k" class="form-control" required onchange="updateAktivitasUP2K()">
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('aktivitas_up2k')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Aktivitas UP2K Lain -->
    <div class="form-group">
        <label for="aktivitas_up2k_lain">Aktivitas UP2K Lain</label>
        <input type="text" name="aktivitas_up2k_lain" id="aktivitas_up2k_lain" class="form-control" value="{{ old('aktivitas_up2k_lain') }}" readonly>
        @error('aktivitas_up2k_lain')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Aktivitas Usaha Kesehatan Lingkungan -->
    <div class="form-group">
        <label for="aktivitas_usaha_kesehatan_lingkungan">Aktivitas Usaha Kesehatan Lingkungan</label>
        <select name="aktivitas_usaha_kesehatan_lingkungan" id="aktivitas_usaha_kesehatan_lingkungan" class="form-control" required>
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('aktivitas_usaha_kesehatan_lingkungan')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- Memiliki Tabungan -->
    <div class="form-group">
        <label for="memiliki_tabungan">Memiliki Tabungan</label>
        <select name="memiliki_tabungan" class="form-control" required>
            <option value="" disabled selected>Pilih...</option>
            <option value="1">Iya</option>
            <option value="0">Tidak</option>
        </select>
        @error('memiliki_tabungan')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>



<script>
    function updateAktivitasUP2K() {
        const aktivitasUP2KSelect = document.getElementById('aktivitas_up2k');
        const aktivitasUP2KLainInput = document.getElementById('aktivitas_up2k_lain');

        if (aktivitasUP2KSelect.value === "1") {
            aktivitasUP2KLainInput.readOnly = false; // Izinkan edit
            aktivitasUP2KLainInput.value = ''; // Kosongkan input untuk diisi
        } else {
            aktivitasUP2KLainInput.readOnly = true; // Kunci input
            aktivitasUP2KLainInput.value = 'Tidak memiliki aktivitas UP2K'; // Set ke teks default
        }
    }
</script>
<script>
    function updateSumberAirLain() {
        const sumberAirSelect = document.getElementById('sumber_air_keluarga');
        const sumberAirLainInput = document.getElementById('sumber_air_keluarga_lain');

        // Reset input saat pilihan berubah
        sumberAirLainInput.value = '';

        // Menggunakan nilai integer untuk membandingkan
        if (sumberAirSelect.value === '1') { // PDAM
            sumberAirLainInput.value = 'Sumber air keluarga adalah PDAM';
            sumberAirLainInput.readOnly = true; // Nonaktifkan edit
        } else if (sumberAirSelect.value === '2') { // Sumur
            sumberAirLainInput.value = 'Sumber air keluarga adalah Sumur';
            sumberAirLainInput.readOnly = true; // Nonaktifkan edit
        } else if (sumberAirSelect.value === '3') { // Lain-lain
            sumberAirLainInput.value = ''; // Kosongkan input
            sumberAirLainInput.readOnly = false; // Izinkan edit
        } else {
            sumberAirLainInput.readOnly = true; // Nonaktifkan edit jika tidak ada pilihan
        }
    }
</script>


<script>
    function toggleJambanInput() {
        const hasJambanSelect = document.getElementById('jamban_keluarga');
        const jambanKeluargaInput = document.getElementById('jamban_keluarga_jumlah');

        if (hasJambanSelect.value == "1") {
            jambanKeluargaInput.removeAttribute('readonly'); // Izinkan input
            jambanKeluargaInput.value = ''; // Kosongkan input untuk diisi
        } else {
            jambanKeluargaInput.value = 0; // Set ke 0 jika "Tidak"
            jambanKeluargaInput.setAttribute('readonly', true); // Nonaktifkan input
        }
    }
</script>
<script>
    document.getElementById('makanan_pokok').addEventListener('change', function() {
        var makananPokokLainInput = document.getElementById('makanan_pokok_lain');

        // Menggunakan nilai integer untuk membandingkan
        if (this.value === '1') { // Beras
            makananPokokLainInput.value = 'Makanan pokok adalah Beras';
            makananPokokLainInput.readOnly = true; // Nonaktifkan edit
        } else if (this.value === '2') { // Bukan Beras
            makananPokokLainInput.value = ''; // Kosongkan input
            makananPokokLainInput.readOnly = false; // Izinkan edit
        } else {
            makananPokokLainInput.value = ''; // Kosongkan input jika tidak ada pilihan
            makananPokokLainInput.readOnly = true; // Nonaktifkan edit
        }
    });
</script>


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