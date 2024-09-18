<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\PortofolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk mengatasi error "Undefined type 'Storage'"
class SuperAdminPortofolioController extends Controller
{
    // Menampilkan semua portofolio
    public function index()
    {
        // Mengambil semua portofolio beserta gambar yang terkait
        $portfolios = Portofolio::with('images')->get();
        $categories = Portofolio::distinct('category')->pluck('category');
        // Mengembalikan view dari folder superadmin.portofolio.index
        return view('superadmin.portofolio.index', compact('portfolios'));
    }
    public function showAllPortfolios()
    {
        // Mengambil semua portofolio dari database
        $portfolios = Portofolio::all(); // Ganti dengan query yang sesuai

        // Mengembalikan view dengan variabel $portfolios
        return view('portfolio', compact('portfolios'));
    }


    // Menampilkan form untuk membuat portofolio baru
    public function create()
    {
        // Mengembalikan view dari folder superadmin.portofolio.create
        return view('superadmin.portofolio.create');
    }

    // Menyimpan portofolio baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'project_url' => 'required|url',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk setiap gambar
        ]);

        // Membuat portofolio baru
        $portfolio = Portofolio::create($request->except('images'));

        // Menyimpan gambar jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('portfolios', 'public');
                PortofolioImage::create([
                    'portofolio_id' => $portfolio->id,
                    'image_url' => $imagePath,
                ]);
            }
        }

        return redirect()->route('superadmin.portofolio.index')->with('success', 'Portofolio created successfully.');
    }

    // Menampilkan form untuk mengedit portofolio
    public function edit($id)
    {
        $portfolio = Portofolio::findOrFail($id);

        // Mengembalikan view dari folder superadmin.portofolio.edit
        return view('superadmin.portofolio.edit', compact('portfolio'));
    }

    // Mengupdate portofolio yang ada
    public function update(Request $request, $id)
    {
        $portfolio = Portofolio::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'project_url' => 'nullable|url',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update data text
        $portfolio->update($validatedData);

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama
            foreach ($portfolio->images as $image) {
                // Hapus file fisik dari storage
                Storage::delete('public/' . $image->image_url);

                // Hapus record gambar dari database
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $file) {
                $imagePath = $file->store('portfolios', 'public');
                $portfolio->images()->create(['image_url' => $imagePath]);
            }
        }

        return redirect()->route('superadmin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui.');
    }


    // Menghapus portofolio
    public function destroy($id)
    {
        $portfolio = Portofolio::findOrFail($id);

        // Hapus gambar terkait
        $portfolio->images()->each(function ($image) {
            Storage::disk('public')->delete($image->image_url);
            $image->delete();
        });

        // Hapus portofolio
        $portfolio->delete();

        return redirect()->route('superadmin.portofolio.index')->with('success', 'Portofolio deleted successfully.');
    }
}
