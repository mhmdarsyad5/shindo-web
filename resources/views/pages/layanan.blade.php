@extends('layouts.public')

@section('title', 'Layanan Purna Jual | SHINDO')
@section('meta_description', 'Layanan aftersales resmi dump truck SHACMAN Indonesia: periodic maintenance, mobile on-site mechanic 24/7, pasokan genuine spare parts Weichai dan FAST, serta kontrak servis armada.')

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
        .reveal-delay-400 { transition-delay: 400ms; }

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
                <span class="text-[#00163c] font-bold">Layanan</span>
            </div>
        </div>
    </div>

    <!-- ================= 1. PAGE HEADER (TERANG & BERSIH SEPERTI SERIES PRODUK) ================= -->
    <section class="w-full bg-white py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 reveal-on-scroll">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider mb-3 shadow-xs">
                        {{ $settings->services_badge ?? 'LAYANAN AFTERSALES' }}
                    </span>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        {{ $settings->services_title ?? 'DUKUNGAN PENUH UNTUK BISNIS ANDA' }}
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        {{ $settings->services_subtitle ?? 'Memastikan performa dan ketersediaan armada dump truck SHACMAN di site tambang tetap optimal dengan dukungan mekanik tersertifikasi ATPM dan pasokan suku cadang asli.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. SECTION LAYANAN (6 PILAR SEPERTI DI HOMEPAGE) ================= -->
    <section class="w-full bg-white py-14 sm:py-20 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10 lg:gap-12">

                <!-- 01. Penjualan Unit Baru -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-100">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-facility.jpg') }}" alt="Penjualan Unit Baru"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">01</span>
                        <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            Penjualan Unit Baru
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Pengadaan unit baru SHACMAN bergaransi resmi untuk kebutuhan tambang, konstruksi, dan logistik angkutan berat di seluruh Indonesia.
                        </p>
                    </div>
                </div>

                <!-- 02. Program Kontak Servis -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-200">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-contract.jpg') }}" alt="Program Kontak Servis"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">02</span>
                        <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            Program Kontak Servis
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Konsultasi teknis langsung, penjadwalan servis berkala, dan penanganan cepat kendala unit dengan skema kemitraan yang fleksibel.
                        </p>
                    </div>
                </div>

                <!-- 03. Garansi Terjamin -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-300">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-warranty.jpg') }}" alt="Garansi Terjamin"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">03</span>
                        <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            Garansi Terjamin
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Perlindungan garansi resmi pabrikan untuk mesin Weichai, transmisi FAST, dan gardan Hande demi ketenangan operasional bisnis Anda.
                        </p>
                    </div>
                </div>

                <!-- 04. Suku Cadang Asli -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-100">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-parts.jpg') }}" alt="Suku Cadang Asli"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">04</span>
                        <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            Suku Cadang Asli
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Ketersediaan suku cadang orisinal lengkap dan cepat untuk meminimalkan masa tunggu perbaikan dan menjaga keaslian unit Anda.
                        </p>
                    </div>
                </div>

                <!-- 05. Servis & Perawatan Rutin -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-200">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-mechanic.jpg') }}" alt="Servis & Perawatan Rutin"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">05</span>
                        <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            Servis & Perawatan Rutin
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Pemeliharaan berkala terjadwal oleh mekanik bersertifikasi demi menjaga performa puncak mesin, transmisi, dan efisiensi bahan bakar armada.
                        </p>
                    </div>
                </div>

                <!-- 06. Dukungan Layanan 24/7 -->
                <div class="flex flex-col group reveal-on-scroll reveal-delay-300">
                    <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                        <img src="{{ asset('images/service-banner-support.jpg') }}" alt="Dukungan Layanan 24/7"
                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                        <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                    </div>
                    <div class="pt-4 flex flex-col">
                        <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">06</span>
                        <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                            Dukungan Layanan 24/7
                        </h3>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                            Tim teknisi storing darurat siaga 24 jam dengan armada mobile service siap meluncur langsung ke site kerja Anda.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 3. SECTION KEUNGGULAN OPERASIONAL (PERSIS SEPERTI HOMEPAGE DENGAN BG NAV BLUE #0067b1) ================= -->
    @php
        $advantages = !empty($settings->advantages_items) ? $settings->advantages_items : [
            [
                'title' => 'Torsi Mesin Weichai Lebih Tangguh',
                'description' => 'Tenaga maksimal di putaran rendah, dirancang khusus untuk tanjakan terjal dan muatan tambang ekstrem.',
                'icon' => 'cpu'
            ],
            [
                'title' => 'Efisiensi Bahan Bakar Optimal',
                'description' => 'Sistem injeksi common rail generasi terbaru membantu memangkas biaya operasional solar secara signifikan.',
                'icon' => 'fuel'
            ],
            [
                'title' => 'Kabin Nyaman & Standar Aman',
                'description' => 'Ruang kemudi ergonomis dengan suspensi kabin empuk dan visibilitas luas untuk keselamatan pengemudi.',
                'icon' => 'truck'
            ],
            [
                'title' => 'Suku Cadang Asli Terjamin',
                'description' => 'Ketersediaan komponen mesin Weichai, transmisi FAST, dan gardan Hande terjamin di seluruh jaringan dealer.',
                'icon' => 'cog'
            ]
        ];
    @endphp

    <section id="keunggulan" class="w-full bg-[#0067b1] py-12 sm:py-16 lg:py-20 border-t border-[#005a9c]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-6 sm:mb-10 reveal-on-scroll">
                @if(!empty($settings->advantages_badge))
                    <span class="inline-flex items-center px-3.5 py-1 bg-white/15 border border-white/30 text-white text-xs font-sans font-bold uppercase tracking-wider mb-2.5">
                        {{ $settings->advantages_badge }}
                    </span>
                @else
                    <span class="inline-flex items-center px-3.5 py-1 bg-white/15 border border-white/30 text-white text-xs font-sans font-bold uppercase tracking-wider mb-2.5">
                        KEUNGGULAN OPERASIONAL
                    </span>
                @endif
                <h2 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase text-white font-barlow-condensed not-italic leading-none tracking-tight drop-shadow-xs">
                    {{ $settings->advantages_title ?? 'MENGAPA MEMILIH SHACMAN?' }}
                </h2>
                @if(!empty($settings->advantages_subtitle))
                    <p class="mt-2.5 text-blue-100 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed font-normal">
                        {{ $settings->advantages_subtitle }}
                    </p>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($advantages as $idx => $adv)
                    <div class="bg-white p-5 sm:p-6 hover:shadow-xl transition-all duration-300 shadow-md group flex flex-col items-center text-center reveal-on-scroll {{ $idx === 0 ? 'reveal-delay-100' : ($idx === 1 ? 'reveal-delay-200' : ($idx === 2 ? 'reveal-delay-300' : 'reveal-delay-400')) }}">
                        <div class="w-12 h-12 border border-slate-200 bg-slate-50 text-[#0067b1] flex items-center justify-center mb-3.5 group-hover:bg-[#0067b1] group-hover:border-[#0067b1] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            @if(($adv['icon'] ?? '') === 'cpu' || str_contains(strtolower($adv['title'] ?? ''), 'torsi') || str_contains(strtolower($adv['title'] ?? ''), 'mesin'))
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <rect x="4" y="4" width="16" height="16" stroke-linecap="round" stroke-linejoin="round" />
                                    <rect x="9" y="9" width="6" height="6" stroke-linecap="round" stroke-linejoin="round" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3" />
                                </svg>
                            @elseif(($adv['icon'] ?? '') === 'fuel' || str_contains(strtolower($adv['title'] ?? ''), 'bbm') || str_contains(strtolower($adv['title'] ?? ''), 'solar') || str_contains(strtolower($adv['title'] ?? ''), 'efisiensi'))
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v16a1 1 0 001 1h8a1 1 0 001-1V4a1 1 0 00-1-1H5a1 1 0 00-1 1z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 6h4v4H7V6z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 9h2a2 2 0 012 2v7a2 2 0 002 2 2 2 0 002-2V9.828a2 2 0 00-.586-1.414l-2.828-2.828" />
                                </svg>
                            @elseif(($adv['icon'] ?? '') === 'truck' || str_contains(strtolower($adv['title'] ?? ''), 'kabin') || str_contains(strtolower($adv['title'] ?? ''), 'aman') || str_contains(strtolower($adv['title'] ?? ''), 'keselamatan'))
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M1 3h14v13H1V3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 8h4l3 3.5V16h-7V8z" />
                                    <circle cx="5.5" cy="18.5" r="2.5" />
                                    <circle cx="17.5" cy="18.5" r="2.5" />
                                </svg>
                            @elseif(($adv['icon'] ?? '') === 'cog' || str_contains(strtolower($adv['title'] ?? ''), 'suku cadang') || str_contains(strtolower($adv['title'] ?? ''), 'sparepart') || str_contains(strtolower($adv['title'] ?? ''), 'cadang'))
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @else
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                        </div>
                        <h3 class="font-bold text-base sm:text-lg font-barlow-condensed uppercase not-italic text-slate-900 leading-snug">
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

    <!-- ================= CINEMATIC ARMADA SHOWCASE BANNER ================= -->
    <section class="relative w-full overflow-hidden bg-[#070e1e] border-t border-slate-800">
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk SHACMAN PT SHINDO"
            class="w-full h-auto block select-none pointer-events-none">
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Scroll Entrance Animation Observer
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
