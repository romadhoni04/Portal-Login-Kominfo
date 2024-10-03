<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KepalaRumahTangga;
use App\Models\Dawis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminKepalaRumahTanggaController extends Controller
{
    // Menampilkan daftar Kepala Rumah Tangga untuk Dasa Wisma tertentu
    public function index($dawisId)
    {
        $dawis = Dawis::findOrFail($dawisId);
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $dawisId)->paginate(10);

        return view('admin.dasawisma.kepalaRumahTangga', [
            'dawisId' => $dawisId,
            'dawisName' => $dawis->nama_dawis,
            'kepalaRumahTanggaList' => $kepalaRumahTanggaList,
        ]);
    }

    // Menampilkan form untuk membuat Kepala Rumah Tangga baru
    public function create($dawisId)
    {
        // Ambil data Dawis berdasarkan ID
        $dawis = Dawis::findOrFail($dawisId);

        // Kirimkan $dawisName ke view
        return view('admin.dasawisma.kepalaRumahTanggaCreate', [
            'dawisId' => $dawisId,
            'dawisName' => $dawis->nama_dawis, // Ini variabel yang Anda perlukan
        ]);
    }


    // Menyimpan Kepala Rumah Tangga baru
    public function store(Request $request, $dawisId)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan data Kepala Rumah Tangga
        KepalaRumahTangga::create([
            'nama' => $request->nama,
            'dawis_id' => $dawisId,
        ]);

        return redirect()->route('admin.dasawisma.kepalaRumahTangga', $dawisId)->with('success', 'Kepala Rumah Tangga berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Kepala Rumah Tangga
    public function edit($id)
    {
        // Ambil Kepala Rumah Tangga berdasarkan ID
        $kepalaRumahTangga = KepalaRumahTangga::findOrFail($id);

        // Ambil Dasa Wisma ID
        $dawisId = $kepalaRumahTangga->dawis_id; // Pastikan Anda mendapatkan ID Dasa Wisma

        // Ambil Dasa Wisma berdasarkan ID untuk mendapatkan nama
        $dawis = Dawis::findOrFail($dawisId);

        // Kembalikan view dengan variabel yang diperlukan
        return view('admin.dasawisma.kepalaRumahTanggaEdit', [
            'kepalaRumahTangga' => $kepalaRumahTangga,
            'dawisId' => $dawisId,               // Tambahkan variabel ini
            'dawisName' => $dawis->nama_dawis,   // Tambahkan juga nama jika diperlukan
        ]);
    }


    // Memperbarui data Kepala Rumah Tangga
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Memperbarui data Kepala Rumah Tangga
        $kepalaRumahTangga = KepalaRumahTangga::findOrFail($id);
        $kepalaRumahTangga->update($request->only('nama'));

        return redirect()->route('admin.dasawisma.kepalaRumahTangga', $kepalaRumahTangga->dawis_id)
            ->with('success', 'Kepala Rumah Tangga berhasil diperbarui.');
    }

    // Menampilkan detail Kepala Rumah Tangga
    public function show($dawisId, $id)
    {
        // Ambil Kepala Rumah Tangga berdasarkan ID
        $kepalaRumahTangga = KepalaRumahTangga::findOrFail($id);

        // Ambil Dasa Wisma berdasarkan dawisId
        $dawis = Dawis::findOrFail($dawisId);

        // Kembalikan view dengan data yang diperlukan
        return view('admin.dasawisma.kepalaRumahTanggaShow', [
            'kepalaRumahTangga' => $kepalaRumahTangga,
            'dawisId' => $dawisId,               // Tambahkan variabel ini
            'dawisName' => $dawis->nama_dawis,   // Tambahkan nama Dasa Wisma jika diperlukan
        ]);
    }


    // Menghapus Kepala Rumah Tangga
    public function destroy($id)
    {
        $kepalaRumahTangga = KepalaRumahTangga::findOrFail($id);
        $dawisId = $kepalaRumahTangga->dawis_id;

        $kepalaRumahTangga->delete();

        return redirect()->route('admin.dasawisma.kepalaRumahTangga', $dawisId)
            ->with('success', 'Kepala Rumah Tangga berhasil dihapus.');
    }
}
