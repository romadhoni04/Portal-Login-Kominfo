<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefShdk extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'ref_shdk';

    // Field yang bisa diisi massal
    protected $fillable = [
        'nama_shdk', // kolom nama SHDK (misal: Kepala Keluarga, Anak, Istri, dll.)
    ];

    // Relasi ke Data Penduduk (jika data penduduk menggunakan SHDK ini)
    public function dataPenduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'shdk', 'id');
    }
}
