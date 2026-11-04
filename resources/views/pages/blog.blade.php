@extends('layouts.public')

@section('title', 'Berita & Wawasan Teknis Truk | PT SHINDO Authorized Dealer')
@section('meta_description', 'Update artikel teknis, panduan perawatan dump truck tambang, wawasan efisiensi bahan bakar, dan berita terkini industri kendaraan komersial SHACMAN di Indonesia.')

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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">Berita & Artikel</span>
            </div>
        </div>
    </div>

    <!-- ================= 1. PAGE HEADER (TERANG & BERSIH) ================= -->
    <section class="w-full bg-white py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 reveal-on-scroll">
                <div class="max-w-2xl">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        BLOG & ARTIKEL TERBARU
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        Informasi terkini mengenai inovasi armada SHACMAN, tips perawatan mesin Weichai, panduan keselamatan hauling tambang, dan perkembangan industri alat berat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. ARTICLES SECTION ================= -->
    <section class="w-full bg-[#f8fafc] py-12 sm:py-16 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @php
                $featuredPost = $posts->first();
                $regularPosts = $posts->skip(1);
            @endphp

            @if($featuredPost)
                <!-- Featured Article Highlight -->
                <div class="mb-10 sm:mb-12 bg-white border border-slate-200 overflow-hidden hover:border-[#0067b1] transition-all shadow-xs hover:shadow-md reveal-on-scroll">
                    <div class="grid grid-cols-1 lg:grid-cols-12">
                        <div class="lg:col-span-7 h-64 sm:h-80 lg:h-auto bg-slate-900 overflow-hidden relative">
                            <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}"
                                class="w-full h-full object-cover">
                            <div class="absolute top-3 left-3 bg-[#00163c] text-white px-2.5 py-1 text-xs font-sans font-bold uppercase tracking-wider">
                                FEATURED ARTICLE
                            </div>
                        </div>
                        <div class="lg:col-span-5 p-6 sm:p-8 flex flex-col justify-between bg-white">
                            <div>
                                <div class="flex items-center space-x-3 text-xs font-sans text-slate-500 mb-2">
                                    <span class="text-[#0067b1] font-bold">TECHNICAL UPDATE</span>
                                    <span>•</span>
                                    <span>{{ $featuredPost->published_at?->format('d M Y') ?? date('d M Y') }}</span>
                                </div>
                                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] leading-tight">
                                    <a href="{{ url('/blog/' . $featuredPost->slug) }}"
                                        class="hover:text-[#0067b1] transition-colors">
                                        {{ $featuredPost->title }}
                                    </a>
                                </h2>
                                <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3">
                                    {{ $featuredPost->excerpt }}
                                </p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <a href="{{ url('/blog/' . $featuredPost->slug) }}"
                                    class="inline-flex items-center space-x-1.5 font-bold text-xs uppercase font-barlow-condensed not-italic tracking-wider text-[#0067b1] hover:text-[#004880] transition-colors">
                                    <span>Baca Artikel Lengkap</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                                <span class="text-[11px] font-sans text-slate-400">BERITA TEKNIS</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Regular Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($regularPosts as $idx => $post)
                    <article class="bg-white border border-slate-200 hover:border-[#0067b1] transition-all duration-300 flex flex-col justify-between shadow-xs hover:shadow-md reveal-on-scroll {{ $idx % 3 === 0 ? 'reveal-delay-100' : ($idx % 3 === 1 ? 'reveal-delay-200' : 'reveal-delay-300') }}">
                        <div>
                            <!-- Thumbnail -->
                            <div class="h-44 sm:h-48 w-full overflow-hidden bg-slate-900 relative">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                <div class="absolute bottom-2 left-2 bg-black/70 text-slate-200 text-[10px] font-sans px-2 py-0.5">
                                    {{ $post->published_at?->format('d M Y') ?? date('d M Y') }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <div class="text-[11px] font-sans font-bold text-[#0067b1] uppercase tracking-wider mb-1.5">
                                    INSIGHT & OPERASIONAL
                                </div>
                                <h3 class="text-xl font-bold font-barlow-condensed uppercase not-italic text-slate-900 hover:text-[#0067b1] transition-colors leading-snug">
                                    <a href="{{ url('/blog/' . $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                            </div>
                        </div>

                        <!-- Read Link -->
                        <div class="px-5 py-3 border-t border-slate-100 bg-slate-50 flex items-center justify-between">
                            <a href="{{ url('/blog/' . $post->slug) }}"
                                class="inline-flex items-center space-x-1 text-xs font-bold font-barlow-condensed not-italic uppercase tracking-wider text-[#0067b1] hover:text-[#004880] transition-colors">
                                <span>Detail Artikel</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <span class="text-[10px] font-sans text-slate-400">SHACMAN ID</span>
                        </div>
                    </article>
                @empty
                    @if(!$featuredPost)
                        <div class="col-span-full bg-white border border-slate-200 p-10 text-center text-slate-500 font-sans text-xs">
                            Belum ada artikel teknis yang dipublikasikan saat ini.
                        </div>
                    @endif
                @endforelse
            </div>

            <!-- Pagination -->
            @if(method_exists($posts, 'links'))
                <div class="mt-10">
                    {{ $posts->links() }}
                </div>
            @endif

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
