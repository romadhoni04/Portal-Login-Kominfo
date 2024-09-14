<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Tambahkan ini

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        // Menggunakan paginate untuk mendapatkan hasil paginasi
        $blogs = Blog::paginate(10);
        $superadmin = User::where('role', 'superadmin')->first();

        return view('blog', compact('blogs', 'superadmin'));
    }
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $recentPosts = Blog::orderBy('created_at', 'desc')->take(5)->get(); // Mengambil beberapa post terbaru
        return view('blog.show', compact('blog', 'recentPosts'));
    }
}
