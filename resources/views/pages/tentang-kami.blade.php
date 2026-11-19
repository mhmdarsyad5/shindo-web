@extends('layouts.public')

@section('title', 'Tentang Kami | SHINDO')
@section('meta_description', 'Profil PT Shindo Tractors Adiperkasa, distributor utama SHACMAN Dump Truck di Indonesia dengan pengalaman lebih dari lima dekade, visi misi perusahaan, jaringan cabang, dan layanan purna jual SHASS.')

@push('styles')
    <style>
        /* Scrim Ease Gradient & Mask: Subtle, natural fade at bottom 25% */
        .service-fade-mask {
            -webkit-mask-image: linear-gradient(to bottom, #000 0%, #000 70%, rgba(0, 0, 0, 0.85) 82%, rgba(0, 0, 0, 0.35) 93%, transparent 100%);
            mask-image: linear-gradient(to bottom, #000 0%, #000 70%, rgba(0, 0, 0, 0.85) 82%, rgba(0, 0, 0, 0.35) 93%, transparent 100%);
        }

        .service-smooth-fade {
            background: linear-gradient(
                to top,
                #ffffff 0%,
                #ffffff 15%,
                rgba(255, 255, 255, 0.9) 35%,
                rgba(255, 255, 255, 0.6) 60%,
                rgba(255, 255, 255, 0.2) 85%,
                transparent 100%
            );
        }

        /* ================= COMMERCIAL VEHICLE INDUSTRIAL MOTION & UTILS ================= */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">Tentang Kami</span>
            </div>
        </div>
    </div>

    <!-- ================= 1. HERO SECTION (DENGAN GAMBAR HERO YANG SUDAH ADA) ================= -->
    <section class="relative w-full bg-[#f4f6f9] text-slate-900 border-b border-slate-200 overflow-hidden">
        <!-- Background Hero Armada Truk SHACMAN -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $about->resolveImageUrl($about->hero_image, 'images/about-shacman-fleet-bg.png') }}"
                alt="{{ $about->hero_title }}"
                class="w-full h-full object-cover object-[center_30%] opacity-20 select-none pointer-events-none scale-105 transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-t from-[#f4f6f9] via-[#f4f6f9]/85 to-[#f4f6f9]/50"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#f4f6f9] via-[#f4f6f9]/90 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 lg:py-16 relative z-10">
            <!-- Asymmetrical Split Grid: Headline + Hero Truck Visual -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Left: Authoritative Brand Information -->
                <div class="lg:col-span-7 space-y-6 reveal-on-scroll">

                    @if(!empty($about->hero_badge))
                        <span class="inline-flex items-center px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider mb-2 shadow-xs">
                            {{ $about->hero_badge }}
                        </span>
                    @endif

                    <h1
                        class="text-4xl sm:text-6xl lg:text-7xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-[0.92] tracking-tight">
                        {{ $about->hero_title }}
                    </h1>

                    <p
                        class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-[#0067b1] tracking-wide">
                        {{ $about->hero_subtitle }}
                    </p>

                    <div class="border-l-4 border-l-[#0067b1] bg-white p-5 sm:p-6 border border-slate-200 shadow-xs">
                        <p class="text-slate-700 text-sm sm:text-base leading-relaxed">
                            {{ $about->hero_description }}
                        </p>
                    </div>

                </div>

                <!-- Right: High-Impact Truck Showcase Visual -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-delay-150">
                    <div class="relative bg-white p-3 sm:p-4 border-2 border-slate-200 shadow-xl group">
                        <!-- Corner Crosshairs -->
                        <div class="absolute -top-1.5 -left-1.5 w-3.5 h-3.5 border-t-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -top-1.5 -right-1.5 w-3.5 h-3.5 border-t-2 border-r-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-1.5 -left-1.5 w-3.5 h-3.5 border-b-2 border-l-2 border-[#0067b1]">
                        </div>
                        <div class="absolute -bottom-1.5 -right-1.5 w-3.5 h-3.5 border-b-2 border-r-2 border-[#0067b1]">
                        </div>

                        <div class="relative overflow-hidden aspect-[4/3] bg-slate-100 flex items-center justify-center">
                            <img src="{{ $about->resolveImageUrl($about->hero_image, 'images/about-shacman-fleet-bg.png') }}"
                                alt="{{ $about->hero_title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 select-none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#00163c]/75 via-transparent to-transparent pointer-events-none">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= 2. SECTION: DISTRIBUTOR UTAMA SHACMAN DUMP TRUCK ================= -->
    <section class="w-full bg-white py-16 sm:py-24 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- Left Column: Dealer Information & Engineering Specs -->
                <div class="lg:col-span-6 space-y-6 reveal-on-scroll">
                    <div>
                        <h2
                            class="text-3xl sm:text-4xl lg:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c] leading-[1.02]">
                            {!! nl2br(e($about->profile_title)) !!}
                        </h2>
                    </div>

                    <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-normal">
                        {{ $about->profile_description }}
                    </p>

                    <div class="pt-2">
                        <a href="{{ url($about->profile_cta_url ?: '/produk') }}"
                            class="inline-flex items-center px-8 py-3.5 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed not-italic tracking-wider transition-all duration-200 shadow-sm hover:shadow-md group">
                            <span>{{ $about->profile_cta_text ?: 'Lihat Katalog Truck' }}</span>
                            <svg class="w-4 h-4 ml-2.5 transform group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Truck Photo in Architectural Showcase Frame -->
                <div class="lg:col-span-6 reveal-on-scroll reveal-delay-200">
                    <div class="relative bg-white p-3 sm:p-5 border-2 border-slate-200 shadow-xl">
                        <!-- Corner Crosshairs -->
                        <div class="absolute -top-2 -left-2 w-4 h-4 border-t-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -top-2 -right-2 w-4 h-4 border-t-2 border-r-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -left-2 w-4 h-4 border-b-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -right-2 w-4 h-4 border-b-2 border-r-2 border-[#0067b1]"></div>

                        <div
                            class="relative overflow-hidden aspect-[4/3] bg-gradient-to-b from-slate-50 to-slate-100 flex items-center justify-center p-2">
                            <img src="{{ $about->resolveImageUrl($about->profile_image, 'images/about-truck.png') }}"
                                alt="SHACMAN Dump Truck PT Shindo Tractors Adiperkasa"
                                class="w-full h-full object-contain select-none transform hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 3. SECTION: VISI & MISI PERUSAHAAN (SESUAI DEALERSHACMAN.COM) ================= -->
    <section class="w-full bg-[#f4f6f9] py-16 sm:py-24 border-b border-slate-200 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Intro -->
            <div class="text-center max-w-3xl mx-auto mb-14 reveal-on-scroll">
                <h2
                    class="text-3xl sm:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c]">
                    VISI & MISI KAMI
                </h2>
            </div>

            <!-- Visi & Misi Side-by-Side Architectural Presentation -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">

                <!-- VISI CARD -->
                <div
                    class="lg:col-span-5 bg-white border border-slate-300 border-t-4 border-t-[#00163c] p-6 sm:p-8 shadow-sm flex flex-col justify-between reveal-on-scroll reveal-delay-100">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span
                                class="px-3.5 py-1 bg-[#00163c] text-white text-xs font-sans font-bold uppercase tracking-wider">
                                {{ $about->vision_badge ?: 'VISI' }}
                            </span>
                        </div>

                        <h3
                            class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] mb-4">
                            {{ $about->vision_title }}
                        </h3>

                        <div class="bg-slate-50 border-l-4 border-l-[#00163c] p-4 sm:p-5 mb-6">
                            <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-medium">
                                "{{ $about->vision_text }}"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- MISI CARD -->
                <div
                    class="lg:col-span-7 bg-white border border-slate-300 border-t-4 border-t-[#0067b1] p-6 sm:p-8 shadow-sm flex flex-col justify-between reveal-on-scroll reveal-delay-200">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span
                                class="px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider">
                                {{ $about->mission_badge ?: 'MISI' }}
                            </span>
                        </div>

                        <h3
                            class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] mb-4">
                            {{ $about->mission_title }}
                        </h3>

                        <!-- Poin Misi -->
                        <div class="space-y-4 font-sans mb-6">
                            @foreach($about->mission_items ?? [] as $misi)
                                <div
                                    class="p-4 bg-slate-50 border border-slate-200 flex items-start gap-3.5 hover:border-[#0067b1] transition-colors">
                                    <span
                                        class="w-6 h-6 rounded-full bg-[#0067b1] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">{{ $misi['number'] ?? $loop->iteration }}</span>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wide">
                                            {{ $misi['title'] ?? '' }}
                                        </h4>
                                        <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                            {{ $misi['description'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ================= 4. SECTION: LAYANAN PURNA JUAL SHASS ================= -->
    <section class="w-full bg-white text-slate-900 py-16 sm:py-24 border-b border-slate-200 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Intro: Balanced Editorial Layout ala Halaman Layanan -->
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12 sm:mb-16 reveal-on-scroll">
                <div class="max-w-2xl">
                    <span
                        class="inline-flex items-center px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider mb-3 shadow-xs">
                        {{ $about->shass_badge ?: 'LAYANAN AFTERSALES' }}
                    </span>
                    <h2
                        class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c] leading-none">
                        {{ $about->shass_title }}
                    </h2>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        {{ $about->shass_subtitle }}
                    </p>
                </div>
            </div>

            <!-- 4 Keunggulan SHASS: Minimalist Editorial Cards ala Halaman Layanan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
                @foreach($about->shass_items ?? [] as $shass)
                    <div class="flex flex-col group reveal-on-scroll">
                        <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                            <img src="{{ $about->resolveImageUrl($shass['image'] ?? null, 'images/service-banner-mechanic.jpg') }}" alt="{{ $shass['title'] ?? '' }}"
                                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                            <div
                                class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none">
                            </div>
                        </div>
                        <div class="pt-4 flex flex-col">
                            <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">{{ $shass['number'] ?? '0' . $loop->iteration }}</span>
                            <h3
                                class="text-base sm:text-lg font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                                {{ $shass['title'] ?? '' }}
                            </h3>
                            <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                                {{ $shass['description'] ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= 5. SECTION: GAMBAR BRANCH (ALAMAT & LOKASI CABANG DEALER) ================= -->
    <section class="w-full bg-[#f4f6f9] py-16 sm:py-24 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs font-sans font-bold uppercase tracking-widest text-[#0067b1] block mb-2">
                    {{ $about->branches_badge ?: 'ALAMAT & LOKASI' }}
                </span>
                <h2
                    class="text-3xl sm:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c]">
                    {{ $about->branches_title }}
                </h2>
                <p class="mt-3 text-slate-600 text-sm sm:text-base leading-relaxed">
                    {{ $about->branches_subtitle }}
                </p>
            </div>

            <!-- Showcase Gambar Branch (Peta Jaringan Cabang dari dealershacman.com) -->
            <div class="bg-white p-3 sm:p-6 border-2 border-slate-200 shadow-xl reveal-on-scroll">
                <div class="relative overflow-hidden bg-slate-100 flex items-center justify-center">
                    <img src="{{ $about->resolveImageUrl($about->branches_map_image, 'images/about-branch-map.jpg') }}"
                        alt="{{ $about->branches_title }}"
                        class="w-full h-auto max-h-[550px] object-contain select-none">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 6. SECTION: KOMITMEN KEMITRAAN JANGKA PANJANG ================= -->
    <section class="w-full bg-white py-16 sm:py-24 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- Left Column: Big Panoramic Image with Heavy Border -->
                <div class="lg:col-span-6 order-2 lg:order-1 reveal-on-scroll">
                    <div class="relative bg-white p-3 sm:p-5 border-2 border-slate-200 shadow-xl">
                        <!-- Corner Crosshairs -->
                        <div class="absolute -top-2 -left-2 w-4 h-4 border-t-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -top-2 -right-2 w-4 h-4 border-t-2 border-r-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -left-2 w-4 h-4 border-b-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -right-2 w-4 h-4 border-b-2 border-r-2 border-[#0067b1]"></div>

                        <div class="relative overflow-hidden bg-slate-100 aspect-[4/3] flex items-center justify-center">
                            <img src="{{ $about->resolveImageUrl($about->commitment_image, 'images/about-shacman-fleet-bg.png') }}"
                                alt="{{ $about->commitment_title }}"
                                class="w-full h-full object-cover select-none">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#00163c]/50 via-transparent to-transparent">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Copywriting & Commitments -->
                <div class="lg:col-span-6 order-1 lg:order-2 space-y-6 reveal-on-scroll reveal-delay-200">
                    <div>
                        <h2
                            class="text-3xl sm:text-4xl lg:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c] leading-[1.02]">
                            {{ $about->commitment_title }}
                        </h2>
                    </div>

                    <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-normal">
                        {{ $about->commitment_subtitle }}
                    </p>

                    <!-- Core Commitments: Industrial Protocol Rows with Distinct Identifiers -->
                    <div class="space-y-4 pt-1 font-sans">
                        @foreach($about->commitment_items ?? [] as $komitmen)
                            <div
                                class="p-5 sm:p-6 bg-[#f8fafc] border border-slate-200 shadow-xs flex items-start gap-4 hover:border-[#0067b1] hover:bg-white transition-all">
                                <span
                                    class="text-3xl font-bold font-barlow-condensed text-[#0067b1] leading-none flex-shrink-0 mt-0.5">
                                    {{ $komitmen['number'] ?? '0' . $loop->iteration }}
                                </span>
                                <div>
                                    <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                        {{ $komitmen['title'] ?? '' }}
                                    </h3>
                                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                        {{ $komitmen['description'] ?? '' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
        });
    </script>
@endpush