<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHINDO | Dealer Resmi SHACMAN Indonesia</title>

    <meta name="description"
        content="{{ $settings->meta_description ?? 'Authorized Dealer Resmi SHACMAN Indonesia - Solusi Truk Heavy Duty Terbaik & Tangguh di Segala Medan.' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Google Fonts: Barlow & Barlow Condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&family=Barlow:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Barlow', ui-sans-serif, system-ui, sans-serif;
        }

        .font-barlow-condensed {
            font-family: 'Barlow Condensed', 'Barlow', sans-serif;
        }

        .font-sans {
            font-family: 'Barlow', ui-sans-serif, system-ui, sans-serif !important;
        }

        /* Scrim Ease Gradient & Mask: Subtle, natural fade at bottom 25% */
        .service-fade-mask {
            -webkit-mask-image: linear-gradient(to bottom, #000 0%, #000 70%, rgba(0, 0, 0, 0.85) 82%, rgba(0, 0, 0, 0.35) 93%, transparent 100%);
            mask-image: linear-gradient(to bottom, #000 0%, #000 70%, rgba(0, 0, 0, 0.85) 82%, rgba(0, 0, 0, 0.35) 93%, transparent 100%);
        }

        .service-smooth-fade {
            background: linear-gradient(to top,
                    #ffffff 0%,
                    #ffffff 15%,
                    rgba(255, 255, 255, 0.9) 35%,
                    rgba(255, 255, 255, 0.6) 60%,
                    rgba(255, 255, 255, 0.2) 85%,
                    transparent 100%);
        }

        /* ================= SCROLL ENTRANCE ANIMATIONS ================= */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity 0.75s cubic-bezier(0.16, 1, 0.3, 1), transform 0.75s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.96) translateY(20px);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-scale.is-revealed {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        /* Staggered Delay Helpers */
        .reveal-delay-100 {
            transition-delay: 100ms;
        }

        .reveal-delay-150 {
            transition-delay: 150ms;
        }

        .reveal-delay-200 {
            transition-delay: 200ms;
        }

        .reveal-delay-250 {
            transition-delay: 250ms;
        }

        .reveal-delay-300 {
            transition-delay: 300ms;
        }

        .reveal-delay-350 {
            transition-delay: 350ms;
        }

        .reveal-delay-400 {
            transition-delay: 400ms;
        }

        .reveal-delay-500 {
            transition-delay: 500ms;
        }

        @media (prefers-reduced-motion: reduce) {

            .reveal-on-scroll,
            .reveal-scale {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body
    class="bg-white text-neutral-900 antialiased min-h-screen flex flex-col overflow-x-hidden selection:bg-[#0067b1] selection:text-white">

    <!-- ================= HEADER WRAPPER ================= -->
    <header id="main-header"
        class="w-full flex-shrink-0 sticky top-0 z-50 shadow-md transition-transform duration-300 ease-in-out">
        @include('partials.top-bar')

        <div class="w-full bg-[#0067b1] border-b border-[#005a9c]/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-[68px] sm:h-[74px]">
                    <!-- Logo Shacman Authorized Dealer Shindo -->
                    <a href="{{ url('/') }}" class="flex items-center group py-2"
                        aria-label="SHACMAN Authorized Dealer SHINDO">
                        <img src="{{ $site->navbar_logo_url }}"
                            alt="{{ $site->site_name ?? 'SHACMAN Authorized Dealer SHINDO' }}"
                            class="h-8 sm:h-10 w-auto object-contain transition-transform duration-300 group-hover:scale-[1.02]">
                    </a>

                    <!-- Desktop Navigation Menu -->
                    <nav class="hidden md:flex items-center space-x-1 lg:space-x-1.5 text-sm font-medium">
                        @foreach($site->nav_items ?? [] as $nav)
                            @php
                                $isProduk = ($nav['label'] ?? '') === 'Produk' || ($nav['label'] ?? '') === 'Dump Truck' || str_contains($nav['url'] ?? '', 'produk');
                                $targetPath = ltrim($nav['url'] ?? '', '/');
                                $isActive = empty($targetPath) ? request()->is('/') : request()->is($targetPath, $targetPath . '/*');
                            @endphp

                            @if($isProduk)
                                @php
                                    $isProdukActive = request()->is('produk*');
                                @endphp
                                <!-- Dropdown Produk dengan 3 Series (Duta Hino Style) -->
                                <div class="relative group flex items-center h-[68px] sm:h-[74px]">
                                    <a href="{{ url('/produk') }}"
                                        class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-sm transition-colors {{ $isProdukActive ? 'bg-[#004880] text-white font-bold' : 'text-white/85 hover:text-white hover:bg-white/10 font-medium' }}">
                                        <span>Produk</span>
                                        <svg class="w-3.5 h-3.5 transition-transform duration-250 ease-out group-hover:rotate-180"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </a>

                                    <!-- Dropdown Submenu: Pas di Bawah Kotak Navbar, Sharp Non-rounded, Animasi Halus -->
                                    <div class="dh-dropdown-menu w-64 shadow-2xl z-50">
                                        <div class="bg-white border border-slate-200 py-1.5">
                                            <a href="{{ route('produk.series', 'x3000') }}" class="dh-dropdown-item">
                                                <span>SHACMAN X3000 Series</span>
                                            </a>
                                            <a href="{{ route('produk.series', 'h3000') }}" class="dh-dropdown-item">
                                                <span>SHACMAN H3000 Series</span>
                                            </a>
                                            <a href="{{ route('produk.series', 'f3000') }}" class="dh-dropdown-item">
                                                <span>SHACMAN F3000 Series</span>
                                            </a>

                                            <!-- Tombol Katalog Produk: Dibedain & Ditaro di Bawah -->
                                            <div class="pt-1.5 mt-1 border-t border-slate-200 px-2 pb-0.5">
                                                <a href="{{ url('/produk') }}"
                                                    class="flex items-center justify-between px-3 py-2 bg-slate-50 hover:bg-[#0067b1] text-slate-800 hover:text-white border border-slate-200 hover:border-[#0067b1] transition-all duration-200 group/btn">
                                                    <span class="text-xs font-bold font-sans uppercase tracking-wider">Katalog Produk</span>
                                                    <svg class="w-3.5 h-3.5 text-[#0067b1] group-hover/btn:text-white transform group-hover/btn:translate-x-0.5 transition-all"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ $nav['url'] ?? '#' }}"
                                    class="inline-flex items-center px-3.5 py-1.5 text-sm transition-colors {{ $isActive ? 'bg-[#004880] text-white font-bold' : 'text-white/85 hover:text-white hover:bg-white/10 font-medium' }}">
                                    <span>{{ $nav['label'] ?? '' }}</span>
                                </a>
                            @endif
                        @endforeach
                    </nav>

                    <!-- Desktop CTA Button -->
                    <div class="hidden md:flex items-center">
                        <a href="{{ $site->cta_url ?? '/kontak' }}"
                            class="bg-[#004880] hover:bg-[#003d6d] text-white text-xs sm:text-sm font-medium px-5 sm:px-6 py-2 sm:py-2.5 border border-[#005a9c]/50 shadow-sm">
                            {{ $site->cta_text ?? 'Hubungi Kami' }}
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex md:hidden items-center">
                        <button id="mobile-menu-btn" type="button" aria-expanded="false" aria-controls="mobile-menu"
                            class="text-white p-2 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white"
                            aria-label="Toggle Navigation">
                            <svg id="hamburger-icon" class="h-6 w-6 block" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg id="close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Dropdown Menu -->
            <div id="mobile-menu"
                class="hidden md:hidden bg-[#005a9c] border-t border-[#004b87] px-4 pt-3 pb-5 space-y-2">
                @foreach($site->nav_items ?? [] as $nav)
                    @php
                        $isProduk = ($nav['label'] ?? '') === 'Produk' || ($nav['label'] ?? '') === 'Dump Truck' || str_contains($nav['url'] ?? '', 'produk');
                        $targetPath = ltrim($nav['url'] ?? '', '/');
                        $isActive = empty($targetPath) ? request()->is('/') : request()->is($targetPath, $targetPath . '/*');
                    @endphp

                    @if($isProduk)
                        @php
                            $isProdukActive = request()->is('produk*');
                        @endphp
                        <!-- Mobile Accordion for Produk -->
                        <div class="space-y-1">
                            <button type="button" id="mobile-dumptruck-toggle"
                                class="w-full flex items-center justify-between px-3.5 py-2.5 text-base transition-colors {{ $isProdukActive ? 'bg-[#004880] text-white font-bold' : 'text-white hover:bg-white/10 font-medium' }}">
                                <span>Produk</span>
                                <svg id="mobile-dumptruck-arrow" class="w-4 h-4 transition-transform duration-200" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="mobile-dumptruck-submenu" class="hidden pl-4 pr-2 py-1.5 space-y-1 bg-[#004880]/50 my-1">
                                <a href="{{ route('produk.series', 'x3000') }}"
                                    class="block px-3 py-1.5 text-sm text-slate-100 hover:text-white">
                                    SHACMAN X3000 Series
                                </a>
                                <a href="{{ route('produk.series', 'h3000') }}"
                                    class="block px-3 py-1.5 text-sm text-slate-100 hover:text-white">
                                    SHACMAN H3000 Series
                                </a>
                                <a href="{{ route('produk.series', 'f3000') }}"
                                    class="block px-3 py-1.5 text-sm text-slate-100 hover:text-white">
                                    SHACMAN F3000 Series
                                </a>
                                <div class="pt-2 mt-1 border-t border-white/15 px-1 pb-1">
                                    <a href="{{ url('/produk') }}"
                                        class="flex items-center justify-between px-3 py-2 bg-white/10 hover:bg-white text-white hover:text-[#00163c] text-xs font-bold font-sans uppercase tracking-wider transition-colors">
                                        <span>Katalog Produk</span>
                                        <span>→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ $nav['url'] ?? '#' }}"
                            class="block px-3.5 py-2.5 text-base transition-colors {{ $isActive ? 'bg-[#004880] text-white font-bold' : 'text-white hover:bg-white/10 font-medium' }}">
                            {{ $nav['label'] ?? '' }}
                        </a>
                    @endif
                @endforeach
                <div class="pt-2">
                    <a href="{{ $site->cta_url ?? '/kontak' }}"
                        class="block w-full text-center bg-[#004880] text-white font-semibold py-2.5 border border-[#005ba3]">
                        {{ $site->cta_text ?? 'Hubungi Kami' }}
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- ================= HERO SECTION ================= -->
    <section
        class="relative w-full overflow-hidden flex flex-col justify-start h-[330px] sm:h-[440px] md:h-[520px] lg:h-[calc(100vh-74px-165px)] lg:min-h-[620px] xl:min-h-[700px] 2xl:min-h-[790px]">
        <!-- Gambar Hero-->
        <img src="{{ $settings->hero_background_image_url }}" alt="SHACMAN Heavy Duty Trucks di Segala Medan"
            class="absolute inset-0 w-full h-full object-cover select-none pointer-events-none"
            style="object-position: 50% 12%;">

        <!-- Subtle Contrast Lighting -->
        <div class="absolute inset-0 bg-gradient-to-b from-white/25 via-transparent to-black/30 pointer-events-none">
        </div>

        <!-- Konten Hero: Logo & Slogan -->
        <div
            class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-3 sm:pt-6 md:pt-8 flex flex-col items-center justify-start pointer-events-auto z-10 reveal-scale">
            <!-- SHACMAN Logo with Emblem (Enlarged) -->
            <img src="{{ $settings->hero_logo_url }}" alt="SHACMAN"
                class="h-11 sm:h-16 md:h-24 lg:h-32 xl:h-36 w-auto object-contain transition-transform duration-300 hover:scale-105">

            <!-- Tagline with Accent Lines (Full Size) -->
            <div class="flex items-center justify-center sm:gap-3 md:gap-4 mt-2 sm:mt-3 md:mt-4 select-none">
                <span class="w-6 sm:w-12 md:w-16 lg:w-20 h-[2px] sm:h-[3px] bg-neutral-950 flex-shrink-0"></span>
                <h1
                    class="text-xs sm:text-lg md:text-2xl lg:text-3xl font-bold uppercase text-neutral-950 leading-none">
                    {{ $settings->hero_tagline ?? 'TANGGUH DI SEGALA MEDAN' }}
                </h1>
                <span class="w-6 sm:w-12 md:w-16 lg:w-20 h-[2px] sm:h-[3px] bg-neutral-950 flex-shrink-0"></span>
            </div>
        </div>
    </section>

    <!-- ================= STATS BANNER SECTION ================= -->
    <section class="w-full bg-[#00163c] border-y border-slate-800/80 py-5 sm:py-7 lg:py-8 flex-shrink-0 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 items-center">

                @foreach($settings->stats ?? [] as $idx => $stat)
                    <div
                        class="flex items-center space-x-3 sm:space-x-4 reveal-on-scroll {{ $idx === 0 ? 'reveal-delay-100' : ($idx === 1 ? 'reveal-delay-200' : ($idx === 2 ? 'reveal-delay-300' : 'reveal-delay-400')) }}">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-white/10 border border-white/10 flex items-center justify-center text-white flex-shrink-0 shadow-xs">
                            @if(($stat['icon'] ?? '') === 'handshake')
                                <!-- Handshake Icon -->
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m11 17 2 2a1 1 0 0 0 1.4 0l4.3-4.3a1 1 0 0 0 0-1.4l-3-3a1 1 0 0 0-1.4 0L13 11.6">
                                    </path>
                                    <path
                                        d="m13 13.6-2.3-2.3a1 1 0 0 0-1.4 0L6 14.6a1 1 0 0 0 0 1.4l2 2a1 1 0 0 0 1.4 0L11 16.4">
                                    </path>
                                    <path d="M18 11V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3"></path>
                                </svg>
                            @elseif(($stat['icon'] ?? '') === 'map-pin')
                                <!-- Location Pin Icon -->
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                    </path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            @elseif(($stat['icon'] ?? '') === 'shield-check')
                                <!-- Shield Check Icon -->
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                                    </path>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            @else
                                <!-- Default Truck Icon -->
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="3" width="15" height="13"></rect>
                                    <polygon points="16 8 20 8 23 11 23 16 16 8"></polygon>
                                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <div
                                class="text-xl sm:text-2xl md:text-3xl font-bold text-white font-barlow-condensed uppercase tracking-tight leading-none">
                                {{ $stat['value'] ?? '' }}
                            </div>
                            <div class="text-xs sm:text-sm text-slate-300 font-sans font-normal mt-1 leading-tight">
                                {{ $stat['label'] ?? '' }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ================= SECTION 1: SHOWROOM (SERI TRUK) ================= -->
    <section id="produk" class="w-full py-8 sm:py-12 md:py-14 relative overflow-hidden"
        style="background: radial-gradient(circle at 50% 50%, #ffffff 0%, #f4f6fa 60%, #eef2f7 100%);">

        @php
            $firstSeries = $truckSeries->first();
        @endphp

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Buttons Tab Seri Truck (Barlow) -->
            <div
                class="flex items-center justify-center space-x-6 sm:space-x-16 md:space-x-24 mb-1 sm:mb-3 reveal-on-scroll">
                @foreach($truckSeries as $idx => $series)
                    <button type="button" data-series-btn="{{ $series->key ?? $series->name }}"
                        class="series-tab-btn group relative pb-1.5 transition-all duration-300 {{ $idx === 0 ? 'text-[#0067b1]' : 'text-slate-400' }} hover:text-[#0067b1] font-barlow-condensed font-bold italic text-3xl sm:text-5xl md:text-6xl uppercase focus:outline-none leading-none tracking-tight">
                        {{ $series->name }}
                    </button>
                @endforeach
            </div>

            <!-- Area Showcase: Teks Belakang Truk + Gambar Truk di Depan -->
            <div
                class="relative w-full flex items-center justify-center min-h-[250px] sm:min-h-[340px] md:min-h-[420px] lg:min-h-[480px] select-none my-2 sm:my-3 overflow-visible reveal-scale reveal-delay-150">

                <!-- Teks Belakang Truk (Barlow Watermark - Ramping & Proporsional) -->
                <div id="truck-bg-text"
                    class="absolute inset-0 flex items-center justify-center font-barlow-condensed font-medium italic text-[#cbd5e1]/40 text-[7rem] xs:text-[9rem] sm:text-[13rem] md:text-[17rem] lg:text-[21rem] xl:text-[24rem] tracking-wide leading-none select-none pointer-events-none z-0 transition-all duration-500 transform whitespace-nowrap">
                    {{ $firstSeries->name ?? 'X3000' }}
                </div>

                <!-- Gambar Truk di Depan Teks Belakang -->
                <div
                    class="relative z-10 w-full max-w-[320px] sm:max-w-2xl md:max-w-3xl lg:max-w-4xl xl:max-w-5xl flex items-center justify-center px-2 sm:px-4">
                    <img id="truck-center-image" src="{{ $firstSeries?->image_url }}"
                        alt="SHACMAN {{ $firstSeries->name ?? '' }} Heavy Duty Truck"
                        class="w-full h-auto max-h-[280px] sm:max-h-[380px] lg:max-h-[440px] object-contain transition-all duration-500 ease-out transform drop-shadow-2xl">
                </div>
            </div>

            <!-- Teks Deskripsi Seri Truk di Bawah -->
            <div class="max-w-3xl mx-auto text-center mt-2 sm:mt-3 px-2 sm:px-4 reveal-on-scroll reveal-delay-250">
                <p id="truck-description"
                    class="text-slate-700 text-sm sm:text-base leading-relaxed transition-opacity duration-300 font-normal">
                    {!! $firstSeries->description ?? '' !!}
                </p>

                <!-- Tombol Aksi Detail Unit & Kontak Kami -->
                <div
                    class="flex flex-row items-center justify-center gap-3 sm:gap-4 mt-4 sm:mt-5 max-w-xs sm:max-w-none mx-auto">
                    <a id="truck-detail-btn"
                        href="{{ route('produk.series', strtolower($firstSeries->key ?? 'x3000')) }}"
                        class="flex-1 sm:flex-initial sm:min-w-[190px] inline-flex items-center justify-center px-6 sm:px-8 py-2.5 sm:py-3 bg-white hover:bg-slate-50 text-[#0067b1] border-2 border-[#0067b1] font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-all duration-200 shadow-sm text-center">
                        Spesifikasi & Showcase
                    </a>
                    <a href="{{ $site->cta_url ?? '/kontak' }}"
                        class="flex-1 sm:flex-initial sm:min-w-[190px] inline-flex items-center justify-center px-6 sm:px-8 py-2.5 sm:py-3 bg-[#0067b1] hover:bg-[#00528e] text-white border-2 border-[#0067b1] hover:border-[#00528e] font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-all duration-200 shadow-md text-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= SECTION 2: TENTANG KAMI (FULL-WIDTH CINEMATIC BANNER) ================= -->
    <section id="tentang-kami"
        class="relative w-full min-h-[440px] lg:min-h-[480px] flex items-center py-10 sm:py-14 lg:py-16 overflow-hidden bg-[#070e1e] border-t border-b border-slate-800">
        <!-- Background Image (Armada Truk SHACMAN dari Gambar 3) -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/about-shacman-fleet-bg.png') }}" alt="Armada Truk SHACMAN PT SHINDO"
                class="w-full h-full object-cover object-[center_35%] select-none pointer-events-none">
            <!-- Cinematic Dark Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#070e1e] via-[#070e1e]/85 to-black/60 lg:hidden"></div>
            <div
                class="absolute inset-0 hidden lg:block bg-gradient-to-r from-black/40 via-[#070e1e]/80 to-[#070e1e]/98">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Spacer di Kiri (Untuk membiarkan background deretan armada truk tetap terlihat gagah) -->
                <div class="hidden lg:block lg:col-span-5 xl:col-span-6"></div>

                <!-- Kolom Teks di Kanan -->
                <div class="lg:col-span-7 xl:col-span-6 flex flex-col items-start justify-center reveal-on-scroll">

                    <!-- Badge 'TENTANG KAMI' -->
                    <span
                        class="inline-flex items-center px-3.5 py-1.5 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider mb-2.5">
                        {{ $settings->about_badge ?? 'TENTANG KAMI' }}
                    </span>

                    <!-- Big Bold Heading: SHACMAN – TRUK HEAVY-DUTY PILIHAN UTAMA INDONESIA -->
                    <h2
                        class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase leading-[0.95] text-white font-barlow-condensed tracking-tight">
                        {{ $settings->about_title ?? 'SHACMAN – TRUK PILIHAN UTAMA INDONESIA' }}
                    </h2>

                    <!-- Paragraf Deskripsi -->
                    <p class="mt-3 text-slate-200 text-sm sm:text-base leading-relaxed font-normal">
                        {{ $settings->about_description_1 ?? 'Sebagai authorized dealer resmi, kami berkomitmen menjaga produktivitas operasional Anda dengan Advance features yang mendukung kinerja tinggi dan stabil. Kami melayani pengadaan unit baru, penyediaan suku cadang asli bergaransi, hingga perawatan berkala oleh teknisi bersertifikat langsung di site Anda.' }}
                    </p>

                    <!-- Checklist Fitur / Poin Keunggulan -->
                    @php
                        $aboutPoints = !empty($settings->about_features) ? $settings->about_features : [
                            ['title' => 'Mitra Penjualan Resmi Bersertifikasi SHACMAN Global'],
                            ['title' => 'Layanan Purna Jual SHASS (Shacman After Sales Service) 24 Jam'],
                            ['title' => 'Jaminan Ketersediaan Suku Cadang Orisinal'],
                        ];
                    @endphp
                    <div class="space-y-2.5 mt-4 pt-4 border-t border-white/20 w-full">
                        @foreach($aboutPoints as $point)
                            <div class="flex items-start space-x-3">
                                <span
                                    class="w-5 h-5 bg-[#0067b1] flex items-center justify-center text-white flex-shrink-0 mt-0.5 shadow-xs">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </span>
                                <span class="text-sm sm:text-base font-semibold text-white">
                                    {{ $point['title'] ?? '' }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tombol Aksi: Hubungi Kami & Profil Perusahaan -->
                    <div class="mt-6 flex flex-wrap items-center gap-3 sm:gap-4">
                        <a href="{{ url('/kontak') }}"
                            class="inline-flex items-center justify-center px-7 py-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs sm:text-sm uppercase font-sans tracking-wider shadow-md transition-colors">
                            Hubungi Kami
                        </a>
                        <a href="{{ url('/tentang-kami') }}"
                            class="inline-flex items-center justify-center px-6 py-3 border-2 border-white/80 hover:border-white hover:bg-white hover:text-[#00163c] text-white font-bold text-xs sm:text-sm uppercase font-sans tracking-wider transition-colors">
                            Profil Perusahaan
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ================= SECTION 3: PRODUK UNGGULAN KAMI ================= -->
    <section id="produk-unggulan" class="w-full bg-slate-100 py-10 sm:py-14 lg:py-16 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center max-w-4xl mx-auto mb-6 sm:mb-10 reveal-on-scroll">
                <!-- Heading Pilihan Armada SHACMAN -->
                <h2
                    class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase text-[#070e1e] font-barlow-condensed leading-none tracking-tight">
                    {{ $settings->products_title ?? 'Pilihan Armada SHACMAN' }}
                </h2>
                <!-- Subheadline gaya Duta Hino -->
                <p class="text-slate-600 text-sm sm:text-base font-normal mt-2 sm:mt-3 max-w-2xl mx-auto">
                    {{ $settings->products_subtitle ?? 'Solusi armada dan alat angkut berat tangguh untuk setiap kebutuhan bisnis Anda.' }}
                </p>
            </div>

            <!-- 3 Kolom Card Produk Visual Kotak 1:1 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                @foreach($products as $idx => $product)
                    @php
                        $seriesKey = strtolower($product->truckSeries?->key ?? $product->truckSeries?->name ?? '');
                        if (empty($seriesKey) || !in_array($seriesKey, ['x3000', 'h3000', 'f3000'])) {
                            if (str_contains(strtolower($product->name), 'h3000')) {
                                $seriesKey = 'h3000';
                            } elseif (str_contains(strtolower($product->name), 'f3000')) {
                                $seriesKey = 'f3000';
                            } else {
                                $seriesKey = 'x3000';
                            }
                        }
                        $cutoutRelPath = config("series_data.{$seriesKey}.truck_render") ?? "images/series/{$seriesKey}_cutout.png";
                        $cutoutUrl = file_exists(public_path($cutoutRelPath)) ? asset($cutoutRelPath) : $product->image_url;
                        $cardUrl = route('produk.series', $seriesKey);
                    @endphp
                    <a href="{{ $cardUrl }}"
                        class="product-item relative bg-white border border-slate-200/90 hover:border-[#0067b1] shadow-xs hover:shadow-xl transition-all duration-300 aspect-square flex flex-col justify-between p-4 sm:p-6 group overflow-hidden reveal-on-scroll {{ $idx === 0 ? 'reveal-delay-100' : ($idx === 1 ? 'reveal-delay-200' : 'reveal-delay-300') }}">

                        <!-- Visual Stage: Gambar Truk Cutout Proporsional -->
                        <div class="w-full flex-1 flex items-center justify-center overflow-hidden py-2 px-1">
                            <img src="{{ $cutoutUrl }}" alt="{{ $product->name }}"
                                class="max-h-full max-w-full object-contain transform group-hover:scale-105 transition-transform duration-500 drop-shadow-md select-none pointer-events-none">
                        </div>

                        <!-- Model Info: Judul Produk Besar & Tombol Hover Duta Hino Style -->
                        <div class="pt-3 border-t border-slate-100 flex flex-col items-center text-center">
                            <h3
                                class="text-xl sm:text-2xl lg:text-3xl font-bold font-barlow-condensed uppercase text-slate-900 group-hover:text-[#0067b1] transition-colors leading-tight">
                                {{ str_ends_with(strtolower($product->name), 'series') ? $product->name : $product->name . ' Series' }}
                            </h3>

                            <!-- Tombol LIHAT PRODUK (Hanya Muncul Saat Hover — Skema Duta Hino) -->
                            <div
                                class="overflow-hidden transition-all duration-300 max-h-0 group-hover:max-h-14 opacity-0 group-hover:opacity-100 mt-0 group-hover:mt-3">
                                <span
                                    class="inline-flex items-center justify-center gap-2 px-6 py-2 bg-[#0067b1] group-hover:bg-[#00528e] text-white text-xs font-bold font-sans uppercase tracking-wider shadow-sm transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                    <span>Lihat Produk</span>
                                    <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform duration-200"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>

    <!-- ================= SECTION 4: KEUNGGULAN OPERASIONAL DARI CMS ================= -->
    @if(!empty($settings->advantages_items))
        <section id="keunggulan" class="w-full bg-[#0067b1] py-12 sm:py-16 lg:py-20 border-t border-[#005a9c]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-6 sm:mb-10 reveal-on-scroll">
                    @if(!empty($settings->advantages_badge))
                        <span
                            class="inline-flex items-center px-3.5 py-1 bg-white/15 border border-white/30 text-white text-xs font-sans font-bold uppercase tracking-wider mb-2.5">
                            {{ $settings->advantages_badge }}
                        </span>
                    @endif
                    <h2
                        class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase text-white font-barlow-condensed leading-none tracking-tight drop-shadow-xs">
                        {{ $settings->advantages_title ?? 'MENGAPA MEMILIH SHACMAN?' }}
                    </h2>
                    @if(!empty($settings->advantages_subtitle))
                        <p class="mt-2.5 text-blue-100 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                            {{ $settings->advantages_subtitle }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($settings->advantages_items as $idx => $adv)
                        <div
                            class="bg-white p-5 sm:p-6 hover:shadow-xl transition-all duration-300 shadow-md group flex flex-col items-center text-center reveal-on-scroll {{ $idx === 0 ? 'reveal-delay-100' : ($idx === 1 ? 'reveal-delay-200' : ($idx === 2 ? 'reveal-delay-300' : 'reveal-delay-400')) }}">
                            <div
                                class="w-12 h-12 border border-slate-200 bg-slate-50 text-[#0067b1] flex items-center justify-center mb-3.5 group-hover:bg-[#0067b1] group-hover:border-[#0067b1] group-hover:text-white transition-all duration-300 flex-shrink-0">
                                @if(($adv['icon'] ?? '') === 'cpu' || str_contains(strtolower($adv['title'] ?? ''), 'torsi') || str_contains(strtolower($adv['title'] ?? ''), 'mesin'))
                                    <!-- Microchip / Processor Engine Control Icon (Sesuai Gambar) -->
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <rect x="4" y="4" width="16" height="16" rx="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <rect x="9" y="9" width="6" height="6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3" />
                                    </svg>
                                @elseif(($adv['icon'] ?? '') === 'fuel' || str_contains(strtolower($adv['title'] ?? ''), 'bbm') || str_contains(strtolower($adv['title'] ?? ''), 'solar') || str_contains(strtolower($adv['title'] ?? ''), 'efisiensi'))
                                    <!-- Gas / Fuel Station Pump Icon (Sesuai Gambar) -->
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 4v16a1 1 0 001 1h8a1 1 0 001-1V4a1 1 0 00-1-1H5a1 1 0 00-1 1z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 6h4v4H7V6z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14 9h2a2 2 0 012 2v7a2 2 0 002 2 2 2 0 002-2V9.828a2 2 0 00-.586-1.414l-2.828-2.828" />
                                    </svg>
                                @elseif(($adv['icon'] ?? '') === 'truck' || str_contains(strtolower($adv['title'] ?? ''), 'kabin') || str_contains(strtolower($adv['title'] ?? ''), 'aman') || str_contains(strtolower($adv['title'] ?? ''), 'keselamatan'))
                                    <!-- Truck Cab Profile Icon (Sesuai Gambar) -->
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M1 3h14v13H1V3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 8h4l3 3.5V16h-7V8z" />
                                        <circle cx="5.5" cy="18.5" r="2.5" />
                                        <circle cx="17.5" cy="18.5" r="2.5" />
                                    </svg>
                                @elseif(($adv['icon'] ?? '') === 'cog' || str_contains(strtolower($adv['title'] ?? ''), 'suku cadang') || str_contains(strtolower($adv['title'] ?? ''), 'sparepart') || str_contains(strtolower($adv['title'] ?? ''), 'cadang'))
                                    <!-- Clean 6-Tooth Mechanical Cog (Heroicons) - Presisi & Bulat Halus -->
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                @else
                                    <!-- Check Circle Default -->
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>
                            <h3
                                class="font-bold text-base sm:text-lg font-barlow-condensed uppercase text-slate-900 leading-snug">
                                {{ $adv['title'] ?? '' }}
                            </h3>
                            @if(!empty($adv['description']))
                                <p class="mt-2 text-xs text-slate-600 leading-relaxed font-normal">
                                    {{ $adv['description'] }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ================= SECTION 5: LAYANAN AFTERSALES ================= -->
    <section id="layanan" class="w-full bg-white py-14 sm:py-20 lg:py-24 border-t border-slate-200">
        <!-- Section Header -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 sm:mb-14 text-center reveal-on-scroll">
            @if(!empty($settings->services_badge))
                <span
                    class="inline-flex items-center px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider mb-2.5 shadow-xs">
                    {{ $settings->services_badge }}
                </span>
            @endif
            <h2
                class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed leading-none tracking-tight text-[#00163c]">
                {{ $settings->services_title ?? 'DUKUNGAN PENUH UNTUK BISNIS ANDA' }}
            </h2>
            @if(!empty($settings->services_subtitle))
                <p class="mt-2.5 text-slate-600 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                    {{ $settings->services_subtitle }}
                </p>
            @endif
        </div>

        <!-- Kolom Card Layanan (Style Minimalist Editorial Sesuai Gambar Referensi) -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10 lg:gap-12">

                <!-- Service 1: Penjualan Unit Baru -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-100">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-facility.jpg') }}" alt="Penjualan Unit Baru SHACMAN"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div
                            class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">01</span>
                        <h3
                            class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            <a href="{{ url('/layanan') }}">Penjualan Unit Baru</a>
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Pengadaan unit baru SHACMAN bergaransi resmi untuk kebutuhan armada tambang, konstruksi, dan
                            logistik skala besar.
                        </p>
                    </div>
                </div>

                <!-- Service 2: Program Kontak Servis -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-200">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-contract.jpg') }}" alt="Program Kontak Servis"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div
                            class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">02</span>
                        <h3
                            class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            <a href="{{ url('/layanan') }}">Program Kontak Servis</a>
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Konsultasi teknis langsung, penjadwalan servis berkala, dan penanganan cepat kendala unit
                            dengan standar pabrikan.
                        </p>
                    </div>
                </div>

                <!-- Service 3: Garansi Terjamin -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-300">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-warranty.jpg') }}" alt="Garansi Terjamin SHACMAN"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div
                            class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">03</span>
                        <h3
                            class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            <a href="{{ url('/layanan') }}">Garansi Terjamin</a>
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Perlindungan garansi resmi pabrikan untuk powertrain utama: mesin Weichai, transmisi FAST,
                            dan gardan Hande.
                        </p>
                    </div>
                </div>

                <!-- Service 4: Suku Cadang Asli -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-100">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-parts.jpg') }}" alt="Suku Cadang Asli SHACMAN"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div
                            class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">04</span>
                        <h3
                            class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            <a href="{{ url('/layanan') }}">Suku Cadang Asli</a>
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Ketersediaan suku cadang orisinal lengkap dan distribusi cepat ke konsesi tambang untuk
                            meminimalkan masa downtime armada.
                        </p>
                    </div>
                </div>

                <!-- Service 5: Servis & Perawatan Rutin -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-200">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-mechanic.jpg') }}" alt="Servis & Perawatan Rutin"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div
                            class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">05</span>
                        <h3
                            class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            <a href="{{ url('/layanan') }}">Servis & Perawatan Rutin</a>
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Pemeliharaan berkala terjadwal oleh mekanik terlatih bersertifikasi demi menjaga efisiensi
                            konsumsi BBM dan keawetan mesin.
                        </p>
                    </div>
                </div>

                <!-- Service 6: Dukungan Layanan 24/7 -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-300">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-support.jpg') }}" alt="Dukungan Layanan 24/7"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div
                            class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                        </div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">06</span>
                        <h3
                            class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            <a href="{{ url('/layanan') }}">Dukungan Layanan 24/7</a>
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Tim teknisi storing darurat siaga 24 jam dengan armada mobile service siap meluncur langsung
                            ke site kerja Anda.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= SECTION 6: BERITA & ARTIKEL ================= -->
    <section id="artikel" class="w-full bg-slate-100 py-10 sm:py-14 lg:py-16 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 mb-5 sm:mb-8 reveal-on-scroll">
                <div>
                    @if(!empty($settings->blog_badge))
                        <span
                            class="inline-flex items-center px-3 py-1 bg-[#070e1e] text-blue-300 text-xs font-sans font-bold uppercase tracking-wider mb-2">
                            {{ $settings->blog_badge }}
                        </span>
                    @endif
                    <h2
                        class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase text-[#070e1e] font-barlow-condensed leading-none tracking-tight">
                        {{ $settings->blog_title ?? 'BLOG TERBARU' }}
                    </h2>
                    @if(!empty($settings->blog_subtitle))
                        <p class="mt-2 text-slate-600 text-sm max-w-xl">
                            {{ $settings->blog_subtitle }}
                        </p>
                    @endif
                </div>
                <a href="{{ url('/blog') }}"
                    class="text-xs font-sans font-bold text-[#0067b1] hover:underline uppercase flex-shrink-0">
                    Lihat Semua Berita →
                </a>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach($posts->take(3) as $idx => $blog)
                    <article
                        class="bg-white border border-slate-300 hover:border-[#0067b1] transition-all flex flex-col justify-between group reveal-on-scroll {{ $idx === 0 ? 'reveal-delay-100' : ($idx === 1 ? 'reveal-delay-200' : 'reveal-delay-300') }}">
                        <div>
                            <div class="aspect-[16/10] w-full overflow-hidden bg-slate-900 relative">
                                <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div
                                    class="absolute bottom-2 left-2 bg-black/70 text-slate-200 text-[10px] font-sans px-2 py-0.5">
                                    {{ $blog->published_at?->format('d M Y') ?? date('d M Y') }}
                                </div>
                            </div>
                            <div class="p-4 sm:p-5">
                                <h3
                                    class="text-xl font-bold font-barlow-condensed uppercase text-slate-900 leading-snug group-hover:text-[#0067b1] transition-colors">
                                    <a href="{{ url('/blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                                </h3>
                                <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed font-normal line-clamp-3">
                                    {{ $blog->excerpt }}
                                </p>
                            </div>
                        </div>
                        <div
                            class="px-5 py-3 border-t border-slate-100 bg-slate-50 flex items-center justify-between text-xs font-sans">
                            <a href="{{ url('/blog/' . $blog->slug) }}"
                                class="text-[#0067b1] font-bold uppercase hover:underline">
                                Baca Detail
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= SECTION: HUBUNGI KAMI ================= -->
    <section id="penawaran-resmi"
        class="relative w-full overflow-hidden bg-[#070e1e] py-12 sm:py-16 lg:py-20 border-t border-slate-800">
        <!-- Subtle Industrial Accent Lines -->
        <div class="absolute inset-0 bg-gradient-to-b from-[#070e1e] via-[#00163c]/50 to-[#070e1e] pointer-events-none">
        </div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="reveal-scale">
                <div
                    class="bg-white border-t-4 border-[#0067b1] border-x border-b border-slate-200 p-6 sm:p-8 lg:p-10 shadow-2xl">
                    <div class="border-b border-slate-200 pb-4 mb-6 text-center">
                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none">
                            HUBUNGI KAMI
                        </h2>
                        <p class="mt-2 text-slate-600 text-xs sm:text-sm leading-relaxed max-w-xl mx-auto">
                            Konsultasikan kebutuhan armada truk dan spesifikasi unit bersama tim kami.
                        </p>
                    </div>

                    <form id="homepage-quote-form" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Nama
                                    Lengkap *</label>
                                <input type="text" id="quote-name" required placeholder="Nama"
                                    class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-slate-50 focus:bg-white text-slate-900 transition-colors">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Perusahaan /
                                    Proyek</label>
                                <input type="text" id="quote-company" placeholder="Perusahaan / Proyek"
                                    class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-slate-50 focus:bg-white text-slate-900 transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">No.
                                    WhatsApp / Telepon *</label>
                                <input type="tel" id="quote-phone" required placeholder="Nomor WhatsApp / Telepon"
                                    class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-slate-50 focus:bg-white text-slate-900 transition-colors">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Email</label>
                                <input type="email" id="quote-email" placeholder="Email"
                                    class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-slate-50 focus:bg-white text-slate-900 transition-colors">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Kebutuhan
                                Armada / Catatan</label>
                            <textarea id="quote-notes" rows="3" placeholder="Kebutuhan"
                                class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-slate-50 focus:bg-white text-slate-900 transition-colors"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" id="quote-submit-btn"
                                class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-sm uppercase font-barlow-condensed not-italic tracking-wider shadow-md transition-all duration-200 cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed">
                                <span id="quote-btn-text">Hubungi Kami</span>
                                <svg id="quote-btn-spinner" class="hidden w-4 h-4 animate-spin text-white" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                            </button>
                            <p class="mt-2.5 text-xs text-slate-500 text-center font-sans">
                                Data Anda otomatis tersimpan & terhubung langsung ke WhatsApp tim sales kami.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CINEMATIC ARMADA SHOWCASE BANNER ================= -->
    <section class="relative w-full overflow-hidden bg-[#070e1e] border-t border-slate-800">
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk SHACMAN PT SHINDO"
            class="w-full h-auto block select-none pointer-events-none">
    </section>

    <!-- ================= FOOTER ================= -->
    <footer id="kontak"
        class="w-full bg-[#070b19] text-slate-400 pt-10 pb-8 sm:pt-12 sm:pb-10 border-t border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 reveal-on-scroll">
                <!-- Column 1: Company Profile & Socials -->
                <div class="lg:col-span-5">
                    <a href="{{ url('/') }}" class="inline-block" aria-label="SHINDO">
                        <img src="{{ $site->footer_logo_url }}" alt="SHINDO" class="h-8 sm:h-9 w-auto object-contain">
                    </a>
                    <p class="mt-4 sm:mt-5 text-sm text-slate-400 leading-relaxed font-normal max-w-sm">
                        {{ $site->footer_description ?? 'PT Shindo Tractors Adiperkasa adalah Authorized Distributor resmi heavy-duty truck SHACMAN di Indonesia. Menyediakan unit dump truck tambang, prime mover logistik, custom karoseri, dan aftersales service terpadu di seluruh konsesi industri nasional.' }}
                    </p>
                    <!-- Social Media Links -->
                    <div class="flex items-center space-x-4 mt-6 text-slate-400">
                        @if(!empty($site->facebook_url))
                            <a href="{{ $site->facebook_url }}" target="_blank" rel="noopener noreferrer"
                                class="hover:text-white transition-colors" aria-label="Facebook">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        @endif
                        @if(!empty($site->instagram_url))
                            <a href="{{ $site->instagram_url }}" target="_blank" rel="noopener noreferrer"
                                class="hover:text-white transition-colors" aria-label="Instagram">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                        @endif
                        @if(!empty($site->linkedin_url))
                            <a href="{{ $site->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                                class="hover:text-white transition-colors" aria-label="LinkedIn">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                        @endif
                        @if(!empty($site->youtube_url))
                            <a href="{{ $site->youtube_url }}" target="_blank" rel="noopener noreferrer"
                                class="hover:text-white transition-colors" aria-label="YouTube">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Column 2: Navigasi -->
                <div class="lg:col-span-2">
                    <h4 class="text-base font-bold text-white mb-4 sm:mb-5">Navigasi</h4>
                    <ul class="space-y-2.5 sm:space-y-3 text-sm text-slate-400">
                        @foreach($site->nav_items ?? [
                                ['url' => '/', 'label' => 'Beranda'],
                                ['url' => '/produk', 'label' => 'Produk'],
                                ['url' => '/layanan', 'label' => 'Layanan'],
                                ['url' => '/tentang-kami', 'label' => 'Tentang Kami'],
                                ['url' => '/blog', 'label' => 'Blog'],
                                ['url' => '/kontak', 'label' => 'Kontak'],
                            ] as $nav)
                            <li>
                                <a href="{{ $nav['url'] ?? '#' }}" class="hover:text-white transition-colors">
                                    {{ $nav['label'] ?? '' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Column 3: Kantor & Kontak -->
                <div class="lg:col-span-3">
                    <h4 class="text-base font-bold text-white mb-4 sm:mb-5">Kantor & Kontak</h4>
                    <ul class="space-y-3 sm:space-y-4 text-sm text-slate-400">
                        @if(!empty($site->office_address))
                            <li class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-[#0067b1] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="leading-snug">{{ $site->office_address }}</span>
                            </li>
                        @endif
                        @if(!empty($site->office_phone))
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#0067b1] flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', $site->office_phone) }}"
                                    class="hover:text-white transition-colors">{{ $site->office_phone }}</a>
                            </li>
                        @endif
                        @if(!empty($site->office_email))
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#0067b1] flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $site->office_email }}"
                                    class="hover:text-white transition-colors">{{ $site->office_email }}</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <!-- Column 4: Layanan Servis -->
                <div class="lg:col-span-2">
                    <h4 class="text-base font-bold text-white mb-4 sm:mb-5">Layanan Servis</h4>
                    <div class="space-y-4">
                        @if(!empty($site->office_hours))
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">KANTOR UTAMA
                                </p>
                                <p class="text-sm text-slate-300">{{ $site->office_hours }}</p>
                            </div>
                        @endif
                        @if(!empty($site->mechanic_hours))
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">SITE MEKANIK
                                </p>
                                <p class="text-sm font-semibold text-white">{{ $site->mechanic_hours }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Line -->
            <div class="mt-8 sm:mt-10 pt-6 border-t border-slate-800/80">
                <p class="text-xs sm:text-sm text-slate-500">
                    {{ $site->copyright_text ?? ('Copyright © PT Shindo Tractors Adiperkasa, ' . date('Y') . ', All Right Reserved.') }}
                </p>
            </div>
        </div>
    </footer>


    <!-- Interactive Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Scroll Entrance Animation via IntersectionObserver
            const revealElements = document.querySelectorAll('.reveal-on-scroll, .reveal-scale');
            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-revealed');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.08,
                    rootMargin: '0px 0px -40px 0px'
                });

                revealElements.forEach(el => revealObserver.observe(el));
            } else {
                revealElements.forEach(el => el.classList.add('is-revealed'));
            }

            // Mobile Menu Toggle
            const menuBtn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('hamburger-icon');
            const close = document.getElementById('close-icon');

            if (menuBtn && menu) {
                menuBtn.addEventListener('click', function () {
                    const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
                    menuBtn.setAttribute('aria-expanded', !isExpanded);
                    menu.classList.toggle('hidden');
                    hamburger.classList.toggle('hidden');
                    close.classList.toggle('hidden');
                });
            }

            // Mobile Dump Truck Submenu Accordion
            const dumpTruckToggle = document.getElementById('mobile-dumptruck-toggle');
            const dumpTruckSubmenu = document.getElementById('mobile-dumptruck-submenu');
            const dumpTruckArrow = document.getElementById('mobile-dumptruck-arrow');

            if (dumpTruckToggle && dumpTruckSubmenu) {
                dumpTruckToggle.addEventListener('click', function () {
                    dumpTruckSubmenu.classList.toggle('hidden');
                    if (dumpTruckArrow) {
                        dumpTruckArrow.classList.toggle('rotate-180');
                    }
                });
            }

            // Hide Navbar on Scroll Down, Reveal on Scroll Up
            const header = document.getElementById('main-header');
            if (header) {
                let lastScrollTop = 0;
                const delta = 8;

                window.addEventListener('scroll', function () {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                    // Don't hide if mobile menu is currently open
                    if (menu && !menu.classList.contains('hidden')) {
                        return;
                    }

                    // Ignore tiny scroll movements
                    if (Math.abs(lastScrollTop - scrollTop) <= delta) {
                        return;
                    }

                    // Scroll Down past header -> Hide
                    if (scrollTop > lastScrollTop && scrollTop > 80) {
                        header.classList.add('-translate-y-full');
                    } else {
                        // Scroll Up or at top -> Show
                        header.classList.remove('-translate-y-full');
                    }

                    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
                }, { passive: true });
            }

            // Truck Series Tab Interactive Switcher
            const seriesData = {
                @foreach($truckSeries as $item)
                                                            '{{ $item->key ?? $item->name }}': {
                        text: '{{ $item->name ?? '' }}',
                        image: "{{ $item->image_url }}",
                        alt: 'SHACMAN {{ $item->name ?? '' }} Heavy Duty Truck',
                        desc: {!! json_encode($item->description ?? '') !!},
                        detailUrl: '{{ route('produk.series', strtolower($item->key ?? $item->name)) }}'
                    },
                @endforeach
            };

        const seriesButtons = document.querySelectorAll('.series-tab-btn');
        const bgTextEl = document.getElementById('truck-bg-text');
        const centerImageEl = document.getElementById('truck-center-image');
        const descEl = document.getElementById('truck-description');
        const detailBtnEl = document.getElementById('truck-detail-btn');

        seriesButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const seriesKey = this.getAttribute('data-series-btn');
                if (!seriesData[seriesKey]) return;

                // Update active button state (Text Tab Switcher)
                seriesButtons.forEach(b => {
                    b.classList.remove('text-[#0067b1]');
                    b.classList.add('text-slate-400');
                });
                this.classList.remove('text-slate-400');
                this.classList.add('text-[#0067b1]');

                // Smooth transition for background text and image
                bgTextEl.style.opacity = '0';
                bgTextEl.style.transform = 'scale(0.96)';
                centerImageEl.style.opacity = '0';
                centerImageEl.style.transform = 'scale(0.95)';
                descEl.style.opacity = '0';

                setTimeout(() => {
                    const data = seriesData[seriesKey];
                    bgTextEl.textContent = data.text;
                    centerImageEl.src = data.image;
                    centerImageEl.alt = data.alt;
                    descEl.innerHTML = data.desc;
                    if (detailBtnEl) {
                        detailBtnEl.href = data.detailUrl;
                    }

                    bgTextEl.style.opacity = '1';
                    bgTextEl.style.transform = 'scale(1)';
                    centerImageEl.style.opacity = '1';
                    centerImageEl.style.transform = 'scale(1)';
                    descEl.style.opacity = '1';
                }, 180);
            });
        });

        // Homepage Contact Form Submission
        const quoteForm = document.getElementById('homepage-quote-form');
        if (quoteForm) {
            quoteForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const btn = document.getElementById('quote-submit-btn');
                const btnText = document.getElementById('quote-btn-text');
                const spinner = document.getElementById('quote-btn-spinner');

                const name = document.getElementById('quote-name').value.trim();
                const phone = document.getElementById('quote-phone').value.trim();
                const email = (document.getElementById('quote-email')?.value || '').trim();
                const company = (document.getElementById('quote-company')?.value || '').trim();
                const notes = (document.getElementById('quote-notes')?.value || '').trim();

                if (!name || !phone) {
                    alert('Mohon isi nama lengkap dan nomor WhatsApp / telepon aktif Anda.');
                    return;
                }

                if (btn) {
                    btn.disabled = true;
                    if (btnText) btnText.textContent = 'Menghubungkan...';
                    if (spinner) spinner.classList.remove('hidden');
                }

                try {
                    const response = await fetch('{{ route('leads.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            name,
                            phone,
                            email,
                            company,
                            notes,
                            source: 'homepage'
                        })
                    });

                    const data = await response.json();

                    if (response.ok && data.success && data.whatsapp_url) {
                        window.location.href = data.whatsapp_url;
                    } else {
                        alert(data.message || 'Terjadi kendala saat menyimpan formulir. Silakan coba kembali.');
                        if (btn) {
                            btn.disabled = false;
                            if (btnText) btnText.textContent = 'Hubungi Kami';
                            if (spinner) spinner.classList.add('hidden');
                        }
                    }
                } catch (err) {
                    console.error('Lead submission error:', err);
                    let waNumber = '{{ preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890') }}';
                    if (waNumber.startsWith('0')) {
                        waNumber = '62' + waNumber.substring(1);
                    }
                    const fallbackText = `*Permintaan Kontak / Konsultasi - PT SHINDO*\n\n` +
                        `*Nama:* ${name}\n` +
                        `*No. WhatsApp / HP:* ${phone}\n` +
                        (company ? `*Perusahaan / Proyek:* ${company}\n` : '') +
                        (email ? `*Email:* ${email}\n` : '') +
                        (notes ? `*Kebutuhan Armada / Catatan:*\n${notes}` : '');
                    window.location.href = `https://wa.me/${waNumber}?text=${encodeURIComponent(fallbackText)}`;
                    if (btn) {
                        btn.disabled = false;
                        if (btnText) btnText.textContent = 'Hubungi Kami';
                        if (spinner) spinner.classList.add('hidden');
                    }
                }
            });
        }
        });
    </script>

    @include('partials.floating-contact')
</body>

</html>