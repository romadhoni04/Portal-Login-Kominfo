<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterSuperAdminController extends Controller
{
    // Menampilkan form pendaftaran admin
    public function showAdminRegisterForm()
    {
        return view('superadmin.register-admin');
    }

    // Menangani pendaftaran admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Menetapkan role 'Administrator' ke user yang baru
        $user->assignRole('Administrator');

        return redirect()->route('superadmin.dashboard')->with('success', 'Administrator berhasil didaftarkan.');
    }
}
