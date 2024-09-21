<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SuperAdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPengguna = User::count(); // Hitung total pengguna
        $totalSuperadmin = User::where('role', 'superadmin')->count(); // Hitung total Superadmin
        $totalAdmins = User::where('role', 'administrator')->count(); // Hitung total administrator
        $totalUsers = User::where('role', 'user')->count(); // Hitung total user
        $users = User::all();
        $widget = [
            'total_program' => 20, // contoh nilai
            'total_partisipasi' => 150, // contoh nilai
            'notifications' => 5, // contoh nilai
            'total_pengguna' => $totalPengguna,
            'total_admins' => $totalAdmins,
            'total_users' => $totalUsers,
            'total_superadmin' => $totalSuperadmin,
            // Tambahkan data lainnya jika perlu
        ];

        return view('superadmin.dashboard', compact('widget', 'users',));
    }
}
