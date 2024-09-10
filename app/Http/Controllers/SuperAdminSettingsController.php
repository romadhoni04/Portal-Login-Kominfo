<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SuperAdminSettingsController extends Controller
{
    public function index()
    {
        return view('superadmin.settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
        ]);

        // Update configuration settings (this is just an example, update your configuration storage as needed)
        // Note: This will not persist the changes permanently as Laravel config is cached.
        // For a persistent solution, store settings in the database or a configuration file.
        Config::set('app.name', $request->input('app_name'));
        Config::set('mail.from.address', $request->input('contact_email'));

        return redirect()->route('superadmin.settings')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
