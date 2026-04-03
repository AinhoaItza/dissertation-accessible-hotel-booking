@props(['rating' => 0, 'size' => 'md'])

@php
$iconSize = match($size) {
    'sm'    => 'size-3.5',
    'lg'    => 'size-5',
    default => 'size-4',
};
@endphp

<span class="flex items-center gap-0.5" role="img" aria-label="{{ $rating }} out of 5 stars">
    @for ($i = 1; $i <= 5; $i++)
        <svg aria-hidden="true" focusable="false"
             class="{{ $iconSize }} {{ $i <= $rating ? 'text-amber-500' : 'text-slate-300' }}"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
        </svg>
    @endfor
</span>
