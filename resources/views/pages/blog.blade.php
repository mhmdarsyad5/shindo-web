@extends('layouts.public')

@section('title', 'Blog & Berita | SHINDO')
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
                @if(!empty($activeTagName))
                    <a href="{{ route('blog') }}" class="hover:text-[#0067b1] transition-colors">Berita & Artikel</a>
                    <span class="text-slate-300">/</span>
                    <span class="text-[#00163c] font-bold">#{{ $activeTagName }}</span>
                @elseif(!empty($activeCategory) || !empty($activeCategorySlug))
                    <a href="{{ route('blog') }}" class="hover:text-[#0067b1] transition-colors">Berita & Artikel</a>
                    <span class="text-slate-300">/</span>
                    <span class="text-[#00163c] font-bold">{{ $activeCategory?->name ?? ucwords(str_replace('-', ' ', (string) $activeCategorySlug)) }}</span>
                @else
                    <span class="text-[#00163c] font-bold">Berita & Artikel</span>
                @endif
            </div>
        </div>
    </div>

    <!-- ================= 1. PAGE HEADER (TERANG & BERSIH) ================= -->
    <section class="w-full bg-white py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 reveal-on-scroll">
                <div class="max-w-2xl">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        {{ $site->blog_page_title ?: 'BLOG & ARTIKEL TERBARU' }}
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        {{ $site->blog_page_subtitle ?: 'Informasi terkini mengenai inovasi armada SHACMAN, tips perawatan mesin Weichai, panduan keselamatan hauling tambang, dan perkembangan industri alat berat.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. ARTICLES SECTION ================= -->
    <section class="w-full bg-[#f8fafc] py-12 sm:py-16 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Category Filter Bar & Active Tag Banner --}}
            @if(!empty($categories) && $categories->isNotEmpty())
                <div class="mb-8 flex flex-wrap items-center gap-2 sm:gap-2.5">
                    <a href="{{ route('blog') }}"
                       class="px-4 py-2 text-xs font-sans font-bold uppercase tracking-wider transition-colors {{ empty($activeCategorySlug) && empty($activeTagSlug) ? 'bg-[#0067b1] text-white shadow-xs' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#0067b1] hover:text-[#0067b1]' }}">
                        Semua
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('blog', ['kategori' => $cat->slug]) }}"
                           class="px-4 py-2 text-xs font-sans font-bold uppercase tracking-wider transition-colors {{ ($activeCategorySlug ?? '') === $cat->slug ? 'bg-[#0067b1] text-white shadow-xs' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#0067b1] hover:text-[#0067b1]' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if(!empty($activeTagName))
                <div class="mb-8 p-4 bg-white border border-slate-200 border-l-4 border-l-[#0067b1] flex flex-wrap items-center justify-between gap-3 shadow-xs">
                    <div class="text-sm font-sans text-slate-700">
                        Menampilkan artikel dengan tag <span class="font-bold text-[#0067b1]">#{{ $activeTagName }}</span>
                        <span class="text-slate-400 ml-1">({{ $regularPosts->total() }} artikel)</span>
                    </div>
                    <a href="{{ route('blog') }}" class="text-xs font-sans font-bold uppercase tracking-wider text-[#0067b1] hover:underline">
                        Lihat Semua Artikel
                    </a>
                </div>
            @endif

            @if($featuredPost)
                <!-- Featured Article Highlight (Entire Card Clickable) -->
                <a href="{{ url('/blog/' . $featuredPost->slug) }}"
                   class="group block mb-10 sm:mb-12 bg-white border border-slate-200 overflow-hidden hover:border-[#0067b1] transition-all shadow-xs hover:shadow-md reveal-on-scroll">
                    <div class="grid grid-cols-1 lg:grid-cols-12">
                        <div class="lg:col-span-7 h-64 sm:h-80 lg:h-auto bg-slate-900 overflow-hidden relative">
                            <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 bg-[#00163c] text-white px-2.5 py-1 text-xs font-sans font-bold uppercase tracking-wider">
                                FEATURED ARTICLE
                            </div>
                        </div>
                        <div class="lg:col-span-5 p-6 sm:p-8 flex flex-col justify-between bg-white">
                            <div>
                                <div class="flex items-center space-x-3 text-xs font-sans text-slate-500 mb-2">
                                    <span class="text-[#0067b1] font-bold uppercase">{{ $featuredPost->category ?: 'TECHNICAL UPDATE' }}</span>
                                    <span>•</span>
                                    <span>{{ $featuredPost->published_at?->format('d M Y') ?? $featuredPost->created_at?->format('d M Y') ?? '-' }}</span>
                                </div>
                                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] group-hover:text-[#0067b1] transition-colors leading-tight">
                                    {{ $featuredPost->title }}
                                </h2>
                                <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3">
                                    {{ $featuredPost->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string) $featuredPost->content), 180) }}
                                </p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-slate-100">
                                <span class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#0067b1] group-hover:bg-[#004f8a] text-white text-xs font-sans font-bold uppercase tracking-wider transition-colors shadow-xs">
                                    <span>Baca Artikel Lengkap</span>
                                    <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endif

            <!-- Regular Posts Grid (Entire Card Clickable) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($regularPosts as $idx => $post)
                    <a href="{{ url('/blog/' . $post->slug) }}"
                       class="group bg-white border border-slate-200 hover:border-[#0067b1] transition-all duration-300 flex flex-col justify-between shadow-xs hover:shadow-md reveal-on-scroll {{ $idx % 3 === 0 ? 'reveal-delay-100' : ($idx % 3 === 1 ? 'reveal-delay-200' : 'reveal-delay-300') }}">
                        <div>
                            <!-- Thumbnail -->
                            <div class="h-44 sm:h-48 w-full overflow-hidden bg-slate-900 relative">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute bottom-2 left-2 bg-black/70 text-slate-200 text-[10px] font-sans px-2 py-0.5">
                                    {{ $post->published_at?->format('d M Y') ?? $post->created_at?->format('d M Y') ?? '-' }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <div class="text-[11px] font-sans font-bold text-[#0067b1] uppercase tracking-wider mb-1.5">
                                    {{ $post->category ?: 'INSIGHT & OPERASIONAL' }}
                                </div>
                                <h3 class="text-xl font-bold font-barlow-condensed uppercase not-italic text-slate-900 group-hover:text-[#0067b1] transition-colors leading-snug">
                                    {{ $post->title }}
                                </h3>
                                <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3">
                                    {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags((string) $post->content), 160) }}
                                </p>
                            </div>
                        </div>

                        <!-- Clean Full-Width CTA Button -->
                        <div class="px-5 py-3 border-t border-slate-100 bg-slate-50 group-hover:bg-[#0067b1] group-hover:border-[#0067b1] flex items-center justify-between text-xs font-sans font-bold uppercase tracking-wider text-[#0067b1] group-hover:text-white transition-colors">
                            <span>Baca Artikel</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </a>
                @empty
                    @if(!$featuredPost)
                        <div class="col-span-full bg-white border border-slate-200 p-10 text-center text-slate-500 font-sans text-xs">
                            Belum ada artikel teknis yang dipublikasikan saat ini.
                        </div>
                    @endif
                @endforelse
            </div>

            <!-- Pagination -->
            @if(method_exists($regularPosts, 'hasPages') && $regularPosts->hasPages())
                <div class="mt-10">
                    {{ $regularPosts->links('partials.pagination') }}
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
