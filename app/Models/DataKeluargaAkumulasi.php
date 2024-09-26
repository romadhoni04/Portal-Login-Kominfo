<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluargaAkumulasi extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'data_keluarga_akumulasi';

    // Menentukan primary key jika diperlukan
    protected $primaryKey = 'no_kk';

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'no_kk',
        'balita',
        'pus',
        'wus',
        'tiga_buta',
        'ibu_hamil',
        'ibu_menyusui',
        'lansia',
        'makanan_pokok',
        'makanan_pokok_lain',
        'jumlah_keluarga',
        'jumlah_keluarga_jumlah',
        'sumber_air_keluarga',
        'sumber_air_keluarga_lain',
        'tempat_sampah_keluarga',
        'saluran_air_limbah',
        'stiker_pkk',
        'kriteria_rumah',
        'aktivitas_up2k',
        'aktivitas_up2k_lain',
        'aktivitas_usaha_lingkungan',
        'memiliki_tabungan',
    ];

    // Relasi ke tabel 'data_keluarga'
    public function dataKeluarga()
    {
        return $this->belongsTo(DataKeluarga::class, 'no_kk', 'no_kk');
    }
}
