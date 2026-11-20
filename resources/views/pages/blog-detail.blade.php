@extends('layouts.public')

@section('title', $post->seo_title ?: (Str::limit($post->title, 50) . ' | SHINDO'))
@section('meta_description', $post->seo_description ?: Str::limit(strip_tags($post->excerpt ?? $post->content), 155))
@if(!empty($post->seo_keywords))
@section('meta_keywords', $post->seo_keywords)
@endif

@php
    $waRaw = $site->whatsapp ?: '628111009567';
    $waNumber = preg_replace('/[^0-9]/', '', (string) $waRaw);
    if (str_starts_with($waNumber, '0')) {
        $waNumber = '62' . substr($waNumber, 1);
    }

    $relatedPosts = $relatedPosts ?? collect();

    $fallbackBody = <<<'HTML'
        <h2>Keandalan Operasional Armada SHACMAN di Medan Ekstrem</h2>
        <p>Dump truck SHACMAN telah membuktikan ketangguhannya dalam mendukung berbagai proyek strategis nasional, mulai dari hauling nikel di Sulawesi, tambang batu bara di Kalimantan, hingga pembangunan infrastruktur jalan tol dan pelabuhan.</p>
        <h2>Performa Mesin Weichai &amp; Efisiensi Bahan Bakar</h2>
        <p>Ditenagai mesin Weichai berkapasitas besar dengan torsi melimpah pada putaran rendah, armada ini mampu menekan konsumsi solar secara signifikan tanpa mengorbankan daya tanjak saat membawa muatan penuh.</p>
        <h3>Konstruksi Sasis &amp; Gardan Hande Heavy-Duty</h3>
        <p>Kombinasi sasis berlapis ganda dan gardan reduksi ganda (Hande Double Reduction) menjaga kestabilan serta traksi optimal di jalur tambang berbatu dengan beban muatan di atas 30–40 ton.</p>
        <h2>Dukungan Mekanik On-Site &amp; Suku Cadang Resmi</h2>
        <p>PT SHINDO selaku Authorized Distributor resmi menghadirkan mekanik siaga 24 jam di lokasi proyek serta pasokan suku cadang original fast-moving agar jadwal operasional armada tetap berjalan tanpa downtime berkepanjangan.</p>
    HTML;

    $renderedBody = !empty(trim((string) $post->content)) ? $post->content : $fallbackBody;
    $wordCount = str_word_count(strip_tags($renderedBody));
    $readMinutes = max(1, (int) ceil($wordCount / 200));
    $shareUrl = url()->current();
    $shareTitle = $post->title;
@endphp

@push('styles')
    <style>
        /* Editorial typography inside article body matching SHINDO Clean Industrial */
        #articleContent {
            color: #334155;
            font-size: 0.975rem;
            line-height: 1.75;
        }

        #articleContent p {
            margin-bottom: 1.25rem;
            color: #475569;
        }

        #articleContent h2 {
            font-family: 'Barlow Condensed', 'Barlow', sans-serif;
            font-size: 1.65rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #00163c;
            letter-spacing: -0.01em;
            line-height: 1.2;
            margin-top: 2.25rem;
            margin-bottom: 0.875rem;
            padding-left: 0.875rem;
            border-left: 4px solid #0067b1;
        }

        #articleContent h2:first-child {
            margin-top: 0.25rem;
        }

        #articleContent h3 {
            font-family: 'Barlow', ui-sans-serif, system-ui, sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.35;
            margin-top: 1.75rem;
            margin-bottom: 0.65rem;
        }

        #articleContent ul {
            list-style-type: disc;
            padding-left: 1.35rem;
            margin: 1.15rem 0;
        }

        #articleContent ol {
            list-style-type: decimal;
            padding-left: 1.35rem;
            margin: 1.15rem 0;
        }

        #articleContent li {
            margin-bottom: 0.5rem;
            color: #475569;
        }

        #articleContent a {
            color: #0067b1;
            font-weight: 600;
            text-decoration: underline;
            text-decoration-color: rgba(0, 103, 177, 0.35);
            text-underline-offset: 3px;
            transition: color 0.2s ease;
        }

        #articleContent a:hover {
            color: #004880;
        }

        #articleContent blockquote {
            border-left: 4px solid #0067b1;
            background-color: #f8fafc;
            padding: 1rem 1.25rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #1e293b;
        }

        #articleContent img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 1.5rem auto;
            border: 1px solid #e2e8f0;
        }

        #articleContent .baca-juga-box {
            border-left: 4px solid #00163c;
            background-color: #f0f7ff;
            padding: 0.875rem 1.25rem;
            margin: 1.75rem 0;
            font-style: normal;
            color: #00163c;
            font-weight: 600;
        }

        @media (min-width: 1024px) {
            #inline-toc,
            #mobile-toc-bar {
                display: none !important;
            }
        }
    </style>
@endpush

@section('content')
    {{-- Top Reading Progress Bar --}}
    <div id="readingProgressBar"
         aria-hidden="true"
         class="fixed top-0 left-0 h-[3px] bg-[#0067b1] z-[60] w-0 transition-[width] duration-100 ease-out pointer-events-none"></div>

    <!-- ================= BREADCRUMBS (MATCHING SHINDO STYLE) ================= -->
    <div class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500 flex-wrap gap-y-1">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('blog') }}" class="hover:text-[#0067b1] transition-colors">Berita &amp; Artikel</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold truncate max-w-[220px] sm:max-w-md">{{ $post->title }}</span>
            </div>
        </div>
    </div>

    {{-- Mobile / Tablet Sticky Quick-Jump TOC Bar --}}
    <div id="mobile-toc-bar" class="hidden lg:hidden sticky top-[68px] sm:top-[74px] z-30 bg-white/95 backdrop-blur-sm border-b border-slate-200 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <button type="button"
                    id="mobile-toc-toggle"
                    aria-expanded="false"
                    aria-controls="mobile-toc-panel"
                    class="w-full py-2.5 flex items-center justify-between gap-3 text-left cursor-pointer">
                <span class="flex items-center gap-2 min-w-0">
                    <span class="px-2 py-0.5 bg-[#0067b1] text-white text-[10px] font-sans font-bold uppercase tracking-wider shrink-0">
                        DAFTAR ISI
                    </span>
                    <span id="mobile-toc-label" class="text-xs font-sans font-semibold text-[#00163c] truncate">
                        Pilih bagian artikel
                    </span>
                </span>
                <svg id="mobile-toc-chevron" class="w-4 h-4 text-slate-500 shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="mobile-toc-panel" class="hidden pb-3 pt-1 border-t border-slate-100 max-h-64 overflow-y-auto">
                <ul id="mobile-toc-list" class="space-y-1 text-xs font-sans"></ul>
            </div>
        </div>
    </div>

    <!-- ================= MAIN ARTICLE & STICKY SIDEBAR ================= -->
    <section class="w-full bg-[#f8fafc] py-8 sm:py-12 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                {{-- LEFT MAIN ARTICLE COLUMN (8 Columns) --}}
                <div class="lg:col-span-8">
                    <article class="bg-white border border-slate-200 border-t-4 border-t-[#0067b1] p-5 sm:p-8 lg:p-10 shadow-xs">

                        {{-- Article Meta Strip --}}
                        <div class="flex flex-wrap items-center gap-3 text-xs font-sans text-slate-500 pb-4 border-b border-slate-100">
                            <span class="inline-flex items-center px-2.5 py-1 bg-[#0067b1] text-white text-[11px] font-bold uppercase tracking-wider">
                                ARTIKEL TEKNIS
                            </span>
                            <span class="inline-flex items-center gap-1.5 font-medium text-slate-600">
                                <svg class="w-3.5 h-3.5 text-[#0067b1]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $post->published_at?->format('d F Y') ?? date('d F Y') }}
                            </span>
                            <span class="text-slate-300">•</span>
                            <span class="inline-flex items-center gap-1.5 font-medium text-slate-600">
                                <svg class="w-3.5 h-3.5 text-[#0067b1]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $readMinutes }} Menit Baca
                            </span>
                        </div>

                        {{-- Title --}}
                        <h1 class="mt-4 text-3xl sm:text-4xl lg:text-[44px] font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-[1.08] tracking-tight">
                            {{ $post->title }}
                        </h1>

                        {{-- Cover Image --}}
                        <div class="mt-6 border border-slate-200 bg-slate-900 overflow-hidden aspect-[16/9]">
                            <img src="{{ $post->image_url }}"
                                 alt="{{ $post->title }}"
                                 class="w-full h-full object-cover hover:scale-[1.02] transition-transform duration-500">
                        </div>

                        {{-- Excerpt Highlight --}}
                        @if(!empty($post->excerpt))
                            <div class="mt-6 p-4 sm:p-5 bg-[#f8fafc] border-l-4 border-[#0067b1] text-slate-700 text-sm sm:text-base leading-relaxed font-medium">
                                {{ $post->excerpt }}
                            </div>
                        @endif

                        {{-- Mobile/Tablet Inline Collapsible TOC --}}
                        <div id="inline-toc" class="hidden lg:hidden mt-6 border border-slate-200 bg-[#f8fafc]">
                            <button type="button"
                                    id="inline-toc-toggle"
                                    aria-expanded="true"
                                    aria-controls="inline-toc-body"
                                    class="w-full px-4 py-3 flex items-center justify-between bg-[#00163c] text-white text-xs font-sans font-bold uppercase tracking-wider cursor-pointer">
                                <span>Daftar Isi Artikel</span>
                                <svg id="inline-toc-chevron" class="w-4 h-4 rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="inline-toc-body" class="p-4">
                                <ol id="inline-toc-list" class="space-y-2 text-sm font-sans"></ol>
                            </div>
                        </div>

                        {{-- Main Body Content --}}
                        <div id="articleContent" class="mt-8 max-w-none">
                            {!! $renderedBody !!}
                        </div>

                        {{-- Share & Copy Link Bar --}}
                        <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <span class="text-xs font-sans font-bold uppercase tracking-wider text-[#00163c]">
                                Bagikan Artikel Ini
                            </span>
                            <div class="flex flex-wrap items-center gap-2">
                                <a href="https://wa.me/?text={{ urlencode($shareTitle . ' - ' . $shareUrl) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Bagikan ke WhatsApp"
                                   class="inline-flex items-center gap-1.5 px-3 py-2 bg-[#25D366] hover:bg-[#1ebe5d] text-white text-xs font-sans font-bold uppercase tracking-wider transition-colors">
                                    WhatsApp
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Bagikan ke Facebook"
                                   class="inline-flex items-center gap-1.5 px-3 py-2 bg-[#1877F2] hover:bg-[#1466d2] text-white text-xs font-sans font-bold uppercase tracking-wider transition-colors">
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($shareTitle) }}&url={{ urlencode($shareUrl) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Bagikan ke X"
                                   class="inline-flex items-center gap-1.5 px-3 py-2 bg-[#0f172a] hover:bg-black text-white text-xs font-sans font-bold uppercase tracking-wider transition-colors">
                                    X
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($shareUrl) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Bagikan ke LinkedIn"
                                   class="inline-flex items-center gap-1.5 px-3 py-2 bg-[#0a66c2] hover:bg-[#08529d] text-white text-xs font-sans font-bold uppercase tracking-wider transition-colors">
                                    LinkedIn
                                </a>
                                <button type="button"
                                        id="copyArticleLinkBtn"
                                        class="inline-flex items-center gap-1.5 px-3 py-2 bg-white hover:bg-slate-100 border border-slate-300 text-[#00163c] text-xs font-sans font-bold uppercase tracking-wider transition-colors cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    Salin Link
                                </button>
                            </div>
                        </div>

                        {{-- Bottom Back Navigation --}}
                        <div class="mt-6 pt-5 border-t border-slate-100 flex items-center justify-between flex-wrap gap-4">
                            <a href="{{ route('blog') }}"
                               class="inline-flex items-center space-x-2 text-xs font-bold uppercase font-barlow-condensed not-italic tracking-wider text-[#0067b1] hover:text-[#004880] transition-colors">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span>Kembali ke Berita &amp; Artikel</span>
                            </a>
                        </div>
                    </article>
                </div>

                {{-- RIGHT STICKY SIDEBAR (4 Columns) --}}
                <aside class="lg:col-span-4">
                    <div class="lg:sticky lg:top-24 space-y-6">

                        {{-- Widget 1: Desktop Table of Contents --}}
                        <div id="toc-card" class="hidden bg-white border border-slate-200 shadow-xs">
                            <div class="bg-[#00163c] px-5 py-3 flex items-center justify-between">
                                <h2 class="text-sm font-sans font-bold uppercase tracking-wider text-white">
                                    Daftar Isi
                                </h2>
                                <span class="text-[10px] font-sans font-semibold uppercase tracking-widest text-blue-300">
                                    Navigasi
                                </span>
                            </div>
                            <nav aria-label="Daftar isi artikel" class="p-4">
                                <ul id="desktop-toc-list" class="space-y-1 text-xs sm:text-sm font-sans"></ul>
                            </nav>
                        </div>

                        {{-- Widget 2: Related Articles (Baca Juga) --}}
                        @if($relatedPosts->isNotEmpty())
                            <div class="bg-white border border-slate-200 shadow-xs">
                                <div class="bg-[#0067b1] px-5 py-3 flex items-center justify-between">
                                    <h2 class="text-sm font-sans font-bold uppercase tracking-wider text-white">
                                        Baca Juga
                                    </h2>
                                    <a href="{{ route('blog') }}" class="text-[11px] font-sans font-semibold text-white/85 hover:text-white underline underline-offset-2">
                                        Semua
                                    </a>
                                </div>
                                <div class="divide-y divide-slate-100">
                                    @foreach($relatedPosts as $related)
                                        <a href="{{ route('blog.detail', $related->slug) }}"
                                           class="group flex items-start gap-3.5 p-4 hover:bg-[#f8fafc] transition-colors">
                                            <div class="w-16 h-16 shrink-0 bg-slate-900 border border-slate-200 overflow-hidden">
                                                <img src="{{ $related->image_url }}"
                                                     alt="{{ $related->title }}"
                                                     loading="lazy"
                                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            </div>
                                            <div class="min-w-0">
                                                <h3 class="text-xs sm:text-sm font-bold font-sans text-[#00163c] group-hover:text-[#0067b1] transition-colors line-clamp-2 leading-snug">
                                                    {{ $related->title }}
                                                </h3>
                                                <div class="mt-1.5 text-[11px] font-sans text-slate-400">
                                                    {{ $related->published_at?->format('d M Y') ?? date('d M Y') }}
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Widget 3: SHINDO Armada Consultation CTA --}}
                        <div class="bg-[#00163c] border-t-4 border-t-[#0067b1] p-6 text-white shadow-xs">
                            <div class="text-[11px] font-sans font-bold uppercase tracking-widest text-blue-300 mb-1.5">
                                SHINDO AFTERSALES &amp; SALES
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic leading-tight tracking-tight">
                                Butuh Konsultasi Armada Truk SHACMAN?
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-slate-300 leading-relaxed">
                                Diskusikan kebutuhan unit dump truck, tronton, atau suku cadang resmi untuk operasional proyek Anda.
                            </p>
                            <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Halo Shindo, saya membaca artikel "' . $post->title . '" dan ingin berkonsultasi mengenai armada SHACMAN.') }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="mt-5 w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-[#0067b1] hover:bg-[#0284c7] text-white text-xs sm:text-sm font-sans font-bold uppercase tracking-wider transition-colors">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Hubungi Kami
                            </a>
                        </div>

                    </div>
                </aside>

            </div>
        </div>
    </section>

    <!-- ================= CINEMATIC ARMADA SHOWCASE BANNER ================= -->
    <section class="relative w-full overflow-hidden bg-[#070e1e] border-t border-slate-800">
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk SHACMAN PT SHINDO"
            class="w-full h-auto block select-none pointer-events-none">
    </section>

    {{-- Toast Notification for Copy Link --}}
    <div id="shareToast"
         role="status"
         aria-live="polite"
         class="fixed bottom-6 left-1/2 -translate-x-1/2 z-[70] hidden px-4 py-2.5 bg-[#00163c] border-l-4 border-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider shadow-lg">
        Link artikel berhasil disalin!
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const articleContent = document.getElementById('articleContent');
            const progressBar = document.getElementById('readingProgressBar');
            const desktopTocCard = document.getElementById('toc-card');
            const desktopTocList = document.getElementById('desktop-toc-list');
            const inlineToc = document.getElementById('inline-toc');
            const inlineTocList = document.getElementById('inline-toc-list');
            const inlineTocToggle = document.getElementById('inline-toc-toggle');
            const inlineTocBody = document.getElementById('inline-toc-body');
            const inlineTocChevron = document.getElementById('inline-toc-chevron');
            const mobileTocBar = document.getElementById('mobile-toc-bar');
            const mobileTocToggle = document.getElementById('mobile-toc-toggle');
            const mobileTocPanel = document.getElementById('mobile-toc-panel');
            const mobileTocList = document.getElementById('mobile-toc-list');
            const mobileTocLabel = document.getElementById('mobile-toc-label');
            const mobileTocChevron = document.getElementById('mobile-toc-chevron');
            const copyBtn = document.getElementById('copyArticleLinkBtn');
            const shareToast = document.getElementById('shareToast');

            // 1. Enhance "Baca juga:" paragraphs automatically
            if (articleContent) {
                articleContent.querySelectorAll('p, blockquote').forEach((el) => {
                    const text = (el.textContent || '').trim();
                    if (/^baca\s+juga\s*:/i.test(text)) {
                        el.classList.add('baca-juga-box');
                    }
                });
            }

            // 2. Build Table of Contents from H2 & H3 headings
            const headings = articleContent
                ? Array.from(articleContent.querySelectorAll('h2, h3'))
                : [];
            const tocItems = [];
            let h2Counter = 0;

            function slugify(text, fallbackIndex) {
                const cleaned = text
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .trim()
                    .replace(/\s+/g, '-');
                return cleaned ? `${cleaned}-${fallbackIndex}` : `bagian-${fallbackIndex}`;
            }

            function getStickyOffset() {
                const header = document.getElementById('main-header');
                const headerH = header ? header.offsetHeight : 74;
                const mobileH = mobileTocBar && !mobileTocBar.classList.contains('hidden')
                    ? mobileTocBar.offsetHeight
                    : 0;
                return headerH + mobileH + 16;
            }

            function scrollToHeading(targetEl, headingId) {
                const top = targetEl.getBoundingClientRect().top + window.scrollY - getStickyOffset();
                window.scrollTo({ top: Math.max(0, top), behavior: 'smooth' });
                if (window.history && typeof window.history.pushState === 'function') {
                    window.history.pushState(null, '', `#${headingId}`);
                }
            }

            if (headings.length > 0) {
                headings.forEach((heading, idx) => {
                    const rawText = (heading.textContent || '').trim();
                    if (!rawText) {
                        return;
                    }

                    const cleanTitle = rawText.replace(/^\s*\d+[\.)\]]\s+/, '');
                    if (!heading.id) {
                        heading.id = slugify(cleanTitle, idx + 1);
                    }

                    const isH2 = heading.tagName.toLowerCase() === 'h2';
                    if (isH2) {
                        h2Counter += 1;
                    }
                    const numberLabel = isH2 ? String(h2Counter).padStart(2, '0') : '';

                    // Desktop sidebar item
                    if (desktopTocList) {
                        const li = document.createElement('li');
                        const link = document.createElement('a');
                        link.href = `#${heading.id}`;
                        link.dataset.tocTarget = heading.id;
                        link.className = isH2
                            ? 'toc-link flex items-start gap-2.5 py-2 px-2.5 border-l-2 border-transparent text-slate-700 hover:text-[#0067b1] hover:bg-slate-50 transition-colors'
                            : 'toc-link flex items-start gap-2 py-1.5 pl-6 pr-2.5 border-l-2 border-transparent text-slate-500 hover:text-[#0067b1] hover:bg-slate-50 transition-colors text-xs';

                        if (isH2) {
                            const numSpan = document.createElement('span');
                            numSpan.className = 'font-bold text-[#0067b1] shrink-0 tabular-nums';
                            numSpan.textContent = numberLabel;
                            link.appendChild(numSpan);
                        } else {
                            const dot = document.createElement('span');
                            dot.className = 'text-slate-400 shrink-0';
                            dot.textContent = '•';
                            link.appendChild(dot);
                        }

                        const textSpan = document.createElement('span');
                        textSpan.textContent = cleanTitle;
                        link.appendChild(textSpan);

                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            scrollToHeading(heading, heading.id);
                        });

                        li.appendChild(link);
                        desktopTocList.appendChild(li);
                    }

                    // Inline mobile accordion item
                    if (inlineTocList) {
                        const li = document.createElement('li');
                        const link = document.createElement('a');
                        link.href = `#${heading.id}`;
                        link.className = isH2
                            ? 'flex items-start gap-2 font-semibold text-[#00163c] hover:text-[#0067b1]'
                            : 'flex items-start gap-2 pl-5 text-slate-600 hover:text-[#0067b1] text-xs';

                        if (isH2) {
                            const numSpan = document.createElement('span');
                            numSpan.className = 'text-[#0067b1] font-bold shrink-0';
                            numSpan.textContent = `${numberLabel}.`;
                            link.appendChild(numSpan);
                        }

                        const textSpan = document.createElement('span');
                        textSpan.textContent = cleanTitle;
                        link.appendChild(textSpan);

                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            scrollToHeading(heading, heading.id);
                        });

                        li.appendChild(link);
                        inlineTocList.appendChild(li);
                    }

                    // Sticky mobile bar dropdown item
                    if (mobileTocList) {
                        const li = document.createElement('li');
                        const link = document.createElement('a');
                        link.href = `#${heading.id}`;
                        link.dataset.mobileTocTarget = heading.id;
                        link.className = isH2
                            ? 'mobile-toc-link block px-3 py-2 text-slate-700 hover:bg-slate-50 font-semibold'
                            : 'mobile-toc-link block pl-6 pr-3 py-1.5 text-slate-500 hover:bg-slate-50';
                        link.textContent = isH2 ? `${numberLabel}. ${cleanTitle}` : cleanTitle;

                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            if (mobileTocPanel) {
                                mobileTocPanel.classList.add('hidden');
                            }
                            if (mobileTocToggle) {
                                mobileTocToggle.setAttribute('aria-expanded', 'false');
                            }
                            if (mobileTocChevron) {
                                mobileTocChevron.classList.remove('rotate-180');
                            }
                            scrollToHeading(heading, heading.id);
                        });

                        li.appendChild(link);
                        mobileTocList.appendChild(li);
                    }

                    tocItems.push({ el: heading, id: heading.id, title: cleanTitle });
                });

                if (tocItems.length > 0) {
                    if (desktopTocCard) {
                        desktopTocCard.classList.remove('hidden');
                        desktopTocCard.classList.add('lg:block');
                    }
                    if (inlineToc) {
                        inlineToc.classList.remove('hidden');
                    }
                    if (mobileTocLabel) {
                        mobileTocLabel.textContent = tocItems[0].title;
                    }
                }
            }

            // Accordion toggles for mobile TOC widgets
            if (inlineTocToggle && inlineTocBody) {
                inlineTocToggle.addEventListener('click', () => {
                    const isHidden = inlineTocBody.classList.toggle('hidden');
                    inlineTocToggle.setAttribute('aria-expanded', String(!isHidden));
                    if (inlineTocChevron) {
                        inlineTocChevron.classList.toggle('rotate-180', !isHidden);
                    }
                });
            }

            if (mobileTocToggle && mobileTocPanel) {
                mobileTocToggle.addEventListener('click', () => {
                    const isHidden = mobileTocPanel.classList.toggle('hidden');
                    mobileTocToggle.setAttribute('aria-expanded', String(!isHidden));
                    if (mobileTocChevron) {
                        mobileTocChevron.classList.toggle('rotate-180', !isHidden);
                    }
                });
            }

            // 3. Scrollspy + Reading Progress Bar
            function updateScrollState() {
                const scrollTop = window.scrollY;

                // Reading progress bar relative to article body
                if (progressBar && articleContent) {
                    const rect = articleContent.getBoundingClientRect();
                    const totalScrollable = Math.max(1, articleContent.offsetHeight - window.innerHeight * 0.65);
                    const currentRead = Math.min(totalScrollable, Math.max(0, window.innerHeight * 0.35 - rect.top));
                    const pct = Math.round((currentRead / totalScrollable) * 100);
                    progressBar.style.width = `${Math.min(100, Math.max(0, pct))}%`;
                }

                // Toggle sticky mobile TOC visibility once scrolled past start of articleContent
                if (mobileTocBar && articleContent && tocItems.length > 0) {
                    const articleTop = articleContent.getBoundingClientRect().top + scrollTop;
                    const showSticky = scrollTop > articleTop - 120;
                    mobileTocBar.classList.toggle('hidden', !showSticky);
                }

                // Highlight active TOC heading
                if (tocItems.length > 0) {
                    const offset = getStickyOffset() + 24;
                    let activeItem = tocItems[0];

                    for (let i = 0; i < tocItems.length; i += 1) {
                        const rectTop = tocItems[i].el.getBoundingClientRect().top;
                        if (rectTop <= offset) {
                            activeItem = tocItems[i];
                        }
                    }

                    document.querySelectorAll('.toc-link').forEach((link) => {
                        const isActive = link.dataset.tocTarget === activeItem.id;
                        link.classList.toggle('border-[#0067b1]', isActive);
                        link.classList.toggle('border-transparent', !isActive);
                        link.classList.toggle('bg-[#f0f7ff]', isActive);
                        link.classList.toggle('text-[#00163c]', isActive);
                        link.classList.toggle('font-bold', isActive);
                    });

                    document.querySelectorAll('.mobile-toc-link').forEach((link) => {
                        const isActive = link.dataset.mobileTocTarget === activeItem.id;
                        link.classList.toggle('bg-[#0067b1]', isActive);
                        link.classList.toggle('text-white', isActive);
                    });

                    if (mobileTocLabel) {
                        mobileTocLabel.textContent = activeItem.title;
                    }
                }
            }

            window.addEventListener('scroll', updateScrollState, { passive: true });
            updateScrollState();

            // 4. Copy Link Toast
            let toastTimer = null;
            if (copyBtn) {
                copyBtn.addEventListener('click', async () => {
                    try {
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                            await navigator.clipboard.writeText(window.location.href);
                        } else {
                            const temp = document.createElement('input');
                            temp.value = window.location.href;
                            document.body.appendChild(temp);
                            temp.select();
                            document.execCommand('copy');
                            document.body.removeChild(temp);
                        }

                        if (shareToast) {
                            shareToast.classList.remove('hidden');
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => {
                                shareToast.classList.add('hidden');
                            }, 2500);
                        }
                    } catch (_) {
                        // Silently ignore clipboard denial
                    }
                });
            }
        });
    </script>
@endpush
