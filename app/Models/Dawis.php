<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dawis extends Model
{
    use HasFactory;

    protected $table = 'dawis';
    protected $primaryKey = 'id'; // Gunakan kolom id sebagai primary key
    public $incrementing = true; // Auto-increment aktif
    protected $keyType = 'integer'; // Tipe data primary key
    public $timestamps = false; // Nonaktifkan timestamps jika tidak diperlukan

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

    // Model Dawis
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
    /**
     * Relasi ke model Prop (Provinsi).
     */
    public function provinsi()
    {
        return $this->belongsTo(Prop::class, 'no_prop', 'no_prop');
    }

    /**
     * Relasi ke model Kab (Kabupaten).
     */
    public function kabupaten()
    {
        return $this->belongsTo(Kab::class, 'no_kab', 'no_kab');
    }

    /**
     * Relasi ke model Kec (Kecamatan).
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kec::class, 'no_kec', 'no_kec');
    }

    /**
     * Relasi ke model Kel (Kelurahan).
     */
    public function kelurahan()
    {
        return $this->belongsTo(Kel::class, 'no_kel', 'no_kel');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
