<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * GET /hotels/{hotel:slug}/rooms/{room}
     *
     * Room selection / booking summary page.
     * Verifies the room belongs to the hotel, then calculates a cost breakdown
     * (subtotal + 20 % VAT) based on the number of nights from the query string.
     */
    public function show(Hotel $hotel, Room $room, Request $request)
    {
        abort_if($room->hotel_id !== $hotel->id, 404);

        [$checkIn, $checkOut, $guests, $nights] = $this->searchParams($request);

        $multiplier    = $this->guestMultiplier($guests);
        $pricePerNight = round((float) $room->price_per_night * $multiplier, 2);
        $subtotal      = round($pricePerNight * $nights, 2);
        $tax           = round($subtotal * 0.20, 2);
        $total         = round($subtotal + $tax, 2);

        return view('hotels.room', compact(
            'hotel', 'room', 'checkIn', 'checkOut', 'guests', 'nights',
            'pricePerNight', 'multiplier', 'subtotal', 'tax', 'total'
        ));
    }

    /**
     * POST /hotels/{hotel:slug}/rooms/{room}/book
     *
     * Validates the guest details form, generates a booking reference, stores
     * the summary in the session, then redirects to the confirmation page.
     */
    public function book(Hotel $hotel, Room $room, Request $request)
    {
        abort_if($room->hotel_id !== $hotel->id, 404);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:255'],
            'phone'      => ['required', 'string', 'max:30'],
            'requests'   => ['nullable', 'string', 'max:1000'],
        ]);

        [$checkIn, $checkOut, $guests, $nights] = $this->searchParams($request);

        $multiplier    = $this->guestMultiplier($guests);
        $pricePerNight = round((float) $room->price_per_night * $multiplier, 2);
        $subtotal      = round($pricePerNight * $nights, 2);
        $tax           = round($subtotal * 0.20, 2);
        $total         = round($subtotal + $tax, 2);

        $reference = strtoupper('SN-' . date('Ymd') . '-' . random_int(1000, 9999));

        session()->flash('booking', [
            'reference'     => $reference,
            'first_name'    => $validated['first_name'],
            'last_name'     => $validated['last_name'],
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'requests'      => $validated['requests'] ?? null,
            'check_in'      => $checkIn,
            'check_out'     => $checkOut,
            'guests'        => $guests,
            'nights'        => $nights,
            'price_per_night' => $pricePerNight,
            'multiplier'    => $multiplier,
            'subtotal'      => $subtotal,
            'tax'           => $tax,
            'total'         => $total,
        ]);

        return redirect()->route('hotels.rooms.confirmation', [$hotel, $room]);
    }

    /**
     * GET /hotels/{hotel:slug}/rooms/{room}/confirmation
     *
     * Displays the booking confirmation page. Requires the session data placed
     * by book(). If the session has expired (e.g. direct URL access), redirects
     * back to the hotel detail page.
     */
    public function confirmation(Hotel $hotel, Room $room)
    {
        abort_if($room->hotel_id !== $hotel->id, 404);

        $booking = session('booking');

        if (! $booking) {
            return redirect()->route('hotels.show', $hotel);
        }

        return view('hotels.confirmation', compact('hotel', 'room', 'booking'));
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Price multiplier based on guest count.
     * 1 guest: -10%  |  2 guests: base  |  3 guests: +15%  |  4+: +25%
     */
    private function guestMultiplier(int $guests): float
    {
        return match(true) {
            $guests >= 4 => 1.25,
            $guests === 3 => 1.15,
            $guests === 1 => 0.90,
            default       => 1.00,
        };
    }

    /**
     * @return array{string, string, int, int}  [checkIn, checkOut, guests, nights]
     */
    private function searchParams(Request $request): array
    {
        $checkIn  = $request->get('check_in',  now()->addDay()->format('Y-m-d'));
        $checkOut = $request->get('check_out', now()->addDays(3)->format('Y-m-d'));
        $guests   = max(1, (int) $request->get('guests', 2));
        $nights   = max(1, Carbon::parse($checkIn)->diffInDays(Carbon::parse($checkOut)));

        return [$checkIn, $checkOut, $guests, $nights];
    }
}
