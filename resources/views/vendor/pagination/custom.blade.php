@if ($paginator->hasPages())
    <div class="flex items-center gap-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button
                class="flex items-center justify-center px-3 py-1.5 rounded-lg border border-[#e5e7eb] dark:border-[#374151] text-sm text-[#637588] disabled:opacity-50 cursor-not-allowed"
                disabled>
                <span x-text="$store.locale.translations[$store.locale.current].student.index.previous">Previous</span>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center justify-center px-3 py-1.5 rounded-lg border border-[#e5e7eb] dark:border-[#374151] text-sm text-[#637588] hover:bg-gray-50 dark:hover:bg-[#252f3a] transition-colors">
                <span x-text="$store.locale.translations[$store.locale.current].student.index.previous">Previous</span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex items-center gap-1">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="text-[#637588] px-1">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button
                                class="size-8 flex items-center justify-center rounded-lg bg-primary text-white text-sm font-bold">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}"
                                class="size-8 flex items-center justify-center rounded-lg text-[#637588] hover:bg-gray-100 dark:hover:bg-[#252f3a] text-sm">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="flex items-center justify-center px-3 py-1.5 rounded-lg border border-[#e5e7eb] dark:border-[#374151] text-sm text-[#637588] hover:bg-gray-50 dark:hover:bg-[#252f3a] transition-colors">
                <span x-text="$store.locale.translations[$store.locale.current].student.index.next">Next</span>
            </a>
        @else
            <button
                class="flex items-center justify-center px-3 py-1.5 rounded-lg border border-[#e5e7eb] dark:border-[#374151] text-sm text-[#637588] disabled:opacity-50 cursor-not-allowed"
                disabled>
                <span x-text="$store.locale.translations[$store.locale.current].student.index.next">Next</span>
            </button>
        @endif
    </div>
@endif
