<?php

namespace App\Http\Controllers;

use App\Models\Prop;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Dawis; // Import model Dawis
use App\Models\KepalaRumahTangga;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDasaWismaController extends Controller
{
    /**
     * Menampilkan halaman pemilihan Dasa Wisma oleh user.
     */

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
        $query = Dawis::with(['kel', 'kec', 'kab', 'prop']);

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

        // Eksekusi query dengan pagination
        $dawisList = $query->paginate(10);

        return view('admin.dasawisma.index', compact('dawisList', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }


    /**
     * Menampilkan form untuk menambah Dasa Wisma.
     */
    public function create()
    {
        $provinsi = Prop::all();
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];

        return view('admin.dasawisma.create', compact('provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
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


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_dawis' => 'required|string|max:255',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'dusun' => 'nullable|string|max:255',
            'kelurahan' => 'required|integer',
            'kecamatan' => 'required|integer',
            'kabupaten' => 'required|integer',
            'provinsi' => 'required|integer',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);



        // Menyimpan data Dasa Wisma
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


        return redirect()->route('admin.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil disimpan.');
    }


    public function show($id)
    {

        $dawis = Dawis::with(['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])->findOrFail($id);
        return view('admin.dasawisma.show', compact('dawis'));
    }

    public function kepalaRumahTangga($id)
    {
        $dawis = dawis::findOrFail($id);
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $id)->paginate(10);

        return view('admin.dasawisma.kepalaRumahTangga', [
            'dawisName' => $dawis->nama_dawis,
            'kepalaRumahTanggaList' => $kepalaRumahTanggaList,
            'dawisId' => $id,
        ]);
    }




    public function edit($id)
    {
        $dawis = Dawis::with(['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])->findOrFail($id);
        $provinsi = Prop::all();
        $kabupaten = Kab::where('no_prop', $dawis->no_prop)->get();
        $kecamatan = Kec::where('no_kab', $dawis->no_kab)->get();
        $kelurahan = Kel::where('no_kec', $dawis->no_kec)->get();

        return view('admin.dasawisma.edit', compact('dawis', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }


    public function update(Request $request, $id)
    {
        Log::info('ID yang diterima untuk update: ' . $id);

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

        $dawis = Dawis::findOrFail($id);
        $dawis->update([
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
        $dawis->update($request->all());
        return redirect()->route('admin.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dawis = Dawis::findOrFail($id);
        $dawis->delete();

        return redirect()->route('admin.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil dihapus.');
    }
}
