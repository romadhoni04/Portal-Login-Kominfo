<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPendidikan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'ref_pendidikan';

    // Field yang bisa diisi massal
    protected $fillable = [
        'nama', // kolom nama di tabel ref_pendidikan
    ];

    // Relasi ke Data Penduduk
    public function dataPenduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'pendidikan', 'id');
    }
}
