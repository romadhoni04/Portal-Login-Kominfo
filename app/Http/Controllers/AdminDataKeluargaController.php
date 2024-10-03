<?php

namespace App\Http\Controllers;

use App\Models\DataKeluarga;
use App\Models\Prop;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Dawis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminDataKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $provinsi = Prop::all();
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];

        // Pencarian berdasarkan provinsi
        if ($request->has('provinsi') && !empty($request->provinsi)) {
            $kabupaten = Kab::where('no_prop', $request->provinsi)->get();
        }

        // Pencarian berdasarkan kabupaten
        if ($request->has('kabupaten') && !empty($request->kabupaten)) {
            $kecamatan = Kec::where('no_kab', $request->kabupaten)->get();
        }

        // Pencarian berdasarkan kecamatan
        if ($request->has('kecamatan') && !empty($request->kecamatan)) {
            $kelurahan = Kel::where('no_kec', $request->kecamatan)->get();
        }

        // Tangkap input pencarian
        $search = $request->input('search');
        $tahun = $request->input('tahun');
        $provinsiId = $request->input('provinsi');
        $kabupatenId = $request->input('kabupaten');
        $kecamatanId = $request->input('kecamatan');
        $kelurahanId = $request->input('kelurahan');
        // Query untuk mengambil data Dasa Wisma dengan pencarian
        $query = DataKeluarga::with(['kel', 'kec', 'kab', 'prop']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_dawis', 'like', '%' . $search . '%')
                    ->orWhere('rt', 'like', '%' . $search . '%')
                    ->orWhere('rw', 'like', '%' . $search . '%')
                    ->orWhere('dusun', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan tahun
        if ($tahun) {
            $query->where('tahun', $tahun);
        }

        // Filter berdasarkan provinsi
        if ($provinsiId) {
            $query->where('no_prop', $provinsiId);
        }

        // Filter berdasarkan kabupaten
        if ($kabupatenId) {
            $query->where('no_kab', $kabupatenId);
        }

        // Filter berdasarkan kecamatan
        if ($kecamatanId) {
            $query->where('no_kec', $kecamatanId);
        }

        // Filter berdasarkan kelurahan
        if ($kelurahanId) {
            $query->where('no_kel', $kelurahanId);
        }



        $dataKeluarga = $query->paginate(10);

        return view('admin.dasawisma.datakeluarga.index', compact('dataKeluarga', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }

    public function create(Request $request)
    {
        // Ambil data untuk form
        $dawisId = $request->input('dawis_id');
        $kepalaRumahTanggaId = $request->input('kepala_rumah_tangga_id');


        $provinsi = Prop::all();
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];
        $dawis = Dawis::all();


        return view('admin.dasawisma.datakeluarga.create', compact('dawisId', 'kepalaRumahTanggaId', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'dawis'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'no_kk' => 'required|string|max:16',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'dawis_id' => 'nullable|exists:dawis,id', // Mengubah menjadi nullable
            'kelurahan' => 'required|integer',
            'kecamatan' => 'required|integer',
            'kabupaten' => 'required|integer',
            'provinsi' => 'required|integer',
            'kepala_rumah_tangga_id' => 'nullable|exists:kepala_rumah_tangga,id', // Mengubah menjadi nullable
        ]);


        DataKeluarga::create([
            'no_kk' => $request->no_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'dawis_id' => $request->dawis_id, // Ini bisa null
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id, // Ini bisa null
            'no_kel' => $request->kelurahan,
            'no_kec' => $request->kecamatan,
            'no_kab' => $request->kabupaten,
            'no_prop' => $request->provinsi,

        ]);

        return redirect()->route('admin.datakeluarga.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    public function edit($no_kk)
    {

        $dataKeluarga = DataKeluarga::with(['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])->findOrFail($no_kk);
        // Ambil data untuk form edit
        $provinsi = Prop::all();
        $kabupaten = Kab::where('no_prop', $dataKeluarga->no_prop)->get();
        $kecamatan = Kec::where('no_kab', $dataKeluarga->no_kab)->get();
        $kelurahan = Kel::where('no_kec', $dataKeluarga->no_kel)->get();

        return view('admin.dasawisma.datakeluarga.edit', compact('dataKeluarga', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }

    public function update(Request $request, $no_kk)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string|max:16',
            'nama_kepala_keluarga' => 'required|string|max:255',
            'dawis_id' => 'nullable|exists:dawis,id', // Mengubah menjadi nullable
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kepala_rumah_tangga_id' => 'nullable|exists:kepala_rumah_tangga,id', // Mengubah menjadi nullable
        ]);

        $dataKeluarga = DataKeluarga::findOrFail($no_kk);

        $dataKeluarga->update([
            'no_kk' => $request->no_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'dawis_id' => $request->dawis_id, // Ini bisa null
            'kepala_rumah_tangga_id' => $request->kepala_rumah_tangga_id, // Ini bisa null
            'no_kel' => $request->kelurahan,
            'no_kec' => $request->kecamatan,
            'no_kab' => $request->kabupaten,
            'no_prop' => $request->provinsi,

        ]);
        $dataKeluarga->update($request->all());

        $dataKeluarga = DataKeluarga::where('no_kk', $no_kk)->first();
        $dataKeluarga->update($validatedData);

        return redirect()->route('admin.datakeluarga.index')->with('success', 'Data keluarga berhasil diperbarui');
    }

    public function show($id)
    {
        // Temukan data keluarga berdasarkan ID
        $dataKeluarga = DataKeluarga::findOrFail($id);

        // Tampilkan view untuk detail data keluarga
        return view('admin.dasawisma.datakeluarga.show', compact('dataKeluarga'));
    }



    public function destroy($no_kk)
    {
        $dataKeluarga = DataKeluarga::findOrFail($no_kk);
        $dataKeluarga->delete();

        return redirect()->route('admin.datakeluarga.index')->with('success', 'Data keluarga berhasil dihapus');
    }

    public function getKabupaten($provinsi)
    {
        $kabupaten = Kab::where('no_prop', $provinsi)->get();
        return response()->json($kabupaten);
    }

    public function getKecamatan($kabupaten)
    {
        $kecamatan = Kec::where('no_kab', $kabupaten)->get();
        return response()->json($kecamatan);
    }

    public function getKelurahan($kecamatan)
    {
        $kelurahan = Kel::where('no_kec', $kecamatan)->get();
        return response()->json($kelurahan);
    }

    public function provinsi()
    {
        return $this->belongsTo(Prop::class, 'provinsi_id'); // Ganti 'provinsi_id' sesuai dengan kolom di database
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kab::class, 'kabupaten_id'); // Ganti 'kabupaten_id' sesuai dengan kolom di database
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kec::class, 'kecamatan_id'); // Ganti 'kecamatan_id' sesuai dengan kolom di database
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kel::class, 'kelurahan_id'); // Ganti 'kelurahan_id' sesuai dengan kolom di database
    }
}
