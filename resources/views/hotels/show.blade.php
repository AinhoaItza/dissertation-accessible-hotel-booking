<x-layout
    :title="$hotel->name . ' — StayNest'"
    :description="Str::limit($hotel->description, 160)"
>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex items-center gap-2 text-sm text-slate-700" role="list">
            <li><a href="{{ route('home') }}" class="hover:text-slate-900 hover:underline">Home</a></li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li>
                <a href="{{ route('hotels.index', ['check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests]) }}"
                   class="hover:text-slate-900 hover:underline">Search Results</a>
            </li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li><span aria-current="page" class="text-slate-900 font-medium">{{ $hotel->name }}</span></li>
        </ol>
    </nav>

    {{-- Stay details bar: update dates / guests without leaving the hotel page --}}
    <div class="bg-white rounded-xl px-5 py-4 mb-6">
        <form action="{{ route('hotels.show', $hotel) }}" method="GET" novalidate
              aria-label="Update stay details">
            <div class="flex flex-wrap items-end gap-4">

                {{-- WCAG 1.4.6: text-slate-900 on white = 16:1 ✓ AAA --}}
                <div class="flex flex-col gap-1.5">
                    <label for="hotel-check_in" class="text-sm font-semibold text-slate-900">Check-in</label>
                    <input type="date" id="hotel-check_in" name="check_in"
                           value="{{ $checkIn }}"
                           min="{{ now()->format('Y-m-d') }}"
                           required aria-required="true"
                           class="h-11 w-40 px-3 rounded bg-white text-slate-900 text-sm
                                  border-2 border-slate-300 hover:border-slate-500
                                  focus:outline-3 focus:outline-offset-2 focus:outline-[#0a4d8c]">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="hotel-check_out" class="text-sm font-semibold text-slate-900">Check-out</label>
                    <input type="date" id="hotel-check_out" name="check_out"
                           value="{{ $checkOut }}"
                           min="{{ now()->addDay()->format('Y-m-d') }}"
                           required aria-required="true"
                           class="h-11 w-40 px-3 rounded bg-white text-slate-900 text-sm
                                  border-2 border-slate-300 hover:border-slate-500
                                  focus:outline-3 focus:outline-offset-2 focus:outline-[#0a4d8c]">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="hotel-guests" class="text-sm font-semibold text-slate-900">Guests</label>
                    <select id="hotel-guests" name="guests"
                            class="h-11 w-32 px-3 rounded bg-white text-slate-900 text-sm
                                   border-2 border-slate-300 hover:border-slate-500
                                   focus:outline-3 focus:outline-offset-2 focus:outline-[#0a4d8c]">
                        @foreach (range(1, 6) as $n)
                            <option value="{{ $n }}" @selected($guests == $n)>
                                {{ $n }} {{ $n === 1 ? 'Guest' : 'Guests' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- WCAG 1.4.6: white on blue-900 = 8.12:1 ✓ AAA --}}
                <button type="submit"
                        class="min-h-[44px] px-6 py-2.5 bg-blue-900 hover:bg-blue-800 text-white
                               font-semibold rounded text-sm transition-colors
                               focus:outline-3 focus:outline-offset-2 focus:outline-[#0a4d8c]">
                    Update Availability
                </button>

                <p class="text-slate-700 text-xs self-end pb-2 ml-auto hidden sm:block">
                    {{ $nights }} {{ Str::plural('night', $nights) }} &middot;
                    {{ $guests }} {{ Str::plural('guest', $guests) }}
                </p>
            </div>
        </form>
    </div>

    {{-- Hotel hero image — WCAG 1.1.1 --}}
    <div class="rounded-xl overflow-hidden mb-8 bg-slate-200 h-48">
        <img src="{{ $hotel->image_path }}"
             alt="{{ $hotel->image_alt }}"
             class="w-full h-full object-cover"
             width="1200" height="514">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2">

            {{-- Hotel name + stars --}}
            <div class="flex items-start gap-4 mb-4">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-slate-900 mb-1">{{ $hotel->name }}</h1>
                    <p class="text-slate-700 flex items-center gap-1">
                        <svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-slate-500"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        {{ $hotel->address }}
                    </p>
                </div>
                <div class="flex flex-col items-end gap-1 shrink-0">
                    <x-star-rating :rating="$hotel->star_rating" size="lg" />
                    <div class="flex items-center gap-1.5">
                        {{-- WCAG 1.4.6: white on blue-900 = 8.9:1 ✓ AAA --}}
                        <span class="bg-blue-900 text-white font-bold px-2.5 py-0.5 rounded text-sm"
                              aria-label="Guest rating {{ $hotel->rating }} out of 5">
                            {{ number_format($hotel->rating, 1) }}
                        </span>
                        <span class="text-slate-700 text-sm">
                            {{ number_format($hotel->review_count) }} reviews
                        </span>
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <section aria-labelledby="about-heading" class="mb-8">
                <h2 id="about-heading" class="text-xl font-bold text-slate-900 mb-3 pl-3 border-l-4 border-blue-900">About This Hotel</h2>
                <p class="text-slate-700 leading-relaxed">{{ $hotel->description }}</p>
            </section>

            {{-- Amenities --}}
            <section aria-labelledby="amenities-heading" class="mb-8">
                <h2 id="amenities-heading" class="text-xl font-bold text-slate-900 mb-4 pl-3 border-l-4 border-blue-900">Hotel Amenities</h2>
                <ul class="grid grid-cols-2 sm:grid-cols-3 gap-2" role="list">
                    @foreach($hotel->amenities as $amenity)
                    @php $isNoSmoking = $amenity === 'Non-Smoking Property'; @endphp
                    <li class="flex items-center gap-2 text-slate-700 text-sm">
                        @if ($isNoSmoking)
                            <svg aria-hidden="true" focusable="false" class="size-4 shrink-0" style="color:#b91c1c"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
                            </svg>
                        @else
                            <svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-green-700"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        @endif
                        {{ $amenity }}
                    </li>
                    @endforeach
                </ul>
            </section>

            {{-- Room selection --}}
            <section aria-labelledby="rooms-heading" class="mb-10">
                <h2 id="rooms-heading" class="text-2xl font-bold text-slate-900 mb-6 pl-3 border-l-4 border-blue-900">
                    Available Rooms
                    <span class="text-slate-700 font-normal text-base ml-2">
                        — {{ $nights }} {{ Str::plural('night', $nights) }},
                        {{ $guests }} {{ Str::plural('guest', $guests) }}
                    </span>
                </h2>

                @if($hotel->rooms->isNotEmpty())
                <ul class="space-y-6" role="list">
                    @foreach($hotel->rooms as $room)
                    <li>
                        <x-room-card
                            :room="$room"
                            :hotel="$hotel"
                            :checkIn="$checkIn"
                            :checkOut="$checkOut"
                            :guests="$guests"
                            :nights="$nights"
                        />
                    </li>
                    @endforeach
                </ul>
                @else
                    <p class="text-slate-700">No rooms available for this hotel at present.</p>
                @endif
            </section>

            {{-- Guest reviews --}}
            @if($hotel->reviews->isNotEmpty())
            <section aria-labelledby="reviews-heading">
                <h2 id="reviews-heading" class="text-2xl font-bold text-slate-900 mb-6 pl-3 border-l-4 border-blue-900">
                    Guest Reviews
                    <span class="text-slate-700 font-normal text-base ml-2">
                        — {{ number_format($hotel->review_count) }} total
                    </span>
                </h2>
                <ul class="space-y-4" role="list">
                    @foreach($hotel->reviews as $review)
                    <li>
                        <x-review-card :review="$review" />
                    </li>
                    @endforeach
                </ul>
            </section>
            @endif

        </div>

        {{-- Booking summary sidebar --}}
        <aside class="lg:col-span-1" aria-labelledby="booking-summary-heading">
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5 shadow-sm sticky top-4">
                <h2 id="booking-summary-heading" class="font-bold text-slate-900 text-lg mb-4">
                    Your Stay
                </h2>

                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-slate-700">Hotel</dt>
                        <dd class="text-slate-900 font-medium text-right">{{ $hotel->name }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-700">Location</dt>
                        <dd class="text-slate-900 font-medium">{{ $hotel->area }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-700">Check-in</dt>
                        <dd class="text-slate-900 font-medium">
                            {{ \Carbon\Carbon::parse($checkIn)->format('D, d M Y') }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-700">Check-out</dt>
                        <dd class="text-slate-900 font-medium">
                            {{ \Carbon\Carbon::parse($checkOut)->format('D, d M Y') }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-700">Duration</dt>
                        <dd class="text-slate-900 font-medium">
                            {{ $nights }} {{ Str::plural('night', $nights) }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-700">Guests</dt>
                        <dd class="text-slate-900 font-medium">
                            {{ $guests }} {{ Str::plural('guest', $guests) }}
                        </dd>
                    </div>
                </dl>

                <div class="border-t border-slate-300 mt-4 pt-4">
                    <p class="text-slate-700 text-sm">Select a room above to confirm your booking.</p>
                </div>
            </div>
        </aside>
    </div>
</div>

<script>
    (function () {
        var ci = document.getElementById('hotel-check_in');
        var co = document.getElementById('hotel-check_out');
        if (!ci || !co) return;
        function sync() {
            if (!ci.value) return;
            var d = new Date(ci.value);
            d.setDate(d.getDate() + 1);
            var min = d.toISOString().split('T')[0];
            co.min = min;
            if (!co.value || co.value <= ci.value) co.value = min;
        }
        ci.addEventListener('change', sync);
        sync();
    }());
</script>

</x-layout>
