<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'client',
        'project_date',
        'project_url'
    ];

    protected $dates = ['project_date'];
    // Pastikan `project_date` di-cast ke tipe tanggal

    public function images()
    {
        return $this->hasMany(PortofolioImage::class, 'portofolio_id');
    }
}
