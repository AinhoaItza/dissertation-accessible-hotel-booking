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

                    @auth
                    {{-- ── Authenticated: Hello [name] dropdown ─────────────── --}}
                    <li class="relative">
                        <button id="user-menu-btn"
                                type="button"
                                aria-haspopup="menu"
                                aria-expanded="false"
                                aria-controls="user-menu"
                                class="flex items-center gap-1.5 min-h-[44px] px-4 rounded text-sm font-medium text-slate-200 hover:text-white hover:bg-slate-800 transition-colors">
                            <span>Hello, {{ auth()->user()->name }}</span>
                            <svg id="user-menu-chevron"
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="size-4 transition-transform duration-200"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 aria-hidden="true" focusable="false">
                                <polyline points="6 9 12 15 18 9"/>
                            </svg>
                        </button>

                        <ul id="user-menu"
                            role="menu"
                            aria-label="User account menu"
                            hidden
                            class="off-dark absolute right-0 top-full mt-1 w-48 bg-white border border-slate-200 rounded-xl shadow-lg z-50 py-1 overflow-hidden">
                            <li role="none">
                                <a href="{{ route('profile') }}"
                                   role="menuitem"
                                   class="flex items-center gap-2 min-h-[44px] px-4 text-sm font-medium text-slate-900 hover:bg-slate-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         aria-hidden="true" focusable="false">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    Profile
                                </a>
                            </li>
                            <li role="none">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            role="menuitem"
                                            class="w-full text-left flex items-center gap-2 min-h-[44px] px-4 text-sm font-medium text-slate-900 hover:bg-slate-100 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             aria-hidden="true" focusable="false">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                            <polyline points="16 17 21 12 16 7"/>
                                            <line x1="21" y1="12" x2="9" y2="12"/>
                                        </svg>
                                        Log out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    {{-- ── Guest: Register / Log in links ─────────────────── --}}
                    <li class="flex items-center" aria-label="Account access">
                        <a href="{{ route('register') }}"
                           class="flex items-center min-h-[44px] px-3 rounded text-sm font-medium text-slate-200 hover:text-white hover:bg-slate-800 transition-colors"
                           @if(request()->routeIs('register')) aria-current="page" @endif>
                            Register
                        </a>
                        <span class="text-slate-500 select-none" aria-hidden="true">/</span>
                        <a href="{{ route('login') }}"
                           class="flex items-center min-h-[44px] px-3 rounded text-sm font-medium text-slate-200 hover:text-white hover:bg-slate-800 transition-colors"
                           @if(request()->routeIs('login')) aria-current="page" @endif>
                            Log in
                        </a>
                    </li>
                    @endauth
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

    <script>
    // ── User account dropdown (WCAG 2.2 AAA keyboard navigation) ────────────
    (function () {
        const btn     = document.getElementById('user-menu-btn');
        const menu    = document.getElementById('user-menu');
        const chevron = document.getElementById('user-menu-chevron');
        if (!btn || !menu) return;

        function menuItems() {
            return [...menu.querySelectorAll('[role="menuitem"]')];
        }

        function openMenu() {
            btn.setAttribute('aria-expanded', 'true');
            menu.removeAttribute('hidden');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
            menuItems()[0]?.focus();
        }

        function closeMenu(returnFocus = true) {
            btn.setAttribute('aria-expanded', 'false');
            menu.setAttribute('hidden', '');
            if (chevron) chevron.style.transform = '';
            if (returnFocus) btn.focus();
        }

        function isOpen() {
            return btn.getAttribute('aria-expanded') === 'true';
        }

        // Toggle on click
        btn.addEventListener('click', () => isOpen() ? closeMenu() : openMenu());

        // Open on ArrowDown from the button (WAI-ARIA menu button pattern)
        btn.addEventListener('keydown', e => {
            if (e.key === 'ArrowDown') { e.preventDefault(); openMenu(); }
            if (e.key === 'Escape')    { e.preventDefault(); closeMenu(); }
        });

        // Keyboard navigation inside the menu
        menu.addEventListener('keydown', e => {
            const items = menuItems();
            const idx   = items.indexOf(document.activeElement);

            switch (e.key) {
                case 'Escape':
                    e.preventDefault();
                    closeMenu();
                    break;
                case 'ArrowDown':
                    e.preventDefault();
                    items[(idx + 1) % items.length]?.focus();
                    break;
                case 'ArrowUp':
                    e.preventDefault();
                    items[(idx - 1 + items.length) % items.length]?.focus();
                    break;
                case 'Home':
                    e.preventDefault();
                    items[0]?.focus();
                    break;
                case 'End':
                    e.preventDefault();
                    items[items.length - 1]?.focus();
                    break;
                case 'Tab':
                    // Tab closes the menu and lets natural focus move forward
                    closeMenu(false);
                    break;
            }
        });

        // Close when focus moves outside both the button and the menu
        document.addEventListener('focusin', e => {
            if (isOpen() && !btn.contains(e.target) && !menu.contains(e.target)) {
                closeMenu(false);
            }
        });

        // Close on outside click
        document.addEventListener('click', e => {
            if (isOpen() && !btn.contains(e.target) && !menu.contains(e.target)) {
                closeMenu(false);
            }
        });
    }());
    </script>
</body>
</html>
