<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * GET /hotels
     *
     * Search results page. Accepts optional filter/sort query parameters validated
     * by SearchRequest. Returns a paginated list of hotels (12 per page).
     */
    public function index(SearchRequest $request)
    {
        $query = Hotel::query();

        // Free-text destination — match against city or country (case-insensitive)
        if ($dest = $request->destination()) {
            $term = '%' . mb_strtolower($dest) . '%';
            $query->where(fn ($q) => $q
                ->whereRaw('LOWER(city) LIKE ?', [$term])
                ->orWhereRaw('LOWER(country) LIKE ?', [$term])
            );
        }

        if ($request->filled('stars')) {
            $query->where('star_rating', $request->integer('stars'));
        }

        if ($request->filled('max_price')) {
            $query->where('min_price', '<=', $request->integer('max_price'));
        }

        // Sorting
        match ($request->get('sort', 'rating')) {
            'price_asc'  => $query->orderBy('min_price'),
            'price_desc' => $query->orderByDesc('min_price'),
            'name'       => $query->orderBy('name'),
            default      => $query->orderByDesc('rating'),
        };

        $hotels    = $query->paginate(12)->withQueryString();
        $countries = Hotel::distinct()->orderBy('country')->pluck('country');

        [$checkIn, $checkOut, $guests, $nights] = $this->searchParams($request);

        return view('hotels.index', compact(
            'hotels', 'countries', 'checkIn', 'checkOut', 'guests', 'nights'
        ));
    }

    /**
     * GET /hotels/{hotel:slug}
     *
     * Hotel detail page. Loads rooms (cheapest first) and the 10 most recent
     * reviews. Search parameters are forwarded so the booking flow retains dates.
     */
    public function show(Hotel $hotel, Request $request)
    {
        $hotel->load([
            'rooms'   => fn ($q) => $q->orderBy('price_per_night'),
            'reviews' => fn ($q) => $q->latest()->take(10),
        ]);

        [$checkIn, $checkOut, $guests, $nights] = $this->searchParams($request);

        return view('hotels.show', compact(
            'hotel', 'checkIn', 'checkOut', 'guests', 'nights'
        ));
    }

    /**
     * GET /api/destinations
     *
     * Returns a JSON array of unique city and country names for the
     * destination autocomplete, optionally filtered by a ?q= query string.
     */
    public function destinations(Request $request)
    {
        $term = '%' . mb_strtolower($request->get('q', '')) . '%';

        $cities = Hotel::distinct()
            ->whereRaw('LOWER(city) LIKE ?', [$term])
            ->orderBy('city')
            ->pluck('city');

        $countries = Hotel::distinct()
            ->whereRaw('LOWER(country) LIKE ?', [$term])
            ->orderBy('country')
            ->pluck('country');

        return response()->json(
            $cities->merge($countries)->unique()->sort()->values()
        );
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    /**
     * Extract and normalise search/date parameters from the request.
     *
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
