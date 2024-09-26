<?php

namespace App\Http\Controllers;

use App\Models\Prop;
use Illuminate\Http\Request;

class UserPropController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Ambil data provinsi dengan pencarian
        $provinsi = Prop::when($search, function ($query, $search) {
            return $query->where('nama_prop', 'like', "%{$search}%");
        })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('user.provinsi.index', compact('provinsi', 'search')); // Ganti dengan view user
    }

    public function show($id)
    {
        // Ambil data provinsi berdasarkan ID
        $prop = Prop::findOrFail($id);
        return view('user.provinsi.show', compact('prop')); // Ganti dengan view user
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan provinsi baru
        return view('user.provinsi.create'); // Ganti dengan view user
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_prop' => 'required|integer|unique:props,no_prop', // Pastikan kolom no_prop ada di tabel
            'nama_prop' => 'required|string|max:255',
        ]);

        // Simpan data provinsi baru ke database
        Prop::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('user.provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }
}
