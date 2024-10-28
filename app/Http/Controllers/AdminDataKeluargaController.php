<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\DataKeluargaAkumulasi;
use App\Models\Prop;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Dawis;
use App\Models\KepalaRumahTangga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDataKeluargaController extends Controller
{
    public function index($dawis_id, $kepala_rumah_tangga_id = null, $no_kk = null)
    {
        // Mengambil data keluarga yang terkait dengan Dasa Wisma yang dipilih
        $dataKeluargaQuery = DB::table('data_keluarga')
            ->leftJoin('kel', function ($join) {
                $join->on('data_keluarga.no_kel', '=', 'kel.no_kel')
                    ->on('data_keluarga.no_kec', '=', 'kel.no_kec')
                    ->on('data_keluarga.no_kab', '=', 'kel.no_kab')
                    ->on('data_keluarga.no_prop', '=', 'kel.no_prop');
            })
            ->leftJoin('kec', function ($join) {
                $join->on('data_keluarga.no_kec', '=', 'kec.no_kec')
                    ->on('data_keluarga.no_kab', '=', 'kec.no_kab')
                    ->on('data_keluarga.no_prop', '=', 'kec.no_prop');
            })
            ->leftJoin('kab', function ($join) {
                $join->on('data_keluarga.no_kab', '=', 'kab.no_kab')
                    ->on('data_keluarga.no_prop', '=', 'kab.no_prop');
            })
            ->leftJoin('prop', 'data_keluarga.no_prop', '=', 'prop.no_prop')
            ->leftJoin('data_keluarga_akumulasi', 'data_keluarga.no_kk', '=', 'data_keluarga_akumulasi.no_kk') // Join dengan data_keluarga_akumulasi
            ->select('data_keluarga.*', 'data_keluarga_akumulasi.*', 'kel.nama_kel', 'kec.nama_kec', 'kab.nama_kab', 'prop.nama_prop')
            ->where('data_keluarga.dawis_id', '=', $dawis_id); // Filter berdasarkan Dasa Wisma yang dipilih

        // Jika kepala rumah tangga ditentukan, tambahkan filter
        if ($kepala_rumah_tangga_id) {
            $dataKeluargaQuery->where('data_keluarga.kepala_rumah_tangga_id', $kepala_rumah_tangga_id);
        }

        // Mengambil data keluarga
        $dataKeluarga = $dataKeluargaQuery->get(); // Mengambil data setelah semua filter diterapkan

        // Mengambil semua kepala rumah tangga yang terkait dengan Dasa Wisma yang dipilih
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $dawis_id)->get();

        // Ambil nama kepala rumah tangga yang dipilih (jika ada)
        $kepalaRumahTanggaName = null;
        if ($kepala_rumah_tangga_id) {
            $kepalaRumahTangga = KepalaRumahTangga::find($kepala_rumah_tangga_id);
            $kepalaRumahTanggaName = $kepalaRumahTangga ? $kepalaRumahTangga->nama : 'Tidak ada kepala rumah tangga';
        }

        // Ambil data provinsi
        $provinsi = Prop::all();

        // Ambil informasi Dasa Wisma
        $dawis = Dawis::findOrFail($dawis_id);
        $dawisName = $dawis->nama_dawis;

        // Mengembalikan view dengan semua data yang diperlukan
        return view('admin.dasawisma.datakeluarga.index', compact(
            'dawisName',
            'no_kk',
            'dawis',
            'dataKeluarga',
            'dawis_id',
            'kepala_rumah_tangga_id',
            'kepalaRumahTanggaName',
            'kepalaRumahTanggaList',
            'provinsi'
        ));
    }



    // Method untuk menampilkan form create
    public function create($dawis_id, $kepala_rumah_tangga_id = null)
    {
        // Mengambil data Dawis yang dipilih berdasarkan $dawis_id
        $dawis = Dawis::findOrFail($dawis_id);

        // Mengambil semua kepala rumah tangga yang terkait dengan Dasa Wisma yang dipilih
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $dawis_id)->get();

        // Mengambil data provinsi
        $provinsi = Prop::all();

        // Ambil nama kepala rumah tangga yang dipilih (jika ada)
        $kepalaRumahTanggaName = null;
        $kepalaRumahTanggaId = null;

        if ($kepala_rumah_tangga_id) {
            $kepalaRumahTangga = KepalaRumahTangga::find($kepala_rumah_tangga_id);
            $kepalaRumahTanggaName = $kepalaRumahTangga ? $kepalaRumahTangga->nama : 'Tidak ada kepala rumah tangga';
            $kepalaRumahTanggaId = $kepalaRumahTangga ? $kepalaRumahTangga->id : null;
        }

        // Kirim nama dan ID Dawis ke view
        $dawisName = $dawis->nama_dawis;
        $dawisId = $dawis->id;

        // Mengirim data ke view
        return view('admin.dasawisma.datakeluarga.create', compact(
            'dawisName',
            'dawisId',
            'provinsi',
            'kepala_rumah_tangga_id',
            'kepalaRumahTanggaName',
            'kepalaRumahTanggaId',
            'kepalaRumahTanggaList'
        ));
    }

    // Method untuk menampilkan kabupaten berdasarkan provinsi
    public function getKabupaten($provinsi)
    {
        $kabupaten = Kab::where('no_prop', $provinsi)->get();
        return response()->json($kabupaten);
    }

    // Method untuk menampilkan kecamatan berdasarkan kabupaten
    public function getKecamatan($kabupaten)
    {
        $kecamatan = Kec::where('no_kab', $kabupaten)->get();
        return response()->json($kecamatan);
    }

    // Method untuk menampilkan kelurahan berdasarkan kecamatan
    public function getKelurahan($kecamatan)
    {
        $kelurahan = Kel::where('no_kec', $kecamatan)->get();
        return response()->json($kelurahan);
    }

    // Method untuk menyimpan data keluarga ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_kk' => 'required|digits:16|unique:data_keluarga,no_kk',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'dawis_id' => 'required|exists:dawis,id',
            'kepala_rumah_tangga_id' => 'required|exists:kepala_rumah_tangga,id',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            // Validasi tambahan untuk data_keluarga_akumulasi

            'balita' => 'nullable|integer',
            'pus' => 'nullable|integer',
            'wus' => 'nullable|integer',
            'buta_baca' => 'nullable|integer',
            'buta_tulis' => 'nullable|integer',
            'buta_hitung' => 'nullable|integer',
            'ibu_hamil' => 'nullable|integer',
            'ibu_menyusui' => 'nullable|integer',
            'lansia' => 'nullable|integer',
            'makanan_pokok' => 'required|integer', // Pastikan ini sesuai kebutuhan
            'makanan_pokok_lain' => 'nullable|string',
            'jamban_keluarga' => 'nullable|integer',
            'jamban_keluarga_jumlah' => 'nullable|integer',
            'sumber_air_keluarga' => 'required|integer', // Pastikan ini sesuai kebutuhan
            'sumber_air_keluarga_lain' => 'nullable|string',
            'tempat_sampah_keluarga' => 'nullable|integer',
            'saluran_air_limbah' => 'nullable|integer',
            'stiker_p4k' => 'nullable|integer',
            'kriteria_rumah' => 'nullable|integer',
            'aktivitas_up2k' => 'nullable|integer',
            'aktivitas_up2k_lain' => 'nullable|string',
            'aktivitas_usaha_kesehatan_lingkungan' => 'nullable|integer',
            'memiliki_tabungan' => 'nullable|integer',
        ]);

        // Logika penyimpanan data ke database...



        // Membuat data keluarga baru
        DataKeluarga::create([
            'no_kk' => $request->no_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'dawis_id' => $request->dawis_id,
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id,
            'no_prop' => $request->provinsi,
            'no_kab' => $request->kabupaten,
            'no_kec' => $request->kecamatan,
            'no_kel' => explode('-', $request->kelurahan)[0],
        ]);

        // Membuat data akumulasi baru untuk keluarga tersebut
        DataKeluargaAkumulasi::create([
            'no_kk' => $request->no_kk,
            'balita' => $request->balita,
            'pus' => $request->pus,
            'wus' => $request->wus,
            'buta_baca' => $request->buta_baca,
            'buta_tulis' => $request->buta_tulis,
            'buta_hitung' => $request->buta_hitung,
            'ibu_hamil' => $request->ibu_hamil,
            'ibu_menyusui' => $request->ibu_menyusui,
            'lansia' => $request->lansia,
            'makanan_pokok' => $request->makanan_pokok,
            'makanan_pokok_lain' => $request->makanan_pokok_lain,
            'jamban_keluarga' => $request->jamban_keluarga,
            'jamban_keluarga_jumlah' => $request->jamban_keluarga_jumlah,
            'sumber_air_keluarga' => $request->sumber_air_keluarga,
            'sumber_air_keluarga_lain' => $request->sumber_air_keluarga_lain,
            'tempat_sampah_keluarga' => $request->tempat_sampah_keluarga,
            'saluran_air_limbah' => $request->saluran_air_limbah,
            'stiker_p4k' => $request->stiker_p4k,
            'kriteria_rumah' => $request->kriteria_rumah,
            'aktivitas_up2k' => $request->aktivitas_up2k,
            'aktivitas_up2k_lain' => $request->aktivitas_up2k_lain,
            'aktivitas_usaha_kesehatan_lingkungan' => $request->aktivitas_usaha_kesehatan_lingkungan,
            'memiliki_tabungan' => $request->memiliki_tabungan,
        ]);

        // Redirect ke halaman daftar data keluarga dengan pesan sukses
        return redirect()->route('admin.datakeluarga.index', [
            'dawis_id' => $request->dawis_id,
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id
        ])->with('success', 'Data keluarga dan data akumulasi berhasil ditambahkan');
    }



    public function show($no_kk, $dawis_id, $kepala_rumah_tangga_id = null)
    {
        // Mengambil data keluarga berdasarkan no KK dan Dasa Wisma
        $dataKeluarga = DB::table('data_keluarga')
            ->leftJoin('kel', function ($join) {
                $join->on('data_keluarga.no_kel', '=', 'kel.no_kel')
                    ->on('data_keluarga.no_kec', '=', 'kel.no_kec')
                    ->on('data_keluarga.no_kab', '=', 'kel.no_kab')
                    ->on('data_keluarga.no_prop', '=', 'kel.no_prop');
            })
            ->leftJoin('kec', function ($join) {
                $join->on('data_keluarga.no_kec', '=', 'kec.no_kec')
                    ->on('data_keluarga.no_kab', '=', 'kec.no_kab')
                    ->on('data_keluarga.no_prop', '=', 'kec.no_prop');
            })
            ->leftJoin('kab', function ($join) {
                $join->on('data_keluarga.no_kab', '=', 'kab.no_kab')
                    ->on('data_keluarga.no_prop', '=', 'kab.no_prop');
            })
            ->leftJoin('prop', 'data_keluarga.no_prop', '=', 'prop.no_prop')
            ->leftJoin('data_keluarga_akumulasi', 'data_keluarga.no_kk', '=', 'data_keluarga_akumulasi.no_kk') // Join dengan data_keluarga_akumulasi
            ->where('data_keluarga.no_kk', '=', $no_kk)
            ->where('data_keluarga.dawis_id', '=', $dawis_id);

        // Jika kepala rumah tangga ditentukan, tambahkan filter
        if ($kepala_rumah_tangga_id) {
            $dataKeluarga->where('data_keluarga.kepala_rumah_tangga_id', $kepala_rumah_tangga_id);
        }

        // Mengambil data keluarga
        $dataKeluarga = $dataKeluarga->first(); // Mengambil data setelah semua filter diterapkan

        // Jika data tidak ditemukan, tampilkan halaman 404
        if (!$dataKeluarga) {
            abort(404, 'Data tidak ditemukan');
        }

        // Mengambil data provinsi
        $provinsi = Prop::all();

        // Mengembalikan view dengan data yang diperlukan
        return view('admin.dasawisma.datakeluarga.show', compact(
            'dataKeluarga',
            'provinsi'
        ));
    }


    // Method untuk menampilkan form edit
    public function edit($no_kk, $dawis_id, $kepala_rumah_tangga_id)
    {
        // Mengambil data keluarga
        $keluarga = DataKeluarga::with(['kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'dawis', 'akumulasi'])
            ->where('no_kk', $no_kk)
            ->first();

        if (!$keluarga) {
            return redirect()->route('some.route')->with('error', 'Data keluarga tidak ditemukan.');
        }

        // Mengambil data untuk dropdown
        $dawisList = Dawis::all();
        $provinsi = Prop::all();
        $kabupaten = Kab::where('no_prop', $keluarga->no_prop)->get();
        $kecamatan = Kec::where('no_kab', $keluarga->no_kab)->get();
        $kelurahan = Kel::where('no_kec', $keluarga->no_kec)->get();

        // Mendapatkan data Dawis
        $dawis = Dawis::findOrFail($dawis_id);
        $dawisName = $dawis->nama_dawis;
        $dawisId = $dawis->id; // Pastikan variabel ini didefinisikan

        // Mendapatkan nama dan ID dari Kepala Rumah Tangga
        $kepalaRumahTanggaName = null;
        $kepalaRumahTanggaId = null;

        if ($kepala_rumah_tangga_id) {
            $kepalaRumahTangga = KepalaRumahTangga::find($kepala_rumah_tangga_id);
            $kepalaRumahTanggaName = $kepalaRumahTangga ? $kepalaRumahTangga->nama : 'Tidak ada kepala rumah tangga';
        }

        // Mengambil semua kepala rumah tangga yang terkait dengan Dasa Wisma yang dipilih
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $dawis_id)->get();

        // Mengirim data ke view
        return view('admin.dasawisma.datakeluarga.edit', compact(
            'keluarga',
            'dawisList',
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'kepalaRumahTanggaList',
            'dawisName',
            'dawisId',               // Kirimkan nama Dawis ke view
            'dawis_id',                  // Kirimkan ID Dawis
            'kepalaRumahTanggaName',     // Kirimkan nama Kepala Rumah Tangga
            'kepala_rumah_tangga_id',    // Kirimkan ID Kepala Rumah Tangga
            'kepalaRumahTanggaId'        // Kirimkan ID Kepala Rumah Tangga
        ));
    }


    // Method untuk memperbarui data keluarga
    // Method untuk memperbarui data keluarga
    public function update(Request $request, $no_kk, $dawis_id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'no_kk' => 'required|numeric|digits:16|unique:data_keluarga,no_kk,' . $no_kk . ',no_kk', // Pastikan No KK valid dan unik
            'nama_kepala_keluarga' => 'required|string|max:255',
            'dawis_id' => 'required|integer|exists:dawis,id',
            'kepala_rumah_tangga_id' => 'required|exists:kepala_rumah_tangga,id',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            // Validasi tambahan untuk data_keluarga_akumulasi
            'balita' => 'nullable|integer',
            'pus' => 'nullable|integer',
            'wus' => 'nullable|integer',
            'buta_baca' => 'nullable|integer',
            'buta_tulis' => 'nullable|integer',
            'buta_hitung' => 'nullable|integer',
            'ibu_hamil' => 'nullable|integer',
            'ibu_menyusui' => 'nullable|integer',
            'lansia' => 'nullable|integer',
            'makanan_pokok' => 'required|integer', // Pastikan ini sesuai kebutuhan
            'makanan_pokok_lain' => 'nullable|string',
            'jamban_keluarga' => 'nullable|integer',
            'jamban_keluarga_jumlah' => 'nullable|integer',
            'sumber_air_keluarga' => 'required|integer', // Pastikan ini sesuai kebutuhan
            'sumber_air_keluarga_lain' => 'nullable|string',
            'tempat_sampah_keluarga' => 'nullable|integer',
            'saluran_air_limbah' => 'nullable|integer',
            'stiker_p4k' => 'nullable|integer',
            'kriteria_rumah' => 'nullable|integer',
            'aktivitas_up2k' => 'nullable|integer',
            'aktivitas_up2k_lain' => 'nullable|string',
            'aktivitas_usaha_kesehatan_lingkungan' => 'nullable|integer',
            'memiliki_tabungan' => 'nullable|integer',
        ]);

        // Pisahkan kelurahan
        $kelurahanParts = explode('-', $validatedData['kelurahan']);
        $no_kel = $kelurahanParts[0];
        $no_kec = $kelurahanParts[1];
        $no_kab = $kelurahanParts[2];
        $no_prop = $kelurahanParts[3]; // Pastikan data ini sesuai dengan struktur Anda

        // Cari data keluarga berdasarkan No KK yang lama
        $keluarga = DataKeluarga::where('no_kk', $no_kk)->firstOrFail();

        // Update data keluarga
        $keluarga->update([
            'no_kk' => $validatedData['no_kk'], // Update No KK
            'nama_kepala_keluarga' => $validatedData['nama_kepala_keluarga'],
            'dawis_id' => $validatedData['dawis_id'],
            'no_kel' => $no_kel,
            'no_kec' => $no_kec,
            'no_kab' => $no_kab,
            'no_prop' => $no_prop,
            'kepala_rumah_tangga_id' => $validatedData['kepala_rumah_tangga_id'],
        ]);

        // Membuat atau memperbarui data akumulasi baru untuk keluarga tersebut
        DataKeluargaAkumulasi::updateOrCreate(
            ['no_kk' => $validatedData['no_kk']],
            [
                'balita' => $validatedData['balita'],
                'pus' => $validatedData['pus'],
                'wus' => $validatedData['wus'],
                'buta_baca' => $validatedData['buta_baca'],
                'buta_tulis' => $validatedData['buta_tulis'],
                'buta_hitung' => $validatedData['buta_hitung'],
                'ibu_hamil' => $validatedData['ibu_hamil'],
                'ibu_menyusui' => $validatedData['ibu_menyusui'],
                'lansia' => $validatedData['lansia'],
                'makanan_pokok' => $validatedData['makanan_pokok'],
                'makanan_pokok_lain' => $validatedData['makanan_pokok_lain'],
                'jamban_keluarga' => $validatedData['jamban_keluarga'],
                'jamban_keluarga_jumlah' => $validatedData['jamban_keluarga_jumlah'],
                'sumber_air_keluarga' => $validatedData['sumber_air_keluarga'],
                'sumber_air_keluarga_lain' => $validatedData['sumber_air_keluarga_lain'],
                'tempat_sampah_keluarga' => $validatedData['tempat_sampah_keluarga'],
                'saluran_air_limbah' => $validatedData['saluran_air_limbah'],
                'stiker_p4k' => $validatedData['stiker_p4k'],
                'kriteria_rumah' => $validatedData['kriteria_rumah'],
                'aktivitas_up2k' => $validatedData['aktivitas_up2k'],
                'aktivitas_up2k_lain' => $validatedData['aktivitas_up2k_lain'],
                'aktivitas_usaha_kesehatan_lingkungan' => $validatedData['aktivitas_usaha_kesehatan_lingkungan'],
                'memiliki_tabungan' => $validatedData['memiliki_tabungan'],
            ]
        );

        // Redirect ke index dengan dawis_id dan kepala_rumah_tangga_id
        return redirect()->route('admin.datakeluarga.index', [
            'dawis_id' => $validatedData['dawis_id'],
            'kepala_rumah_tangga_id' => $validatedData['kepala_rumah_tangga_id']
        ])->with('success', 'Data keluarga dan data akumulasi berhasil diperbarui.');
    }



    // Method untuk menghapus data keluarga
    // Method untuk menghapus data keluarga
    // Destroy: Menghapus data penduduk
    public function destroy($no_kk, $dawis_id, $kepala_rumah_tangga_id)
    {
        // Temukan data keluarga berdasarkan no_kk
        $dataKeluarga = DataKeluarga::where('no_kk', $no_kk)->firstOrFail();

        // Temukan data akumulasi berdasarkan no_kk yang sama
        $dataAkumulasi = DataKeluargaAkumulasi::where('no_kk', $no_kk)->first();

        // Hapus data akumulasi jika ada
        if ($dataAkumulasi) {
            $dataAkumulasi->delete();
        }

        // Hapus data keluarga
        $dataKeluarga->delete();

        // Redirect kembali ke index dengan semua parameter yang diperlukan
        return redirect()->route('admin.datakeluarga.index', [
            'dawis_id' => $dawis_id,
            'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id,
        ])->with('success', 'Data keluarga dan data akumulasi berhasil dihapus.');
    }
}
