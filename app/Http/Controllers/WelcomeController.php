<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class WelcomeController extends Controller
{
    public function welcome()
    {
        // Mengambil semua data dari model Service
        $services = Service::all();
        $secondService = $services->skip(1)->first(); // Ambil artikel kedua dari services
        // Mengambil semua data dari model Blog
        $blogs = Blog::all();
        $totalUsers = User::where('role', 'user')->count();

        // Mengirimkan data ke view welcome
        return view('welcome', [
            'services' => $services,
            'blogs' => $blogs,
            'total_users' => $totalUsers,
            'secondService' => $secondService
        ]);
    }
    public function showServices()
    {
        $services = Service::all(); // Mengambil semua layanan dari database
        return view('services', compact('services'));
    }
}
