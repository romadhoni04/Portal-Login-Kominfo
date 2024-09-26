<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPekerjaan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'ref_pekerjaan';

    // Field yang bisa diisi massal
    protected $fillable = [
        'nama', // kolom nama di tabel ref_pekerjaan
    ];

    // Relasi ke Data Penduduk
    public function dataPenduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'pekerjaan', 'id');
    }
}
