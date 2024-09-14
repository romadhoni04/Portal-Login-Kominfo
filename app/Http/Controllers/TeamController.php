<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('team'); // pastikan file ini ada di resources/views/team.blade.php
    }
}
