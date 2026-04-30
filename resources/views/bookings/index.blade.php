<x-layout title="My Bookings — StayNest" description="View your StayNest booking history.">

<div class="bg-slate-100 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">

        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-slate-900">My Bookings</h1>
            <p class="text-slate-600 text-sm mt-2">Your complete StayNest booking history.</p>
        </div>

        @if ($bookings->isEmpty())

            <div class="bg-white border border-slate-200 rounded-xl shadow-sm text-center" style="padding:3rem 2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-slate-300 mx-auto mb-4" fill="none"
                     stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                    <rect x="9" y="3" width="6" height="4" rx="1"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h4"/>
                </svg>
                <h2 class="text-lg font-semibold text-slate-900 mb-2">No bookings yet</h2>
                <p class="text-slate-500 text-sm mb-6">When you book a hotel while signed in, it will appear here.</p>
                <a href="{{ route('hotels.index') }}"
                   class="inline-flex items-center min-h-[44px] px-6 bg-blue-900 hover:bg-blue-800
                          text-white font-semibold rounded-lg text-sm transition-colors
                          focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">
                    Browse Hotels
                </a>
            </div>

        @else

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($bookings as $booking)
                <article class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden"
                         aria-label="Booking at {{ $booking->hotel->name }}">

                    {{-- City image --}}
                    @if ($booking->hotel->city_image_path)
                        <img src="{{ asset($booking->hotel->city_image_path) }}"
                             alt="{{ $booking->hotel->city }}"
                             class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-slate-200 flex items-center justify-center" aria-hidden="true">
                            <svg class="size-10 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"/>
                            </svg>
                        </div>
                    @endif

                    <div style="padding:1.5rem;">

                        <div class="flex justify-between items-start mb-4 gap-3">
                            <div class="min-w-0">
                                <h2 class="font-bold text-slate-900 text-base leading-tight truncate">
                                    {{ $booking->hotel->name }}
                                </h2>
                                <p class="text-slate-500 text-xs mt-0.5">{{ $booking->room->name }}</p>
                            </div>
                            <span class="inline-flex shrink-0 items-center px-2.5 py-1 rounded-full
                                         bg-green-50 text-green-800 text-xs font-semibold border border-green-200">
                                Confirmed
                            </span>
                        </div>

                        <dl class="space-y-2 text-sm mb-4">
                            <div class="flex justify-between">
                                <dt class="text-slate-500">Check-in</dt>
                                <dd class="font-medium text-slate-900">
                                    {{ $booking->check_in->format('D, d M Y') }}
                                </dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-slate-500">Check-out</dt>
                                <dd class="font-medium text-slate-900">
                                    {{ $booking->check_out->format('D, d M Y') }}
                                </dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-slate-500">Duration</dt>
                                <dd class="font-medium text-slate-900">
                                    {{ $booking->nights }} {{ Str::plural('night', $booking->nights) }},
                                    {{ $booking->guests }} {{ Str::plural('guest', $booking->guests) }}
                                </dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-slate-500">Total</dt>
                                <dd class="font-bold text-blue-900">£{{ number_format($booking->total, 2) }}</dd>
                            </div>
                        </dl>

                        <div class="pt-3 border-t border-slate-100">
                            <p class="text-xs text-slate-400">
                                Ref:
                                <span class="font-mono font-semibold text-slate-700 tracking-wider">
                                    {{ $booking->reference }}
                                </span>
                            </p>
                        </div>

                    </div>
                </article>
                @endforeach
            </div>

        @endif

    </div>
</div>

</x-layout>
