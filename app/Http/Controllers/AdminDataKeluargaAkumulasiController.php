<?php

namespace App\Http\Controllers;

use App\Models\DataKeluargaAkumulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDataKeluargaAkumulasiController extends Controller
{

    public function index(Request $request)
    {
        $filter = $request->input('filter'); // Filter yang diterima dari request (kecamatan_kelurahan, kecamatan, kelurahan)

        $query = DB::table('data_keluarga as dk')
            ->join('data_keluarga_akumulasi as dka', 'dk.no_kk', '=', 'dka.no_kk')
            ->join('kec as kc', function ($join) {
                $join->on('dk.no_prop', '=', 'kc.no_prop')
                    ->on('dk.no_kab', '=', 'kc.no_kab')
                    ->on('dk.no_kec', '=', 'kc.no_kec');
            })
            ->join('kel as kl', function ($join) {
                $join->on('dk.no_prop', '=', 'kl.no_prop')
                    ->on('dk.no_kab', '=', 'kl.no_kab')
                    ->on('dk.no_kec', '=', 'kl.no_kec')
                    ->on('dk.no_kel', '=', 'kl.no_kel');
            });

        if ($filter === 'kecamatan') {
            $query->select(
                'kc.nama_kec as nama_kecamatan',
                DB::raw('SUM(dka.balita) as total_balita'),
                DB::raw('SUM(dka.pus) as total_pus'),
                DB::raw('SUM(dka.wus) as total_wus'),
                DB::raw('SUM(dka.tiga_buta) as total_tiga_buta'),
                DB::raw('SUM(dka.ibu_hamil) as total_ibu_hamil'),
                DB::raw('SUM(dka.ibu_menyusui) as total_ibu_menyusui'),
                DB::raw('SUM(dka.lansia) as total_lansia'),
                DB::raw('SUM(dka.makanan_pokok) as total_makanan_pokok'),
                DB::raw('SUM(dka.jumlah_keluarga) as total_jumlah_keluarga'),
                DB::raw('SUM(dka.jumlah_keluarga_jumlah) as total_jumlah_keluarga_jumlah'),
                DB::raw('SUM(dka.sumber_air_keluarga) as total_sumber_air_keluarga'),
                DB::raw('SUM(dka.tempat_sampah_keluarga) as total_tempat_sampah_keluarga'),
                DB::raw('SUM(dka.saluran_air_limbah) as total_saluran_air_limbah'),
                DB::raw('SUM(dka.stiker_p4k) as total_stiker_p4k'),
                DB::raw('SUM(dka.kriteria_rumah) as total_kriteria_rumah'),
                DB::raw('SUM(dka.aktivitas_up2k) as total_aktivitas_up2k'),
                DB::raw('SUM(dka.aktivitas_usaha_kesehatan_lingkungan) as total_aktivitas_usaha_kesehatan_lingkungan'),
                DB::raw('SUM(dka.memiliki_tabungan) as total_memiliki_tabungan')
            )
                ->groupBy('kc.nama_kec');
        } elseif ($filter === 'kelurahan') {
            $query->select(
                'kl.nama_kel as nama_kelurahan',
                DB::raw('SUM(dka.balita) as total_balita'),
                DB::raw('SUM(dka.pus) as total_pus'),
                DB::raw('SUM(dka.wus) as total_wus'),
                DB::raw('SUM(dka.tiga_buta) as total_tiga_buta'),
                DB::raw('SUM(dka.ibu_hamil) as total_ibu_hamil'),
                DB::raw('SUM(dka.ibu_menyusui) as total_ibu_menyusui'),
                DB::raw('SUM(dka.lansia) as total_lansia'),
                DB::raw('SUM(dka.makanan_pokok) as total_makanan_pokok'),
                DB::raw('SUM(dka.jumlah_keluarga) as total_jumlah_keluarga'),
                DB::raw('SUM(dka.jumlah_keluarga_jumlah) as total_jumlah_keluarga_jumlah'),
                DB::raw('SUM(dka.sumber_air_keluarga) as total_sumber_air_keluarga'),
                DB::raw('SUM(dka.tempat_sampah_keluarga) as total_tempat_sampah_keluarga'),
                DB::raw('SUM(dka.saluran_air_limbah) as total_saluran_air_limbah'),
                DB::raw('SUM(dka.stiker_p4k) as total_stiker_p4k'),
                DB::raw('SUM(dka.kriteria_rumah) as total_kriteria_rumah'),
                DB::raw('SUM(dka.aktivitas_up2k) as total_aktivitas_up2k'),
                DB::raw('SUM(dka.aktivitas_usaha_kesehatan_lingkungan) as total_aktivitas_usaha_kesehatan_lingkungan'),
                DB::raw('SUM(dka.memiliki_tabungan) as total_memiliki_tabungan')
            )
                ->groupBy('kl.nama_kel');
        } else {
            // Default tampil kecamatan dan kelurahan
            $query->select(
                'kc.nama_kec as nama_kecamatan',
                'kl.nama_kel as nama_kelurahan',
                DB::raw('SUM(dka.balita) as total_balita'),
                DB::raw('SUM(dka.pus) as total_pus'),
                DB::raw('SUM(dka.wus) as total_wus'),
                DB::raw('SUM(dka.tiga_buta) as total_tiga_buta'),
                DB::raw('SUM(dka.ibu_hamil) as total_ibu_hamil'),
                DB::raw('SUM(dka.ibu_menyusui) as total_ibu_menyusui'),
                DB::raw('SUM(dka.lansia) as total_lansia'),
                DB::raw('SUM(dka.makanan_pokok) as total_makanan_pokok'),
                DB::raw('SUM(dka.jumlah_keluarga) as total_jumlah_keluarga'),
                DB::raw('SUM(dka.jumlah_keluarga_jumlah) as total_jumlah_keluarga_jumlah'),
                DB::raw('SUM(dka.sumber_air_keluarga) as total_sumber_air_keluarga'),
                DB::raw('SUM(dka.tempat_sampah_keluarga) as total_tempat_sampah_keluarga'),
                DB::raw('SUM(dka.saluran_air_limbah) as total_saluran_air_limbah'),
                DB::raw('SUM(dka.stiker_p4k) as total_stiker_p4k'),
                DB::raw('SUM(dka.kriteria_rumah) as total_kriteria_rumah'),
                DB::raw('SUM(dka.aktivitas_up2k) as total_aktivitas_up2k'),
                DB::raw('SUM(dka.aktivitas_usaha_kesehatan_lingkungan) as total_aktivitas_usaha_kesehatan_lingkungan'),
                DB::raw('SUM(dka.memiliki_tabungan) as total_memiliki_tabungan')
            )
                ->groupBy('kc.nama_kec', 'kl.nama_kel');
        }

        $dataAkumulasi = $query->get();
        $mappedData = $dataAkumulasi->map(function ($item) use ($filter) {
            if ($filter === 'kecamatan') {
                return $item->nama_kecamatan;
            } elseif ($filter === 'kelurahan') {
                return $item->nama_kelurahan;
            }
            return $item->nama_kecamatan . ' - ' . ($item->nama_kelurahan ?? 'Tidak Diketahui');
        });

        // Mengambil total data akumulasi untuk semua kategori
        $totalBalita = [];
        $totalPUS = [];
        $totalWUS = [];
        $totalTigaButa = [];
        $totalIbuHamil = [];
        $totalIbuMenyusui = [];
        $totalLansia = [];
        $totalMakananPokok = [];
        $totalJumlahKeluarga = [];
        $totalJumlahKeluargaJumlah = [];
        $totalSumberAirKeluarga = [];
        $totalTempatSampahKeluarga = [];
        $totalSaluranAirLimbah = [];
        $totalStikerP4K = [];
        $totalKriteriaRumah = [];
        $totalAktivitasUP2K = [];
        $totalAktivitasUsahaKesehatanLingkungan = [];
        $totalMemilikiTabungan = [];

        foreach ($dataAkumulasi as $item) {
            $totalBalita[] = $item->total_balita;
            $totalPUS[] = $item->total_pus;
            $totalWUS[] = $item->total_wus;
            $totalTigaButa[] = $item->total_tiga_buta;
            $totalIbuHamil[] = $item->total_ibu_hamil;
            $totalIbuMenyusui[] = $item->total_ibu_menyusui;
            $totalLansia[] = $item->total_lansia;
            $totalMakananPokok[] = $item->total_makanan_pokok;
            $totalJumlahKeluarga[] = $item->total_jumlah_keluarga;
            $totalJumlahKeluargaJumlah[] = $item->total_jumlah_keluarga_jumlah;
            $totalSumberAirKeluarga[] = $item->total_sumber_air_keluarga;
            $totalTempatSampahKeluarga[] = $item->total_tempat_sampah_keluarga;
            $totalSaluranAirLimbah[] = $item->total_saluran_air_limbah;
            $totalStikerP4K[] = $item->total_stiker_p4k;
            $totalKriteriaRumah[] = $item->total_kriteria_rumah;
            $totalAktivitasUP2K[] = $item->total_aktivitas_up2k;
            $totalAktivitasUsahaKesehatanLingkungan[] = $item->total_aktivitas_usaha_kesehatan_lingkungan;
            $totalMemilikiTabungan[] = $item->total_memiliki_tabungan;
        }

        // Kemudian, kirim data ini ke view
        return view('admin.dasawisma.datakeluargaakumulasi.index', compact(
            'dataAkumulasi',
            'filter',
            'mappedData',
            'totalBalita',
            'totalPUS',
            'totalWUS',
            'totalTigaButa',
            'totalIbuHamil',
            'totalIbuMenyusui',
            'totalLansia',
            'totalMakananPokok',
            'totalJumlahKeluarga',
            'totalJumlahKeluargaJumlah',
            'totalSumberAirKeluarga',
            'totalTempatSampahKeluarga',
            'totalSaluranAirLimbah',
            'totalStikerP4K',
            'totalKriteriaRumah',
            'totalAktivitasUP2K',
            'totalAktivitasUsahaKesehatanLingkungan',
            'totalMemilikiTabungan'
        ));
    }


    public function create()
    {
        return view('admin.dasawisma.datakeluargaakumulasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|exists:data_keluarga,no_kk',
            'balita' => 'nullable|integer',
            'pus' => 'nullable|integer',
            'wus' => 'nullable|integer',
            'tiga_buta' => 'nullable|integer',
            'ibu_hamil' => 'nullable|integer',
            'ibu_menyusui' => 'nullable|integer',
            'lansia' => 'nullable|integer',
            'makanan_pokok' => 'nullable|integer',
            'makanan_pokok_lain' => 'nullable|string',
            'jamban_keluarga' => 'nullable|integer',
            'jamban_keluarga_jumlah' => 'nullable|integer',
            'sumber_air_keluarga' => 'nullable|integer',
            'sumber_air_keluarga_lain' => 'nullable|string',
            'tempat_sampah_keluarga' => 'nullable|integer',
            'saluran_air_limbah' => 'nullable|integer',
            'stiker_p4k' => 'nullable|integer',
            'kriteria_rumah' => 'nullable|integer',
            'aktivitas_up2k' => 'nullable|integer',
            'aktivitas_up2k_lain' => 'nullable|string',
            'aktivitas_usaha_kesehatan_lingkungan' => 'nullable|integer',
            'memiliki_tabungan' => 'nullable|integer',
        ]);

        DataKeluargaAkumulasi::create($request->all());

        return redirect()->route('admin.datakeluargaakumulasi.index')->with('success', 'Data keluarga akumulasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = DataKeluargaAkumulasi::findOrFail($id);
        return view('admin.dasawisma.datakeluargaakumulasi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = DataKeluargaAkumulasi::findOrFail($id);
        return view('admin.dasawisma.datakeluargaakumulasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_kk' => 'required|exists:data_keluarga,no_kk',
            'balita' => 'nullable|integer',
            'pus' => 'nullable|integer',
            'wus' => 'nullable|integer',
            'tiga_buta' => 'nullable|integer',
            'ibu_hamil' => 'nullable|integer',
            'ibu_menyusui' => 'nullable|integer',
            'lansia' => 'nullable|integer',
            'makanan_pokok' => 'nullable|integer',
            'makanan_pokok_lain' => 'nullable|string',
            'jamban_keluarga' => 'nullable|integer',
            'jamban_keluarga_jumlah' => 'nullable|integer',
            'sumber_air_keluarga' => 'nullable|integer',
            'sumber_air_keluarga_lain' => 'nullable|string',
            'tempat_sampah_keluarga' => 'nullable|integer',
            'saluran_air_limbah' => 'nullable|integer',
            'stiker_p4k' => 'nullable|integer',
            'kriteria_rumah' => 'nullable|integer',
            'aktivitas_up2k' => 'nullable|integer',
            'aktivitas_up2k_lain' => 'nullable|string',
            'aktivitas_usaha_kesehatan_lingkungan' => 'nullable|integer',
            'memiliki_tabungan' => 'nullable|integer',
        ]);

        $data = DataKeluargaAkumulasi::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.datakeluargaakumulasi.index')->with('success', 'Data keluarga akumulasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = DataKeluargaAkumulasi::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.datakeluargaakumulasi.index')->with('success', 'Data keluarga akumulasi berhasil dihapus.');
    }
}
