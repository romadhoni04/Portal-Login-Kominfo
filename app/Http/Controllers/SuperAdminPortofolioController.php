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
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Membuat portofolio baru
        $portfolio = Portofolio::create($request->except('images'));
        $portfolio = Portofolio::create($request->all());

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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'project_url' => 'required|url',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mengupdate portofolio
        $portfolio = Portofolio::findOrFail($id);
        $portfolio->update($request->except('images'));

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('portfolios', 'public');
                PortofolioImage::create([
                    'portofolio_id' => $portfolio->id,
                    'image_url' => $imagePath,
                ]);
            }
        }

        return redirect()->route('superadmin.portofolio.index')->with('success', 'Portofolio updated successfully.');
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
