<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prop;
use App\Models\Kab;
use App\Models\Kec;
use App\Models\Kel;
use App\Models\Dawis;

class UserDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Menghitung jumlah total user
        $users = User::count();

        // Mengambil semua provinsi
        $provinsi = Prop::all();

        // Inisialisasi variabel kabupaten, kecamatan, kelurahan, dan dawis
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];
        $dawis = null;

        // Pencarian berdasarkan provinsi
        if ($request->filled('provinsi')) {
            $kabupaten = Kab::where('no_prop', $request->provinsi)->get();

            // Memastikan ada provinsi yang dipilih
            if ($kabupaten->isEmpty()) {
                return back()->withErrors(['provinsi' => 'Provinsi tidak ditemukan']);
            }
        }

        // Pencarian berdasarkan kabupaten
        if ($request->filled('kabupaten')) {
            $kecamatan = Kec::where('no_kab', $request->kabupaten)->get();

            // Memastikan ada kabupaten yang dipilih
            if ($kecamatan->isEmpty()) {
                return back()->withErrors(['kabupaten' => 'Kabupaten tidak ditemukan']);
            }
        }

        // Pencarian berdasarkan kecamatan
        if ($request->filled('kecamatan')) {
            $kelurahan = Kel::where('no_kec', $request->kecamatan)->get();

            // Memastikan ada kecamatan yang dipilih
            if ($kelurahan->isEmpty()) {
                return back()->withErrors(['kecamatan' => 'Kecamatan tidak ditemukan']);
            }
        }

        // Widget dashboard
        $widget = [
            'users' => $users,
            // Tambahkan data lainnya ke widget jika perlu
        ];

        // Mengambil data Dasa Wisma dengan relasi dan pagination
        $dawisList = Dawis::with(['kel', 'kec', 'kab', 'prop'])->paginate(10);

        // Mengirimkan data ke view
        return view('user.dashboard', compact(
            'widget',
            'dawisList',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan'
        ));
    }

    /**
     * Mendapatkan data kabupaten berdasarkan provinsi.
     *
     * @param string $provinsi
     * @return \Illuminate\Http\JsonResponse
     */
    public function getKabupaten($provinsi)
    {
        $kabupaten = Kab::where('no_prop', $provinsi)->get();

        if ($kabupaten->isEmpty()) {
            return response()->json(['message' => 'Kabupaten tidak ditemukan'], 404);
        }

        return response()->json($kabupaten);
    }

    /**
     * Mendapatkan data kecamatan berdasarkan kabupaten.
     *
     * @param string $kabupaten
     * @return \Illuminate\Http\JsonResponse
     */
    public function getKecamatan($kabupaten)
    {
        $kecamatan = Kec::where('no_kab', $kabupaten)->get();

        if ($kecamatan->isEmpty()) {
            return response()->json(['message' => 'Kecamatan tidak ditemukan'], 404);
        }

        return response()->json($kecamatan);
    }

    /**
     * Mendapatkan data kelurahan berdasarkan kecamatan.
     *
     * @param string $kecamatan
     * @return \Illuminate\Http\JsonResponse
     */
    public function getKelurahan($kecamatan)
    {
        $kelurahan = Kel::where('no_kec', $kecamatan)->get();

        if ($kelurahan->isEmpty()) {
            return response()->json(['message' => 'Kelurahan tidak ditemukan'], 404);
        }

        return response()->json($kelurahan);
    }
}
