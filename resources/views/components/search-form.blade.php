@props([
    'compact' => false,
    'destination' => '',
    'checkIn' => '',
    'checkOut' => '',
    'guests' => 2,
])

@php
    $checkIn = $checkIn ?: now()->addDay()->format('Y-m-d');
    $checkOut = $checkOut ?: now()->addDays(3)->format('Y-m-d');
    $s = $compact ? 'c' : 'h';
@endphp

@if ($compact)
    <form action="{{ route('hotels.index') }}" method="GET" novalidate aria-label="Refine hotel search"
        class="flex flex-wrap items-end gap-3">

        <div class="flex flex-col gap-1">
            <label for="destination-{{ $s }}" class="text-sm font-medium text-slate-300">Destination</label>
            <div class="relative">
                <input type="text" id="destination-{{ $s }}" name="destination" value="{{ $destination }}"
                    autocomplete="off" placeholder="City or country…" role="combobox" aria-autocomplete="list"
                    aria-expanded="false" aria-controls="dest-listbox-{{ $s }}" aria-haspopup="listbox"
                    data-destination-input aria-describedby="dest-error-{{ $s }}"
                    class="h-11 w-44 px-3 rounded bg-white text-slate-900 placeholder-slate-500 text-sm
              border-2 border-slate-600 hover:border-slate-400">
                <ul id="dest-listbox-{{ $s }}" role="listbox" aria-label="Destination suggestions"
                    class="absolute top-full left-0 w-56 bg-white border border-slate-200 rounded-lg
                       shadow-xl z-50 hidden overflow-hidden">
                </ul>
            </div>
            <p id="dest-error-{{ $s }}" role="alert"
                class="hidden text-xs font-medium text-amber-200 mt-1">
                Please enter a destination to start searching.
            </p>
        </div>

        <div class="flex flex-col gap-1">
            <label for="check_in-{{ $s }}" class="text-sm font-medium text-slate-300">Check-in</label>
            <input type="date" id="check_in-{{ $s }}" name="check_in" value="{{ $checkIn }}"
                min="{{ now()->format('Y-m-d') }}" required aria-required="true"
                class="h-11 w-40 px-3 rounded bg-white text-slate-900 text-sm
              border-2 border-slate-600 hover:border-slate-400">
        </div>

        <div class="flex flex-col gap-1">
            <label for="check_out-{{ $s }}" class="text-sm font-medium text-slate-300">Check-out</label>
            <input type="date" id="check_out-{{ $s }}" name="check_out" value="{{ $checkOut }}"
                min="{{ now()->addDay()->format('Y-m-d') }}" required aria-required="true"
                class="h-11 w-40 px-3 rounded bg-white text-slate-900 text-sm
              border-2 border-slate-600 hover:border-slate-400">
        </div>

        <div class="flex flex-col gap-1">
            <label for="guests-{{ $s }}" class="text-sm font-medium text-slate-300">Guests</label>
            <select id="guests-{{ $s }}" name="guests"
                class="h-11 w-28 px-3 rounded bg-white text-slate-900 text-sm
               border-2 border-slate-600 hover:border-slate-400">
                @foreach (range(1, 6) as $n)
                    <option value="{{ $n }}" @selected($guests == $n)>{{ $n }}
                        {{ $n === 1 ? 'Guest' : 'Guests' }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="min-h-[44px] px-10 py-2.5 bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded text-base transition-colors">
            Update Search
        </button>
    </form>
@else
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-2xl p-6 lg:p-8">
        <form action="{{ route('hotels.index') }}" method="GET" novalidate aria-label="Hotel search form">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <div class="lg:col-span-1 flex flex-col gap-1.5">
                    <label for="destination-{{ $s }}"
                        class="text-sm font-semibold text-slate-800">Destination</label>
                    <div class="relative">
                        <input type="text" id="destination-{{ $s }}" name="destination"
                            value="{{ $destination }}" autocomplete="off" placeholder="London, UK" role="combobox"
                            aria-autocomplete="list" aria-expanded="false"
                            aria-controls="dest-listbox-{{ $s }}" aria-haspopup="listbox"
                            data-destination-input aria-describedby="dest-error-{{ $s }}"
                            class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                  w-full hover:border-slate-500 transition-colors">
                        <ul id="dest-listbox-{{ $s }}" role="listbox" aria-label="Destination suggestions"
                            class="absolute top-full left-0 w-full min-w-[260px] bg-white border border-slate-200
                               rounded-lg shadow-xl z-50 hidden overflow-hidden">
                        </ul>
                    </div>
                    <p id="dest-error-{{ $s }}" role="alert"
                        class="hidden text-xs font-medium text-red-800 mt-1">
                        Please enter a destination to start searching.
                    </p>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="check_in-{{ $s }}" class="text-sm font-semibold text-slate-800">
                        Check-in <span class="text-slate-600 font-normal">(required)</span>
                    </label>
                    <input type="date" id="check_in-{{ $s }}" name="check_in"
                        value="{{ $checkIn }}" min="{{ now()->format('Y-m-d') }}" required aria-required="true"
                        class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                              w-full hover:border-slate-500 transition-colors">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="check_out-{{ $s }}" class="text-sm font-semibold text-slate-800">
                        Check-out <span class="text-slate-600 font-normal">(required)</span>
                    </label>
                    <input type="date" id="check_out-{{ $s }}" name="check_out"
                        value="{{ $checkOut }}" min="{{ now()->addDay()->format('Y-m-d') }}" required
                        aria-required="true"
                        class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                              w-full hover:border-slate-500 transition-colors">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="guests-{{ $s }}"
                        class="text-sm font-semibold text-slate-800">Guests</label>
                    <select id="guests-{{ $s }}" name="guests"
                        class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                               w-full hover:border-slate-500 transition-colors bg-white">
                        @foreach (range(1, 6) as $n)
                            <option value="{{ $n }}" @selected($guests == $n)>{{ $n }}
                                {{ $n === 1 ? 'Guest' : 'Guests' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-5 flex justify-center">
                <button type="submit"
                    class="min-h-[44px] px-10 py-2.5 bg-blue-900 hover:bg-blue-800 text-white
                           font-semibold rounded text-base transition-colors w-full sm:w-auto">
                    Search Hotels
                </button>
            </div>
        </form>
    </div>
@endif

@once
    <script>
        (function() {
            'use strict';

            var TRENDING = ['London', 'New York', 'Tokyo'];
            var RECENT_KEY = 'staynest_recent_searches';
            var allDests = [];
            var fetchedOnce = false;

            // ── localStorage helpers ────────────────────────────────────────────────
            function getRecent() {
                try {
                    return JSON.parse(localStorage.getItem(RECENT_KEY) || '[]').slice(0, 3);
                } catch (e) {
                    return [];
                }
            }

            function saveRecent(value) {
                value = value.trim();
                if (!value) return;
                var list = getRecent().filter(function(r) {
                    return r.toLowerCase() !== value.toLowerCase();
                });
                list.unshift(value);
                try {
                    localStorage.setItem(RECENT_KEY, JSON.stringify(list.slice(0, 3)));
                } catch (e) {}
            }

            // ── API fetch (cached) ──────────────────────────────────────────────────
            function fetchDests(cb) {
                if (fetchedOnce) {
                    cb(allDests);
                    return;
                }
                fetch('/api/destinations')
                    .then(function(r) {
                        return r.json();
                    })
                    .then(function(data) {
                        allDests = data;
                        fetchedOnce = true;
                        cb(allDests);
                    })
                    .catch(function() {
                        cb([]);
                    });
            }

            // ── SVG icons ───────────────────────────────────────────────────────────
            var ICON_CLOCK =
                '<svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>';
            var ICON_TREND =
                '<svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>';
            var ICON_DEST =
                '<svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>';

            // ── Per-input instance ──────────────────────────────────────────────────
            function initAutocomplete(input) {
                var listbox = document.getElementById(input.getAttribute('aria-controls'));
                if (!listbox) return;

                var activeIndex = -1;
                var flatOptions = [];
                var skipNextOpen = false;

                // ── open / close ──
                function open() {
                    listbox.classList.remove('hidden');
                    input.setAttribute('aria-expanded', 'true');
                }

                function close() {
                    listbox.classList.add('hidden');
                    input.setAttribute('aria-expanded', 'false');
                    input.removeAttribute('aria-activedescendant');
                    activeIndex = -1;
                    flatOptions = [];
                }

                function select(value) {
                    input.value = value;
                    saveRecent(value);
                    close();
                    input.focus();
                }

                function highlight() {
                    flatOptions.forEach(function(el, i) {
                        var on = (i === activeIndex);
                        el.setAttribute('aria-selected', on ? 'true' : 'false');
                        el.classList.toggle('bg-blue-900', on);
                        el.classList.toggle('text-white', on);
                        el.classList.toggle('text-slate-900', !on);
                        if (on) {
                            input.setAttribute('aria-activedescendant', el.id);
                            el.scrollIntoView({
                                block: 'nearest'
                            });
                        }
                    });
                }

                // ── DOM builders ──
                function makeHeader(label) {
                    var li = document.createElement('li');
                    li.setAttribute('role', 'presentation');
                    li.className =
                        'px-4 pt-3 pb-1 text-xs font-semibold text-slate-500 uppercase tracking-wider select-none';
                    li.textContent = label;
                    return li;
                }

                function makeDivider() {
                    var li = document.createElement('li');
                    li.setAttribute('role', 'presentation');
                    li.className = 'border-t border-slate-100 my-1';
                    return li;
                }

                function makeOption(text, icon, idx) {
                    var li = document.createElement('li');
                    li.setAttribute('role', 'option');
                    li.setAttribute('aria-selected', 'false');
                    li.id = input.id + '-opt-' + idx;
                    li.className =
                        'flex items-center gap-3 px-4 min-h-[44px] text-sm text-slate-900 cursor-pointer hover:bg-slate-50 transition-colors';
                    li.innerHTML = icon + '<span>' + text + '</span>';
                    li.addEventListener('mousedown', function(e) {
                        e.preventDefault();
                        select(text);
                    });
                    return li;
                }

                // ── Renders ──
                function renderGrouped() {
                    listbox.innerHTML = '';
                    flatOptions = [];
                    activeIndex = -1;

                    var recent = getRecent();
                    var trending = TRENDING.filter(function(t) {
                        return !recent.some(function(r) {
                            return r.toLowerCase() === t.toLowerCase();
                        });
                    }).slice(0, 3);

                    var idx = 0;

                    if (recent.length) {
                        listbox.appendChild(makeHeader('Recent Searches'));
                        recent.forEach(function(text) {
                            var li = makeOption(text, ICON_CLOCK, idx++);
                            listbox.appendChild(li);
                            flatOptions.push(li);
                        });
                    }

                    if (trending.length) {
                        if (recent.length) listbox.appendChild(makeDivider());
                        listbox.appendChild(makeHeader('Trending Destinations'));
                        trending.forEach(function(text) {
                            var li = makeOption(text, ICON_TREND, idx++);
                            listbox.appendChild(li);
                            flatOptions.push(li);
                        });
                    }

                    if (flatOptions.length) open();
                    else close();
                }

                function renderFiltered(list) {
                    listbox.innerHTML = '';
                    flatOptions = [];
                    activeIndex = -1;

                    if (!list.length) {
                        close();
                        return;
                    }

                    list.forEach(function(text, i) {
                        var li = makeOption(text, ICON_DEST, i);
                        listbox.appendChild(li);
                        flatOptions.push(li);
                    });

                    open();
                }

                // ── Show suggestions ──
                function showSuggestions() {
                    if (skipNextOpen) {
                        skipNextOpen = false;
                        return;
                    }
                    input.setCustomValidity('');
                    var term = input.value.trim();
                    if (term) {
                        fetchDests(function(all) {
                            var t = term.toLowerCase();
                            renderFiltered(all.filter(function(d) {
                                return d.toLowerCase().includes(t);
                            }));
                        });
                    } else {
                        renderGrouped();
                    }
                }

                // ── Event wiring ──
                input.addEventListener('focus', showSuggestions);
                input.addEventListener('click', showSuggestions);
                input.addEventListener('input', showSuggestions);
                input.addEventListener('blur', function() {
                    setTimeout(close, 150);
                });

                input.addEventListener('input', function() {
                    input.setCustomValidity('');
                });

                var form = input.closest('form');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        if (!input.value.trim()) {
                            e.preventDefault();
                            skipNextOpen = true;
                            input.setCustomValidity('Please enter a destination to start searching.');
                            input.reportValidity();
                            return;
                        }
                        input.setCustomValidity('');
                        saveRecent(input.value.trim());
                    });
                }

                input.addEventListener('keydown', function(e) {
                    if (listbox.classList.contains('hidden')) return;
                    if (!flatOptions.length) return;

                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        activeIndex = Math.min(activeIndex + 1, flatOptions.length - 1);
                        highlight();
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        activeIndex = Math.max(activeIndex - 1, 0);
                        highlight();
                    } else if (e.key === 'Enter' && activeIndex >= 0) {
                        e.preventDefault();
                        select(flatOptions[activeIndex].querySelector('span').textContent);
                    } else if (e.key === 'Escape' || e.key === 'Tab') {
                        close();
                    }
                });
            }

            // ── Date range linking (check-in → check-out min) ──────────────────────
            function initDateRange(form) {
                var checkIn = form.querySelector('input[name="check_in"]');
                var checkOut = form.querySelector('input[name="check_out"]');
                if (!checkIn || !checkOut) return;

                function syncDates() {
                    if (!checkIn.value) return;
                    var d = new Date(checkIn.value);
                    d.setDate(d.getDate() + 1);
                    var minStr = d.toISOString().split('T')[0];
                    checkOut.min = minStr;
                    if (!checkOut.value || checkOut.value <= checkIn.value) {
                        checkOut.value = minStr;
                    }
                }

                checkIn.addEventListener('change', syncDates);
                syncDates();
            }

            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('[data-destination-input]').forEach(initAutocomplete);
                document.querySelectorAll('form').forEach(initDateRange);
            });
        }());
    </script>
@endonce
