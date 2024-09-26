<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dawis extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model (defaultnya 'dawis')
    protected $table = 'dawis';
    protected $primaryKey = 'nama_dawis'; // Primary key adalah no_prop
    public $incrementing = false; // Jika no_prop bukan tipe auto-increment
    protected $keyType = 'integer'; // Tipe data primary key (ubah ke 'integer' jika tipe integer)
    public $timestamps = false; // Nonaktifkan timestamps

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama_dawis',
        'rt',
        'rw',
        'dusun',
        'no_kel',
        'no_kec',
        'no_kab',
        'no_prop',
        'tahun',
    ];


    // Relasi ke tabel 'kel'
    public function kel()
    {
        return $this->belongsTo(Kel::class, 'no_kel');
    }

    // Relasi ke tabel 'kec'
    public function kec()
    {
        return $this->belongsTo(Kec::class, 'no_kec');
    }

    // Relasi ke tabel 'kab'
    public function kab()
    {
        return $this->belongsTo(Kab::class, 'no_kab');
    }

    // Relasi ke tabel 'prop'
    public function prop()
    {
        return $this->belongsTo(Prop::class, 'no_prop');
    }

    // Relasi ke tabel 'data_keluarga' (satu Dawis bisa memiliki banyak keluarga)
    //  public function dataKeluarga()
    //{
    //  return $this->hasMany(DataKeluarga::class, 'dawis_id');
    //  }

    // Relasi ke tabel 'kepala_rumah_tangga' (satu Dawis bisa memiliki banyak kepala rumah tangga)
    //public function kepalaRumahTangga()
    //{
    //  return $this->hasMany(KepalaRumahTangga::class, 'dawis_id');
    //}
}
