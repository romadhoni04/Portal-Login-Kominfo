<?php

namespace App\Http\Controllers;

use App\Models\Prop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropController extends Controller
{
    /**
     * Menampilkan daftar provinsi dengan pagination dan pencarian.
     */
    public function index(Request $request)
    {
        // Pencarian berdasarkan nama provinsi
        $search = $request->get('search');

        // Ambil semua provinsi, bisa juga menggunakan where untuk pencarian
        $provinsi = Prop::when($search, function ($query, $search) {
            return $query->where('nama_prop', 'like', "%{$search}%");
        })
            ->orderBy('no_prop', 'asc') // Ganti 'id' dengan 'no_prop'
            ->paginate(10); // Pagination, 10 item per halaman

        // Kembali ke view dengan data provinsi
        return view('superadmin.provinsi.index', compact('provinsi', 'search'));
    }

    /**
     * Menampilkan halaman form untuk menambahkan provinsi baru.
     */
    public function create()
    {
        return view('superadmin.provinsi.create');
    }

    /**
     * Menyimpan provinsi baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_prop' => 'required|integer|unique:prop,no_prop',
            'nama_prop' => 'required|string|max:255',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data provinsi baru ke database
        Prop::create($request->only(['no_prop', 'nama_prop'])); // Menggunakan only untuk menghindari input yang tidak perlu

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail provinsi.
     */
    public function show($no_prop)
    {
        // Ambil data provinsi berdasarkan no_prop
        $prop = Prop::where('no_prop', $no_prop)->firstOrFail();

        // Kembali ke halaman detail
        return view('superadmin.provinsi.show', compact('prop'));
    }

    /**
     * Menampilkan form untuk mengedit data provinsi.
     */
    public function edit($no_prop)
    {
        // Ambil data provinsi berdasarkan no_prop
        $prop = Prop::where('no_prop', $no_prop)->firstOrFail();

        // Tampilkan form edit
        return view('superadmin.provinsi.edit', compact('prop'));
    }

    /**
     * Update data provinsi ke dalam database.
     */
    public function update(Request $request, $no_prop)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'no_prop' => 'required|integer|unique:prop,no_prop,' . $no_prop . ',no_prop',
            'nama_prop' => 'required|string|max:255',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data provinsi
        $prop = Prop::where('no_prop', $no_prop)->firstOrFail();

        // Update data provinsi
        $prop->update($request->only(['no_prop', 'nama_prop'])); // Hanya memperbarui kolom yang diperlukan

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.provinsi.index')->with('success', 'Provinsi berhasil diupdate.');
    }

    /**
     * Hapus data provinsi dari database.
     */
    public function destroy($no_prop)
    {
        // Ambil data provinsi berdasarkan no_prop
        $prop = Prop::where('no_prop', $no_prop)->firstOrFail();

        // Hapus data provinsi
        $prop->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }

    /**
     * Menghapus beberapa provinsi sekaligus (Bulk Delete).
     */
    public function bulkDelete(Request $request)
    {
        // Ambil array ID dari request
        $no_prop = $request->get('ids');

        // Hapus provinsi berdasarkan no_prop yang dipilih
        if ($no_prop) {
            Prop::whereIn('no_prop', $no_prop)->delete();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('superadmin.provinsi.index')->with('success', 'Provinsi yang dipilih berhasil dihapus.');
    }
}
