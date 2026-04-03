@props(['hotel', 'checkIn' => '', 'checkOut' => '', 'guests' => 2])

@php
$hotelUrl = route('hotels.show', $hotel);
if ($checkIn && $checkOut) {
    $hotelUrl .= '?' . http_build_query([
        'check_in'  => $checkIn,
        'check_out' => $checkOut,
        'guests'    => $guests,
    ]);
}
@endphp

<article class="bg-white rounded-xl overflow-hidden shadow-sm border border-slate-200
                hover:shadow-md transition-shadow flex flex-col h-full">

    {{-- Hotel image — WCAG 1.1.1: descriptive alt text --}}
    <div class="aspect-video overflow-hidden bg-slate-200">
        <img src="{{ $hotel->image_path }}"
             alt="{{ $hotel->image_alt }}"
             class="w-full h-full object-cover"
             loading="lazy"
             width="800" height="450">
    </div>

    <div class="p-5 flex flex-col flex-1">

        <div class="flex items-start justify-between gap-3 mb-1">
            <h3 class="font-bold text-slate-900 text-lg leading-tight">{{ $hotel->name }}</h3>
            <x-star-rating :rating="$hotel->star_rating" size="md" />
        </div>

        <p class="text-slate-700 text-sm flex items-center gap-1 mb-2">
            <svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-slate-500"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            {{ $hotel->area }}, {{ $hotel->city }}
        </p>

        <p class="text-slate-700 text-sm leading-relaxed mb-4 line-clamp-2">
            {{ $hotel->description }}
        </p>

        <div class="flex items-center justify-between mt-auto pt-3 border-t border-slate-100">
            <div class="flex items-center gap-2">
                {{-- WCAG 1.4.6: white on blue-900 = 8.9:1 --}}
                <span class="bg-blue-900 text-white text-sm font-bold px-2 py-0.5 rounded"
                      aria-label="Guest rating {{ number_format($hotel->rating, 1) }} out of 5">
                    {{ number_format($hotel->rating, 1) }}
                </span>
                <span class="text-slate-700 text-xs">
                    {{ number_format($hotel->review_count) }} reviews
                </span>
            </div>
            <p class="text-right">
                <span class="text-xs text-slate-700">From</span>
                <strong class="block text-blue-900 text-lg leading-none">
                    £{{ number_format($hotel->min_price, 0) }}
                </strong>
                <span class="text-xs text-slate-700">per night</span>
            </p>
        </div>

        {{-- WCAG 2.5.5: min-h-[44px]  |  WCAG 1.4.6: white on blue-900 = 8.9:1 --}}
        <a href="{{ $hotelUrl }}"
           class="flex items-center justify-center min-h-[44px] mt-4 px-4 bg-blue-900
                  hover:bg-blue-800 text-white font-semibold rounded transition-colors text-sm"
           aria-label="View {{ $hotel->name }}, {{ $hotel->star_rating }} stars, from £{{ number_format($hotel->min_price, 0) }} per night">
            View Hotel
        </a>
    </div>
</article>
