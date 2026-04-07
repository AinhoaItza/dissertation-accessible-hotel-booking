<x-layout
    :title="$room->name . ' — ' . $hotel->name . ' — StayNest'"
    :description="'Book the ' . $room->name . ' at ' . $hotel->name . '. ' . Str::limit($room->description, 120)"
>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex items-center gap-2 text-sm text-slate-700 flex-wrap" role="list">
            <li><a href="{{ route('home') }}" class="hover:text-slate-900 hover:underline">Home</a></li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li>
                <a href="{{ route('hotels.index', ['check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests]) }}"
                   class="hover:text-slate-900 hover:underline">Results</a>
            </li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li>
                <a href="{{ route('hotels.show', [$hotel, 'check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests]) }}"
                   class="hover:text-slate-900 hover:underline">{{ $hotel->name }}</a>
            </li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li><span aria-current="page" class="text-slate-900 font-medium">{{ $room->name }}</span></li>
        </ol>
    </nav>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">{{ $room->name }}</h1>
        <p class="text-slate-700 mt-1">{{ $hotel->name }} — {{ $hotel->area }}, {{ $hotel->city }}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

        {{-- LEFT: Room details + booking form --}}
        <div class="lg:col-span-3 space-y-8">

            <div class="rounded-xl overflow-hidden bg-slate-200 aspect-video">
                <img src="{{ $room->image_path }}"
                     alt="{{ $room->image_alt }}"
                     class="w-full h-full object-cover"
                     width="800" height="450">
            </div>

            <section aria-labelledby="room-details-heading">
                <h2 id="room-details-heading" class="text-xl font-bold text-slate-900 mb-4 pl-3 border-l-4 border-blue-900">Room Details</h2>

                <dl class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-5">
                    <div class="bg-slate-50 rounded-lg p-3 text-center border border-slate-200">
                        <dt class="text-xs text-slate-700 mb-1">Bed Type</dt>
                        <dd class="font-semibold text-slate-900 text-sm">{{ $room->bed_type }}</dd>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 text-center border border-slate-200">
                        <dt class="text-xs text-slate-700 mb-1">Room Size</dt>
                        <dd class="font-semibold text-slate-900 text-sm">{{ $room->size_sqm }}&thinsp;m²</dd>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 text-center border border-slate-200">
                        <dt class="text-xs text-slate-700 mb-1">Max Guests</dt>
                        <dd class="font-semibold text-slate-900 text-sm">{{ $room->capacity }} {{ Str::plural('person', $room->capacity) }}</dd>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 text-center border border-slate-200">
                        <dt class="text-xs text-slate-700 mb-1">Room Type</dt>
                        <dd class="font-semibold text-slate-900 text-sm capitalize">{{ ucfirst($room->type) }}</dd>
                    </div>
                </dl>

                <p class="text-slate-700 leading-relaxed mb-5">{{ $room->description }}</p>

                <h3 class="font-semibold text-slate-900 mb-3">Room Amenities</h3>
                <ul class="grid grid-cols-2 sm:grid-cols-3 gap-2" role="list">
                    @foreach($room->amenities as $amenity)
                    <li class="flex items-center gap-2 text-slate-700 text-sm">
                        <svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-green-700"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        {{ $amenity }}
                    </li>
                    @endforeach
                </ul>
            </section>

            {{-- Booking form --}}
            <section aria-labelledby="booking-form-heading">
                <h2 id="booking-form-heading" class="text-xl font-bold text-slate-900 mb-2 pl-3 border-l-4 border-blue-900">Guest Details</h2>
                <p class="text-slate-700 text-sm mb-5">
                    Fields marked <span aria-hidden="true" class="text-slate-900 font-bold">*</span>
                    <span class="sr-only">(asterisk)</span> are required.
                </p>

                <form action="{{ route('hotels.rooms.book', [$hotel, $room]) }}"
                      method="POST" novalidate
                      aria-label="Guest booking form"
                      class="space-y-5">
                    @csrf
                    <input type="hidden" name="check_in"  value="{{ $checkIn }}">
                    <input type="hidden" name="check_out" value="{{ $checkOut }}">
                    <input type="hidden" name="guests"    value="{{ $guests }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1.5">
                            <label for="first_name" class="text-sm font-semibold text-slate-800">
                                First Name <span aria-hidden="true" class="text-slate-900">*</span>
                            </label>
                            <input type="text" id="first_name" name="first_name"
                                   autocomplete="given-name" required aria-required="true"
                                   class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                          hover:border-slate-500 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition-colors"
                                   placeholder="e.g. Jane">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="last_name" class="text-sm font-semibold text-slate-800">
                                Last Name <span aria-hidden="true" class="text-slate-900">*</span>
                            </label>
                            <input type="text" id="last_name" name="last_name"
                                   autocomplete="family-name" required aria-required="true"
                                   class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                          hover:border-slate-500 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition-colors"
                                   placeholder="e.g. Smith">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="email" class="text-sm font-semibold text-slate-800">
                            Email Address <span aria-hidden="true" class="text-slate-900">*</span>
                        </label>
                        <input type="email" id="email" name="email"
                               autocomplete="email" required aria-required="true"
                               aria-describedby="email-hint"
                               class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                      hover:border-slate-500 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition-colors"
                               placeholder="e.g. jane.smith@example.com">
                        <p id="email-hint" class="text-xs text-slate-700">
                            Your booking confirmation will be sent to this address.
                        </p>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="phone" class="text-sm font-semibold text-slate-800">
                            Phone Number <span aria-hidden="true" class="text-slate-900">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone"
                               autocomplete="tel" required aria-required="true"
                               class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                      hover:border-slate-500 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition-colors"
                               placeholder="e.g. +44 7700 900000">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="requests" class="text-sm font-semibold text-slate-800">
                            Special Requests <span class="font-normal text-slate-700">(optional)</span>
                        </label>
                        <textarea id="requests" name="requests" rows="4"
                                  aria-describedby="requests-hint"
                                  class="px-3 py-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                         hover:border-slate-500 focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition-colors resize-y"
                                  placeholder="e.g. early check-in, ground floor room, allergy information…"></textarea>
                        <p id="requests-hint" class="text-xs text-slate-700">
                            We will do our best to accommodate requests, but cannot guarantee them.
                        </p>
                    </div>

                    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4" role="note"
                         aria-label="Prototype information">
                        <p class="text-slate-800 text-sm">
                            <strong>Note:</strong> This is a BSc dissertation prototype.
                            No payment will be processed and no booking will be made.
                        </p>
                    </div>

                    <button type="submit"
                            class="w-full min-h-[44px] bg-blue-900 hover:bg-blue-800 text-white
                                   font-bold text-base rounded focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition-colors">
                        Confirm Reservation
                    </button>
                </form>
            </section>
        </div>

        {{-- RIGHT: Booking summary sidebar --}}
        <aside class="lg:col-span-2" aria-labelledby="price-summary-heading">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden sticky top-4">

                <div class="aspect-video bg-slate-200">
                    <img src="{{ $room->image_path }}" alt="" aria-hidden="true"
                         class="w-full h-full object-cover" loading="lazy" width="600" height="338">
                </div>

                <div class="p-5">
                    <h2 id="price-summary-heading" class="font-bold text-slate-900 text-lg mb-1">
                        Booking Summary
                    </h2>
                    <p class="text-slate-700 text-sm mb-4">{{ $hotel->name }}</p>

                    <dl class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between">
                            <dt class="text-slate-700">Room</dt>
                            <dd class="text-slate-900 font-medium text-right max-w-[55%]">{{ $room->name }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-slate-700">Check-in</dt>
                            <dd class="text-slate-900 font-medium">{{ \Carbon\Carbon::parse($checkIn)->format('d M Y') }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-slate-700">Check-out</dt>
                            <dd class="text-slate-900 font-medium">{{ \Carbon\Carbon::parse($checkOut)->format('d M Y') }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-slate-700">Duration</dt>
                            <dd class="text-slate-900 font-medium">{{ $nights }} {{ Str::plural('night', $nights) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-slate-700">Guests</dt>
                            <dd class="text-slate-900 font-medium">{{ $guests }} {{ Str::plural('guest', $guests) }}</dd>
                        </div>
                    </dl>

                    <div class="border-t border-slate-200 pt-4 space-y-2 text-sm">
                        @php
                            $guestLabel = match(true) {
                                $guests === 1 => '1 guest (−10%)',
                                $guests === 2 => '2 guests (standard)',
                                $guests === 3 => '3 guests (+15%)',
                                default       => $guests . ' guests (+25%)',
                            };
                        @endphp
                        <div class="flex justify-between">
                            <span class="text-slate-700">{{ $guestLabel }}</span>
                            <span class="text-slate-900 font-medium">£{{ number_format($pricePerNight, 2) }}/night</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-700">
                                £{{ number_format($pricePerNight, 2) }} × {{ $nights }} {{ Str::plural('night', $nights) }}
                            </span>
                            <span class="text-slate-900 font-medium">£{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-700">VAT (20%)</span>
                            <span class="text-slate-900 font-medium">£{{ number_format($tax, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-t border-slate-200 pt-3 mt-3">
                            <span class="font-bold text-slate-900 text-base">Total</span>
                            <span class="font-bold text-slate-900 text-xl">£{{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-5 bg-slate-50 rounded-lg p-4 border border-slate-200">
                        <h3 class="text-sm font-semibold text-slate-800 mb-1">Free Cancellation</h3>
                        <p class="text-xs text-slate-700 leading-relaxed">
                            Cancel up to 48 hours before check-in for a full refund.
                        </p>
                    </div>

                </div>
            </div>
        </aside>
    </div>
</div>

</x-layout>