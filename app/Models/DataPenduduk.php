<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;

    protected $table = 'data_penduduk';
    protected $primaryKey = 'id_penduduk';
    public $timestamps = false;

    protected $fillable = [
        'no_kk',
        'no_ktp',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'shdk',
        'status_kawin',
        'pendidikan',
        'pekerjaan',
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

    public function refShdk()
    {
        return $this->belongsTo(RefShdk::class, 'shdk');
    }

    public function refPerkawinan()
    {
        return $this->belongsTo(RefPerkawinan::class, 'status_kawin');
    }

    public function refPendidikan()
    {
        return $this->belongsTo(RefPendidikan::class, 'pendidikan');
    }

    public function refPekerjaan()
    {
        return $this->belongsTo(RefPekerjaan::class, 'pekerjaan');
    }
}
