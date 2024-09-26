<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prop extends Model
{
    use HasFactory;


    protected $table = 'prop'; // Nama tabel
    protected $primaryKey = 'no_prop'; // Primary key adalah no_prop
    public $incrementing = false; // Jika no_prop bukan tipe auto-increment
    protected $keyType = 'integer'; // Tipe data primary key (ubah ke 'integer' jika tipe integer)
    public $timestamps = false; // Nonaktifkan timestamps
    protected $fillable = ['no_prop', 'nama_prop']; // Kolom yang bisa diisi

    // Relasi One-to-Many dengan Kab (Kabupaten)
    public function kabupaten()
    {
        return $this->hasMany(Kab::class, 'no_prop', 'no_prop');
    }
}
