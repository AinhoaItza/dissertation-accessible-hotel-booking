<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Hotel::orderByDesc('rating')->take(3)->get();

        return view('home', compact('featured'));
    }
}
