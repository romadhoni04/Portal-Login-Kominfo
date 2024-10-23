<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    protected $table = 'data_keluarga';
    protected $primaryKey = 'no_kk';
    public $incrementing = false; // No KK bukan auto-increment
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'no_kk',
        'nama_kepala_keluarga',
        'dawis_id',
        'no_kel',
        'no_kec',
        'no_kab',
        'no_prop',
        'kepala_rumah_tangga_id',
    ];

    // Relasi ke tabel lain
    public function dawis()
    {
        return $this->belongsTo(Dawis::class, 'dawis_id');
    }


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
    public function kepalaRumahTangga()
    {
        return $this->belongsTo(KepalaRumahTangga::class, 'kepala_rumah_tangga_id');
    }
    public function kepala_rumah_tangga()
    {
        return $this->belongsTo(KepalaRumahTangga::class, 'kepala_rumah_tangga_id', 'id');
    }
}
