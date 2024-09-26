<form id="dasaWismaForm" method="POST" action="{{ $dawis ? route('user.dasawisma.update', $dawis->id) : route('user.dasawisma.store') }}" method="POST">

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

    <button type="submit" class="btn btn-primary">Submit</button>
    </action=>

    <div class="form-group">
        <label for="nama_dawis">Nama Dawis</label>
        <input type="text" name="nama_dawis" class="form-control @error('nama_dawis') is-invalid @enderror" value="{{ old('nama_dawis', $dawis->nama_dawis ?? '') }}" required>
        @error('nama_dawis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="rt">RT</label>
        <input type="number" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt', $dawis->rt ?? '') }}">
        @error('rt')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="rw">RW</label>
        <input type="number" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw', $dawis->rw ?? '') }}">
        @error('rw')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="dusun">Dusun</label>
        <input type="text" name="dusun" class="form-control @error('dusun') is-invalid @enderror" value="{{ old('dusun', $dawis->dusun ?? '') }}">
        @error('dusun')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="no_kel">Kelurahan</label>
        <select name="no_kel" class="form-control @error('no_kel') is-invalid @enderror">
            @foreach ($kelurahan as $kel)
            <option value="{{ $kel->id }}" {{ old('no_kel', $dawis->no_kel ?? '') == $kel->id ? 'selected' : '' }}>
                {{ $kel->nama_kel }}
            </option>
            @endforeach
        </select>
        @error('no_kel')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="no_kec">Kecamatan</label>
        <select name="no_kec" class="form-control @error('no_kec') is-invalid @enderror">
            @foreach ($kecamatan as $kec)
            <option value="{{ $kec->id }}" {{ old('no_kec', $dawis->no_kec ?? '') == $kec->id ? 'selected' : '' }}>
                {{ $kec->nama_kec }}
            </option>
            @endforeach
        </select>
        @error('no_kec')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="no_kab">Kabupaten</label>
        <select name="no_kab" class="form-control @error('no_kab') is-invalid @enderror">
            @foreach ($kabupaten as $kab)
            <option value="{{ $kab->id }}" {{ old('no_kab', $dawis->no_kab ?? '') == $kab->id ? 'selected' : '' }}>
                {{ $kab->nama_kab }}
            </option>
            @endforeach
        </select>
        @error('no_kab')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="no_prop">Provinsi</label>
        <select name="no_prop" class="form-control @error('no_prop') is-invalid @enderror">
            @foreach ($provinsi as $prop)
            <option value="{{ $prop->id }}" {{ old('no_prop', $dawis->no_prop ?? '') == $prop->id ? 'selected' : '' }}>
                {{ $prop->nama_prop }}
            </option>
            @endforeach
        </select>
        @error('no_prop')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="tahun">Tahun</label>
        <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $dawis->tahun ?? '') }}" required>
        @error('tahun')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>



    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
    <a href="{{ route('superadmin.dawis.index') }}" class="btn btn-secondary">Batal</a>