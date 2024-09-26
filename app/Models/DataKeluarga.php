<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model (defaultnya 'data_keluargas')
    protected $table = 'data_keluarga';

    // Menentukan primary key tabel
    protected $primaryKey = 'no_kk';

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama_kepala_keluarga',
        'dawis_id',
        'no_kel',
        'no_kec',
        'no_kab',
        'no_prop',
        'kepala_rumah_tangga_id',
    ];

    // Relasi ke tabel lain (Foreign Key)

    public function dawis()
    {
        return $this->belongsTo(Dawis::class);
    }

    public function kel()
    {
        return $this->belongsTo(Kel::class, 'no_kel');
    }

    public function kec()
    {
        return $this->belongsTo(Kec::class, 'no_kec');
    }

    public function kab()
    {
        return $this->belongsTo(Kab::class, 'no_kab');
    }

    public function prop()
    {
        return $this->belongsTo(Prop::class, 'no_prop');
    }

    public function kepalaRumahTangga()
    {
        return $this->belongsTo(KepalaRumahTangga::class, 'kepala_rumah_tangga_id');
    }
}
