<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kec extends Model
{
    use HasFactory;

    protected $table = 'kec';

    protected $primaryKey = 'no_kec'; // Primary key adalah no_prop
    public $incrementing = false; // Jika no_prop bukan tipe auto-increment
    protected $keyType = 'integer'; // Tipe data primary key (ubah ke 'integer' jika tipe integer)
    public $timestamps = false; // Nonaktifkan timestamps
    protected $fillable = [
        'no_kec',
        'nama_kec',
        'no_kab',
        'no_prop',
    ];

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

    // Relasi One-to-Many dengan Kel (Kelurahan/Desa)
    public function kelurahan()
    {
        return $this->hasMany(Kel::class, 'no_kec', 'no_kec');
    }
}
