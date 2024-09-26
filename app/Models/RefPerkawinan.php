<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPerkawinan extends Model
{
    use HasFactory;

    protected $table = 'ref_perkawinan';

    protected $fillable = [
        'status',
    ];

    public function dataPenduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'status_kawin', 'id');
    }
}
