<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; // Tambahkan ini
use App\Models\User;

class SuperAdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('author')->paginate(10); // Menggunakan paginate() untuk paginasi

        // dd($blogs); // Hapus atau komentari baris ini setelah debugging
        return view('superadmin.blog.index', ['blogs' => $blogs]);
    }

    public function show($id)
    {
        $blog = Blog::with('author')->find($id); // Mengambil satu blog dengan penulisnya
        // dd($blog); // Hapus atau komentari baris ini setelah debugging

        return view('blog.show', ['blog' => $blog]);
    }

    public function create()
    {
        return view('superadmin.blog.create'); // Menampilkan form untuk membuat blog baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|nullable',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
        $blog->author_id = auth()->id();
        $blog->save();

        return redirect()->route('superadmin.blog.index')->with('success', 'Blog created successfully');
    }

    public function edit(Blog $blog)
    {
        return view('superadmin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|nullable',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
        $blog->save();

        return redirect()->route('superadmin.blog.index')->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('superadmin.blog.index')->with('success', 'Blog deleted successfully');
    }
}
