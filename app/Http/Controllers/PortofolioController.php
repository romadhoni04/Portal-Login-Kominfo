<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;

class PortofolioController extends Controller
{
    /**
     * Menampilkan detail portofolio berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function index()
    {
        // Ambil semua portofolio dengan gambar
        $portfolios = Portofolio::with('images')->get();

        // Ambil kategori unik dari portofolio
        $categories = Portofolio::distinct('category')->pluck('category');

        return view('portfolio', compact('portfolios', 'categories'));
    }

    public function show($id)
    {
        // Mengambil data portofolio beserta gambar-gambarnya dari database
        $portfolio = Portofolio::with('images')->findOrFail($id);
        $portfolio->project_date = \Carbon\Carbon::parse($portfolio->project_date);
        // Mengembalikan tampilan dengan data portofolio
        return view('portfolio-details', compact('portfolio'));
    }
}
