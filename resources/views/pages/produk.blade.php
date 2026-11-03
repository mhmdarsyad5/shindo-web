@extends('layouts.public')

@section('title', 'Katalog Truk SHACMAN | PT SHINDO Authorized Dealer')
@section('meta_description', 'Katalog lengkap heavy-duty dump truck dan tractor head SHACMAN X3000, F3000, dan H3000. Konfigurasi 6x4 dan 8x4 untuk tambang dan logistik.')

@section('content')
    <!-- ================= HERO HEADER ================= -->
    <section class="relative bg-[#070e1e] text-white py-8 sm:py-12 border-b border-slate-800 overflow-hidden">
        <!-- Background Image Texture -->
        <div class="absolute inset-0 z-0 select-none pointer-events-none">
            <img src="{{ asset('images/page-header-bg.png') }}" alt=""
                class="w-full h-full object-cover object-center opacity-95">
            <div class="absolute inset-0 bg-gradient-to-r from-[#070e1e]/85 via-[#070e1e]/40 to-black/10"></div>
        </div>

        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 relative z-10">
            <!-- Breadcrumb Navigation -->
            <div class="flex items-center space-x-2 text-xs font-sans uppercase text-slate-400 mb-4 tracking-wider">
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors">Home</a>
                <span>/</span>
                <span class="text-amber-400 font-bold">Produk & Spesifikasi</span>
            </div>

            <div class="max-w-5xl">
                <!-- Big Bold Heading (1 Baris Tanpa Ke-Enter) -->
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold italic uppercase font-barlow-condensed leading-none tracking-tight text-white">
                    KATALOG ARMADA TRUK SHACMAN
                </h1>
                <p class="mt-4 text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed">
                    Pilihan dump truck dan tractor head bertenaga tinggi untuk sektor pertambangan nikel, batu bara, quarry,
                    serta logistik angkutan berat di seluruh Indonesia.
                </p>
            </div>
        </div>
    </section>

    <!-- ================= CATALOG WITH SIDEBAR ================= -->
    <section class="w-full bg-slate-100 py-8 sm:py-12 border-b border-slate-200">
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
                    <span id="mobile-filter-badge" class="bg-[#0067b1] text-white px-2 py-0.5 text-[11px] font-sans">Semua
                        Unit</span>
                </button>
            </div>

            <div class="flex flex-col lg:flex-row items-start gap-6 lg:gap-8">

                <!-- ================= LEFT FILTER SIDEBAR (RESPONSIF LAPTOP & 2K) ================= -->
                <aside id="filter-sidebar" class="hidden lg:block w-full lg:w-64 xl:w-72 flex-shrink-0 space-y-4 lg:sticky lg:top-24 lg:self-start">

                    <!-- Filter Box (Hanya Konfigurasi Roda & Seri Truk, Ukuran Lebih Besar) -->
                    <div class="bg-white border border-slate-300 p-5 xl:p-6 shadow-xs">
                        <div class="flex items-center justify-between pb-3.5 border-b border-slate-200">
                            <h2
                                class="text-base xl:text-lg font-bold font-barlow-condensed uppercase italic text-slate-900 tracking-wider">
                                FILTER
                            </h2>
                            <button id="reset-filters-btn" type="button"
                                class="text-xs sm:text-sm font-sans text-[#0067b1] hover:underline uppercase font-bold">
                                [Reset]
                            </button>
                        </div>

                        <!-- 1. Konfigurasi Roda / Drive (6x4, 8x4) -->
                        <div class="py-5 border-b border-slate-100">
                            <label
                                class="block text-xs sm:text-sm font-bold uppercase font-sans text-slate-800 mb-3 tracking-wide">
                                Chassis Type
                            </label>
                            <div class="space-y-3">
                                <label class="flex items-center space-x-3 cursor-pointer select-none">
                                    <input type="checkbox" name="filter-drive" value="6x4"
                                        class="filter-drive-checkbox w-4 h-4 sm:w-5 sm:h-5 text-[#0067b1] focus:ring-[#0067b1] rounded-none cursor-pointer">
                                    <span class="text-sm sm:text-base font-medium text-slate-800">6x4</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer select-none">
                                    <input type="checkbox" name="filter-drive" value="8x4"
                                        class="filter-drive-checkbox w-4 h-4 sm:w-5 sm:h-5 text-[#0067b1] focus:ring-[#0067b1] rounded-none cursor-pointer">
                                    <span class="text-sm sm:text-base font-medium text-slate-800">8x4</span>
                                </label>
                            </div>
                        </div>

                        <!-- 2. Model Seri Truk (F3000, X3000, H3000) -->
                        <div class="pt-5">
                            <label
                                class="block text-xs sm:text-sm font-bold uppercase font-sans text-slate-800 mb-3 tracking-wide">
                                Truck Series
                            </label>
                            <div class="space-y-3">
                                <label class="flex items-center space-x-3 cursor-pointer select-none">
                                    <input type="radio" name="filter-series" value="all" checked
                                        class="filter-series-radio w-4 h-4 sm:w-5 sm:h-5 text-[#0067b1] focus:ring-[#0067b1] cursor-pointer">
                                    <span class="font-bold text-slate-900 text-sm sm:text-base">All Series</span>
                                    <span
                                        class="text-xs font-bold text-slate-500 bg-slate-100 px-2 py-0.5 border border-slate-200 ml-auto font-sans">({{ $products->count() }})</span>
                                </label>
                                @foreach($truckSeries as $series)
                                    @php
                                        $count = $products->where('truck_series_id', $series->id)->count();
                                    @endphp
                                    <label class="flex items-center space-x-3 cursor-pointer select-none">
                                        <input type="radio" name="filter-series" value="{{ strtolower($series->name) }}"
                                            class="filter-series-radio w-4 h-4 sm:w-5 sm:h-5 text-[#0067b1] focus:ring-[#0067b1] cursor-pointer">
                                        <span class="text-sm sm:text-base font-medium text-slate-800">{{ $series->name }}
                                            Series</span>
                                        <span
                                            class="text-xs font-bold text-slate-500 bg-slate-100 px-2 py-0.5 border border-slate-200 ml-auto font-sans">({{ $count }})</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- ================= RIGHT PRODUCTS LIST ================= -->
                <div class="flex-1 w-full">

                    <!-- Top Blue Header Bar (Persis Style Gambar Referensi TRUCK SHOW) -->
                    <div class="bg-[#0067b1] text-white px-5 py-3.5 mb-6 flex items-center justify-between shadow-xs">
                        <h2
                            class="text-sm sm:text-base font-bold font-barlow-condensed uppercase italic tracking-wider flex items-center space-x-2">
                            <span>TRUCK SHOW</span>
                        </h2>
                    </div>

                    <!-- Products Grid (Gaya Kartu Besar & Perkasa Sesuai Referensi shacmantruks.com) -->
                    <div id="products-grid"
                        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-7">
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
                                    <!-- Visual Stage: Gambar Truk Besar & Leluasa Landscape (Style shacmantruks.com) -->
                                    <div class="w-full aspect-[4/3] flex items-center justify-center p-3 sm:p-4 mb-4 bg-slate-50/70 border border-slate-100 overflow-hidden">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="w-full h-full object-contain group-hover:scale-108 transition-transform duration-300 drop-shadow-md select-none pointer-events-none">
                                    </div>

                                    <!-- Model Info: Judul Besar & Kode Spesifikasi -->
                                    <div class="text-left min-w-0">
                                        <h3
                                            class="text-lg sm:text-xl font-bold font-barlow-condensed uppercase italic text-slate-900 group-hover:text-[#0067b1] transition-colors leading-tight line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-xs sm:text-sm font-medium text-slate-500 font-sans mt-2">
                                            Model {{ $cleanDrive }} @if(!empty($product->engine)) • {{ $product->engine }} @endif
                                        </p>
                                    </div>
                                </div>

                                <!-- Bottom Action Bar (Dua Tombol Besar Berjarak Nyaman Tanpa Mentok) -->
                                <div class="grid grid-cols-2 gap-3 mt-6 pt-4 border-t border-slate-100">
                                    <!-- Tombol 1: Minta Penawaran (Online Inquiry) -->
                                    <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode($quoteText) }}" target="_blank"
                                        rel="noopener noreferrer" title="Minta Penawaran Resmi via WhatsApp"
                                        class="flex items-center justify-center py-2.5 sm:py-3 px-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-colors text-center shadow-xs">
                                        Minta Penawaran
                                    </a>

                                    <!-- Tombol 2: Detail Unit (Review) -->
                                    <a href="{{ url('/kontak?unit=' . urlencode($product->name)) }}"
                                        class="flex items-center justify-center py-2.5 sm:py-3 px-3 bg-white hover:bg-slate-50 text-[#0067b1] hover:text-[#004880] border border-slate-300 hover:border-[#0067b1] font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-colors text-center shadow-xs">
                                        Detail Unit
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div
                                class="col-span-full bg-white border border-slate-300 p-12 text-center text-slate-500 font-sans text-xs">
                                Unit truk belum tersedia.
                            </div>
                        @endforelse
                    </div>

                    <!-- No Results Notification -->
                    <div id="no-filter-results"
                        class="hidden bg-white border border-slate-300 p-10 text-center space-y-3 mt-6">
                        <div
                            class="w-12 h-12 mx-auto bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-lg">
                            !
                        </div>
                        <h4 class="text-xl font-bold font-barlow-condensed uppercase italic text-slate-900">
                            Tidak Ada Unit Sesuai Filter
                        </h4>
                        <p class="text-xs text-slate-600 max-w-md mx-auto">
                            Tidak ada unit yang sesuai kombinasi filter saat ini. Silakan reset filter untuk melihat katalog
                            lengkap.
                        </p>
                        <button id="empty-reset-btn" type="button"
                            class="px-5 py-2.5 bg-[#0067b1] text-white font-bold text-xs uppercase font-barlow-condensed tracking-wider">
                            Reset Semua Filter
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ================= CTA BANNER SECTION ================= -->
    <section class="relative w-full overflow-hidden text-white py-14 sm:py-20 lg:py-24 border-t border-slate-800">
        <!-- Background Image with 5 Shacman Trucks Twilight Headlights -->
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk Shacman Operasional"
            class="absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none">
        <div class="absolute inset-0 bg-[#00163c]/75 sm:bg-[#00163c]/65 backdrop-brightness-90"></div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 z-10 text-center flex flex-col items-center">
            <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold uppercase font-barlow-condensed text-white leading-tight drop-shadow-md">
                BAGAIMANA KAMI DAPAT MEMBANTU ANDA?
            </h3>
            <p class="mt-3 text-xs sm:text-base text-slate-100 max-w-2xl mx-auto leading-relaxed drop-shadow">
                Hubungi perwakilan resmi dealer PT SHINDO untuk konsultasi spesifikasi teknis, pembiayaan, dan penawaran harga terbaik armada SHACMAN.
            </p>
            <div class="mt-6 sm:mt-8">
                <a href="{{ url('/kontak') }}"
                    class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 bg-[#0067b1] hover:bg-[#005a9c] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-all duration-200 shadow-lg">
                    Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const seriesRadios = document.querySelectorAll('.filter-series-radio');
            const driveCheckboxes = document.querySelectorAll('.filter-drive-checkbox');
            const resetBtn = document.getElementById('reset-filters-btn');
            const emptyResetBtn = document.getElementById('empty-reset-btn');
            const mobileToggle = document.getElementById('mobile-filter-toggle');
            const filterSidebar = document.getElementById('filter-sidebar');
            const mobileBadge = document.getElementById('mobile-filter-badge');
            const productCountEl = document.getElementById('product-count');
            const noResultsEl = document.getElementById('no-filter-results');
            const productCards = document.querySelectorAll('.product-item');

            if (mobileToggle && filterSidebar) {
                mobileToggle.addEventListener('click', function () {
                    filterSidebar.classList.toggle('hidden');
                });
            }

            function applyFilters() {
                let selectedSeries = 'all';
                seriesRadios.forEach(r => {
                    if (r.checked) selectedSeries = r.value;
                });

                const selectedDrives = [];
                driveCheckboxes.forEach(c => {
                    if (c.checked) selectedDrives.push(c.value);
                });

                let visibleCount = 0;

                productCards.forEach(card => {
                    const cardSeries = card.getAttribute('data-series') || '';
                    const cardDrive = card.getAttribute('data-drive') || '';

                    let matchSeries = (selectedSeries === 'all') || cardSeries.includes(selectedSeries);

                    let matchDrive = true;
                    if (selectedDrives.length > 0) {
                        matchDrive = selectedDrives.some(d => cardDrive.includes(d));
                    }

                    if (matchSeries && matchDrive) {
                        card.style.display = 'flex';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (productCountEl) {
                    productCountEl.textContent = `${visibleCount} UNIT`;
                }

                if (noResultsEl) {
                    if (visibleCount === 0) {
                        noResultsEl.classList.remove('hidden');
                    } else {
                        noResultsEl.classList.add('hidden');
                    }
                }

                if (mobileBadge) {
                    mobileBadge.textContent = selectedSeries === 'all' ? `${visibleCount} Unit` : selectedSeries.toUpperCase();
                }
            }

            seriesRadios.forEach(r => r.addEventListener('change', applyFilters));
            driveCheckboxes.forEach(c => c.addEventListener('change', applyFilters));

            function resetAllFilters() {
                seriesRadios.forEach(r => {
                    r.checked = (r.value === 'all');
                });
                driveCheckboxes.forEach(c => c.checked = false);
                applyFilters();
            }

            if (resetBtn) resetBtn.addEventListener('click', resetAllFilters);
            if (emptyResetBtn) emptyResetBtn.addEventListener('click', resetAllFilters);

            // Auto-filter by series if ?seri= parameter is provided in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const seriParam = urlParams.get('seri');
            if (seriParam) {
                const targetRadio = Array.from(seriesRadios).find(r => r.value.toLowerCase() === seriParam.toLowerCase());
                if (targetRadio) {
                    targetRadio.checked = true;
                    applyFilters();
                }
            }
        });
    </script>
@endpush