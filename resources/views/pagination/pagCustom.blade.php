@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">  
        <ul class="flex items-center justify-center gap-1">
            
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="inline-flex">
                    <span aria-disabled="true" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded-md">
                        &lsaquo;
                    </span>
                </li>
            @else
                <li class="inline-flex">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="inline-flex">
                        <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="inline-flex">
                                <span aria-current="page" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-900 border border-blue-900 rounded-md">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="inline-flex">
                                <a href="{{ $url }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="inline-flex">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2 transition">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li class="inline-flex">
                    <span aria-disabled="true" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded-md">
                        &rsaquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif