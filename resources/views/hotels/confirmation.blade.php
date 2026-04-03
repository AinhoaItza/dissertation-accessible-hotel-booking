<x-layout
    :title="'Booking Confirmed — ' . $hotel->name . ' — StayNest'"
    description="Your reservation has been confirmed. Thank you for booking with StayNest."
>

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-6">

    {{-- Breadcrumb --}}
    <nav aria-label="Breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-slate-600" role="list">
            <li><a href="{{ route('home') }}" class="hover:text-slate-900 hover:underline">Home</a></li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li>
                <a href="{{ route('hotels.show', $hotel) }}"
                   class="hover:text-slate-900 hover:underline">{{ $hotel->name }}</a>
            </li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li><span aria-current="page" class="text-slate-900 font-medium">Confirmation</span></li>
        </ol>
    </nav>

    {{-- Inline success indicator --}}
    <div class="flex items-center gap-2 mb-5" role="status" aria-live="polite">
        {{-- WCAG 1.4.6: green-800 on white = 7.4:1 ✓ AAA --}}
        <svg aria-hidden="true" focusable="false" class="size-5 shrink-0 text-green-800"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
        </svg>
        <h1 class="text-base font-bold text-slate-900">
            Booking confirmed
        </h1>
        <span class="text-slate-500 text-sm">&middot;</span>
        <span class="text-sm text-slate-700">
            Ref: <span class="font-mono font-semibold text-slate-900 tracking-wider">{{ $booking['reference'] }}</span>
        </span>
    </div>

    {{-- Summary card --}}
    <section aria-labelledby="summary-heading"
             class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm mb-4">

        <div class="px-5 py-3 border-b border-slate-200 bg-slate-900">
            <h2 id="summary-heading" class="text-sm font-bold text-white">{{ $hotel->name }}
                <span class="font-normal text-slate-300">&mdash; {{ $room->name }}</span>
            </h2>
        </div>

        <dl class="divide-y divide-slate-100 text-sm">

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Guest</dt>
                <dd class="font-semibold text-slate-900 text-right">
                    {{ $booking['first_name'] }} {{ $booking['last_name'] }}
                </dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Email</dt>
                <dd class="text-slate-900 text-right">{{ $booking['email'] }}</dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Room</dt>
                <dd class="text-slate-900 text-right">
                    {{ ucfirst($room->type) }} &middot; {{ $room->bed_type }} bed
                </dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Check-in</dt>
                <dd class="text-slate-900 text-right">
                    {{ \Carbon\Carbon::parse($booking['check_in'])->format('D, d M Y') }}
                </dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Check-out</dt>
                <dd class="text-slate-900 text-right">
                    {{ \Carbon\Carbon::parse($booking['check_out'])->format('D, d M Y') }}
                </dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Duration</dt>
                <dd class="text-slate-900 text-right">
                    {{ $booking['nights'] }} {{ Str::plural('night', $booking['nights']) }},
                    {{ $booking['guests'] }} {{ Str::plural('guest', $booking['guests']) }}
                </dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">Subtotal</dt>
                <dd class="text-slate-900 text-right">£{{ number_format($booking['subtotal'], 2) }}</dd>
            </div>

            <div class="flex justify-between items-baseline px-5 py-2">
                <dt class="text-slate-600 shrink-0">VAT (20%)</dt>
                <dd class="text-slate-900 text-right">£{{ number_format($booking['tax'], 2) }}</dd>
            </div>

            {{-- Total row --}}
            <div class="flex justify-between items-baseline px-5 py-2.5 bg-slate-50">
                <dt class="font-bold text-slate-900 shrink-0">Total charged</dt>
                {{-- WCAG 1.4.6: blue-900 on slate-50 = 8.9:1 ✓ AAA --}}
                <dd class="font-bold text-blue-900 text-base text-right">
                    £{{ number_format($booking['total'], 2) }}
                </dd>
            </div>

            @if ($booking['requests'])
            <div class="px-5 py-2">
                <dt class="text-slate-600 mb-0.5">Special requests</dt>
                <dd class="text-slate-900 leading-relaxed">{{ $booking['requests'] }}</dd>
            </div>
            @endif

        </dl>
    </section>

    {{-- Actions --}}
    <div class="flex gap-3 mb-4">
        <a href="{{ route('home') }}"
           class="min-h-[44px] flex items-center px-6 bg-blue-900 hover:bg-blue-800
                  text-white font-semibold rounded text-sm transition-colors">
            Back to Home
        </a>
        <a href="{{ route('hotels.index') }}"
           class="min-h-[44px] flex items-center px-6 border-2 border-slate-300
                  text-slate-900 font-semibold rounded hover:border-slate-500
                  transition-colors text-sm">
            Browse Hotels
        </a>
    </div>

    {{-- Prototype note --}}
    <p class="text-xs text-slate-500">
        Prototype only &mdash; no payment processed and no real booking made.
    </p>

</div>

</x-layout>
