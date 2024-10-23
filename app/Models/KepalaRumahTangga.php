<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaRumahTangga extends Model
{
    use HasFactory;

    protected $table = 'kepala_rumah_tangga';

    protected $fillable = ['nama', 'dawis_id'];

    public function dawis()
    {
        return $this->belongsTo(Dawis::class, 'dawis_id');
    }

    public function dataKeluarga()
    {
        return $this->hasMany(DataKeluarga::class, 'kepala_rumah_tangga_id');
    }
}
