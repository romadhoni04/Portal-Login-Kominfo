<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog'); // pastikan file ini ada di resources/views/blog.blade.php
    }
}
