<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    // ── Register ─────────────────────────────────────────────────────────────

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::create($validated);

        Auth::login($user);
        $request->session()->regenerate();

        if ($pending = session('pending_booking')) {
            Booking::create([
                'user_id'   => $user->id,
                'hotel_id'  => $pending['hotel_id'],
                'room_id'   => $pending['room_id'],
                'check_in'  => $pending['check_in'],
                'check_out' => $pending['check_out'],
                'guests'    => $pending['guests'],
                'nights'    => $pending['nights'],
                'subtotal'  => $pending['subtotal'],
                'vat'       => $pending['tax'],
                'total'     => $pending['total'],
                'reference' => $pending['reference'],
            ]);

            return redirect()->route('hotels.rooms.confirmation', [
                'hotel' => $pending['hotel_slug'],
                'room'  => $pending['room_id'],
            ]);
        }

        return redirect()->route('home');
    }

    // ── Login ─────────────────────────────────────────────────────────────────

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if ($pending = session('pending_booking')) {
                $alreadySaved = Booking::where('reference', $pending['reference'])->exists();

                if (! $alreadySaved) {
                    Booking::create([
                        'user_id'   => Auth::id(),
                        'hotel_id'  => $pending['hotel_id'],
                        'room_id'   => $pending['room_id'],
                        'check_in'  => $pending['check_in'],
                        'check_out' => $pending['check_out'],
                        'guests'    => $pending['guests'],
                        'nights'    => $pending['nights'],
                        'subtotal'  => $pending['subtotal'],
                        'vat'       => $pending['tax'],
                        'total'     => $pending['total'],
                        'reference' => $pending['reference'],
                    ]);
                }

                return redirect()->route('hotels.rooms.confirmation', [
                    'hotel' => $pending['hotel_slug'],
                    'room'  => $pending['room_id'],
                ]);
            }

            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors(['email' => 'The email address or password is incorrect.'])
            ->onlyInput('email');
    }

    // ── Logout ────────────────────────────────────────────────────────────────

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    // ── Profile ───────────────────────────────────────────────────────────────

    public function profile(): View
    {
        return view('auth.profile');
    }

    // ── Update password ───────────────────────────────────────────────────────

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password'  => ['required'],
            'password'          => ['required', 'confirmed', Password::min(8)],
        ]);

        if (! Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => 'The current password is incorrect.',
            ]);
        }

        Auth::user()->update([
            'password' => $request->password,
        ]);

        return back()->with('status', 'Password updated successfully.');
    }
}