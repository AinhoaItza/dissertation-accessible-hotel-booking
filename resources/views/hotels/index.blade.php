<x-layout
    title="Search Results — StayNest"
    description="Browse hotels worldwide matching your search. Filter by country, star rating, and price."
>

<section class="bg-slate-900 text-white py-6" aria-label="Refine your search">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-search-form
            :compact="true"
            :destination="$activeDestination"
            :checkIn="$checkIn"
            :checkOut="$checkOut"
            :guests="$guests"
        />
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <nav aria-label="Breadcrumb" class="mb-4">
        <ol class="flex items-center gap-2 text-sm text-slate-700" role="list">
            <li><a href="{{ route('home') }}" class="hover:text-slate-900 hover:underline">Home</a></li>
            <li aria-hidden="true" class="text-slate-400">/</li>
            <li><span aria-current="page" class="text-slate-900 font-medium">Search Results</span></li>
        </ol>
    </nav>

    <h1 class="text-2xl font-bold text-slate-900 mb-6">Hotel Search Results</h1>

    <div class="flex flex-col lg:flex-row gap-8">

        {{-- ====================================================
             FILTER SIDEBAR
             ==================================================== --}}
        <aside class="w-full lg:w-64 shrink-0" aria-labelledby="filters-heading">
            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">

                <h2 id="filters-heading" class="font-bold text-slate-900 text-lg mb-5">
                    Filter Results
                </h2>

                <form action="{{ route('hotels.index') }}" method="GET" aria-label="Filter hotels">
                    <input type="hidden" name="check_in"    value="{{ $checkIn }}">
                    <input type="hidden" name="check_out"   value="{{ $checkOut }}">
                    <input type="hidden" name="guests"      value="{{ $guests }}">
                    <input type="hidden" name="destination" value="{{ $activeDestination }}">

                    {{-- Country --}}
                    <div class="mb-6">
                        <label for="country" class="text-sm font-semibold text-slate-800 block mb-3">
                            Country
                        </label>
                        <select id="country" name="country"
                                class="h-11 w-full px-3 border-2 border-slate-300 rounded text-slate-900
                                       text-sm bg-white hover:border-slate-500 transition-colors">
                            <option value="" @selected(!$activeCountry)>All countries</option>
                            @foreach($countries as $c)
                                <option value="{{ $c }}" @selected($activeCountry === $c)>{{ $c }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Facilities --}}
                    <fieldset class="mb-6">
                        <legend class="text-sm font-semibold text-slate-800 mb-3">Facilities</legend>
                        <div class="space-y-1">
                            <label class="flex items-center gap-3 min-h-[44px] cursor-pointer">
                                <input type="checkbox" name="pool" value="1"
                                       class="size-4 accent-blue-900 rounded"
                                       @checked(request('pool'))>
                                <span class="text-slate-800 text-sm">Swimming Pool</span>
                            </label>
                            <label class="flex items-center gap-3 min-h-[44px] cursor-pointer">
                                <input type="checkbox" name="spa" value="1"
                                       class="size-4 accent-blue-900 rounded"
                                       @checked(request('spa'))>
                                <span class="text-slate-800 text-sm">Spa &amp; Wellness</span>
                            </label>
                            <label class="flex items-center gap-3 min-h-[44px] cursor-pointer">
                                <input type="checkbox" name="breakfast" value="1"
                                       class="size-4 accent-blue-900 rounded"
                                       @checked(request('breakfast'))>
                                <span class="text-slate-800 text-sm">Breakfast Included</span>
                            </label>
                        </div>
                    </fieldset>

                    {{-- Star Rating --}}
                    <fieldset class="mb-6">
                        <legend class="text-sm font-semibold text-slate-800 mb-3">Star Rating</legend>
                        <div class="space-y-1">
                            <label class="flex items-center gap-3 min-h-[44px] cursor-pointer">
                                <input type="radio" name="stars" value=""
                                       class="size-4 accent-blue-900"
                                       @checked(!request('stars'))>
                                <span class="text-slate-800 text-sm">Any rating</span>
                            </label>
                            @foreach([5, 4, 3] as $star)
                            <label class="flex items-center gap-3 min-h-[44px] cursor-pointer">
                                <input type="radio" name="stars" value="{{ $star }}"
                                       class="size-4 accent-blue-900"
                                       @checked(request('stars') == $star)>
                                <span class="flex items-center gap-1 text-sm text-slate-800">
                                    {{ $star }}
                                    <x-star-rating :rating="$star" size="sm" />
                                </span>
                            </label>
                            @endforeach
                        </div>
                    </fieldset>

                    {{-- Max price --}}
                    <div class="mb-6">
                        <label for="max_price" class="text-sm font-semibold text-slate-800 block mb-3">
                            Max Price per Night
                        </label>
                        <select id="max_price" name="max_price"
                                class="h-11 w-full px-3 border-2 border-slate-300 rounded text-slate-900
                                       text-sm bg-white hover:border-slate-500 transition-colors">
                            <option value=""    @selected(!request('max_price'))>Any price</option>
                            <option value="150" @selected(request('max_price') == 150)>Up to £150</option>
                            <option value="200" @selected(request('max_price') == 200)>Up to £200</option>
                            <option value="300" @selected(request('max_price') == 300)>Up to £300</option>
                            <option value="500" @selected(request('max_price') == 500)>Up to £500</option>
                        </select>
                    </div>

                    {{-- Sort --}}
                    <div class="mb-6">
                        <label for="sort" class="text-sm font-semibold text-slate-800 block mb-3">
                            Sort By
                        </label>
                        <select id="sort" name="sort"
                                class="h-11 w-full px-3 border-2 border-slate-300 rounded text-slate-900
                                       text-sm bg-white hover:border-slate-500 transition-colors">
                            <option value="rating"     @selected(request('sort', 'rating') === 'rating')>Top Rated</option>
                            <option value="price_asc"  @selected(request('sort') === 'price_asc')>Price: Low to High</option>
                            <option value="price_desc" @selected(request('sort') === 'price_desc')>Price: High to Low</option>
                            <option value="name"       @selected(request('sort') === 'name')>Name A–Z</option>
                        </select>
                    </div>

                    <button type="submit"
                            class="w-full min-h-[44px] bg-blue-900 hover:bg-blue-800 text-white
                                   font-semibold rounded text-sm transition-colors">
                        Apply Filters
                    </button>

                    @if(request()->hasAny(['country', 'stars', 'max_price', 'sort', 'pool', 'spa', 'breakfast']))
                        <a href="{{ route('hotels.index', ['check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests]) }}"
                           class="flex items-center justify-center w-full min-h-[44px] mt-2 text-slate-700
                                  hover:text-slate-900 border-2 border-slate-300 hover:border-slate-500 rounded
                                  text-sm font-medium transition-colors">
                            Clear Filters
                        </a>
                    @endif
                </form>
            </div>
        </aside>

        {{-- ====================================================
             HOTEL RESULTS GRID
             ==================================================== --}}
        <div class="flex-1 min-w-0">

            <p class="text-slate-700 text-sm mb-6" aria-live="polite" aria-atomic="true">
                @if($hotels->total() > 0)
                    Showing <strong class="text-slate-900">{{ $hotels->firstItem() }}–{{ $hotels->lastItem() }}</strong>
                    of <strong class="text-slate-900">{{ $hotels->total() }}</strong>
                    {{ Str::plural('hotel', $hotels->total()) }}
                    <span class="text-slate-500">for {{ $nights }} {{ Str::plural('night', $nights) }}</span>
                @else
                    No hotels found matching your filters.
                @endif
            </p>

            @if($hotels->isNotEmpty())

                <ul class="grid grid-cols-1 xl:grid-cols-2 gap-6" role="list"
                    aria-label="Hotel search results">
                    @foreach($hotels as $hotel)
                    <li>
                        <x-hotel-card
                            :hotel="$hotel"
                            :checkIn="$checkIn"
                            :checkOut="$checkOut"
                            :guests="$guests"
                        />
                    </li>
                    @endforeach
                </ul>

                @if($hotels->hasPages())
                <nav class="mt-8" aria-label="Search results pages">
                    {{ $hotels->links('pagination::tailwind') }}
                </nav>
                @endif

            @else
                <div class="bg-slate-50 rounded-xl border border-slate-200 p-12 text-center">
                    <svg aria-hidden="true" focusable="false" class="size-12 text-slate-400 mx-auto mb-4"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    <h2 class="font-bold text-slate-900 text-xl mb-2">No hotels found</h2>
                    <p class="text-slate-700 mb-6">Try adjusting your filters or broadening your search.</p>
                    <a href="{{ route('hotels.index', ['check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests]) }}"
                       class="inline-flex items-center min-h-[44px] px-6 bg-blue-900 hover:bg-blue-800
                              text-white font-semibold rounded transition-colors text-sm">
                        Clear All Filters
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

</x-layout>
