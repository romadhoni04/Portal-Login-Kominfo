<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminServiceController extends Controller
{
    // Menampilkan daftar layanan
    public function index()
    {
        $services = Service::all();
        return view('superadmin.services.index', compact('services'));
    }

    // Menampilkan detail layanan
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.service-details', compact('service'));
    }

    // Menampilkan form untuk menambah layanan baru
    public function create()
    {
        return view('superadmin.services.create');
    }

    // Menyimpan layanan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'catalog_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'catalog_doc' => 'nullable|file|mimes:doc,docx|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('services', 'public') : null;
        $pdfPath = $request->file('catalog_pdf') ? $request->file('catalog_pdf')->store('catalogs', 'public') : null;
        $docPath = $request->file('catalog_doc') ? $request->file('catalog_doc')->store('catalogs', 'public') : null;

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'catalog_pdf' => $pdfPath,
            'catalog_doc' => $docPath,
            'user_id' => auth()->user()->id, // Menyimpan ID user yang menambah layanan
        ]);

        return redirect()->route('superadmin.services.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    // Menampilkan form untuk edit layanan
    public function edit(Service $service)
    {
        return view('superadmin.services.edit', compact('service'));
    }

    // Memperbarui layanan di database
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'catalog_pdf' => 'nullable|file|mimes:pdf|max:2048',
            'catalog_doc' => 'nullable|file|mimes:doc,docx|max:2048',
        ]);

        // Update gambar layanan
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $imagePath = $request->file('image')->store('services', 'public');
        } else {
            $imagePath = $service->image;
        }

        // Update katalog PDF
        if ($request->hasFile('catalog_pdf')) {
            if ($service->catalog_pdf) {
                Storage::disk('public')->delete($service->catalog_pdf);
            }
            $pdfPath = $request->file('catalog_pdf')->store('catalogs', 'public');
        } else {
            $pdfPath = $service->catalog_pdf;
        }

        // Update katalog DOC
        if ($request->hasFile('catalog_doc')) {
            if ($service->catalog_doc) {
                Storage::disk('public')->delete($service->catalog_doc);
            }
            $docPath = $request->file('catalog_doc')->store('catalogs', 'public');
        } else {
            $docPath = $service->catalog_doc;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'catalog_pdf' => $pdfPath,
            'catalog_doc' => $docPath,
        ]);

        return redirect()->route('superadmin.services.index')->with('success', 'Layanan berhasil diperbarui');
    }

    // Menghapus layanan
    public function destroy(Service $service)
    {
        // Hapus gambar, PDF, dan DOC jika ada
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        if ($service->catalog_pdf) {
            Storage::disk('public')->delete($service->catalog_pdf);
        }
        if ($service->catalog_doc) {
            Storage::disk('public')->delete($service->catalog_doc);
        }

        $service->delete();

        return redirect()->route('superadmin.services.index')->with('success', 'Layanan berhasil dihapus');
    }
}
