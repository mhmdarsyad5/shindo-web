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
                        {{ $serviceSetting->hero_badge ?? ($settings->services_badge ?? 'LAYANAN AFTERSALES') }}
                    </span>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        {{ $serviceSetting->hero_title ?? ($settings->services_title ?? 'DUKUNGAN PENUH UNTUK BISNIS ANDA') }}
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        {{ $serviceSetting->hero_subtitle ?? ($settings->services_subtitle ?? 'Memastikan performa dan ketersediaan armada dump truck SHACMAN di site tambang tetap optimal dengan dukungan mekanik tersertifikasi ATPM dan pasokan suku cadang asli.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. SECTION LAYANAN (6 PILAR SEPERTI DI HOMEPAGE) ================= -->
    <section class="w-full bg-white py-14 sm:py-20 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10 lg:gap-12">
                @php
                    $defaultServiceImages = [
                        'images/service-banner-facility.jpg',
                        'images/service-banner-contract.jpg',
                        'images/service-banner-warranty.jpg',
                        'images/service-banner-parts.jpg',
                        'images/service-banner-mechanic.jpg',
                        'images/service-banner-support.jpg',
                    ];
                @endphp

                @foreach($services as $idx => $service)
                    @php
                        $fallbackImg = $defaultServiceImages[$idx % count($defaultServiceImages)];
                        $delayClass = ($idx % 3 === 0) ? 'reveal-delay-100' : (($idx % 3 === 1) ? 'reveal-delay-200' : 'reveal-delay-300');
                    @endphp
                    <div class="flex flex-col group reveal-on-scroll {{ $delayClass }}">
                        <div class="relative w-full aspect-[4/3] overflow-hidden bg-white">
                            <img src="{{ $service->resolveImageUrl($service->image, $fallbackImg) }}" alt="{{ $service->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105 select-none service-fade-mask">
                            <div class="absolute inset-x-0 bottom-0 h-14 sm:h-16 lg:h-20 service-smooth-fade pointer-events-none"></div>
                        </div>
                        <div class="pt-4 flex flex-col">
                            <span class="text-xs sm:text-sm font-sans font-bold text-[#0067b1] tracking-wider">{{ str_pad($idx + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h3 class="text-lg sm:text-xl font-bold font-sans uppercase text-slate-900 tracking-tight leading-snug mt-1 group-hover:text-[#0067b1] transition-colors">
                                {{ $service->title }}
                            </h3>
                            <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed font-normal">
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= CINEMATIC ARMADA SHOWCASE BANNER ================= -->
    <section class="relative w-full overflow-hidden bg-[#070e1e] border-t border-slate-800">
        <img src="{{ $serviceSetting->resolveImageUrl($serviceSetting->banner_image, 'images/series/pro_detail08_1.jpg') }}" alt="Armada Truk SHACMAN PT SHINDO"
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
