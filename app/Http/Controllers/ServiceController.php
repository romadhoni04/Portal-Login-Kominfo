<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Menampilkan semua layanan yang tersedia
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    // Menampilkan detail layanan
    public function show($id)
    {
        // Ambil service dengan relasi author
        $service = Service::with('author')->findOrFail($id);
        $services = Service::all();

        return view('service-details', compact('service', 'services'));
    }


    // Menampilkan halaman welcome
    public function welcome()
    {
        $services = Service::all(); // Ambil semua data dari model Service
        return view('welcome', compact('services'));
    }
}
