<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'data_penduduk';

    // Field yang bisa diisi massal
    protected $fillable = [
        'no_kk',
        'no_nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'shdk', // relasi ke ref_shdk
        'status_kawin', // relasi ke ref_perkawinan
        'pendidikan', // relasi ke ref_pendidikan
        'pekerjaan', // relasi ke ref_pekerjaan
        'difabel',
        'keg_pancasila',
        'keg_gotong_royong',
        'keg_pendidikan',
        'keg_koperasi',
        'keg_pangan',
        'keg_sandang',
        'keg_kesehatan',
        'keg_perencanaan_sehat',
        'keterangan',
    ];

    // Relasi ke ref_shdk
    public function shdkRef()
    {
        return $this->belongsTo(RefShdk::class, 'shdk', 'id');
    }

    // Relasi ke ref_perkawinan
    public function statusKawinRef()
    {
        return $this->belongsTo(RefPerkawinan::class, 'status_kawin', 'id');
    }

    // Relasi ke ref_pendidikan
    public function pendidikanRef()
    {
        return $this->belongsTo(RefPendidikan::class, 'pendidikan', 'id');
    }

    // Relasi ke ref_pekerjaan
    public function pekerjaanRef()
    {
        return $this->belongsTo(RefPekerjaan::class, 'pekerjaan', 'id');
    }
}
