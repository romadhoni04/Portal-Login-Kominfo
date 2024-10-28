<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluargaAkumulasi extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'data_keluarga_akumulasi';
    // Nonaktifkan timestamps
    public $timestamps = false;
    // Menentukan primary key jika diperlukan
    protected $primaryKey = 'no_kk';

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'no_kk',
        'balita',
        'pus',
        'wus',
        'ibu_hamil',
        'ibu_menyusui',
        'lansia',
        'buta_baca',
        'buta_tulis',
        'buta_hitung',
        'makanan_pokok',
        'makanan_pokok_lain',
        'jamban_keluarga',
        'jamban_keluarga_jumlah',
        'sumber_air_keluarga',
        'sumber_air_keluarga_lain',
        'tempat_sampah_keluarga',
        'saluran_air_limbah',
        'stiker_p4k',
        'kriteria_rumah',
        'aktivitas_up2k',
        'aktivitas_up2k_lain',
        'aktivitas_usaha_kesehatan_lingkungan',
        'memiliki_tabungan',
    ];

    // Relasi ke tabel 'data_keluarga'
    public function dataKeluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'no_kk', 'no_kk');
    }
    public function kel()
    {
        return $this->belongsTo(Kel::class, 'no_kel');
    }

    public function kec()
    {
        return $this->belongsTo(Kec::class, 'no_kec');
    }
}
