<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;

class SuperAdminClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('superadmin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('superadmin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url', // Menambahkan validasi untuk link opsional
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Client::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'link' => $request->link, // Menyimpan link jika ada
        ]);

        return redirect()->route('superadmin.clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('superadmin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url', // Menambahkan validasi untuk link opsional
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $client->update([
                'name' => $request->name,
                'logo' => $logoPath,
                'link' => $request->link, // Update link jika ada
            ]);
        } else {
            $client->update([
                'name' => $request->name,
                'link' => $request->link, // Update link jika ada
            ]);
        }

        return redirect()->route('superadmin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('superadmin.clients.index')->with('success', 'Client deleted successfully.');
    }
}
