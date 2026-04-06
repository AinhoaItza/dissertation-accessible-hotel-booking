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
            <label for="destination-{{ $s }}" class="text-sm font-medium text-slate-300">
                Where are you going?
            </label>
            <div class="relative">
                <input type="text" role="combobox" id="destination-{{ $s }}" name="destination"
                    value="{{ $destination }}" autocomplete="off" placeholder="City or country…"
                    aria-autocomplete="list" aria-expanded="false" aria-controls="dest-listbox-{{ $s }}"
                    aria-haspopup="listbox" data-destination-input
                    class="h-11 w-44 px-3 rounded bg-white text-slate-900 placeholder-slate-500 text-sm
          border-2 border-slate-600 hover:border-slate-400">
                <ul id="dest-listbox-{{ $s }}" role="listbox" aria-label="Destination suggestions"
                    class="absolute top-full left-0 w-56 bg-white border border-slate-200 rounded-lg
                   shadow-xl z-50 hidden overflow-hidden">
                </ul>
            </div>
        </div>

        <div class="flex flex-col gap-1">
            <label for="check_in-{{ $s }}" class="text-sm font-medium text-slate-300">
                Check-in <span aria-hidden="true">*</span>
            </label>
            <input type="date" id="check_in-{{ $s }}" name="check_in" value="{{ $checkIn }}"
                min="{{ now()->format('Y-m-d') }}" required aria-required="true"
                class="h-11 w-40 px-3 rounded bg-white text-slate-900 text-sm
              border-2 border-slate-600 hover:border-slate-400">
        </div>

        <div class="flex flex-col gap-1">
            <label for="check_out-{{ $s }}" class="text-sm font-medium text-slate-300">
                Check-out <span aria-hidden="true">*</span>
            </label>
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
                    <label for="destination-{{ $s }}" class="text-sm font-semibold text-slate-800">
                        Where are you going?
                    </label>
                    <div class="relative">
                        <input type="text" role="combobox" id="destination-{{ $s }}" name="destination"
                            value="{{ $destination }}" autocomplete="off" placeholder="London, UK"
                            aria-autocomplete="list" aria-expanded="false"
                            aria-controls="dest-listbox-{{ $s }}" aria-haspopup="listbox"
                            data-destination-input
                            class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                                  w-full hover:border-slate-500 transition-colors">
                        <ul id="dest-listbox-{{ $s }}" role="listbox" aria-label="Destination suggestions"
                            class="absolute top-full left-0 w-full min-w-[260px] bg-white border border-slate-200
                               rounded-lg shadow-xl z-50 hidden overflow-hidden">
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="check_in-{{ $s }}" class="text-sm font-semibold text-slate-800">
                        Check-in <span aria-hidden="true">*</span>
                    </label>
                    <input type="date" id="check_in-{{ $s }}" name="check_in"
                        value="{{ $checkIn }}" min="{{ now()->format('Y-m-d') }}" required aria-required="true"
                        class="h-11 px-3 border-2 border-slate-300 rounded text-slate-900 text-sm
                              w-full hover:border-slate-500 transition-colors">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="check_out-{{ $s }}" class="text-sm font-semibold text-slate-800">
                        Check-out <span aria-hidden="true">*</span>
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
        const TRENDING = ['London', 'New York', 'Tokyo'];
        const RECENT_KEY = 'staynest_recent_searches';

        const IconClock =
            '<svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z"/></svg>';
        const IconTrend =
            '<svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/></svg>';
        const IconDest =
            '<svg aria-hidden="true" focusable="false" class="size-4 shrink-0 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>';

        class DestinationAutocomplete {
            constructor(input) {
                this.input = input;
                this.listbox = document.getElementById(input.getAttribute('aria-controls'));
                this.activeIndex = -1;
                this.options = [];
                this.cachedDestinations = null;

                this.attachEvents();
            }

            attachEvents() {
                this.input.addEventListener('focus', () => this.showSuggestions());
                this.input.addEventListener('click', () => this.showSuggestions());
                this.input.addEventListener('input', () => this.showSuggestions());
                this.input.addEventListener('blur', () => setTimeout(() => this.close(), 150));
                this.input.addEventListener('keydown', (e) => this.handleKeyboard(e));

                const form = this.input.closest('form');
                if (form) {
                    form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
            }

            handleKeyboard(e) {
                if (this.listbox.classList.contains('hidden') || !this.options.length) return;

                switch (e.key) {
                    case 'ArrowDown':
                        e.preventDefault();
                        this.activeIndex = Math.min(this.activeIndex + 1, this.options.length - 1);
                        this.highlight();
                        break;
                    case 'ArrowUp':
                        e.preventDefault();
                        this.activeIndex = Math.max(this.activeIndex - 1, 0);
                        this.highlight();
                        break;
                    case 'Enter':
                        if (this.activeIndex >= 0) {
                            e.preventDefault();
                            this.select(this.options[this.activeIndex].textContent);
                        }
                        break;
                    case 'Escape':
                    case 'Tab':
                        this.close();
                        break;
                }
            }

            async showSuggestions() {
                const term = this.input.value.trim();

                if (term) {
                    const destinations = await this.fetchDestinations();
                    const filtered = destinations.filter(d => d.toLowerCase().includes(term.toLowerCase()));
                    this.render(filtered, 'dest');
                } else {
                    this.renderTrending();
                }
            }

            async fetchDestinations() {
                if (this.cachedDestinations) return this.cachedDestinations;

                try {
                    const response = await fetch('/api/destinations');
                    this.cachedDestinations = await response.json();
                    return this.cachedDestinations;
                } catch {
                    return [];
                }
            }

            renderTrending() {
                this.listbox.innerHTML = '';
                this.options = [];
                this.activeIndex = -1;

                const recent = this.getRecent();
                const trending = TRENDING.filter(t => !recent.some(r => r.toLowerCase() === t.toLowerCase())).slice(0,
                    3);

                if (recent.length) {
                    this.listbox.appendChild(this.createHeader('Recent Searches'));
                    recent.forEach((text, idx) => {
                        const li = this.createOption(text, IconClock, idx);
                        this.listbox.appendChild(li);
                        this.options.push(li);
                    });
                }

                if (trending.length) {
                    if (recent.length) this.listbox.appendChild(this.createDivider());
                    this.listbox.appendChild(this.createHeader('Trending Destinations'));
                    trending.forEach((text, idx) => {
                        const li = this.createOption(text, IconTrend, recent.length + idx);
                        this.listbox.appendChild(li);
                        this.options.push(li);
                    });
                }

                if (this.options.length) this.open();
                else this.close();
            }

            render(list, type) {
                this.listbox.innerHTML = '';
                this.options = [];
                this.activeIndex = -1;

                if (!list.length) {
                    this.close();
                    return;
                }

                list.forEach((text, idx) => {
                    const li = this.createOption(text, type === 'dest' ? IconDest : IconTrend, idx);
                    this.listbox.appendChild(li);
                    this.options.push(li);
                });

                this.open();
            }

            createHeader(text) {
                const li = document.createElement('li');
                li.setAttribute('role', 'presentation');
                li.className =
                    'px-4 pt-3 pb-1 text-xs font-semibold text-slate-500 uppercase tracking-wider select-none';
                li.textContent = text;
                return li;
            }

            createDivider() {
                const li = document.createElement('li');
                li.setAttribute('role', 'presentation');
                li.className = 'border-t border-slate-100 my-1';
                return li;
            }

            createOption(text, icon, idx) {
                const li = document.createElement('li');
                li.setAttribute('role', 'option');
                li.setAttribute('aria-selected', 'false');
                li.id = `${this.input.id}-opt-${idx}`;
                li.className =
                    'flex items-center gap-3 px-4 min-h-[44px] text-sm text-slate-900 cursor-pointer hover:bg-slate-50 transition-colors';
                li.innerHTML = `${icon}<span>${text}</span>`;
                li.addEventListener('mousedown', (e) => {
                    e.preventDefault();
                    this.select(text);
                });
                return li;
            }

            highlight() {
                this.options.forEach((el, i) => {
                    const isActive = i === this.activeIndex;
                    el.setAttribute('aria-selected', isActive ? 'true' : 'false');
                    el.classList.toggle('bg-blue-900', isActive);
                    el.classList.toggle('text-white', isActive);
                    el.classList.toggle('text-slate-900', !isActive);

                    if (isActive) {
                        this.input.setAttribute('aria-activedescendant', el.id);
                        el.scrollIntoView({
                            block: 'nearest'
                        });
                    }
                });
            }

            select(value) {
                this.input.value = value;
                this.saveRecent(value);
                this.close();
                this.input.focus();
            }

            open() {
                this.listbox.classList.remove('hidden');
                this.input.setAttribute('aria-expanded', 'true');
            }

            close() {
                this.listbox.classList.add('hidden');
                this.input.setAttribute('aria-expanded', 'false');
                this.input.removeAttribute('aria-activedescendant');
                this.activeIndex = -1;
                this.options = [];
            }

            handleSubmit(e) {
                if (!this.input.value.trim()) {
                    e.preventDefault();
                    this.input.setCustomValidity('Please enter a destination to start searching.');
                    this.input.reportValidity();
                } else {
                    this.input.setCustomValidity('');
                    this.saveRecent(this.input.value.trim());
                }
            }

            getRecent() {
                try {
                    return JSON.parse(localStorage.getItem(RECENT_KEY) || '[]').slice(0, 3);
                } catch {
                    return [];
                }
            }

            saveRecent(value) {
                value = value.trim();
                if (!value) return;

                const list = this.getRecent().filter(r => r.toLowerCase() !== value.toLowerCase());
                list.unshift(value);

                try {
                    localStorage.setItem(RECENT_KEY, JSON.stringify(list.slice(0, 3)));
                } catch {}
            }
        }

        class DateRangeSync {
            constructor(form) {
                this.checkIn = form.querySelector('input[name="check_in"]');
                this.checkOut = form.querySelector('input[name="check_out"]');

                if (this.checkIn && this.checkOut) {
                    this.checkIn.addEventListener('change', () => this.syncDates());
                    this.syncDates();
                }
            }

            syncDates() {
                if (!this.checkIn.value) return;

                const date = new Date(this.checkIn.value);
                date.setDate(date.getDate() + 1);
                const minDate = date.toISOString().split('T')[0];

                this.checkOut.min = minDate;
                if (!this.checkOut.value || this.checkOut.value <= this.checkIn.value) {
                    this.checkOut.value = minDate;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-destination-input]').forEach(input => {
                new DestinationAutocomplete(input);
            });

            document.querySelectorAll('form').forEach(form => {
                new DateRangeSync(form);
            });
        });
    </script>
@endonce