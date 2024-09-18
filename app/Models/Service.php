<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'catalog_pdf',
        'catalog_doc',
        'user_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
