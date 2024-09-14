<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio'); // pastikan file ini ada di resources/views/portfolio.blade.php
    }
}
