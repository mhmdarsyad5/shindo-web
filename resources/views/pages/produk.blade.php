@extends('layouts.public')

@section('title', 'Katalog Truk SHACMAN | PT SHINDO Authorized Dealer')
@section('meta_description', 'Katalog lengkap heavy-duty dump truck dan tractor head SHACMAN X3000, F3000, dan H3000. Konfigurasi 6x4 dan 8x4 untuk tambang dan logistik.')

@push('styles')
    <style>
        /* ================= SCROLL ENTRANCE ANIMATIONS ================= */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-100 { transition-delay: 100ms; }
        .reveal-delay-150 { transition-delay: 150ms; }
        .reveal-delay-200 { transition-delay: 200ms; }
        .reveal-delay-300 { transition-delay: 300ms; }

        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
@endpush

@section('content')
    <!-- ================= BREADCRUMBS (SERIES PRODUK STYLE) ================= -->
    <div class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">Produk & Spesifikasi</span>
            </div>
        </div>
    </div>

    <!-- ================= 1. PAGE HEADER (TERANG & BERSIH) ================= -->
    <section class="w-full bg-white py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 reveal-on-scroll">
                <div class="max-w-3xl">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        KATALOG ARMADA TRUK SHACMAN
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        Pilihan dump truck dan tractor head bertenaga tinggi untuk sektor pertambangan nikel, batu bara, quarry, serta logistik angkutan berat di seluruh Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. CATALOG WITH SIDEBAR ================= -->
    <section class="w-full bg-[#f8fafc] py-8 sm:py-12 border-b border-slate-200">
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">

            <!-- Mobile Filter Toggle Button -->
            <div class="lg:hidden mb-4">
                <button id="mobile-filter-toggle" type="button"
                    class="w-full flex items-center justify-between px-4 py-3 bg-white border border-slate-300 shadow-xs text-xs font-bold uppercase font-sans text-slate-900">
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-[#0067b1]" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        <span>Filter Armada Truk</span>
                    </span>
                    <span id="mobile-filter-badge" class="bg-[#0067b1] text-white px-2 py-0.5 text-[11px] font-sans">Semua Unit</span>
                </button>
            </div>

            <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-8">

                <!-- ================= LEFT FILTER SIDEBAR ================= -->
                <aside id="filter-sidebar" class="hidden lg:block w-full lg:w-64 xl:w-72 flex-shrink-0 space-y-4">

                    <div class="bg-white border border-slate-300 p-5 xl:p-6 shadow-xs">
                        <div class="flex items-center justify-between pb-3.5 border-b border-slate-200">
                            <h2 class="text-base xl:text-lg font-bold font-barlow-condensed uppercase not-italic text-[#00163c] tracking-wider">
                                FILTER
                            </h2>
                            <button id="reset-filters-btn" type="button"
                                class="text-xs sm:text-sm font-sans text-[#0067b1] hover:underline uppercase font-bold">
                                [Reset]
                            </button>
                        </div>

                        <!-- Model Seri Truk (F3000, X3000, H3000) -->
                        <div class="pt-4">
                            <label class="block text-xs sm:text-sm font-bold uppercase font-sans text-slate-800 mb-3 tracking-wide">
                                Truck Series
                            </label>
                            <div class="space-y-3">
                                <label class="flex items-center space-x-3 cursor-pointer select-none">
                                    <input type="radio" name="filter-series" value="all" checked
                                        class="filter-series-radio w-4 h-4 sm:w-5 sm:h-5 text-[#0067b1] focus:ring-[#0067b1] cursor-pointer">
                                    <span class="font-bold text-slate-900 text-sm sm:text-base">All Series</span>
                                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2 py-0.5 border border-slate-200 ml-auto font-sans">({{ $products->count() }})</span>
                                </label>
                                @foreach($truckSeries as $series)
                                    @php
                                        $count = $products->where('truck_series_id', $series->id)->count();
                                    @endphp
                                    <label class="flex items-center space-x-3 cursor-pointer select-none">
                                        <input type="radio" name="filter-series" value="{{ strtolower($series->name) }}"
                                            class="filter-series-radio w-4 h-4 sm:w-5 sm:h-5 text-[#0067b1] focus:ring-[#0067b1] cursor-pointer">
                                        <span class="text-sm sm:text-base font-medium text-slate-800">{{ $series->name }} Series</span>
                                        <span class="text-xs font-bold text-slate-500 bg-slate-100 px-2 py-0.5 border border-slate-200 ml-auto font-sans">({{ $count }})</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- ================= RIGHT PRODUCTS LIST ================= -->
                <div class="flex-1 w-full">

                    <!-- Top Header Bar -->
                    <div class="bg-[#0067b1] text-white px-5 py-3.5 mb-6 flex items-center justify-between shadow-xs">
                        <h2 class="text-sm sm:text-base font-bold font-barlow-condensed uppercase not-italic tracking-wider flex items-center space-x-2">
                            <span>TRUCK SHOW</span>
                        </h2>
                    </div>

                    <!-- Products Grid -->
                    <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-7">
                        @forelse($products as $product)
                            @php
                                $seriesKey = strtolower($product->truckSeries?->name ?? 'other');
                                $driveKey = strtolower($product->drive ?? '');
                                $cleanDrive = $product->drive ? explode(' ', $product->drive)[0] : '6X4';
                                $seriesName = $product->truckSeries?->name ?? 'SHACMAN';
                                $quoteText = 'Halo PT SHINDO, saya tertarik meminta penawaran harga resmi (Quotation) untuk unit: ' . $product->name . ' (' . ($product->drive ?? '6x4') . ').';
                                $waPhone = preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890');
                                if (str_starts_with($waPhone, '0')) {
                                    $waPhone = '62' . substr($waPhone, 1);
                                }
                            @endphp
                            <div class="product-item relative bg-white border border-slate-200 hover:border-[#0067b1] shadow-xs hover:shadow-xl transition-all duration-300 p-5 sm:p-6 flex flex-col justify-between group overflow-hidden"
                                data-series="{{ $seriesKey }}" data-drive="{{ $driveKey }}">

                                <div>
                                    <!-- Visual Stage -->
                                    <div class="w-full aspect-[4/3] flex items-center justify-center p-3 sm:p-4 mb-4 bg-slate-50/70 border border-slate-100 overflow-hidden">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="w-full h-full object-contain group-hover:scale-108 transition-transform duration-300 drop-shadow-md select-none pointer-events-none">
                                    </div>

                                    <!-- Model Info -->
                                    <div class="text-left min-w-0">
                                        <h3 class="text-lg sm:text-xl font-bold font-barlow-condensed uppercase not-italic text-slate-900 group-hover:text-[#0067b1] transition-colors leading-tight line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-xs sm:text-sm font-medium text-slate-500 font-sans mt-2">
                                            Model {{ $cleanDrive }} @if(!empty($product->engine)) • {{ $product->engine }} @endif
                                        </p>
                                    </div>
                                </div>

                                <!-- Bottom Action Bar -->
                                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                                    <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode($quoteText) }}" target="_blank"
                                        rel="noopener noreferrer" title="Hubungi Kami via WhatsApp"
                                        class="flex items-center justify-center py-2.5 sm:py-3 px-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed not-italic tracking-wider transition-colors text-center shadow-xs">
                                        Hubungi Kami
                                    </a>

                                    <a href="{{ url('/kontak?unit=' . urlencode($product->name)) }}"
                                        class="flex items-center justify-center py-2.5 sm:py-3 px-3 bg-white hover:bg-slate-50 text-[#0067b1] hover:text-[#004880] border border-slate-300 hover:border-[#0067b1] font-bold text-xs sm:text-sm uppercase font-barlow-condensed not-italic tracking-wider transition-colors text-center shadow-xs">
                                        Detail Unit
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full bg-white border border-slate-300 p-12 text-center text-slate-500 font-sans text-xs">
                                Unit truk belum tersedia.
                            </div>
                        @endforelse
                    </div>

                    <!-- No Results Notification -->
                    <div id="no-filter-results" class="hidden bg-white border border-slate-300 p-10 text-center space-y-3 mt-6">
                        <div class="w-12 h-12 mx-auto bg-blue-50 text-[#0067b1] border border-blue-200 flex items-center justify-center font-bold text-lg">
                            !
                        </div>
                        <h4 class="text-xl font-bold font-barlow-condensed uppercase not-italic text-slate-900">
                            Tidak Ada Unit Sesuai Filter
                        </h4>
                        <p class="text-xs text-slate-600 max-w-md mx-auto">
                            Tidak ada unit yang sesuai kombinasi filter saat ini. Silakan reset filter untuk melihat katalog lengkap.
                        </p>
                        <button id="empty-reset-btn" type="button"
                            class="px-5 py-2.5 bg-[#0067b1] text-white font-bold text-xs uppercase font-barlow-condensed not-italic tracking-wider">
                            Reset Semua Filter
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ================= CTA BANNER SECTION ================= -->
    <section class="relative w-full overflow-hidden text-white py-14 sm:py-20 lg:py-24 border-t border-slate-200">
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk Shacman Operasional"
            class="absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none">
        <div class="absolute inset-0 bg-[#00163c]/75 sm:bg-[#00163c]/65 backdrop-brightness-95"></div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center flex flex-col items-center reveal-on-scroll">
            <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold uppercase font-barlow-condensed not-italic text-white leading-tight drop-shadow-md">
                BAGAIMANA KAMI DAPAT MEMBANTU ANDA?
            </h3>
            <p class="mt-3 text-xs sm:text-base text-slate-100 max-w-2xl mx-auto leading-relaxed drop-shadow">
                Hubungi perwakilan resmi dealer PT SHINDO untuk konsultasi spesifikasi teknis, pembiayaan, dan penawaran harga terbaik armada SHACMAN.
            </p>
            <div class="mt-6 sm:mt-8">
                <a href="{{ url('/kontak') }}"
                    class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 bg-[#0067b1] hover:bg-[#005a9c] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed not-italic tracking-wider transition-all duration-200 shadow-lg">
                    Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Scroll Entrance Animation
            const revealElements = document.querySelectorAll('.reveal-on-scroll');
            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-revealed');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
                revealElements.forEach(el => revealObserver.observe(el));
            } else {
                revealElements.forEach(el => el.classList.add('is-revealed'));
            }

            // Mobile Filter Drawer Toggle
            const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
            const filterSidebar = document.getElementById('filter-sidebar');
            if (mobileFilterToggle && filterSidebar) {
                mobileFilterToggle.addEventListener('click', function () {
                    filterSidebar.classList.toggle('hidden');
                });
            }

            // Client-Side Filter Logic (Fokus Truck Series)
            const seriesRadios = document.querySelectorAll('.filter-series-radio');
            const resetBtn = document.getElementById('reset-filters-btn');
            const emptyResetBtn = document.getElementById('empty-reset-btn');
            const productItems = document.querySelectorAll('.product-item');
            const noResults = document.getElementById('no-filter-results');
            const mobileBadge = document.getElementById('mobile-filter-badge');

            function applyFilters() {
                const selectedSeriesRadio = document.querySelector('.filter-series-radio:checked');
                const selectedSeries = selectedSeriesRadio ? selectedSeriesRadio.value.toLowerCase() : 'all';

                let visibleCount = 0;

                productItems.forEach(item => {
                    const itemSeries = (item.getAttribute('data-series') || '').toLowerCase();
                    const matchSeries = (selectedSeries === 'all') || itemSeries.includes(selectedSeries);

                    if (matchSeries) {
                        item.style.display = '';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (noResults) {
                    if (visibleCount === 0 && productItems.length > 0) {
                        noResults.classList.remove('hidden');
                    } else {
                        noResults.classList.add('hidden');
                    }
                }

                if (mobileBadge) {
                    if (selectedSeries === 'all') {
                        mobileBadge.textContent = 'Semua Unit';
                    } else {
                        mobileBadge.textContent = `${visibleCount} Unit`;
                    }
                }
            }

            seriesRadios.forEach(rb => rb.addEventListener('change', applyFilters));

            function resetFilters() {
                const allRadio = document.querySelector('.filter-series-radio[value="all"]');
                if (allRadio) allRadio.checked = true;
                applyFilters();
            }

            if (resetBtn) resetBtn.addEventListener('click', resetFilters);
            if (emptyResetBtn) emptyResetBtn.addEventListener('click', resetFilters);
        });
    </script>
@endpush
