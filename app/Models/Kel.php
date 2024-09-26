<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kel extends Model
{
    use HasFactory;

    protected $table = 'kel';
    protected $primaryKey = 'no_kel'; // Primary key adalah no_prop
    public $incrementing = false; // Jika no_prop bukan tipe auto-increment
    protected $keyType = 'integer'; // Tipe data primary key (ubah ke 'integer' jika tipe integer)
    public $timestamps = false; // Nonaktifkan timestamps
    protected $fillable = [
        'no_kel',
        'nama_kel',
        'no_kec',
        'no_kab',
        'no_prop',
    ];

    // Relasi Many-to-One ke Kec (Kecamatan)
    public function kecamatan()
    {
        return $this->belongsTo(Kec::class, 'no_kec', 'no_kec');
    }

    // Relasi Many-to-One ke Kab (Kabupaten/Kota)
    public function kabupaten()
    {
        return $this->belongsTo(Kab::class, 'no_kab', 'no_kab');
    }

    // Relasi Many-to-One ke Prop (Provinsi)
    public function provinsi()
    {
        return $this->belongsTo(Prop::class, 'no_prop', 'no_prop');
    }
}
