<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan HasFactory
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ActivityLog extends Model
{
    use HasFactory; // Gunakan trait HasFactory

    // Tentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'activity_logs';

    // Tentukan atribut yang dapat diisi massal
    protected $fillable = ['user_id', 'description', 'created_at', 'updated_at'];

    public $timestamps = true; // Pastikan ini diaktifkan

    // Menyimpan waktu dalam timezone yang ditentukan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = Carbon::now('Asia/Jakarta');
        });
    }

    // Definisikan relasi jika ada
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
