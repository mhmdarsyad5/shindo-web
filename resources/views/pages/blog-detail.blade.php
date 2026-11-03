@extends('layouts.public')

@section('title', $post->title . ' | PT SHINDO Berita & Artikel')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 150))

@section('content')
    <!-- ================= PAGE HERO HEADER ================= -->
    <section class="relative bg-[#070e1e] text-white py-10 sm:py-14 border-b border-slate-800 overflow-hidden">
        <!-- Background Image Texture -->
        <div class="absolute inset-0 z-0 select-none pointer-events-none">
            <img src="{{ asset('images/page-header-bg.png') }}" alt="" class="w-full h-full object-cover object-center opacity-95">
            <div class="absolute inset-0 bg-gradient-to-r from-[#070e1e]/85 via-[#070e1e]/40 to-black/10"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumb -->
            <div class="flex items-center space-x-2 text-xs font-sans text-slate-400 mb-4 uppercase tracking-wider">
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors">Home</a>
                <span>/</span>
                <a href="{{ url('/blog') }}" class="hover:text-amber-400 transition-colors">Berita & Artikel</a>
                <span>/</span>
                <span class="text-amber-400 truncate max-w-xs">{{ $post->title }}</span>
            </div>

            <div class="text-xs font-sans text-amber-400 mb-2">
                {{ $post->published_at?->format('d F Y') ?? date('d F Y') }}
            </div>

            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-bold italic uppercase font-barlow-condensed leading-tight text-white">
                {{ $post->title }}
            </h1>
        </div>
    </section>

    <!-- ================= ARTICLE CONTENT ================= -->
    <article class="w-full bg-slate-50 py-10 sm:py-14">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-slate-200 p-6 sm:p-10">
                
                <!-- Cover Image -->
                <div class="border border-slate-300 bg-slate-900 overflow-hidden mb-8 max-h-[460px]">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>

                <!-- Excerpt Highlight -->
                @if(!empty($post->excerpt))
                    <div class="p-4 sm:p-5 bg-slate-50 border-l-4 border-[#0067b1] mb-8 text-slate-700 text-sm sm:text-base leading-relaxed font-medium">
                        {{ $post->excerpt }}
                    </div>
                @endif

                <!-- Main Body Content -->
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-4 text-sm sm:text-base">
                    @if(!empty($post->content))
                        {!! $post->content !!}
                    @else
                        <p>
                            Dump truck SHACMAN telah membuktikan keandalannya dalam mendukung berbagai proyek strategis nasional, mulai dari hauling nikel di Sulawesi, tambang batu bara di Kalimantan, hingga pembangunan infrastruktur jalan tol dan pelabuhan.
                        </p>
                        <p>
                            Ditenagai oleh mesin Weichai yang terkenal dengan torsi melimpah pada putaran mesin rendah, armada ini mampu menghemat konsumsi bahan bakar solar secara signifikan tanpa mengorbankan daya jelajah di jalur tanjakan curam. Sasis berlapis ganda dan gardan reduksi ganda (Hande Double Reduction) memberikan kestabilan ekstra saat mengangkut beban muatan penuh di atas 30–40 ton.
                        </p>
                        <p>
                            PT SHINDO selaku Authorized Dealer resmi terus memperluas jaringan dukungan servis di seluruh wilayah Indonesia dengan menyediakan mekanik siaga langsung di area tambang (on-site support) dan jaminan ketersediaan suku cadang fast-moving yang lengkap.
                        </p>
                    @endif
                </div>

                <!-- Footer Action & Nav -->
                <div class="mt-10 pt-6 border-t border-slate-200 flex items-center justify-between flex-wrap gap-4">
                    <a href="{{ url('/blog') }}"
                        class="inline-flex items-center space-x-2 text-xs font-bold uppercase font-barlow-condensed tracking-wider text-[#0067b1] hover:text-[#004880] transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Kembali ke Index Berita</span>
                    </a>
                    <a href="{{ url('/kontak') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-[#0067b1] text-white font-bold text-xs uppercase font-barlow-condensed tracking-wider hover:bg-[#00528e] transition-colors shadow-sm">
                        Konsultasi Kebutuhan Armada
                    </a>
                </div>
            </div>
        </div>
    </article>

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
