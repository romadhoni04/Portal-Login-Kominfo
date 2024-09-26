<?php

namespace App\Http\Controllers;

use App\Models\Kec;
use App\Models\Kab;
use App\Models\Prop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KecController extends Controller
{
    /**
     * Menampilkan daftar kecamatan dengan pagination dan pencarian
     */
    public function index(Request $request)
    {
        // Pencarian berdasarkan nama kecamatan
        $search = $request->get('search');

        // Ambil semua kecamatan, bisa juga menggunakan where untuk pencarian
        $kecamatan = Kec::with(['kabupaten', 'provinsi'])
            ->when($search, function ($query, $search) {
                return $query->where('nama_kec', 'like', "%{$search}%");
            })
            ->orderBy('no_kec', 'asc') // Sorting berdasarkan id
            ->paginate(10); // Pagination, 10 item per halaman

        // Kembali ke view dengan data kecamatan
        return view('superadmin.kecamatan.index', compact('kecamatan', 'search'));
    }

    /**
     * Menampilkan halaman form untuk menambahkan kecamatan baru
     */
    public function create()
    {
        $kab = Kab::all(); // Ambil semua kabupaten
        $prop = Prop::all(); // Ambil semua provinsi

        return view('superadmin.kecamatan.create', compact('kab', 'prop'));
    }

    /**
     * Menyimpan kecamatan baru ke dalam database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_kec' => 'required|integer', // Hapus validasi unique di sini
            'nama_kec' => 'required|string|max:255',
            'no_kab' => 'required|exists:kab,no_kab',
            'no_prop' => 'required|exists:prop,no_prop',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Cek apakah kombinasi no_kec dan no_prop sudah ada untuk menghindari duplikasi
        $existingKec = Kec::where('no_kec', $request->no_kec)
            ->where('no_prop', $request->no_prop)
            ->first();

        if ($existingKec) {
            // Jika data sudah ada, kirim pesan error
            return redirect()->back()
                ->with('error', 'Kecamatan dengan kombinasi nomor kecamatan dan provinsi ini sudah ada.')
                ->withInput();
        }

        // Simpan data kecamatan baru ke database
        Kec::create([
            'no_kec' => $request->no_kec,
            'nama_kec' => $request->nama_kec,
            'no_kab' => $request->no_kab,
            'no_prop' => $request->no_prop,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail kecamatan
     */
    public function show($no_kec)
    {
        // Ambil data kecamatan berdasarkan ID
        $kecamatan = Kec::with(['kabupaten', 'provinsi', 'kelurahan'])->findOrFail($no_kec);

        // Kembali ke halaman detail
        return view('superadmin.kecamatan.show', compact('kecamatan'));
    }

    /**
     * Menampilkan form untuk mengedit data kecamatan
     */
    public function edit($no_kec)
    {
        // Ambil data kecamatan berdasarkan ID
        $kecamatan = Kec::findOrFail($no_kec);
        $kab = Kab::all(); // Ambil semua kabupaten
        $prop = Prop::all(); // Ambil semua provinsi

        // Tampilkan form edit
        return view('superadmin.kecamatan.edit', compact('kecamatan', 'kab', 'prop'));
    }

    /**
     * Update data kecamatan ke dalam database
     */
    public function update(Request $request, $no_kec)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_kec' => 'required|integer|unique:kec,no_kec,' . $no_kec . ',no_kec',

            'nama_kec' => 'required|string|max:255',
            'no_kab' => 'required|exists:kab,no_kab',
            'no_prop' => 'required|exists:prop,no_prop',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data kecamatan
        $kecamatan = Kec::findOrFail($no_kec);

        // Update data kecamatan
        $kecamatan->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kecamatan.index')->with('success', 'Kecamatan berhasil diupdate.');
    }

    /**
     * Hapus data kecamatan dari database
     */
    public function destroy($no_kec)
    {
        // Ambil data kecamatan berdasarkan ID
        $kecamatan = Kec::findOrFail($no_kec);

        // Hapus data kecamatan
        $kecamatan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kecamatan.index')->with('success', 'Kecamatan berhasil dihapus.');
    }

    /**
     * Menghapus beberapa kecamatan sekaligus (Bulk Delete)
     */
    public function bulkDelete(Request $request)
    {
        // Ambil array ID dari request
        $no_kec = $request->get('no_kec');

        // Hapus kecamatan berdasarkan ID yang dipilih
        if ($no_kec) {
            Kec::whereIn('id', $no_kec)->delete();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('superadmin.kecamatan.index')->with('success', 'Kecamatan yang dipilih berhasil dihapus.');
    }
}
