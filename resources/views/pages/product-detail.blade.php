@extends('layouts.public')

@php
    $seriesName = $product->truckSeries?->name ?? strtoupper($seriesKey);
    $waPhone = preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890');
    if (str_starts_with($waPhone, '0')) {
        $waPhone = '62' . substr($waPhone, 1);
    }
    $waMessage = $product->whatsapp_message ?: ('Halo PT SHINDO, saya tertarik meminta penawaran harga resmi untuk unit: ' . $product->name . ' (' . ($product->drive ?? '6x4') . ').');
    $waUrl = 'https://wa.me/' . $waPhone . '?text=' . urlencode($waMessage);
@endphp

@section('title', $product->name . ' — Detail & Spesifikasi | SHINDO')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($product->description ?? ($product->name . ' — Truk heavy duty resmi SHACMAN Indonesia.')), 155))

@push('styles')
<style>
/* ================= SHACMAN SERIES DETAIL STYLES ================= */
.pro_detail {
    background-color: #ffffff;
    color: #393939;
    font-family: 'Barlow', ui-sans-serif, system-ui, sans-serif;
    font-size: 14px;
    line-height: 1.6;
}
.pro_detail .wrap {
    max-width: 1400px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    position: relative;
    box-sizing: border-box;
}
.pro_detail .container {
    border-bottom: 1px solid #D1D4DA;
    padding: 70px 0;
    box-sizing: border-box;
}
.pro_detail .infor {
    margin-bottom: 45px;
}
.pro_detail .infor.has_con {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}
.pro_detail .infor.has_con .tit {
    width: 35%;
    flex-shrink: 0;
}
.pro_detail .infor.has_con .con {
    width: 60%;
    color: #475569;
    font-size: 14px;
    line-height: 26px;
}
.pro_detail .fz32 {
    font-size: 32px;
    line-height: 40px;
    color: #00163c;
    font-family: 'Barlow Condensed', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.02em;
}
.pro_detail .fz14 {
    font-size: 14px;
}
.pro_detail *[class*="rect-"] {
    position: relative;
    display: block;
    width: 100%;
    height: 0;
    overflow: hidden;
}
.pro_detail *[class*="rect-"] ._full {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.pro_detail .rect-68 { padding-bottom: 68%; }
.pro_detail .rect-684 { padding-bottom: 68.4%; }
.pro_detail .rect-56 { padding-bottom: 56.17%; }
.pro_detail .rect-542 { padding-bottom: 54.2%; }

/* SECTION 03: RELIABLE RESULTS (3 Cards) */
.pro_detail03 .content ul {
    display: flex;
    gap: 30px;
    padding: 0;
    margin: 0;
    list-style: none;
}
.pro_detail03 .content li {
    flex: 1;
    display: flex;
    flex-direction: column;
}
.pro_detail03 .content li .rect-68 {
    border: 1px solid #e2e8f0;
}
.pro_detail03 .content li .info {
    padding-top: 30px;
}
.pro_detail03 .content li .info .t {
    font-size: 18px;
    line-height: 28px;
    border-bottom: 1px solid #00163c;
    padding-bottom: 14px;
    color: #00163c;
    font-family: 'Barlow Condensed', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.02em;
}
.pro_detail03 .content li .info .c {
    margin-top: 14px;
    font-size: 14px;
    line-height: 24px;
    color: #475569;
}

/* SECTION 04 & 06: PRO_QIEHUAN ACCORDION */
.pro_qiehuan .content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}
.pro_qiehuan .content .left {
    width: 42%;
    flex-shrink: 0;
}
.pro_qiehuan .content .left .infor .tit {
    margin-bottom: 20px;
}
.pro_qiehuan .content .left .list {
    border-top: 1px solid #D3D6DD;
    border-bottom: 1px solid #D3D6DD;
    list-style: none;
    padding: 0;
    margin: 0;
}
.pro_qiehuan .content .left li {
    border-bottom: 1px solid #D3D6DD;
}
.pro_qiehuan .content .left li:last-child {
    border-bottom: none;
}
.pro_qiehuan .content .left li .li_top {
    cursor: pointer;
    font-size: 18px;
    line-height: 1.4;
    color: #00163c;
    font-family: 'Barlow', ui-sans-serif, system-ui, sans-serif;
    font-weight: 600;
    letter-spacing: 0.01em;
    position: relative;
    padding: 18px 28px 18px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    user-select: none;
    transition: color 0.2s ease;
}
.pro_qiehuan .content .left li .li_top:hover {
    color: #0067b1;
}
.pro_qiehuan .content .left li .li_top:after {
    content: '';
    width: 11px;
    height: 11px;
    background: url('{{ asset("images/series/pro_detail04_2.png") }}') no-repeat center;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}
.pro_qiehuan .content .left li.cur .li_top:after {
    background: url('{{ asset("images/series/pro_detail04_3.png") }}') no-repeat center;
}
.pro_qiehuan .content .left li .li_bott {
    display: none;
    padding-bottom: 24px;
    padding-right: 8px;
    font-size: 14px;
    line-height: 25px;
    color: #475569;
}
.pro_qiehuan .content .left li.cur .li_bott {
    display: block;
}
.pro_qiehuan .content .right {
    width: 55%;
    flex-shrink: 0;
}
.pro_qiehuan .content .right .rect-684 {
    border: 1px solid #D1D4DA;
    background-color: #f8fafc;
}
.pro_qiehuan .content .right .rect-684 img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease, visibility 0.5s ease;
}
.pro_qiehuan .content .right .rect-684 img.cur {
    opacity: 1;
    visibility: visible;
}

/* SECTION 05: DELIVERING EFFICIENCY */
.pro_detail05 .img_ {
    width: 100%;
    aspect-ratio: 21/9;
    margin-bottom: 50px;
    border: 1px solid #D1D4DA;
    overflow: hidden;
}
.pro_detail05 .img_ img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.pro_detail05 .content ul {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    list-style: none;
    padding: 0;
    margin: 0;
}
.pro_detail05 .content li {
    display: flex;
    flex-direction: column;
}
.pro_detail05 .content li .info .t {
    font-size: 18px;
    line-height: 28px;
    border-bottom: 1px solid #00163c;
    padding-bottom: 14px;
    color: #00163c;
    font-family: 'Barlow Condensed', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.02em;
}
.pro_detail05 .content li .info .c {
    margin-top: 14px;
    margin-bottom: 24px;
    font-size: 14px;
    line-height: 25px;
    color: #475569;
}
.pro_detail05 .content li .rect-56 {
    border: 1px solid #e2e8f0;
}

/* SECTION 06: CABIN */
.pro_detail06 .img_ {
    width: 100%;
    aspect-ratio: 21/9;
    margin-bottom: 50px;
    border: 1px solid #D1D4DA;
    overflow: hidden;
}
.pro_detail06 .img_ img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* SECTION 07: SPECIFICATION (pro_detail_521) */
.pro_detail_521 .content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}
.pro_detail_521 .content .left {
    width: 58%;
    flex-shrink: 0;
}
.pro_detail_521 .table-responsive {
    overflow-x: auto;
}
.pro_detail_521 .table.datalist {
    width: 100%;
    border-collapse: collapse;
    font-size: 13.5px;
    text-align: left;
    background: #fff;
    border: 1px solid #00163C;
}
.pro_detail_521 .table.datalist th,
.pro_detail_521 .table.datalist td {
    border: 1px solid #00163C !important;
    padding: 10px 14px;
    color: #00163C;
    vertical-align: middle;
}
.pro_detail_521 .table.datalist .firstRow th {
    background: #05163C;
    color: #fff;
    font-family: 'Barlow Condensed', sans-serif;
    font-weight: 700;
    font-size: 15px;
    text-transform: capitalize;
    border: 1px solid #00163C !important;
}
.pro_detail_521 .table.datalist .main-config-td {
    font-weight: 700;
    text-align: center;
    color: #00163C;
    width: 18%;
}
.pro_detail_521 .content .right {
    width: 38%;
    flex-shrink: 0;
}
.pro_detail_521 .content .right ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 28px;
}
.pro_detail_521 .content .right li {
    margin: 0;
}
.pro_detail_521 .content .right li .img_ {
    background: #fff;
}
.pro_detail_521 .content .right li .rect-542 {
    padding-bottom: 54.2%;
}
.pro_detail_521 .content .right li .rect-542 img {
    object-fit: contain;
}
.pro_detail_521 .content .right li .txt {
    margin-top: 10px;
    text-align: center;
    font-size: 15px;
    font-weight: 700;
    color: #00163C;
    font-family: 'Barlow', ui-sans-serif, system-ui, sans-serif;
}
.btn_manual {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 0 24px;
    height: 48px;
    line-height: 48px;
    font-size: 13px;
    color: #fff !important;
    text-transform: uppercase;
    font-weight: 700;
    font-family: 'Barlow Condensed', 'Barlow', sans-serif;
    letter-spacing: 0.04em;
    background: #00163c;
    border: 1px solid #00163c;
    text-decoration: none !important;
    transition: all 0.25s ease;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 22, 60, 0.2);
    white-space: nowrap;
}
.btn_manual:hover {
    background: #002868;
    border-color: #002868;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(0, 22, 60, 0.3);
    transform: translateY(-1px);
}
.btn_manual img {
    display: inline-block !important;
    width: 16px !important;
    height: 14px !important;
    max-width: 16px !important;
    max-height: 14px !important;
    object-fit: contain !important;
    vertical-align: middle !important;
    flex-shrink: 0 !important;
    margin: 0 !important;
    transition: transform 0.2s ease;
}
.btn_manual:hover img {
    transform: translateY(2px);
}

@media (max-width: 1024px) {
    .pro_detail .container { padding: 50px 0; }
    .pro_detail .infor.has_con { flex-direction: column; gap: 15px; }
    .pro_detail .infor.has_con .tit,
    .pro_detail .infor.has_con .con { width: 100%; }
    .pro_detail03 .content ul { flex-direction: column; }
    .pro_qiehuan .content { flex-direction: column; }
    .pro_qiehuan .content .left,
    .pro_qiehuan .content .right { width: 100%; }
    .pro_detail05 .content ul { grid-template-columns: 1fr; }
    .pro_detail_521 .content { flex-direction: column; }
    .pro_detail_521 .content .left,
    .pro_detail_521 .content .right { width: 100%; }
    .pro_detail_521 .content .right ul { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
}
@media (max-width: 640px) {
    .pro_detail .fz32 { font-size: 26px; line-height: 32px; }
    .pro_detail_521 .content .right ul { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')
    <!-- ================= BREADCRUMB ================= -->
    <div class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 py-3.5 sm:py-4">
            <nav aria-label="Breadcrumb" class="flex flex-wrap items-center gap-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('produk') }}" class="hover:text-[#0067b1] transition-colors">Produk</a>
                <span class="text-slate-300">/</span>
                <a href="{{ route('produk.series', $seriesKey) }}" class="hover:text-[#0067b1] transition-colors">{{ $seriesName }} Series</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    <!-- ================= 1. PRODUCT HERO SPLIT (GALLERY + INFO) ================= -->
    <section class="w-full bg-white py-8 sm:py-12 lg:py-14 border-b border-slate-200">
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

                <!-- Left: Main Image Stage + Thumbnails -->
                <div class="lg:col-span-6 space-y-3">
                    <div class="relative w-full aspect-[4/3] bg-slate-50 border border-slate-200 flex items-center justify-center p-4 sm:p-8 overflow-hidden group">
                        <img id="product-main-image"
                            src="{{ $gallery[0] ?? $product->image_url }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105 drop-shadow-md select-none">
                    </div>

                    @if(count($gallery) > 1)
                        <div class="grid grid-cols-4 sm:grid-cols-5 gap-2.5">
                            @foreach($gallery as $idx => $imgUrl)
                                <button type="button"
                                    data-gallery-src="{{ $imgUrl }}"
                                    aria-label="Lihat gambar {{ $idx + 1 }} {{ $product->name }}"
                                    class="product-thumb aspect-[4/3] bg-slate-50 border-2 p-1.5 overflow-hidden transition-all cursor-pointer {{ $idx === 0 ? 'border-[#0067b1] ring-1 ring-[#0067b1]/30' : 'border-slate-200 hover:border-slate-400 opacity-80 hover:opacity-100' }}">
                                    <img src="{{ $imgUrl }}" alt="{{ $product->name }} thumbnail {{ $idx + 1 }}"
                                        class="w-full h-full object-cover select-none pointer-events-none">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Right: Core Product Info & Quick Specs -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] leading-[1.05] tracking-tight">
                            {{ $product->name }}
                        </h1>
                        @if(!empty($product->type))
                            <p class="text-sm font-medium text-slate-500 mt-1.5">{{ $product->type }}</p>
                        @endif
                    </div>

                    <!-- Quick Key Specs (2x2 Industrial Grid) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="bg-[#f8fafc] border border-slate-200 border-l-4 border-l-[#0067b1] px-4 py-3">
                            <span class="block text-[11px] font-bold font-sans uppercase tracking-wider text-slate-500">Drive Type</span>
                            <span class="block text-sm sm:text-base font-bold text-[#00163c] mt-0.5">{{ $product->drive ?? '6x4 / 8x4 Heavy-Duty' }}</span>
                        </div>
                        <div class="bg-[#f8fafc] border border-slate-200 border-l-4 border-l-[#0067b1] px-4 py-3">
                            <span class="block text-[11px] font-bold font-sans uppercase tracking-wider text-slate-500">Engine</span>
                            <span class="block text-sm sm:text-base font-bold text-[#00163c] mt-0.5">{{ $product->engine ?? 'Weichai WP12 Series' }}</span>
                        </div>
                        <div class="bg-[#f8fafc] border border-slate-200 border-l-4 border-l-[#00163c] px-4 py-3">
                            <span class="block text-[11px] font-bold font-sans uppercase tracking-wider text-slate-500">Payload Capacity</span>
                            <span class="block text-sm sm:text-base font-bold text-[#00163c] mt-0.5">{{ $product->capacity ?? '30 – 45 Ton' }}</span>
                        </div>
                        <div class="bg-[#f8fafc] border border-slate-200 border-l-4 border-l-[#00163c] px-4 py-3">
                            <span class="block text-[11px] font-bold font-sans uppercase tracking-wider text-slate-500">Transmission</span>
                            <span class="block text-sm sm:text-base font-bold text-[#00163c] mt-0.5">{{ $productSpecs['transmission'] ?? 'FAST 12-Speed Manual' }}</span>
                        </div>
                    </div>

                    @if(!empty($product->description))
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed border-t border-slate-100 pt-4">
                            {{ $product->description }}
                        </p>
                    @endif

                    <!-- Primary Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <a href="{{ route('kontak') }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-sm uppercase font-barlow-condensed tracking-wider transition-colors shadow-sm text-center">
                            <span>Request Quote</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>

                        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                            class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-[#00163c] hover:bg-[#070e1e] text-white font-bold text-sm uppercase font-barlow-condensed tracking-wider transition-colors shadow-sm text-center">
                            <span>Hubungi Kami</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 2. SERIES HIGHLIGHTS & SPECIFICATION (FROM SERIES PAGE) ================= -->
    <div id="overview" class="pro_detail pro_detail_{{ $seriesKey }}">

        @if(!empty($seriesData['section3']))
            <div class="pro_detail03">
                <div class="wrap">
                    <div class="container">
                        <div class="infor fix has_con">
                            <div class="tit l fz32">{{ $seriesData['section3']['title'] }}</div>
                            <div class="con r fz14"><p>{{ $seriesData['section3']['intro'] }}</p></div>
                        </div>
                        <div class="content">
                            <ul class="fix">
                                @foreach($seriesData['section3']['cards'] ?? [] as $card)
                                    <li>
                                        <div class="rect-68">
                                            @if(!empty($card['image']) && file_exists(public_path($card['image'])))
                                                <img src="{{ asset($card['image']) }}" class="_full" alt="{{ $card['title'] }}" loading="lazy">
                                            @endif
                                        </div>
                                        <div class="info">
                                            <div class="t el">{{ $card['title'] }}</div>
                                            <div class="c fz14"><p>{{ $card['desc'] }}</p></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($seriesData['section4']))
            <div class="pro_detail04 pro_qiehuan">
                <div class="wrap">
                    <div class="container">
                        <div class="content fix">
                            <div class="left">
                                <div class="infor">
                                    <div class="tit fz32">{{ $seriesData['section4']['title'] }}</div>
                                </div>
                                <ul class="list">
                                    @foreach($seriesData['section4']['items'] ?? [] as $item)
                                        <li class="{{ $loop->first ? 'cur' : '' }}">
                                            <div class="li_top el"><span>{{ $item['title'] }}</span></div>
                                            <div class="li_bott fz14"><p>{{ $item['desc'] }}</p></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <div class="rect-684">
                                    @foreach($seriesData['section4']['items'] ?? [] as $item)
                                        @if(!empty($item['image']) && file_exists(public_path($item['image'])))
                                            <img src="{{ asset($item['image']) }}" class="_full {{ $loop->first ? 'cur' : '' }}" alt="{{ $item['title'] }}" loading="lazy">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @php
            $unitText = strtolower(($product->type ?? '') . ' ' . ($product->name ?? '') . ' ' . ($product->slug ?? ''));
            $isDumpOrTractor = str_contains($unitText, 'dump') || str_contains($unitText, 'tractor') || str_contains($unitText, 'head');
        @endphp

        @if(!empty($seriesData['section5']))
            <div class="pro_detail05">
                <div class="wrap">
                    <div class="container">
                        <div class="infor">
                            <div class="tit fz32">{{ $seriesData['section5']['title'] }}</div>
                        </div>
                        <div class="content">
                            @if($isDumpOrTractor && !empty($seriesData['section5']['main_image']) && file_exists(public_path($seriesData['section5']['main_image'])))
                                <div class="img_">
                                    <img src="{{ asset($seriesData['section5']['main_image']) }}" alt="{{ $seriesData['section5']['title'] }}" loading="lazy">
                                </div>
                            @endif
                            <ul class="fix">
                                @foreach($seriesData['section5']['cards'] ?? [] as $card)
                                    <li>
                                        <div class="info">
                                            <div class="t el">{{ $card['title'] }}</div>
                                            <div class="c"><span><p>{{ $card['desc'] }}</p></span></div>
                                        </div>
                                        @if(!empty($card['image']) && file_exists(public_path($card['image'])))
                                            <div class="rect-56">
                                                <img src="{{ asset($card['image']) }}" class="_full" alt="{{ $card['title'] }}" loading="lazy">
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(!empty($seriesData['section6']))
            <div class="pro_detail06 pro_qiehuan">
                <div class="wrap">
                    <div class="container">
                        <div class="infor fix">
                            <div class="tit l fz32">{{ $seriesData['section6']['title'] }}</div>
                            <div class="con r fz14"></div>
                        </div>
                        @if(!empty($seriesData['section6']['main_image']) && file_exists(public_path($seriesData['section6']['main_image'])))
                            <div class="img_">
                                <img src="{{ asset($seriesData['section6']['main_image']) }}" alt="{{ $seriesData['section6']['title'] }}" loading="lazy">
                            </div>
                        @endif
                        <div class="content fix">
                            <div class="left">
                                <ul class="list">
                                    @foreach($seriesData['section6']['items'] ?? [] as $item)
                                        <li class="{{ $loop->first ? 'cur' : '' }}">
                                            <div class="li_top el"><span>{{ $item['title'] }}</span></div>
                                            <div class="li_bott fz14"><p>{{ $item['desc'] }}</p></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <div class="rect-684">
                                    @foreach($seriesData['section6']['items'] ?? [] as $item)
                                        @if(!empty($item['image']) && file_exists(public_path($item['image'])))
                                            <img src="{{ asset($item['image']) }}" class="_full {{ $loop->first ? 'cur' : '' }}" alt="{{ $item['title'] }}" loading="lazy">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- ================= 3. TECHNICAL SPECIFICATIONS TABLE (pro_detail_521) ================= -->
        <div class="pro_detail_521" id="spesifikasi">
            <div class="wrap">
                <div class="container" style="border-bottom: none;">
                    <div class="infor flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <h2 class="tit fz32">Specification</h2>

                        @php
                            $universalManual = 'https://shacman.com/upload/file/2025/03/28/62664cf7a6a3429d9ea7c4bceeee4551.pdf';
                            $rawManualUrl = $seriesData['manual_url'] ?? $universalManual;
                            $manualTarget = str_starts_with($rawManualUrl, 'http') ? $rawManualUrl : asset($rawManualUrl);
                        @endphp
                        <a href="{{ $manualTarget }}" target="_blank" rel="noopener noreferrer" class="btn_manual self-start sm:self-auto">
                            <span>Download Product Manual</span>
                            <img src="{{ asset('images/series/pro_detail01_3.png') }}" alt="Download">
                        </a>
                    </div>
                    <div class="content">
                        <div class="left">
                            <div class="table-responsive">
                                <table class="table datalist" cellspacing="0" cellpadding="0" width="100%">
                                    <tbody>
                                        <tr class="firstRow">
                                            <th colspan="3" style="width: 35%;">Type</th>
                                            <th colspan="4">{{ $product->name }} ({{ $product->type ?? ($seriesData['spec_type'] ?? $seriesName) }})</th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="font-weight: 500;">Drive</td>
                                            <td colspan="4">{{ $product->drive ?? ($seriesData['spec_drive'] ?? '6×4') }}</td>
                                        </tr>

                                        @if(!empty($specRows))
                                            @foreach($specRows as $idx => $row)
                                                <tr>
                                                    @if($idx === 0)
                                                        <td rowspan="{{ count($specRows) }}" class="main-config-td">
                                                            Main configuration
                                                        </td>
                                                    @endif
                                                    <td colspan="2" style="width: 28%; font-weight: 600;">{{ $row['item'] ?? '' }}</td>
                                                    <td colspan="4">{{ $row['value'] ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if($isDumpOrTractor && !empty($seriesData['spec_variants']))
                            <div class="right">
                                <ul>
                                    @foreach($seriesData['spec_variants'] as $variant)
                                        @if(!empty($variant['image']) && file_exists(public_path($variant['image'])))
                                            <li>
                                                <div class="img_">
                                                    <div class="rect-542">
                                                        <img src="{{ asset($variant['image']) }}" class="_full" alt="{{ $variant['name'] }}" loading="lazy">
                                                    </div>
                                                </div>
                                                <div class="info_">
                                                    <div class="txt">{{ $variant['name'] }}</div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @elseif(!$isDumpOrTractor && count($gallery) > 0)
                            @php
                                $unitSideImages = count($gallery) > 1 ? array_slice($gallery, 1, 3) : array_slice($gallery, 0, 1);
                            @endphp
                            <div class="right">
                                <ul>
                                    @foreach($unitSideImages as $gIdx => $gUrl)
                                        <li>
                                            <div class="img_">
                                                <div class="rect-542">
                                                    <img src="{{ $gUrl }}" class="_full" alt="{{ $product->name }} — Sudut {{ $gIdx + 1 }}" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="info_">
                                                <div class="txt">{{ $product->name }} — Detail {{ $gIdx + 1 }}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ================= 4. RELATED PRODUCTS ================= -->
    @if($relatedProducts->isNotEmpty())
        <section id="unit-lainnya" class="w-full bg-[#f8fafc] py-12 sm:py-16">
            <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
                <div class="flex items-center justify-between gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <span class="w-1.5 h-7 bg-[#0067b1] inline-block"></span>
                        <h2 class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] tracking-tight">
                            Unit SHACMAN Lainnya
                        </h2>
                    </div>
                    <a href="{{ route('produk') }}"
                        class="text-xs sm:text-sm font-bold text-[#0067b1] hover:text-[#004880] uppercase tracking-wider">
                        Semua Katalog →
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedProducts as $rel)
                        @php
                            $relDrive = $rel->drive ? explode(' ', $rel->drive)[0] : '6X4';
                            $relQuote = 'Halo PT SHINDO, saya tertarik meminta penawaran unit: ' . $rel->name . ' (' . ($rel->drive ?? '6x4') . ').';
                        @endphp
                        <div class="bg-white border border-slate-200 hover:border-[#0067b1] shadow-xs hover:shadow-lg transition-all duration-300 p-5 sm:p-6 flex flex-col justify-between group">
                            <div>
                                <a href="{{ route('produk.detail', $rel->slug) }}"
                                    class="block w-full aspect-[4/3] flex items-center justify-center p-4 mb-4 bg-slate-50/70 border border-slate-100 overflow-hidden">
                                    <img src="{{ $rel->image_url }}" alt="{{ $rel->name }}"
                                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300 select-none">
                                </a>
                                @if(!empty($rel->type))
                                    <span class="block text-[11px] font-bold uppercase tracking-wider text-[#0067b1] mb-1">
                                        {{ $rel->type }}
                                    </span>
                                @endif
                                <h3 class="text-xl font-bold font-barlow-condensed uppercase not-italic text-slate-900 group-hover:text-[#0067b1] transition-colors">
                                    <a href="{{ route('produk.detail', $rel->slug) }}">{{ $rel->name }}</a>
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                                    Chassis {{ strtoupper($relDrive) }} @if(!empty($rel->engine)) • {{ $rel->engine }} @endif
                                </p>
                            </div>

                            <div class="grid grid-cols-2 gap-3 mt-5 pt-4 border-t border-slate-100">
                                <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode($relQuote) }}" target="_blank" rel="noopener noreferrer"
                                    class="flex items-center justify-center py-2.5 px-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs uppercase font-barlow-condensed tracking-wider transition-colors text-center">
                                    Hubungi Kami
                                </a>
                                <a href="{{ route('produk.detail', $rel->slug) }}"
                                    class="flex items-center justify-center py-2.5 px-3 bg-white hover:bg-slate-50 text-[#0067b1] border border-slate-300 hover:border-[#0067b1] font-bold text-xs uppercase font-barlow-condensed tracking-wider transition-colors text-center">
                                    Detail Unit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Gallery Thumbnail Switcher
            const mainImg = document.getElementById('product-main-image');
            const thumbs = document.querySelectorAll('.product-thumb');
            if (mainImg && thumbs.length > 0) {
                thumbs.forEach(function (thumb) {
                    thumb.addEventListener('click', function () {
                        const newSrc = thumb.getAttribute('data-gallery-src');
                        if (newSrc) {
                            mainImg.src = newSrc;
                        }
                        thumbs.forEach(function (t) {
                            t.classList.remove('border-[#0067b1]', 'ring-1', 'ring-[#0067b1]/30');
                            t.classList.add('border-slate-200', 'opacity-80');
                        });
                        thumb.classList.remove('border-slate-200', 'opacity-80');
                        thumb.classList.add('border-[#0067b1]', 'ring-1', 'ring-[#0067b1]/30');
                    });
                });
            }

            // Series Feature Accordion Switcher (.pro_qiehuan)
            const switchers = document.querySelectorAll('.pro_qiehuan');
            switchers.forEach(function (switcher) {
                const listItems = switcher.querySelectorAll('.content .left li');
                const rightImgs = switcher.querySelectorAll('.content .right img');

                listItems.forEach(function (li, idx) {
                    const trigger = li.querySelector('.li_top');
                    if (!trigger) return;

                    trigger.addEventListener('click', function () {
                        rightImgs.forEach(function (img, imgIdx) {
                            img.classList.toggle('cur', imgIdx === idx);
                        });

                        if (!li.classList.contains('cur')) {
                            listItems.forEach(function (item) {
                                item.classList.remove('cur');
                            });
                            li.classList.add('cur');
                        }
                    });
                });
            });
        });
    </script>
@endpush

