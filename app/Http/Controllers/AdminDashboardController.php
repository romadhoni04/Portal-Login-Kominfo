<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    /**
     * Display the dashboard for superadmin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Your logic here
        return view('admin.dashboard'); // Assuming you have a blade file for the view
    }
}
