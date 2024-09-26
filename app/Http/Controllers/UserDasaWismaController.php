<?php

namespace App\Http\Controllers;

use App\Models\Prop;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Dawis; // Import model Dawis
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class UserDasaWismaController extends Controller
{
    /**
     * Menampilkan halaman pemilihan Dasa Wisma oleh user.
     */
    public function index(Request $request)
    {
        // Ambil semua provinsi
        $provinsi = Prop::all();

        // Default value untuk kabupaten, kecamatan, kelurahan adalah array kosong
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];
        $dawis = []; // Inisialisasi array untuk Dasa Wisma

        if ($request->has('provinsi') && !empty($request->provinsi)) {
            // Ambil kabupaten berdasarkan provinsi yang dipilih
            $kabupaten = Kab::where('no_prop', $request->provinsi)->get();
        }

        if ($request->has('kabupaten') && !empty($request->kabupaten)) {
            // Ambil kecamatan berdasarkan kabupaten yang dipilih
            $kecamatan = Kec::where('no_kab', $request->kabupaten)->get();
        }

        if ($request->has('kecamatan') && !empty($request->kecamatan)) {
            // Ambil kelurahan berdasarkan kecamatan yang dipilih
            $kelurahan = Kel::where('no_kec', $request->kecamatan)->get();
        }

        if ($request->has('kelurahan') && !empty($request->kelurahan)) {
            // Ambil Dasa Wisma berdasarkan kelurahan yang dipilih
            $dawis = Dawis::where('no_kel', $request->kelurahan)->get();
        }

        // Mengambil semua data Dawis beserta relasinya
        $dawis = Dawis::with(['prop', 'kab', 'kec', 'kel'])->get();
        return view('user.dasawisma.index', compact('provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'dawis'));
    }

    /**
     * Menampilkan form untuk menambah Dasa Wisma.
     */
    public function create()
    {
        // Cek apakah sudah ada data yang dibuat oleh pengguna
        $userDawis = Dawis::where('id', auth()->id())->first();

        if ($userDawis) {
            // Jika sudah ada, arahkan ke halaman edit dengan pesan
            return redirect()->route('user.dasawisma.edit', $userDawis->id)
                ->with('info', 'Anda sudah memiliki data Dasa Wisma. Silakan edit data yang ada.');
        }

        // Ambil semua provinsi
        $provinsi = Prop::all();

        // Mengambil entri pertama Dasa Wisma, jika ada
        $dawis = Dawis::first();

        return view('user.dasawisma.create', compact('dawis', 'provinsi'));
    }


    /**
     * Mendapatkan data kabupaten berdasarkan provinsi menggunakan AJAX.
     */
    public function getKabupaten($provinsi)
    {
        $kabupaten = Kab::where('no_prop', $provinsi)->get();
        return response()->json($kabupaten);
    }

    /**
     * Mendapatkan data kecamatan berdasarkan kabupaten menggunakan AJAX.
     */
    public function getKecamatan($kabupaten)
    {
        $kecamatan = Kec::where('no_kab', $kabupaten)->get();
        return response()->json($kecamatan);
    }

    /**
     * Mendapatkan data kelurahan berdasarkan kecamatan menggunakan AJAX.
     */
    public function getKelurahan($kecamatan)
    {
        $kelurahan = Kel::where('no_kec', $kecamatan)->get();
        return response()->json($kelurahan);
    }

    /**
     * Meng-handle form submission dari user.
     */
    /**
     * Meng-handle penyimpanan Dasa Wisma baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nama_dawis' => 'required|string|max:100',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'dusun' => 'nullable|string|max:100',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);
        // Cek apakah sudah ada data yang dibuat oleh pengguna
        $userDawis = Dawis::where('id', auth()->id())->first();

        if ($userDawis) {
            // Jika sudah ada, arahkan ke halaman edit dengan pesan
            return redirect()->route('user.dasawisma.edit', $userDawis->id)
                ->with('info', 'Anda sudah memiliki data Dasa Wisma. Silakan edit data yang ada.');
        }

        // Simpan data ke database
        Dawis::create([
            'nama_dawis' => $request->nama_dawis,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'dusun' => $request->dusun,
            'no_kel' => $request->kelurahan,
            'no_kec' => $request->kecamatan,
            'no_kab' => $request->kabupaten,
            'no_prop' => $request->provinsi,
            'tahun' => $request->tahun,
        ]);

        // Redirect ke halaman yang sesuai
        return redirect()->route('user.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil disimpan.');
    }




    /**
     * Menampilkan detail Dasa Wisma berdasarkan ID.
     */
    public function show($id)
    {
        Log::info('ID yang diterima untuk show: ' . $id);
        $provinsi = Prop::all();
        $dawis = Dawis::find($id);
        if (!$dawis) {
            abort(404);
        }
        return view('user.dasawisma.show', compact('dawis', 'provinsi'));
    }


    /**
     * Menampilkan form untuk mengedit Dasa Wisma berdasarkan ID.
     */
    public function edit($id)
    {

        $provinsi = Prop::all();
        $dawis = Dawis::findOrFail($id);
        return view('user.dasawisma.edit', compact('dawis', 'provinsi'));
    }

    /**
     * Mengupdate data Dasa Wisma berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        Log::info('ID yang diterima untuk update: ' . $id);
        // Validasi input dari form
        $request->validate([
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nama_dawis' => 'required|string|max:255',
            'rt' => 'nullable|integer',
            'rw' => 'nullable|integer',
            'dusun' => 'nullable|string|max:255',
            'tahun' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        // Temukan Dasa Wisma berdasarkan ID
        $dawis = Dawis::findOrFail($id);

        // Update data Dasa Wisma
        $dawis->update([
            'no_kel' => $request->input('kelurahan'),
            'no_kec' => $request->input('kecamatan'),
            'no_kab' => $request->input('kabupaten'),
            'no_prop' => $request->input('provinsi'),
            'nama_dawis' => $request->input('nama_dawis'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
            'dusun' => $request->input('dusun'),
            'tahun' => $request->input('tahun'),
        ]);

        // Redirect kembali ke halaman detail dengan pesan sukses
        return redirect()->route('user.dasawisma.show', $id)->with('success', 'Data Dasa Wisma berhasil diperbarui.');
    }


    /**
     * Menghapus Dasa Wisma berdasarkan ID.
     */
    public function destroy($id)
    {
        Log::info('ID yang diterima untuk hapus: ' . $id);
        $dawis = Dawis::findOrFail($id);
        $dawis->delete();

        // Redirect kembali ke halaman indeks dengan pesan sukses
        return redirect()->route('user.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil dihapus.');
    }
}
