<?php

// app/Http/Controllers/SuperAdminLayoutController.php

namespace App\Http\Controllers;

use App\Models\Layout; // Tambahkan baris ini
use Illuminate\Http\Request;

class SuperAdminLayoutController extends Controller
{
    public function index()
    {
        $layouts = Layout::all();
        return view('superadmin.client.index', compact('layouts'));
    }

    public function create()
    {
        return view('superadmin.client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'css_properties' => 'required|string',
        ]);

        Layout::create($request->all());
        return redirect()->route('superadmin.client.index')->with('success', 'Layout created successfully.');
    }

    public function edit(Layout $layout)
    {
        return view('superadmin.client.edit', compact('layout'));
    }

    public function update(Request $request, Layout $layout)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'css_properties' => 'required|string',
        ]);

        $layout->update($request->all());
        return redirect()->route('superadmin.client.index')->with('success', 'Layout updated successfully.');
    }

    public function destroy(Layout $layout)
    {
        $layout->delete();
        return redirect()->route('superadmin.client.index')->with('success', 'Layout deleted successfully.');
    }
}
