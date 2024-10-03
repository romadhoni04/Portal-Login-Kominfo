<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\RefShdk;
use App\Models\RefPerkawinan;
use App\Models\RefPendidikan;
use App\Models\RefPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminDataPendudukController extends Controller
{
    public function index()
    {
        $dataPenduduk = DataPenduduk::with(['shdk', 'statusKawin', 'pendidikan', 'pekerjaan'])->paginate(10);
        return view('admin.dasawisma.datapenduduk.index', compact('dataPenduduk'));
    }

    public function create()
    {
        $shdks = DB::table('ref_shdk')->get();
        $statusKawin = DB::table('ref_perkawinan')->get();
        $pendidikans = DB::table('ref_pendidikan')->get();
        $pekerjaans = DB::table('ref_pekerjaan')->get();

        return view('admin.dasawisma.datapenduduk.create', compact('shdks', 'statusKawin', 'pendidikans', 'pekerjaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required',
            'no_ktp' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'shdk' => 'required',
            'status_kawin' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);

        DataPenduduk::create([
            'no_kk' => $request->no_kk,
            'no_ktp' => $request->no_ktp,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'shdk' => $request->shdk,
            'status_kawin' => $request->status_kawin,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('data_penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penduduk = DataPenduduk::findOrFail($id);
        $shdks = RefShdk::all();
        $statusKawin = RefPerkawinan::all();
        $pendidikans = RefPendidikan::all();
        $pekerjaans = RefPekerjaan::all();
        return view('admin.dasawisma.datapenduduk.edit', compact('penduduk', 'shdks', 'statusKawin', 'pendidikans', 'pekerjaans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_kk' => 'required',
            'no_ktp' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'shdk' => 'required',
            'status_kawin' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);

        $penduduk = DataPenduduk::findOrFail($id);
        $penduduk->update($request->all());

        return redirect()->route('data_penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penduduk = DataPenduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('data_penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }

    public function show($id)
    {
        $penduduk = DataPenduduk::with(['shdk', 'statusKawin', 'pendidikan', 'pekerjaan'])->findOrFail($id);
        return view('admin.dasawisma.datapenduduk.show', compact('penduduk'));
    }

    protected $table = 'data_penduduk';

    public function shdk()
    {
        return $this->belongsTo(RefShdk::class, 'shdk', 'id');
    }

    public function statusKawin()
    {
        return $this->belongsTo(RefPerkawinan::class, 'status_kawin', 'id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(RefPendidikan::class, 'pendidikan', 'id');
    }

    public function pekerjaan()
    {
        return $this->belongsTo(RefPekerjaan::class, 'pekerjaan', 'id');
    }
}
