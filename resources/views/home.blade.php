<x-layout
    title="StayNest — Find Hotels Worldwide"
    description="Search and book accessible hotels worldwide. Built to WCAG 2.2 AAA standards."
>

<section class="bg-slate-900 text-white" aria-labelledby="hero-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
        <div class="max-w-2xl mx-auto text-center mb-10">
            <h1 id="hero-heading" class="text-4xl lg:text-5xl font-bold tracking-tight mb-4">
                Find Your Perfect Stay, Anywhere
            </h1>
            <p class="text-slate-300 text-lg leading-relaxed">
                Explore hundreds of hotels across London, Paris, Tokyo, New York and more.
                Built for accessibility. Every guest matters.
            </p>
        </div>
        <x-search-form />
    </div>
</section>

<section class="bg-slate-50 py-16" aria-labelledby="accessibility-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-10">
            <h2 id="accessibility-heading" class="text-3xl font-bold text-slate-900 mb-3">
                Built for Everyone
            </h2>
            <p class="text-slate-700 text-lg max-w-2xl mx-auto leading-relaxed">
                StayNest is designed to meet <strong>WCAG&nbsp;2.2 Level&nbsp;AAA</strong> — the highest
                international accessibility standard. Here's what that means for you.
            </p>
        </div>

        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" role="list">

            <li class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                <div aria-hidden="true" class="size-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Enhanced Contrast</h3>
                <p class="text-slate-700 text-sm leading-relaxed">
                    All text meets a <strong>7:1 contrast ratio</strong> (WCAG 1.4.6 AAA), making content
                    readable for users with low vision or colour deficiency.
                </p>
            </li>

            <li class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                <div aria-hidden="true" class="size-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Large Touch Targets</h3>
                <p class="text-slate-700 text-sm leading-relaxed">
                    Every button, link, and form control is at least <strong>44×44&thinsp;px</strong>
                    (WCAG 2.5.5 AAA), ensuring comfortable interaction on touch screens and for motor-impaired users.
                </p>
            </li>

            <li class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                <div aria-hidden="true" class="size-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Visible Focus</h3>
                <p class="text-slate-700 text-sm leading-relaxed">
                    A clear, high-contrast <strong>3px blue focus ring</strong> appears around every
                    interactive element when navigating by keyboard (WCAG 2.4.13 AAA).
                </p>
            </li>

            <li class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                <div aria-hidden="true" class="size-12 rounded-lg bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Image Alt Text</h3>
                <p class="text-slate-700 text-sm leading-relaxed">
                    Every image carries a <strong>descriptive text alternative</strong> (WCAG 1.1.1 A),
                    ensuring screen-reader users receive the same information as sighted visitors.
                </p>
            </li>
        </ul>
    </div>
</section>

<section class="py-16" aria-labelledby="featured-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-8">
            <h2 id="featured-heading" class="text-3xl font-bold text-slate-900 mb-1">Top-Rated Hotels</h2>
            <p class="text-slate-700">Our highest-rated properties worldwide</p>
        </div>

        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" role="list">
            @foreach($featured as $hotel)
            <li><x-hotel-card :hotel="$hotel" /></li>
            @endforeach
        </ul>
    </div>
</section>

</x-layout>