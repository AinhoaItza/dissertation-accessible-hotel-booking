<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/api/destinations', [HotelController::class, 'destinations'])->name('api.destinations');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// ── Auth routes (guests only) ─────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);
});

// ── Auth routes (authenticated users only) ───────────────────────────────
Route::middleware('auth')->group(function () {
    Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile',  [AuthController::class, 'profile'])->name('profile');
});

Route::prefix('hotels')->name('hotels.')->group(function () {
    // Search results / hotel listing
    Route::get('/', [HotelController::class, 'index'])->name('index');

    // Hotel detail — route model binding on slug
    Route::get('/{hotel:slug}', [HotelController::class, 'show'])->name('show');

    // Room selection / booking summary
    Route::get('/{hotel:slug}/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

    // Booking form submission
    Route::post('/{hotel:slug}/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');

    // Booking confirmation page (GET after POST redirect)
    Route::get('/{hotel:slug}/rooms/{room}/confirmation', [RoomController::class, 'confirmation'])->name('rooms.confirmation');
});
