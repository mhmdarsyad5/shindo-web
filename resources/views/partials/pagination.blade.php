@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="text-xs font-sans text-slate-500">
            Menampilkan <span class="font-bold text-slate-800">{{ $paginator->firstItem() }}</span>
            – <span class="font-bold text-slate-800">{{ $paginator->lastItem() }}</span>
            dari <span class="font-bold text-slate-800">{{ $paginator->total() }}</span> {{ $itemLabel ?? 'artikel' }}
        </div>

        <div class="inline-flex items-center gap-1.5">
            {{-- Previous Page Link (hidden on page 1) --}}
            @if (! $paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   aria-label="Halaman Sebelumnya"
                   class="inline-flex items-center justify-center w-9 h-9 bg-white border border-slate-200 hover:border-[#0067b1] hover:text-[#0067b1] text-slate-700 transition-colors shadow-xs">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="inline-flex items-center justify-center w-9 h-9 text-xs font-sans text-slate-400">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page"
                                  class="inline-flex items-center justify-center w-9 h-9 bg-[#0067b1] border border-[#0067b1] text-white text-xs font-sans font-bold shadow-xs">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="inline-flex items-center justify-center w-9 h-9 bg-white border border-slate-200 hover:border-[#0067b1] hover:text-[#0067b1] text-slate-700 text-xs font-sans font-semibold transition-colors shadow-xs">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link (hidden on last page) --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   aria-label="Halaman Berikutnya"
                   class="inline-flex items-center justify-center w-9 h-9 bg-white border border-slate-200 hover:border-[#0067b1] hover:text-[#0067b1] text-slate-700 transition-colors shadow-xs">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endif
        </div>
    </nav>
@endif
