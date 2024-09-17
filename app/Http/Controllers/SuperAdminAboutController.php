<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SuperAdminAboutController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all(); // Mengambil semua data dari tabel 'abouts'
        return view('superadmin.about.index', compact('abouts')); // Mengirim data ke view
    }

    /**
     * Menampilkan formulir untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.about.create'); // Mengarahkan ke view formulir pembuatan
    }

    /**
     * Menyimpan resource baru ke dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $about = new About();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $about->image = $filename;
        }
        $about->title = $request->title;
        $about->content = $request->content;
        $about->save();
        // Redirect atau memberikan respon
        return redirect()->route('superadmin.about.index')->with('success', 'About created successfully.');
    }

    /**
     * Menampilkan resource yang ditentukan.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $about = About::findOrFail($id); // Mencari entri berdasarkan ID
        return view('superadmin.about.show', compact('about')); // Mengirim data ke view
    }

    /**
     * Menampilkan formulir untuk mengedit resource yang ditentukan.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $about = About::findOrFail($id); // Mencari entri berdasarkan ID
        return view('superadmin.about.edit', compact('about')); // Mengirim data ke view
    }

    /**
     * Memperbarui resource yang ditentukan di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $about = About::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $about->image = $filename;
        }
        $about->title = $request->title;
        $about->content = $request->content;
        $about->save();

        // Redirect atau memberikan respon
        return redirect()->route('superadmin.about.index')->with('success', 'About updated successfully.');
    }

    /**
     * Menghapus resource yang ditentukan dari penyimpanan.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        if ($about->image) {
            File::delete(public_path('images/' . $about->image));
        }
        $about->delete();

        // Redirect atau memberikan respon
        return redirect()->route('superadmin.about.index')->with('success', 'About deleted successfully.');
    }
}
