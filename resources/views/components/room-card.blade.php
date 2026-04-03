@props(['room', 'hotel', 'checkIn', 'checkOut', 'guests', 'nights'])

@php
$roomUrl   = route('hotels.rooms.show', [$hotel, $room]) . '?' . http_build_query([
    'check_in'  => $checkIn,
    'check_out' => $checkOut,
    'guests'    => $guests,
]);
$roomTotal = number_format((float) $room->price_per_night * $nights, 0);
@endphp

<article class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm
                hover:shadow-md transition-shadow">
    <div class="flex flex-col sm:flex-row">

        {{-- Room image — WCAG 1.1.1 --}}
        <div class="sm:w-64 shrink-0 bg-slate-200">
            <img src="{{ $room->image_path }}"
                 alt="{{ $room->image_alt }}"
                 class="w-full h-48 sm:h-full object-cover"
                 loading="lazy"
                 width="400" height="300">
        </div>

        <div class="flex-1 p-5 flex flex-col">

            <div class="flex items-start justify-between gap-3 mb-2">
                <div>
                    <h3 class="font-bold text-slate-900 text-lg leading-tight">{{ $room->name }}</h3>
                    <p class="text-slate-700 text-sm mt-0.5">
                        {{ ucfirst($room->type) }} &middot;
                        {{ $room->bed_type }} bed &middot;
                        {{ $room->size_sqm }}&thinsp;m² &middot;
                        Up to {{ $room->capacity }} {{ Str::plural('guest', $room->capacity) }}
                    </p>
                </div>
                @if ($room->is_available)
                    {{-- WCAG 1.4.6: white on green-800 = 7.4:1 --}}
                    <span class="shrink-0 bg-green-800 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                        Available
                    </span>
                @else
                    <span class="shrink-0 bg-slate-500 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                        Unavailable
                    </span>
                @endif
            </div>

            <p class="text-slate-700 text-sm leading-relaxed mb-3 line-clamp-2">
                {{ $room->description }}
            </p>

            <ul class="flex flex-wrap gap-1.5 mb-4" role="list" aria-label="Room amenities">
                @foreach (array_slice($room->amenities, 0, 5) as $amenity)
                    <li class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full">{{ $amenity }}</li>
                @endforeach
                @if (count($room->amenities) > 5)
                    <li class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full">
                        +{{ count($room->amenities) - 5 }} more
                    </li>
                @endif
            </ul>

            <div class="flex items-end justify-between mt-auto gap-4">
                <div>
                    <p class="text-slate-700 text-xs">Per night</p>
                    {{-- WCAG 1.4.6: blue-900 on white = 8.9:1 --}}
                    <p class="text-2xl font-bold text-blue-900">
                        £{{ number_format((float) $room->price_per_night, 0) }}
                    </p>
                    <p class="text-slate-700 text-xs">
                        Total for {{ $nights }} {{ Str::plural('night', $nights) }}:
                        <strong class="text-slate-900">£{{ $roomTotal }}</strong>
                    </p>
                </div>

                @if ($room->is_available)
                    {{-- WCAG 2.5.5: min-h-[44px]  |  WCAG 1.4.6: white on blue-900 = 8.9:1 --}}
                    <a href="{{ $roomUrl }}"
                       class="flex items-center justify-center min-h-[44px] px-6 bg-blue-900
                              hover:bg-blue-800 text-white font-semibold rounded text-sm
                              transition-colors shrink-0"
                       aria-label="Select {{ $room->name }} at £{{ number_format((float) $room->price_per_night, 0) }} per night">
                        Select This Room
                    </a>
                @else
                    <button disabled
                            class="flex items-center justify-center min-h-[44px] px-6 bg-slate-200
                                   text-slate-500 font-semibold rounded text-sm cursor-not-allowed shrink-0"
                            aria-disabled="true">
                        Unavailable
                    </button>
                @endif
            </div>
        </div>
    </div>
</article>
