<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActivityLog; // Pastikan kamu punya model ini

class SuperAdminActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::with('user')->latest()->get();

        return view('superadmin.activitylog', compact('logs'));
    }
}
