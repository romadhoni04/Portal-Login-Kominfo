<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        return view('services'); // pastikan file ini ada di resources/views/services.blade.php
    }
}
