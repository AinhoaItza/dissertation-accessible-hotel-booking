@props([
    'title' => 'StayNest — Accessible Hotel Booking',
    'description' => 'StayNest — book accessible, WCAG 2.2 AAA compliant hotel accommodation worldwide.',
])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <a href="#main-content" class="skip-link">Skip to main content</a>

    <header role="banner" class="bg-slate-900 text-white on-dark">
        <nav aria-label="Primary navigation" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}"
                   aria-label="StayNest — return to homepage"
                   class="flex items-center gap-2 font-bold text-xl text-white min-h-[44px] hover:text-slate-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 shrink-0" viewBox="0 0 24 24"
                         fill="currentColor" aria-hidden="true" focusable="false">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span>StayNest</span>
                </a>

                <ul role="list" class="flex items-center gap-1">
                    <li>
                        <a href="{{ route('hotels.index') }}"
                           class="flex items-center min-h-[44px] px-4 rounded text-sm font-medium text-slate-200 hover:text-white hover:bg-slate-800 transition-colors"
                           @if(request()->routeIs('hotels.index') || request()->routeIs('hotels.show')) aria-current="page" @endif>
                            Find Hotels
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main-content" tabindex="-1" class="flex-1 outline-none">
        {{ $slot }}
    </main>

    <footer role="contentinfo" class="bg-slate-900 text-white mt-auto on-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div>
                    <a href="{{ route('home') }}"
                       aria-label="StayNest — return to homepage"
                       class="flex items-center gap-2 font-bold text-xl text-white mb-3 w-fit min-h-[44px] hover:text-slate-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 shrink-0" viewBox="0 0 24 24"
                             fill="currentColor" aria-hidden="true" focusable="false">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                        <span>StayNest</span>
                    </a>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Accessible hotel booking built to WCAG 2.2 AAA standards — because everyone deserves a great stay.
                    </p>
                </div>

                <div>
                    <div class="h-[44px] flex items-center mb-3">
                        <h2 class="font-semibold text-white text-sm uppercase tracking-wider">Explore</h2>
                    </div>
                    <ul role="list" class="space-y-2">
                        <li>
                            <a href="{{ route('hotels.index') }}"
                               class="text-slate-300 text-sm hover:text-white min-h-[44px] flex items-center w-fit transition-colors">
                                Find Hotels
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <div class="h-[44px] flex items-center mb-3">
                        <h2 class="font-semibold text-white text-sm uppercase tracking-wider">Accessibility</h2>
                    </div>
                    <p class="text-slate-300 text-sm mb-2 leading-relaxed">
                        This site meets WCAG 2.2 Level AAA standards, including enhanced contrast ratios (7:1 minimum),
                        visible focus indicators, large touch targets (44×44 px), and full alt-text coverage for all images.
                    </p>
                </div>
            </div>

            <div class="border-t border-slate-700 mt-10 pt-6 text-center">
                <p class="text-slate-400 text-xs">
                    &copy; {{ date('Y') }} StayNest. BSc Dissertation Prototype &mdash; University of Huddersfield.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
