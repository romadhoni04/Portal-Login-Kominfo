<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ganti dengan model yang sesuai
; // Sesuaikan dengan model yang Anda gunakan

class SuperAdminSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        $results = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        return view('superadmin.search', compact('results')); // Arahkan ke dashboard
    }
}
