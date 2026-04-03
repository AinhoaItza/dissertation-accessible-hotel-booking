@props(['review'])

@php
$words    = explode(' ', trim($review->author));
$initials = strtoupper(implode('', array_map(fn ($w) => mb_substr($w, 0, 1), array_slice($words, 0, 2))));
@endphp

<article class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm my-4">
    <div class="flex items-start gap-4">

        <div aria-hidden="true"
             class="shrink-0 size-11 rounded-full bg-blue-900 text-white
                    flex items-center justify-center font-bold text-sm select-none">
            {{ $initials }}
        </div>

        <div class="flex-1 min-w-0">

            <div class="flex items-center justify-between gap-3 flex-wrap mb-1">
                <p class="font-semibold text-slate-900 text-sm leading-tight">{{ $review->author }}</p>
                <time datetime="{{ $review->created_at->format('Y-m') }}"
                      class="text-xs text-slate-500 shrink-0">
                    {{ $review->created_at->format('F Y') }}
                </time>
            </div>

            @if($review->rating >= 8)
                <span class="bg-green-800 text-white text-xs font-bold px-2 py-0.5 rounded inline-block mb-2"
                      aria-label="Rating {{ $review->rating }} out of 10">
                    {{ $review->rating }}/10
                </span>
            @elseif($review->rating >= 6)
                <span class="bg-blue-900 text-white text-xs font-bold px-2 py-0.5 rounded inline-block mb-2"
                      aria-label="Rating {{ $review->rating }} out of 10">
                    {{ $review->rating }}/10
                </span>
            @else
                <span class="bg-red-800 text-white text-xs font-bold px-2 py-0.5 rounded inline-block mb-2"
                      aria-label="Rating {{ $review->rating }} out of 10">
                    {{ $review->rating }}/10
                </span>
            @endif

            <p class="text-slate-700 text-sm leading-relaxed">{{ $review->comment }}</p>
        </div>
    </div>
</article>
