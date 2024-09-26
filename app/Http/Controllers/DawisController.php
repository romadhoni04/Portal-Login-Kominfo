<?php

namespace App\Http\Controllers;

use App\Models\Dawis;
use App\Models\Kel;
use App\Models\Kec;
use App\Models\Kab;
use App\Models\Prop;
use Illuminate\Http\Request;

class DawisController extends Controller
{
    /**
     * Tampilkan daftar semua Dawis dengan pencarian dan pagination.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Ambil data Dawis, relasi dengan kelurahan, kecamatan, kabupaten, dan provinsi
        $dawis = Dawis::with(['kel', 'kec', 'kab', 'prop'])
            ->when($search, function ($query, $search) {
                return $query->where('nama_dawis', 'like', "%{$search}%")
                    ->orWhere('rt', $search)
                    ->orWhere('rw', $search)
                    ->orWhereHas('kel', function ($q) use ($search) {
                        $q->where('nama_kel', 'like', "%{$search}%");
                    })
                    ->orWhereHas('kec', function ($q) use ($search) {
                        $q->where('nama_kec', 'like', "%{$search}%");
                    });
            })
            ->orderBy('nama_dawis', 'asc')
            ->paginate(10);

        return view('superadmin.dawis.index', compact('dawis', 'search'));
    }

    /**
     * Tampilkan form untuk membuat Dawis baru.
     */
    public function create()
    {
        $kelurahan = Kel::all();
        $kecamatan = Kec::all();
        $kabupaten = Kab::all();
        $provinsi = Prop::all();

        return view('superadmin.dawis.create', compact('kelurahan', 'kecamatan', 'kabupaten', 'provinsi'));
    }

    /**
     * Simpan data Dawis baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_dawis' => 'required|string|max:255',
            'rt' => 'nullable|integer',
            'rw' => 'nullable|integer',
            'dusun' => 'nullable|string|max:255',
            'no_kel' => 'required|exists:kel,no_kel',
            'no_kec' => 'required|exists:kec,no_kec',
            'no_kab' => 'required|exists:kab,no_kab',
            'no_prop' => 'required|exists:prop,no_prop',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Simpan data Dawis baru
        Dawis::create($request->all());

        // Redirect ke halaman daftar Dawis dengan pesan sukses
        return redirect()->route('superadmin.dawis.index')->with('success', 'Dawis berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail dari Dawis berdasarkan ID.
     */
    public function show($id)
    {
        $dawis = Dawis::with(['kel', 'kec', 'kab', 'prop', 'dataKeluarga', 'kepalaRumahTangga'])->findOrFail($id);

        return view('superadmin.dawis.show', compact('dawis'));
    }

    /**
     * Tampilkan form untuk mengedit data Dawis.
     */
    public function edit($id)
    {
        $dawis = Dawis::findOrFail($id);
        $kelurahan = Kel::all();
        $kecamatan = Kec::all();
        $kabupaten = Kab::all();
        $provinsi = Prop::all();

        return view('superadmin.dawis.edit', compact('dawis', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi'));
    }

    /**
     * Update data Dawis di dalam database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_dawis' => 'required|string|max:255',
            'rt' => 'nullable|integer',
            'rw' => 'nullable|integer',
            'dusun' => 'nullable|string|max:255',
            'no_kel' => 'required|exists:kel,no_kel',
            'no_kec' => 'required|exists:kec,no_kec',
            'no_kab' => 'required|exists:kab,no_kab',
            'no_prop' => 'required|exists:prop,no_prop',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Cari Dawis berdasarkan ID dan update data
        $dawis = Dawis::findOrFail($id);
        $dawis->update($request->all());

        // Redirect ke halaman daftar Dawis dengan pesan sukses
        return redirect()->route('superadmin.dawis.index')->with('success', 'Dawis berhasil diperbarui.');
    }

    /**
     * Hapus data Dawis dari database.
     */
    public function destroy($id)
    {
        $dawis = Dawis::findOrFail($id);
        $dawis->delete();

        // Redirect ke halaman daftar Dawis dengan pesan sukses
        return redirect()->route('superadmin.dawis.index')->with('success', 'Dawis berhasil dihapus.');
    }
}
