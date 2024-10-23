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
use Illuminate\Support\Facades\DB;

class AdminDasaWismaController extends Controller
{
    /**
     * Menampilkan halaman pemilihan Dasa Wisma oleh user.
     */


    public function index()
    {
        $dasawisma = DB::table('dawis')
            ->leftJoin('kel', function ($join) {
                $join->on('dawis.no_prop', '=', 'kel.no_prop')
                    ->on('dawis.no_kab', '=', 'kel.no_kab')
                    ->on('dawis.no_kec', '=', 'kel.no_kec')
                    ->on('dawis.no_kel', '=', 'kel.no_kel');
            })
            ->leftJoin('kec', function ($join) {
                $join->on('kel.no_prop', '=', 'kec.no_prop')
                    ->on('kel.no_kab', '=', 'kec.no_kab')
                    ->on('kel.no_kec', '=', 'kec.no_kec');
            })
            ->leftJoin('kab', function ($join) {
                $join->on('kec.no_prop', '=', 'kab.no_prop')
                    ->on('kec.no_kab', '=', 'kab.no_kab');
            })
            ->leftJoin('prop', 'kab.no_prop', '=', 'prop.no_prop')
            ->select('dawis.*', 'kel.nama_kel', 'kec.nama_kec', 'kab.nama_kab', 'prop.nama_prop')
            ->get();

        return view('admin.dasawisma.index', compact('dasawisma'));
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
        // Ambil semua kelurahan berdasarkan no_kec
        $kelurahan = Kel::where('no_kec', $kecamatan)->get();

        return response()->json($kelurahan);
    }



    public function provinsi()
    {
        return $this->belongsTo(Prop::class, 'no_prop'); // Ganti 'provinsi_id' sesuai dengan kolom di database
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kab::class, 'no_kab'); // Ganti 'kabupaten_id' sesuai dengan kolom di database
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kec::class, 'no_kec'); // Ganti 'kecamatan_id' sesuai dengan kolom di database
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kel::class, 'no_kel'); // Ganti 'kelurahan_id' sesuai dengan kolom di database
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_dawis' => 'required|string|max:255',
            'provinsi' => 'required|integer',
            'kabupaten' => 'required|integer',
            'kecamatan' => 'required|integer',
            'kelurahan' => 'required|string', // Ubah menjadi string karena kombinasi value
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'dusun' => 'nullable|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Pisahkan kelurahan menjadi no_kel, no_kec, no_kab, dan no_prop
        $kelurahanParts = explode('-', $validatedData['kelurahan']);
        $no_kel = $kelurahanParts[0];
        $no_kec = $kelurahanParts[1];
        $no_kab = $kelurahanParts[2];
        $no_prop = $kelurahanParts[3];

        // Simpan data Dasa Wisma
        Dawis::create([
            'nama_dawis' => $validatedData['nama_dawis'],
            'no_kel' => $no_kel, // Simpan berdasarkan no_kel
            'no_kec' => $no_kec,
            'no_kab' => $no_kab,
            'no_prop' => $no_prop,
            'rt' => $validatedData['rt'],
            'rw' => $validatedData['rw'],
            'dusun' => $validatedData['dusun'],
            'tahun' => $validatedData['tahun'],
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
        $dawis = Dawis::findOrFail($id);
        $kepalaRumahTanggaList = KepalaRumahTangga::where('dawis_id', $id)->paginate(10);

        return view('admin.dasawisma.kepalaRumahTangga', [
            'dawisName' => $dawis->nama_dawis,
            'kepalaRumahTanggaList' => $kepalaRumahTanggaList,
            'dawisId' => $id,
        ]);
    }

    public function edit($id)
    {
        // Ambil data Dasa Wisma berdasarkan ID
        $dasaWisma = DB::table('dawis')
            ->leftJoin('kel', function ($join) {
                $join->on('dawis.no_prop', '=', 'kel.no_prop')
                    ->on('dawis.no_kab', '=', 'kel.no_kab')
                    ->on('dawis.no_kec', '=', 'kel.no_kec')
                    ->on('dawis.no_kel', '=', 'kel.no_kel');
            })
            ->leftJoin('kec', function ($join) {
                $join->on('kel.no_prop', '=', 'kec.no_prop')
                    ->on('kel.no_kab', '=', 'kec.no_kab')
                    ->on('kel.no_kec', '=', 'kec.no_kec');
            })
            ->leftJoin('kab', function ($join) {
                $join->on('kec.no_prop', '=', 'kab.no_prop')
                    ->on('kec.no_kab', '=', 'kab.no_kab');
            })
            ->leftJoin('prop', 'kab.no_prop', '=', 'prop.no_prop')
            ->select('dawis.*', 'kel.nama_kel', 'kec.nama_kec', 'kab.nama_kab', 'prop.nama_prop')
            ->where('dawis.id', $id)
            ->first();

        // Ambil data provinsi, kabupaten, kecamatan, dan kelurahan untuk dropdown
        $provinsi = DB::table('prop')->get();
        $kabupaten = DB::table('kab')->where('no_prop', $dasaWisma->no_prop)->get();
        $kecamatan = DB::table('kec')->where('no_kab', $dasaWisma->no_kab)->get();
        $kelurahan = DB::table('kel')->where('no_kec', $dasaWisma->no_kec)->get();

        return view('admin.dasawisma.edit', compact('dasaWisma', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_dawis' => 'required|string|max:255',
            'provinsi' => 'required|integer',
            'kabupaten' => 'required|integer',
            'kecamatan' => 'required|integer',
            'kelurahan' => 'required|string', // Simpan kombinasi no_kel, no_kec, no_kab, no_prop

            'dusun' => 'nullable|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Pisahkan kelurahan menjadi no_kel, no_kec, no_kab, dan no_prop
        $kelurahanParts = explode('-', $validatedData['kelurahan']);
        $no_kel = $kelurahanParts[0];
        $no_kec = $kelurahanParts[1];
        $no_kab = $kelurahanParts[2];
        $no_prop = $kelurahanParts[3];

        // Update data Dasa Wisma
        DB::table('dawis')
            ->where('id', $id)
            ->update([
                'nama_dawis' => $validatedData['nama_dawis'],
                'no_kel' => $no_kel,
                'no_kec' => $no_kec,
                'no_kab' => $no_kab,
                'no_prop' => $no_prop,

                'dusun' => $validatedData['dusun'],
                'tahun' => $validatedData['tahun'],
            ]);

        return redirect()->route('admin.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Temukan Dawis yang akan dihapus
        $dawis = Dawis::findOrFail($id);

        // Hapus semua Data Keluarga yang memiliki dawis_id terkait
        DB::table('data_keluarga')->where('dawis_id', $id)->delete();

        // Hapus Dawis
        $dawis->delete();

        return redirect()->route('admin.dasawisma.index')->with('success', 'Data Dasa Wisma berhasil dihapus.');
    }
}
