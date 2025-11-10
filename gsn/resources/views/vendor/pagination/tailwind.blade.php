@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-4">
        <ul class="inline-flex items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="px-3 py-1 text-black opacity-50 cursor-default">&lt;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-1 text-black font-bold hover:underline">
                        &lt;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="px-3 py-1 text-black font-bold">{{ $page }}</span>
                            </li>
                        @elseif ($page <= 3 || $page >= $paginator->lastPage() - 2 || abs($page - $paginator->currentPage()) <= 1)
                            <li>
                                <a href="{{ $url }}" class="px-3 py-1 text-black hover:underline">{{ $page }}</a>
                            </li>
                        @elseif ($page == 4 || $page == $paginator->lastPage() - 3)
                            <li aria-disabled="true">
                                <span class="px-3 py-1 text-black">...</span>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1 text-black font-bold hover:underline">
                        &gt;
                    </a>
                </li>
            @else
                <li aria-disabled="true">
                    <span class="px-3 py-1 text-black opacity-50 cursor-default">&gt;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
