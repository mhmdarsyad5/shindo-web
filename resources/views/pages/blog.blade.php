@extends('layouts.public')

@section('title', 'Berita & Wawasan Teknis Truk | PT SHINDO Authorized Dealer')
@section('meta_description', 'Update artikel teknis, panduan perawatan dump truck tambang, wawasan efisiensi bahan bakar, dan berita terkini industri kendaraan komersial SHACMAN di Indonesia.')

@section('content')
    <!-- ================= PAGE HERO HEADER ================= -->
    <section class="relative bg-[#070e1e] text-white py-12 sm:py-16 border-b border-slate-800 overflow-hidden">
        <!-- Background Image Texture -->
        <div class="absolute inset-0 z-0 select-none pointer-events-none">
            <img src="{{ asset('images/page-header-bg.png') }}" alt=""
                class="w-full h-full object-cover object-center opacity-95">
            <div class="absolute inset-0 bg-gradient-to-r from-[#070e1e]/85 via-[#070e1e]/40 to-black/10"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex items-center space-x-2 text-xs text-slate-400 mb-4 font-sans uppercase tracking-wider">
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors">Home</a>
                <span>/</span>
                <span class="text-amber-400 font-semibold">Blog</span>
            </div>

            <div class="max-w-3xl">
                <h1
                    class="text-3xl sm:text-5xl font-bold italic uppercase font-barlow-condensed tracking-tight text-white leading-none">
                    BLOG TERBARU
                </h1>
                <p class="mt-4 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Simak berita dan artikel terbaru kami
                </p>
            </div>
        </div>
    </section>

    <!-- ================= ARTICLES SECTION ================= -->
    <section class="w-full bg-slate-50 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @php
                $featuredPost = $posts->first();
                $regularPosts = $posts->skip(1);
            @endphp

            @if($featuredPost)
                <!-- Featured Article Highlight -->
                <div
                    class="mb-10 sm:mb-12 bg-white border border-slate-200 overflow-hidden hover:border-[#0067b1] transition-all">
                    <div class="grid grid-cols-1 lg:grid-cols-12">
                        <div class="lg:col-span-7 h-64 sm:h-80 lg:h-auto bg-slate-900 overflow-hidden relative">
                            <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}"
                                class="w-full h-full object-cover">
                            <div
                                class="absolute top-3 left-3 bg-[#0067b1] text-white px-2.5 py-1 text-xs font-sans font-bold uppercase tracking-wider">
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
                                <h2
                                    class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase italic text-slate-900 leading-tight">
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
                                    class="inline-flex items-center space-x-1.5 font-bold text-xs uppercase font-barlow-condensed tracking-wider text-[#0067b1] hover:text-[#004880] transition-colors">
                                    <span>Baca Artikel Lengkap</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
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
                @forelse($regularPosts as $post)
                    <article
                        class="bg-white border border-slate-200 hover:border-[#0067b1] transition-colors flex flex-col justify-between">
                        <div>
                            <!-- Thumbnail -->
                            <div class="h-44 sm:h-48 w-full overflow-hidden bg-slate-900 relative">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                <div
                                    class="absolute bottom-2 left-2 bg-black/70 text-slate-200 text-[10px] font-sans px-2 py-0.5">
                                    {{ $post->published_at?->format('d M Y') ?? date('d M Y') }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <div class="text-[11px] font-sans font-bold text-[#0067b1] uppercase tracking-wider mb-1.5">
                                    INSIGHT & OPERASIONAL
                                </div>
                                <h3
                                    class="text-lg font-bold font-barlow-condensed uppercase italic text-slate-900 hover:text-[#0067b1] transition-colors leading-snug">
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
                                class="inline-flex items-center space-x-1 text-xs font-bold font-barlow-condensed uppercase tracking-wider text-[#0067b1] hover:text-[#004880] transition-colors">
                                <span>Detail Artikel</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <span class="text-[10px] font-sans text-slate-400">SHACMAN ID</span>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full bg-white border border-slate-200 p-10 text-center text-slate-500 font-sans text-xs">
                        Belum ada artikel teknis yang dipublikasikan saat ini.
                    </div>
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

    <!-- ================= TECHNICAL SUPPORT CTA ================= -->
    <section class="relative w-full overflow-hidden text-white py-14 sm:py-20 lg:py-24 border-t border-slate-800">
        <!-- Background Image with 5 Shacman Trucks Twilight Headlights -->
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk Shacman Operasional"
            class="absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none">
        <div class="absolute inset-0 bg-[#00163c]/75 sm:bg-[#00163c]/65 backdrop-brightness-90"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="border border-white/20 bg-black/40 backdrop-blur-sm p-6 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
                <div>
                    <div class="text-xs font-sans text-amber-400 font-bold uppercase tracking-wider mb-1 drop-shadow">
                        NEED TECHNICAL ASSISTANCE?
                    </div>
                    <h4 class="text-xl sm:text-3xl font-bold uppercase font-barlow-condensed italic text-white drop-shadow-md">
                        PUNYA KENDALA TEKNIS PADA ARMADA TRUK ANDA?
                    </h4>
                    <p class="text-slate-100 text-xs sm:text-sm mt-1 max-w-2xl drop-shadow">
                        Konsultasikan dengan tim mekanik dan aftersales service SHINDO untuk troubleshooting dan ketersediaan part.
                    </p>
                </div>
                <a href="{{ url('/kontak') }}"
                    class="px-8 py-3.5 bg-[#0067b1] hover:bg-[#005a9c] text-white font-bold text-xs uppercase font-barlow-condensed tracking-wider shadow-lg transition-colors flex-shrink-0">
                    Hubungi Aftersales Support
                </a>
            </div>
        </div>
    </section>
@endsection