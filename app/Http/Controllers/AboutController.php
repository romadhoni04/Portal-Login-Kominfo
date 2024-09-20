<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\About; // Pastikan model About sudah ada
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all(); // Pastikan $abouts berisi data dari tabel abouts
        $clients = Client::all(); // Pastikan $clients berisi data dari tabel clients

        return view('about', compact('abouts', 'clients'));
    }
}
