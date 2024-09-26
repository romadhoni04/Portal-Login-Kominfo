<?php

namespace App\Http\Controllers;

use App\Models\Kel;
use App\Models\Kec;
use App\Models\Kab;
use App\Models\Prop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelController extends Controller
{
    /**
     * Menampilkan daftar kelurahan dengan pagination dan pencarian
     */
    public function index(Request $request)
    {
        // Pencarian berdasarkan nama kelurahan
        $search = $request->get('search');

        // Ambil semua kelurahan, bisa menggunakan where untuk pencarian
        $kelurahan = Kel::when($search, function ($query, $search) {
            return $query->where('nama_kel', 'like', "%{$search}%");
        })
            ->orderBy('no_kel', 'asc') // Sorting berdasarkan id
            ->paginate(10); // Pagination, 10 item per halaman

        // Kembali ke view dengan data kelurahan
        return view('superadmin.kelurahan.index', compact('kelurahan', 'search'));
    }

    /**
     * Menampilkan halaman form untuk menambahkan kelurahan baru
     */
    public function create()
    {
        $kec = Kec::all();  // Ambil data kecamatan
        $kab = Kab::all();  // Ambil data kabupaten
        $prop = Prop::all();  // Ambil data provinsi
        return view('superadmin.kelurahan.create', compact('kec', 'kab', 'prop'));
    }

    /**
     * Menyimpan kelurahan baru ke dalam database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_kel' => 'required|integer|unique:kel,no_kel', // Ganti 'kel' menjadi 'kels'
            'nama_kel' => 'required|string|max:255',
            'no_kec' => 'required|integer|exists:kec,no_kec',
            'no_kab' => 'required|integer|exists:kab,no_kab',
            'no_prop' => 'required|integer|exists:prop,no_prop',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data kelurahan baru ke database
        Kel::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail kelurahan
     */
    public function show($no_kel)
    {
        // Ambil data kelurahan berdasarkan ID
        $kelurahan = Kel::findOrFail($no_kel);

        // Kembali ke halaman detail
        return view('superadmin.kelurahan.show', compact('kelurahan'));
    }

    /**
     * Menampilkan form untuk mengedit data kelurahan
     */
    public function edit($no_kel)
    {
        // Ambil data kelurahan berdasarkan ID
        $kelurahan = Kel::findOrFail($no_kel);
        $kec = Kec::all();
        $kab = Kab::all();
        $prop = Prop::all();

        // Tampilkan form edit
        return view('superadmin.kelurahan.edit', compact('kelurahan', 'kec', 'kab', 'prop'));
    }

    /**
     * Update data kelurahan ke dalam database
     */
    public function update(Request $request, $no_kel)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_kel' => 'required|integer|unique:kel,no_kel,' . $no_kel . ',no_kel',
            'nama_kel' => 'required|string|max:255',
            'no_kec' => 'required|integer|exists:kec,no_kec',
            'no_kab' => 'required|integer|exists:kab,no_kab',
            'no_prop' => 'required|integer|exists:prop,no_prop',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data kelurahan
        $kelurahan = Kel::findOrFail($no_kel);

        // Update data kelurahan
        $kelurahan->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kelurahan.index')->with('success', 'Kelurahan berhasil diupdate.');
    }

    /**
     * Hapus data kelurahan dari database
     */
    public function destroy($no_kel)
    {
        // Ambil data kelurahan berdasarkan ID
        $kelurahan = Kel::findOrFail($no_kel);

        // Hapus data kelurahan
        $kelurahan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kelurahan.index')->with('success', 'Kelurahan berhasil dihapus.');
    }

    /**
     * Menghapus beberapa kelurahan sekaligus (Bulk Delete)
     */
    public function bulkDelete(Request $request)
    {
        // Ambil array ID dari request
        $no_kel = $request->get('no_kel');

        // Hapus kelurahan berdasarkan ID yang dipilih
        if ($no_kel) {
            Kel::whereIn('no_kel', $no_kel)->delete();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('superadmin.kelurahan.index')->with('success', 'Kelurahan yang dipilih berhasil dihapus.');
    }
}
