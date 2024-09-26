<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kab extends Model
{
    use HasFactory;

    protected $table = 'kab';
    protected $primaryKey = 'no_kab'; // Primary key adalah no_prop
    public $incrementing = false; // Jika no_prop bukan tipe auto-increment
    protected $keyType = 'integer'; // Tipe data primary key (ubah ke 'integer' jika tipe integer)
    public $timestamps = false; // Nonaktifkan timestamps
    protected $fillable = [
        'no_kab',
        'nama_kab',
        'no_prop',
    ];



    // Relasi Many-to-One ke Prop (Provinsi)
    public function provinsi()
    {
        return $this->belongsTo(Prop::class, 'no_prop', 'no_prop');
    }

    // Relasi One-to-Many dengan Kec (Kecamatan)
    public function kecamatan()
    {
        return $this->hasMany(Kec::class, 'no_kab', 'no_kab');
    }
}
