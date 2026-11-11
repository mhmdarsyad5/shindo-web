<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SHINDO | Dealer Resmi SHACMAN Indonesia')</title>

    <meta name="description"
        content="@yield('meta_description', 'Authorized Dealer Resmi SHACMAN Indonesia - Solusi Truk Heavy Duty Terbaik & Tangguh di Segala Medan.')">

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
    </style>
    @stack('styles')
</head>

<body
    class="bg-white text-neutral-900 antialiased min-h-screen flex flex-col overflow-x-hidden selection:bg-[#0067b1] selection:text-white">

    <!-- ================= HEADER WRAPPER ================= -->
    <header id="main-header" class="w-full flex-shrink-0 sticky top-0 z-50 shadow-md transition-transform duration-300 ease-in-out">
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
                                    class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-sm transition-colors {{ $isProdukActive ? 'bg-[#004880] text-white font-medium' : 'text-white/85 hover:text-white hover:bg-white/10 font-medium' }}">
                                    <span>Produk</span>
                                    <svg class="w-3.5 h-3.5 transition-transform duration-250 ease-out group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
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
                                class="inline-flex items-center px-3.5 py-1.5 text-sm transition-colors {{ $isActive ? 'bg-[#004880] text-white font-medium' : 'text-white/85 hover:text-white hover:bg-white/10 font-medium' }}">
                                <span>{{ $nav['label'] ?? '' }}</span>
                            </a>
                        @endif
                    @endforeach
                </nav>

                <!-- Desktop CTA Button -->
                <div class="hidden md:flex items-center">
                    <a href="{{ $site->cta_url ?? '/kontak' }}"
                        class="bg-[#004880] hover:bg-[#003d6d] text-white text-xs sm:text-sm font-medium px-5 sm:px-6 py-2 sm:py-2.5 border border-[#005a9c]/50 shadow-sm transition-all duration-200 hover:scale-[1.02]">
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
        <div id="mobile-menu" class="hidden md:hidden bg-[#005a9c] border-t border-[#004b87] px-4 pt-3 pb-5 space-y-2">
            @foreach($site->nav_items ?? [] as $nav)
                @php
                    $isDumpTruck = ($nav['label'] ?? '') === 'Dump Truck' || ($nav['label'] ?? '') === 'Produk' || str_contains($nav['url'] ?? '', 'produk');
                    $targetPath = ltrim($nav['url'] ?? '', '/');
                    $isActive = empty($targetPath) ? request()->is('/') : request()->is($targetPath, $targetPath . '/*');
                @endphp

                @if($isDumpTruck)
                    @php
                        $isProdukActive = request()->is('produk*');
                    @endphp
                    <!-- Mobile Accordion for Dump Truck -->
                    <div class="space-y-1">
                        <button type="button" id="mobile-dumptruck-toggle"
                            class="w-full flex items-center justify-between px-3.5 py-2.5 text-base transition-colors {{ $isProdukActive ? 'bg-[#004880] text-white font-medium' : 'text-white hover:bg-white/10 font-medium' }}">
                            <span>Produk</span>
                            <svg id="mobile-dumptruck-arrow" class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                        class="block px-3.5 py-2.5 text-base transition-colors {{ $isActive ? 'bg-[#004880] text-white font-medium' : 'text-white hover:bg-white/10 font-medium' }}">
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

    <!-- ================= MAIN CONTENT SLOT ================= -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- ================= FOOTER ================= -->
    <footer id="footer" class="w-full bg-[#070d1e] text-slate-400 py-12 sm:py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Column 1: Brand Info -->
                <div class="lg:col-span-4 flex flex-col items-start space-y-4">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="{{ $site->footer_logo_url }}" alt="PT SHINDO" class="h-9 sm:h-11 w-auto object-contain">
                    </a>
                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-sm">
                        {{ $site->footer_description ?? 'PT Shindo Tracktors Adiperkasa adalah agen penyalur resmi dump truck SHACMAN andal di Indonesia. Berkomitmen tinggi menjaga ritase kerja tambang dan konstruksi nasional Anda tetap optimal tanpa hambatan.' }}
                    </p>
                    <!-- Social Media Links -->
                    <div class="flex items-center space-x-3 pt-2">
                        @if(!empty($site->facebook_url))
                            <a href="{{ $site->facebook_url }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-[#0067b1] text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        @endif
                        @if(!empty($site->instagram_url))
                            <a href="{{ $site->instagram_url }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-[#0067b1] text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        @endif
                        @if(!empty($site->youtube_url))
                            <a href="{{ $site->youtube_url }}" target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-[#0067b1] text-slate-300 hover:text-white flex items-center justify-center transition-colors">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Column 2: Navigasi -->
                <div class="lg:col-span-2">
                    <h4 class="text-base font-bold text-white mb-4 sm:mb-5">Navigasi</h4>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        @foreach($site->nav_items ?? [
                            ['url' => '/', 'label' => 'Beranda'],
                            ['url' => '/produk', 'label' => 'Produk'],
                            ['url' => '/layanan', 'label' => 'Layanan'],
                            ['url' => '/spareparts', 'label' => 'Spareparts'],
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

                <!-- Column 3: Kontak Kami -->
                <div class="lg:col-span-4">
                    <h4 class="text-base font-bold text-white mb-4 sm:mb-5">Kontak Kami</h4>
                    <ul class="space-y-3 sm:space-y-4 text-sm text-slate-400">
                        @if(!empty($site->office_address))
                            <li class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-[#0067b1] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="leading-snug">{{ $site->office_address }}</span>
                            </li>
                        @endif
                        @if(!empty($site->office_phone))
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#0067b1] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <a href="tel:{{ preg_replace('/[^0-9]/', '', $site->office_phone) }}" class="hover:text-white transition-colors">{{ $site->office_phone }}</a>
                            </li>
                        @endif
                        @if(!empty($site->office_email))
                            <li class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#0067b1] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $site->office_email }}" class="hover:text-white transition-colors">{{ $site->office_email }}</a>
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
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">KANTOR UTAMA</p>
                                <p class="text-sm text-slate-300">{{ $site->office_hours }}</p>
                            </div>
                        @endif
                        @if(!empty($site->mechanic_hours))
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">SITE MEKANIK</p>
                                <p class="text-sm font-semibold text-white">{{ $site->mechanic_hours }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Line -->
            <div class="mt-12 sm:mt-16 pt-8 border-t border-slate-800/80">
                <p class="text-xs sm:text-sm text-slate-500">
                    {{ $site->copyright_text ?? ('Copyright © PT Shindo Tractors Adiperkasa, ' . date('Y') . ', All Right Reserved.') }}
                </p>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
        });
    </script>
    @stack('scripts')

    @include('partials.floating-contact')
</body>

</html>
