@extends('layouts.public')

@section('title', 'Spareparts | SHINDO')
@section('meta_description', 'Katalog sparepart resmi dump truck SHACMAN: Cabin Parts, Electrical Parts, Engine Parts, Chassis Parts, Others Parts, serta layanan mekanik on-site 24/7 di seluruh Indonesia.')

@php
    $waNumber = $site->whatsapp ?: '6282128889556';

    $categories = $sparepartsConfig['categories'] ?? [];
    $items = $sparepartsConfig['items'] ?? [];

    $groupedItems = [];
    foreach ($categories as $catKey => $catMeta) {
        $groupedItems[$catKey] = [];
    }
    foreach ($items as $item) {
        $groupedItems[$item['category']][] = $item;
    }
@endphp

@push('styles')
    <style>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">Spareparts</span>
            </div>
        </div>
    </div>

    <!-- ================= 1. PAGE HEADER (MATCHING HALAMAN LAYANAN) ================= -->
    <section class="w-full bg-white py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 reveal-on-scroll">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider mb-3 shadow-xs">
                        {{ $spareparts->hero_badge ?: 'SPAREPARTS SUPPORT' }}
                    </span>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        {{ $spareparts->hero_title ?: 'SUKU CADANG RESMI & MEKANIK 24 JAM' }}
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        {{ $spareparts->hero_subtitle ?: 'Pasokan lengkap suku cadang original SHACMAN untuk menjaga produktivitas operasional tambang, konstruksi, dan logistik tanpa hambatan downtime.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. KATALOG SPAREPARTS PER KATEGORI ================= -->
    <section class="w-full bg-white py-14 sm:py-20 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-12 sm:space-y-14">
                @foreach($categories as $catKey => $catInfo)
                    @php
                        $catItems = $groupedItems[$catKey] ?? [];
                        $stepNum = str_pad((string) ($loop->iteration), 2, '0', STR_PAD_LEFT);
                    @endphp
                    <section class="reveal-on-scroll">
                        {{-- Category Heading Bar with Shindo Blue Background --}}
                        <div class="bg-[#0067b1] px-5 py-3 flex items-center justify-between mb-7 shadow-xs">
                            <div class="flex items-center gap-3">
                                <span class="px-2 py-0.5 bg-white/15 border border-white/25 text-xs font-sans font-bold text-white tracking-wider">{{ $stepNum }}</span>
                                <h2 class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-white tracking-wide leading-none">
                                    {{ $catInfo['label'] }}
                                </h2>
                            </div>
                            <span class="text-xs font-sans font-bold uppercase tracking-wider text-white/90">
                                {{ count($catItems) }} Parts
                            </span>
                        </div>

                        {{-- Clean Bordered Image + Part Name Grid --}}
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-5 gap-y-8">
                            @foreach($catItems as $item)
                                <div class="flex flex-col items-center text-center group">
                                    <div class="w-24 h-24 sm:w-28 sm:h-28 bg-white border border-slate-200 group-hover:border-[#0067b1] flex items-center justify-center p-2.5 transition-colors">
                                        <img src="{{ asset($item['image']) }}"
                                             alt="{{ $item['name'] }} - {{ $catInfo['label'] }} SHACMAN"
                                             loading="lazy"
                                             class="max-h-20 w-auto max-w-full object-contain">
                                    </div>
                                    <h3 class="mt-2.5 text-xs sm:text-sm font-sans font-bold text-slate-900 uppercase tracking-tight leading-snug max-w-[150px] group-hover:text-[#0067b1] transition-colors">
                                        {{ $item['name'] }}
                                    </h3>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>

            {{-- Single Order / Tanya CTA at bottom of catalog --}}
            <div class="mt-14 pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 reveal-on-scroll">
                <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] tracking-tight leading-none">
                    Pemesanan &amp; Konsultasi Suku Cadang Resmi
                </h3>
                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($spareparts->whatsapp_message ?: 'Halo Shindo, saya ingin order / tanya ketersediaan dan harga sparepart SHACMAN.') }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-full sm:w-auto shrink-0 inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-[#0067b1] hover:bg-[#004f8a] text-white text-xs sm:text-sm font-sans font-bold uppercase tracking-wider transition-colors shadow-xs">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    {{ $spareparts->whatsapp_button_text ?: 'Hubungi Kami' }}
                </a>
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
        document.addEventListener('DOMContentLoaded', () => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const revealElements = document.querySelectorAll('.reveal-on-scroll');

            if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                revealElements.forEach((el) => el.classList.add('is-revealed'));
            } else {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-revealed');
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

                revealElements.forEach((el) => observer.observe(el));
            }
        });
    </script>
@endpush
