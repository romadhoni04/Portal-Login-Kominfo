<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Model Pengguna
use App\Models\Blog; // Model Blog
use App\Models\About; // Model about
use App\Models\Client; // Model Blog
use App\Models\Portofolio;
use App\Models\Service; // Model Layanan

class SuperAdminSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        // Mencari pengguna
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%") // Menambahkan pencarian berdasarkan last_name
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('role', 'LIKE', "%{$query}%") // Menambahkan pencarian berdasarkan role
            ->get();


        // Mencari blog
        $blogs = Blog::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")  // Perbaikan di sini
            ->get();

        // Mencari layanan
        $services = Service::where('title', 'LIKE', "%{$query}%") // Perbaikan di sini
            ->orWhere('description', 'LIKE', "%{$query}%") // Menambahkan pencarian di deskripsi
            ->get();

        // Mencari Tentang
        $about = about::where('title', 'LIKE', "%{$query}%") // Perbaikan di sini
            ->orWhere('content', 'LIKE', "%{$query}%") // Menambahkan pencarian di deskripsi
            ->get();

        // Mencari Tentang
        $clients = client::where('name', 'LIKE', "%{$query}%") // Perbaikan di sini
            ->orWhere('link', 'LIKE', "%{$query}%") // Menambahkan pencarian di deskripsi
            ->get();

        $portofolios = portofolio::where('title', 'LIKE', "%{$query}%") // Perbaikan di sini
            ->orWhere('description', 'LIKE', "%{$query}%") // Menambahkan pencarian di deskripsi
            ->get();

        // Mengembalikan hasil pencarian
        return view('superadmin.search', compact('users', 'blogs', 'services', 'about', 'clients', 'portofolios'));
    }
}
