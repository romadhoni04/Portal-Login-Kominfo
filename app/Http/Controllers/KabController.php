<?php

namespace App\Http\Controllers;

use App\Models\Kab;
use App\Models\Prop;
use Illuminate\Http\Request;

class KabController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Ambil data kabupaten dengan pencarian
        $kabupaten = Kab::with('provinsi')
            ->when($search, function ($query, $search) {
                return $query->where('nama_kab', 'like', "%{$search}%");
            })
            ->orderBy('no_kab', 'asc')

            ->paginate(10);

        return view('superadmin.kabupaten.index', compact('kabupaten', 'search'));
    }

    public function create()
    {
        // Ambil data provinsi untuk dropdown
        $provinsi = Prop::all();
        return view('superadmin.kabupaten.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_kab' => 'required|integer|unique:kab,no_kab',
            'nama_kab' => 'required|string|max:100',
            'no_prop' => 'required|exists:prop,no_prop',
        ]);

        // Simpan data kabupaten baru ke database
        Kab::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kabupaten.index')->with('success', 'Kabupaten berhasil ditambahkan.');
    }

    public function show($no_kab)
    {
        // Ambil data kabupaten berdasarkan ID
        $kab = Kab::with('provinsi')->findOrFail($no_kab);
        return view('superadmin.kabupaten.show', compact('kab'));
    }

    public function edit($no_kab)
    {
        // Ambil data kabupaten dan provinsi untuk form edit
        $kab = Kab::findOrFail($no_kab);
        $provinsi = Prop::all();
        return view('superadmin.kabupaten.edit', compact('kab', 'provinsi'));
    }

    public function update(Request $request, $no_kab)
    {
        // Validasi input
        $request->validate([
            'nama_kab' => 'required|string|max:100',
            'no_prop' => 'required|exists:prop,no_prop',
        ]);

        // Cari kabupaten dan update
        $kab = Kab::findOrFail($no_kab);
        $kab->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kabupaten.index')->with('success', 'Kabupaten berhasil diupdate.');
    }

    public function destroy($no_kab)
    {
        // Cari kabupaten dan hapus
        $kab = Kab::findOrFail($no_kab);
        $kab->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('superadmin.kabupaten.index')->with('success', 'Kabupaten berhasil dihapus.');
    }
}
