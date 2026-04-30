<?php

namespace App\Http\Controllers;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()
            ->bookings()
            ->with(['hotel', 'room'])
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }
}
