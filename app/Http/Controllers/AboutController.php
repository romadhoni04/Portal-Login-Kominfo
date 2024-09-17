<?php

namespace App\Http\Controllers;

use App\Models\About; // Pastikan model About sudah ada
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all(); // Mengambil semua data About dari database
        return view('about', compact('abouts')); // Mengirim data ke view // pastikan file ini ada di resources/views/about.blade.php
    }
}
