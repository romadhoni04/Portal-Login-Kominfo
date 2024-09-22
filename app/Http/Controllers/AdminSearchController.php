<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Model Pengguna

class AdminSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        // Mencari pengguna
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%") // Menambahkan pencarian berdasarkan last_name
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('role', 'LIKE', "%{$query}%") // Menambahkan pencarian berdasarkan role
            ->get();


        // Mengembalikan hasil pencarian
        return view('admin.search', compact('users'));
    }
}
