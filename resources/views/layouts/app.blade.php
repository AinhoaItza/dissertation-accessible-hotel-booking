<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StayNest') — Accessible Hotel Booking</title>
    <meta name="description" content="@yield('meta_description', 'StayNest — book accessible, WCAG 2.2 compliant hotel accommodation across the world.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    {{-- WCAG 2.4.1: Skip Navigation Link — allows keyboard users to bypass repeated nav --}}
    <a href="#main-content" class="skip-link">Skip to main content</a>

    {{-- Primary site header --}}
    <header class="bg-blue-900 text-white on-dark" role="banner">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo igual -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl text-white min-h-[44px]">
                    <svg>...</svg>
                    StayNest
                </a>

                <!-- Navigation Tabs (como Booking) -->
                <ul class="flex items-center gap-4" role="list">
                    <li><a href="#" class="min-h-[44px] flex items-center px-3 hover:text-blue-200">Hotel
                            Stays</a></li>
                    <li><a href="#" class="min-h-[44px] flex items-center px-3 hover:text-blue-200">Flights</a>
                    </li>
                    <li><a href="#"
                            class="min-h-[44px] flex items-center px-3 hover:text-blue-200">Attractions</a></li>
                </ul>

                <!-- Right side: Register, Sign in -->
                <div class="flex items-center gap-3">
                    <a href="#" class="min-h-[44px] px-4 text-blue-900 bg-white rounded font-medium">Register</a>
                    <a href="#" class="min-h-[44px] px-4 text-white hover:text-blue-200">Sign in</a>
                </div>
            </div>
        </nav>
    </header>

    {{-- Main content landmark — target for skip link --}}
    {{-- tabindex="-1" allows programmatic focus from skip link --}}
    <main id="main-content" tabindex="-1" class="flex-1 outline-none">
        @yield('content')
    </main>

    {{-- Site footer --}}
    <footer class="bg-slate-900 text-white mt-auto on-dark" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div>
                    <div class="flex items-center gap-2 font-bold text-lg mb-3">
                        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" class="size-6"
                            viewBox="0 0 24 24" fill="currentColor">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                        </svg>
                        StayNest
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Accessible hotel booking worldwide, built to WCAG&nbsp;2.2 AAA standards.
                        Everyone deserves a great stay.
                    </p>
                </div>

                <div>
                    <h2 class="font-semibold text-sm uppercase tracking-wider text-slate-400 mb-3">Explore</h2>
                    <ul class="space-y-1 text-sm" role="list">
                        <li><a href="{{ route('home') }}"
                                class="text-slate-300 hover:text-white min-h-[44px] flex items-center transition-colors">Home</a>
                        </li>
                        <li><a href="{{ route('hotels.index') }}"
                                class="text-slate-300 hover:text-white min-h-[44px] flex items-center transition-colors">Find
                                Hotels</a></li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-semibold text-sm uppercase tracking-wider text-slate-400 mb-3">Accessibility</h2>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        This site is built to <strong class="text-white">WCAG 2.2 AAA</strong> standards,
                        including enhanced contrast (7:1), minimum 44&times;44&thinsp;px touch targets,
                        visible focus indicators, and full alternative text on all images.
                    </p>
                </div>
            </div>

            <div class="border-t border-slate-700 mt-8 pt-6 text-center text-sm text-slate-400">
                <p>&copy; {{ date('Y') }} StayNest. BSc Dissertation Prototype — University of Huddersfield.</p>
            </div>
        </div>
    </footer>

</body>

</html>
