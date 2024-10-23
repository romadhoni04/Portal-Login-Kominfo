<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\RefShdk;
use App\Models\RefPerkawinan;
use App\Models\RefPendidikan;
use App\Models\RefPekerjaan;
use Illuminate\Http\Request;
use App\Models\DataKeluarga;
use App\Models\Dawis;
use App\Models\KepalaRumahTangga;

class AdminDataPendudukController extends Controller
{
    // Index: Menampilkan daftar penduduk
    public function index($dawis_id, $kepala_rumah_tangga_id = null, $no_kk = null)
    {
        // Ambil data penduduk berdasarkan no_kk
        $dataPenduduk = DataPenduduk::where('no_kk', $no_kk)
            ->with(['refShdk', 'refPerkawinan', 'refPendidikan', 'refPekerjaan'])
            ->paginate(10);

        return view('admin.dasawisma.datapenduduk.index', compact('dataPenduduk', 'dawis_id', 'kepala_rumah_tangga_id', 'no_kk'));
    }


    // Create: Menampilkan form untuk menambah data penduduk
    public function create($dawis_id, $kepala_rumah_tangga_id = null, $no_kk = null)
    {
        // Mengambil data Dawis yang dipilih berdasarkan $dawis_id
        $dawis = Dawis::findOrFail($dawis_id);

        // Mengambil semua kepala rumah tangga yang terkait dengan Dasa Wisma yang dipilih
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $dawis_id)->get();

        // Ambil nama kepala rumah tangga yang dipilih (jika ada)
        $kepalaRumahTanggaName = null;

        if ($kepala_rumah_tangga_id) {
            $kepalaRumahTangga = KepalaRumahTangga::find($kepala_rumah_tangga_id);
            $kepalaRumahTanggaName = $kepalaRumahTangga ? $kepalaRumahTangga->nama : 'Tidak ada kepala rumah tangga';
        }

        // Mengambil data referensi yang dibutuhkan untuk dropdown
        $shdks = RefShdk::all();
        $statusKawin = RefPerkawinan::all();
        $pendidikans = RefPendidikan::all();
        $pekerjaans = RefPekerjaan::all();

        // Mengembalikan view 'create' dan mengirimkan data yang dibutuhkan
        return view('admin.dasawisma.datapenduduk.create', compact(
            'shdks',
            'statusKawin',
            'pendidikans',
            'pekerjaans',
            'dawis_id',
            'kepala_rumah_tangga_id',  // Pastikan variabel ini dikirim ke view
            'kepalaRumahTanggaName',
            'kepalaRumahTanggaList',
            'no_kk' // Mengirim no_kk ke view agar otomatis terisi
        ));
    }



    // Store: Menyimpan data penduduk baru
    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|digits:16|numeric',
            'no_ktp' => 'required|digits:16|numeric',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'shdk' => 'required',
            'status_kawin' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'difabel' => 'nullable|integer',
            'keg_pancasila' => 'nullable|integer',
            'keg_gotong_royong' => 'nullable|integer',
            'keg_pendidikan' => 'nullable|integer',
            'keg_koperasi' => 'nullable|integer',
            'keg_pangan' => 'nullable|integer',
            'keg_sandang' => 'nullable|integer',
            'keg_kesehatan' => 'nullable|integer',
            'keg_perencanaan_sehat' => 'nullable|integer',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data penduduk
        DataPenduduk::create($request->all());

        return redirect()->route('admin.datapenduduk.index', [
            'dawis_id' => $request->dawis_id,
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id,
            'no_kk' => $request->no_kk,
        ])->with('success', 'Data penduduk berhasil ditambahkan');
    }




    // Edit: Menampilkan form untuk mengedit data penduduk
    public function edit($no_kk)
    {
        // Ambil data penduduk berdasarkan no_kk
        $penduduk = DataPenduduk::where('no_kk', $no_kk)->firstOrFail();
        $shdks = RefShdk::all();
        $statusKawin = RefPerkawinan::all();
        $pendidikans = RefPendidikan::all();
        $pekerjaans = RefPekerjaan::all();
        // Ambil dawis_id dan kepala_rumah_tangga_id dari penduduk
        $dawis_id = $penduduk->dawis_id; // Sesuaikan dengan nama kolom atau relasi yang benar
        $kepala_rumah_tangga_id = $penduduk->kepala_rumah_tangga_id; // Sesuaikan dengan nama kolom atau relasi yang benar


        // Ambil informasi keluarga berdasarkan no_kk
        $keluarga = DataKeluarga::where('no_kk', $no_kk)->first();

        // Ambil dawis_id dan kepala_rumah_tangga_id jika diperlukan
        $dawis_id = $keluarga->dawis_id ?? null; // Pastikan ini ada di tabel keluarga
        $kepala_rumah_tangga_id = $keluarga->kepala_rumah_tangga_id ?? null; // Pastikan ini ada di tabel keluarga

        // Kirim data ke view
        return view('admin.dasawisma.datapenduduk.edit', compact(
            'penduduk',
            'dawis_id',
            'shdks',
            'statusKawin',
            'pendidikans',
            'pekerjaans',
            'keluarga',
            'dawis_id',
            'no_kk',

            'kepala_rumah_tangga_id'
        ));
    }




    // Update: Menyimpan perubahan data penduduk
    public function update(Request $request, $no_kk)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'no_kk' => 'required',
            'no_ktp' => 'required|digits:16|numeric', // Validasi No KTP agar 16 digit dan hanya angka
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'shdk' => 'required',
            'status_kawin' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'difabel' => 'nullable|integer',
            'keg_pancasila' => 'nullable|integer', // Validasi kegiatan Pancasila
            'keg_gotong_royong' => 'nullable|integer', // Validasi kegiatan Gotong Royong
            'keg_pendidikan' => 'nullable|integer', // Validasi kegiatan Pendidikan
            'keg_koperasi' => 'nullable|integer', // Validasi kegiatan Koperasi
            'keg_pangan' => 'nullable|integer', // Validasi kegiatan Pangan
            'keg_sandang' => 'nullable|integer', // Validasi kegiatan Sandang
            'keg_kesehatan' => 'nullable|integer', // Validasi kegiatan Kesehatan
            'keg_perencanaan_sehat' => 'nullable|integer', // Validasi kegiatan Perencanaan Sehat
            'keterangan' => 'nullable|string',
        ]);

        // Ambil data penduduk berdasarkan no_kk
        $penduduk = DataPenduduk::where('no_kk', $no_kk)->firstOrFail();

        // Perbarui data penduduk dengan data yang diterima dari request
        $penduduk->update([
            'no_kk' => $request->no_kk,
            'no_ktp' => $request->no_ktp,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'shdk' => $request->shdk,
            'status_kawin' => $request->status_kawin,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'difabel' => $request->difabel,
            'keg_pancasila' => $request->keg_pancasila, // Perbarui kegiatan Pancasila
            'keg_gotong_royong' => $request->keg_gotong_royong, // Perbarui kegiatan Gotong Royong
            'keg_pendidikan' => $request->keg_pendidikan, // Perbarui kegiatan Pendidikan
            'keg_koperasi' => $request->keg_koperasi, // Perbarui kegiatan Koperasi
            'keg_pangan' => $request->keg_pangan, // Perbarui kegiatan Pangan
            'keg_sandang' => $request->keg_sandang, // Perbarui kegiatan Sandang
            'keg_kesehatan' => $request->keg_kesehatan, // Perbarui kegiatan Kesehatan
            'keg_perencanaan_sehat' => $request->keg_perencanaan_sehat, // Perbarui kegiatan Perencanaan Sehat
            'keterangan' => $request->keterangan,
        ]);

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('admin.datapenduduk.index', [
            'dawis_id' => $request->dawis_id,
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id,
            'no_kk' => $request->no_kk,
        ])->with('success', 'Data penduduk berhasil diperbarui.');
    }


    // Destroy: Menghapus data penduduk
    public function destroy($id, $no_kk, $dawis_id, $kepala_rumah_tangga_id)
    {
        // Temukan data penduduk berdasarkan id dan no_kk
        $penduduk = DataPenduduk::where('id', $id)->where('no_kk', $no_kk)->firstOrFail();

        // Hapus data penduduk
        $penduduk->delete();

        // Debugging untuk memastikan nilai parameter
        //  dd($dawis_id, $kepala_rumah_tangga_id, $no_kk);

        // Redirect kembali ke index dengan semua parameter yang diperlukan
        return redirect()->route('admin.datapenduduk.index', [
            'dawis_id' => $dawis_id,
            'kepala_rumah_tangga_id' => $kepala_rumah_tangga_id,
            'no_kk' => $no_kk,
        ])->with('success', 'Data penduduk berhasil dihapus.');
    }






    // Show: Menampilkan detail data penduduk

    // Show: Menampilkan detail data penduduk
    // Show: Menampilkan detail data penduduk
    public function show($id, $no_kk)
    {
        $penduduk = DataPenduduk::with(['refShdk', 'refPerkawinan', 'refPendidikan', 'refPekerjaan'])
            ->where('id', $id) // Sesuaikan dengan primary key
            ->firstOrFail();

        // Ambil informasi keluarga berdasarkan no_kk
        $keluarga = DataKeluarga::where('no_kk', $no_kk)->first();

        // Ambil dawis_id dan kepala_rumah_tangga_id jika diperlukan
        $dawis_id = $keluarga->dawis_id ?? null; // Pastikan ini ada di tabel keluarga
        $kepala_rumah_tangga_id = $keluarga->kepala_rumah_tangga_id ?? null; // Pastikan ini ada di tabel keluarga

        return view('admin.dasawisma.datapenduduk.show', compact('penduduk', 'dawis_id', 'kepala_rumah_tangga_id', 'no_kk', 'keluarga'));
    }
}
