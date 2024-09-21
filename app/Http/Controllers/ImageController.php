<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function downloadImage()
    {
        // Logika untuk mengunduh gambar atau melakukan hal lainnya
        return response()->json(['message' => 'Download gambar sedang diproses.']);
    }
}
