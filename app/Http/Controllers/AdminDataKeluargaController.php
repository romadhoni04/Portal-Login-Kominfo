<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
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
            ->select('data_keluarga.*', 'kel.nama_kel', 'kec.nama_kec', 'kab.nama_kab', 'prop.nama_prop')
            ->where('data_keluarga.dawis_id', '=', $dawis_id); // Filter berdasarkan Dasa Wisma yang dipilih

        // Jika kepala rumah tangga ditentukan, tambahkan filter
        if ($kepala_rumah_tangga_id) {
            $dataKeluargaQuery->where('data_keluarga.kepala_rumah_tangga_id', $kepala_rumah_tangga_id);
        }

        // Mengambil semua kepala rumah tangga yang terkait dengan Dasa Wisma yang dipilih
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $dawis_id)->get();

        // Mengambil data provinsi
        $provinsi = Prop::all();

        // Ambil nama kepala rumah tangga yang dipilih (jika ada)
        $kepalaRumahTanggaName = null;
        if ($kepala_rumah_tangga_id) {
            $kepalaRumahTangga = KepalaRumahTangga::find($kepala_rumah_tangga_id);
            $kepalaRumahTanggaName = $kepalaRumahTangga ? $kepalaRumahTangga->nama : 'Tidak ada kepala rumah tangga';
        }

        // Ambil data keluarga
        $dataKeluarga = $dataKeluargaQuery->get(); // Mengambil data setelah semua filter diterapkan

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
    public function create($dawis_id, $kepala_rumah_tangga_id = null) // Berikan default null pada $kepala_rumah_tangga_id
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
            $kepalaRumahTanggaId = $kepalaRumahTangga ? $kepalaRumahTangga->id : null; // Pastikan ini ditambahkan
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
            'kepalaRumahTanggaId', // Pastikan ini ada
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
    // Method untuk menyimpan data keluarga ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_kk' => 'required|string|min:16|max:16|unique:data_keluarga,no_kk', // Ubah menjadi string dan tambahkan min/max 16
            'nama_kepala_keluarga' => 'required|string|max:255',
            'dawis_id' => 'required|exists:dawis,id',
            'kepala_rumah_tangga_id' => 'required|exists:kepala_rumah_tangga,id',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required', // Pastikan kelurahan tetap dalam format yang dapat dipecah
        ]);

        // Membuat data keluarga baru
        DataKeluarga::create([
            'no_kk' => $request->no_kk, // Pastikan input no_kk sesuai dengan varchar 16
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'dawis_id' => $request->dawis_id,
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id,
            'no_prop' => $request->provinsi,
            'no_kab' => $request->kabupaten,
            'no_kec' => $request->kecamatan,
            'no_kel' => explode('-', $request->kelurahan)[0], // Tetap gunakan explode jika format masih sama
        ]);

        // Redirect ke halaman daftar data keluarga dengan pesan sukses
        return redirect()->route('admin.datakeluarga.index', [
            'dawis_id' => $request->dawis_id,
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id // Tambahkan kepala rumah tangga ID
        ])->with('success', 'Data keluarga berhasil ditambahkan'); // Mengirim pesan sukses
    }




    public function show($no_kk)
    {
        if (!is_numeric($no_kk)) {
            abort(404, 'Nomor KK tidak valid');
        }

        // Query untuk mengambil data keluarga dengan informasi kelurahan, kecamatan, kabupaten, dan provinsi
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
            ->leftJoin('kepala_rumah_tangga', 'data_keluarga.kepala_rumah_tangga_id', '=', 'kepala_rumah_tangga.id')
            ->select(
                'data_keluarga.*',
                'kel.nama_kel',
                'kec.nama_kec',
                'kab.nama_kab',
                'prop.nama_prop',
                'kepala_rumah_tangga.nama as nama_kepala_rumah_tangga'
            )
            ->where('data_keluarga.no_kk', $no_kk)
            ->first();

        if (!$dataKeluarga) {
            abort(404, 'Data keluarga tidak ditemukan.');
        }

        return view('admin.dasawisma.datakeluarga.show', compact('dataKeluarga'));
    }




    // Method untuk menampilkan form edit
    public function edit($no_kk, $dawis_id, $kepala_rumah_tangga_id)
    {
        // Mengambil data keluarga
        $keluarga = DataKeluarga::with(['kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'dawis'])
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
            'provinsi' => 'required|integer|exists:prop,no_prop',
            'kabupaten' => 'required|integer|exists:kab,no_kab',
            'kecamatan' => 'required|integer|exists:kec,no_kec',
            'kelurahan' => 'required|string',
            'kepala_rumah_tangga_id' => 'nullable|exists:kepala_rumah_tangga,id',
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

        // Redirect ke index dengan dawis_id dan kepala_rumah_tangga_id
        return redirect()->route('admin.datakeluarga.index', [
            'dawis_id' => $dawis_id,
            'kepala_rumah_tangga_id' => $validatedData['kepala_rumah_tangga_id']
        ])->with('success', 'Data keluarga berhasil diperbarui.');
    }




    // Method untuk menghapus data keluarga
    // Method untuk menghapus data keluarga
    // Destroy: Menghapus data penduduk
    public function destroy($no_kk, $dawis_id, $kepala_rumah_tangga_id)
    {
        // Temukan data penduduk berdasarkan no_kk
        $penduduk = DataKeluarga::where('no_kk', $no_kk)->firstOrFail();

        // Hapus data penduduk
        $penduduk->delete();

        // Redirect kembali ke index dengan semua parameter yang diperlukan
        return redirect()->route('admin.datakeluarga.index', [
            'dawis_id' => $dawis_id,
            'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id,
            'no_kk' => $no_kk,
        ])->with('success', 'Data penduduk berhasil dihapus.');
    }
}
