<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
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
        $users = User::count();
        $totalUsers = User::where('role', 'user')->count();
        $users = User::all();
        $widget = [
            'users' => $users,
            'total_users' => $totalUsers,
            //...
        ];

        return view('admin.dashboard', compact('widget', 'users'));
    }
}
