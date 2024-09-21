<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\UsersExport; // untuk Excel
use Barryvdh\DomPDF\Facade\Pdf; // Periksa namespace yang tepat

use Maatwebsite\Excel\Facades\Excel; // Tambahkan ini untuk Excel

class DasaWismaController extends Controller
{
    public function index()
    {
        // Ambil semua pengguna dengan role 'user'
        $users = User::where('role', 'user')->get();
        $totalUsers = User::where('role', 'user')->count();

        // Hitung jumlah pengguna berdasarkan bulan
        $userCounts = User::selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->where('role', 'user')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $dailyCounts = User::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m-%d") as register_date')
            ->where('role', 'user')
            ->groupBy('register_date')
            ->pluck('count', 'register_date')
            ->toArray();

        $widget = [
            'total_users' => count($users),
        ];

        // Kirim data ke view
        return view('dasawisma', compact('dailyCounts', 'userCounts', 'widget', 'users'));
    }

    // Unduh PDF
    public function downloadPDF()
    {
        $users = User::where('role', 'user')->get(); // ambil data pengguna
        $pdf = PDF::loadView('test', compact('users'));
        return $pdf->download('users.pdf');
    }

    // Unduh Excel
    public function downloadExcel()
    {
        return Excel::download(new UsersExport, 'users dasa wisma kabupaten jepara.xlsx');
    }
}
