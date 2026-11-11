@extends('layouts.public')

@section('title', ($seriesData['full_name'] ?? 'SHACMAN Series') . ' | SHINDO')
@section('meta_description', strip_tags($seriesData['intro'] ?? 'Spesifikasi resmi truk heavy duty SHACMAN.'))

@push('styles')
<style>
/* ================= SHACMAN OFFICIAL STYLES ================= */

.channel_content.pro_detail {
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

.pro_detail01 .container {
    padding-top: 45px;
}

/* Breadcrumbs (xc_crumbs) */
.xc_crumbs {
    background: #fff;
    position: relative;
    width: 100%;
}
.xc_crumbs .wrap {
    max-width: 1400px;
    margin-left: auto;
    margin-right: auto;
    padding: 0 20px;
}
.crumbs {
    font-size: 12px;
    line-height: 30px;
    color: #393939;
    padding: 20px 0 35px;
    display: flex;
    align-items: center;
}
.crumbs a {
    color: #393939;
    text-decoration: none;
    transition: color .2s;
}
.crumbs a:hover {
    color: #0067b1;
}
.crumbs em {
    display: inline-block;
    vertical-align: middle;
    width: 8px;
    height: 13px;
    background: url('{{ asset("images/series/crumbs_jt.png") }}') no-repeat center;
    margin: 0 16px;
}
.crumbs span {
    color: #00163c;
    font-weight: 700;
}

/* Headers (.infor & .has_con) */
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
.fz32 {
    font-size: 32px;
    line-height: 40px;
    color: #00163c;
    font-family: 'Barlow Condensed', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.02em;
}
.fz14 {
    font-size: 14px;
}

/* Aspect ratio helper */
*[class*="rect-"] {
    position: relative;
    display: block;
    width: 100%;
    height: 0;
    overflow: hidden;
}
*[class*="rect-"] ._full {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.rect-68 { padding-bottom: 68%; }
.rect-684 { padding-bottom: 68.4%; }
.rect-56 { padding-bottom: 56.17%; }
.rect-542 { padding-bottom: 54.2%; }
.rect-66 { padding-bottom: 66%; }

/* ================= SECTION 01: HERO ================= */
.pro_detail01 .content {
    position: relative;
    padding-bottom: 220px;
}
.pro_detail01 .content .img_ {
    position: relative;
    width: 100%;
    aspect-ratio: 21/9;
    background: #f1f5f9;
    overflow: hidden;
    border: 1px solid #D1D4DA;
}
.pro_detail01 .content .img_ img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.pro_detail01 .content .car {
    position: absolute;
    left: 45px;
    bottom: 0;
    width: 32%;
    max-width: 440px;
    z-index: 5;
    pointer-events: none;
}
.pro_detail01 .content .car img {
    width: 100%;
    height: auto;
    display: block;
    filter: drop-shadow(0 20px 25px rgba(0,0,0,0.25));
}
.pro_detail01 .content .info {
    width: 58%;
    float: right;
    padding: 40px 0 20px;
}
.pro_detail01 .content .info .text {
    margin-bottom: 24px;
    font-size: 14px;
    line-height: 26px;
    color: #475569;
}
.pro_detail01 .content .info .btn_group {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 14px;
}
.btn_quote {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 0 24px;
    height: 48px;
    line-height: 48px;
    font-size: 13px;
    color: #fff !important;
    text-transform: uppercase;
    font-weight: 700;
    font-family: 'Barlow Condensed', 'Barlow', sans-serif;
    letter-spacing: 0.04em;
    background: #0067b1;
    border: 1px solid #0067b1;
    text-decoration: none !important;
    transition: all 0.25s ease;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 103, 177, 0.25);
    white-space: nowrap;
}
.btn_quote:hover {
    background: #004d85;
    border-color: #004d85;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(0, 103, 177, 0.35);
    transform: translateY(-1px);
}
.btn_quote svg {
    display: inline-block !important;
    width: 15px;
    height: 15px;
    flex-shrink: 0;
    transition: transform 0.2s ease;
}
.btn_quote:hover svg {
    transform: translateX(3px);
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
.pro_detail01 .content .info .more {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 0 24px;
    font-size: 13px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    background: #00163c;
    line-height: 50px;
    text-decoration: none;
    transition: background 0.3s ease;
}
.pro_detail01 .content .info .more:hover {
    background: #0067b1;
}

/* ================= SECTION 02: A CLOSER LOOK ================= */
.pro_detail02 .content a {
    display: block;
    position: relative;
    overflow: hidden;
    aspect-ratio: 21/9;
    background: #000;
    border: 1px solid #D1D4DA;
}
.pro_detail02 .content a img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}
.pro_detail02 .content a:hover img {
    transform: scale(1.05);
}
.pro_detail02 .content a .icon {
    width: 116px;
    height: 116px;
    background: url('{{ asset("images/series/vr_360.png") }}') no-repeat center;
    background-size: contain;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 3;
    transition: transform 0.4s ease;
    filter: drop-shadow(0 4px 10px rgba(0,0,0,0.4));
}
.pro_detail02 .content a:hover .icon {
    transform: translate(-50%, -50%) scale(1.12);
}

/* ================= SECTION 03: RELIABLE RESULTS (3 Cards) ================= */
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

/* ================= SECTION 04 & 06: PRO_QIEHUAN (AUTHENTIC ACCORDION) ================= */
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

/* ================= SECTION 05: DELIVERING EFFICIENCY ================= */
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

/* ================= SECTION 06: CABIN / EASY TO LIVE IN ================= */
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

/* ================= SECTION 07: SPECIFICATION (pro_detail_521 PLEK KETIPLEK) ================= */
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
.pro_detail_521 .table.datalist .sub-cat-td {
    font-weight: 600;
    text-align: center;
    color: #00163C;
    width: 16%;
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

/* ================= SECTION 08: TWO ACTION CARDS (pro_detail07) ================= */
.pro_detail07 .content {
    display: flex;
    gap: 30px;
}
.pro_detail07 .content .item {
    flex: 1;
    position: relative;
    overflow: hidden;
    background: #00163c;
}
.pro_detail07 .content .item .rect-66 {
    background: #00163c;
}
.pro_detail07 .content .item img {
    transition: transform 0.6s ease, opacity 0.6s ease;
    opacity: 0.7;
}
.pro_detail07 .content .item:hover img {
    transform: scale(1.06);
    opacity: 0.55;
}
.pro_detail07 .content .item .info {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 30px;
    color: #fff;
    text-decoration: none;
}
.pro_detail07 .content .item .info .tit {
    color: #ffffff !important;
    font-size: 28px;
    line-height: 34px;
    font-weight: 700;
    font-family: 'Barlow Condensed', sans-serif;
    text-transform: uppercase;
    margin-bottom: 12px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.7);
}
.pro_detail07 .content .item .info .con {
    font-size: 14px;
    line-height: 24px;
    color: #ffffff !important;
    opacity: 0.95;
    max-width: 400px;
    margin-bottom: 28px;
    text-shadow: 0 1px 4px rgba(0,0,0,0.7);
}
.pro_detail07 .content .item .info .more {
    display: inline-block;
    padding: 0 36px;
    line-height: 48px;
    border: 1px solid #fff;
    color: #fff;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.05em;
    transition: all 0.3s ease;
}
.pro_detail07 .content .item:hover .info .more {
    background: #0067b1;
    border-color: #0067b1;
    color: #fff;
}

/* ================= SECTION 09: HOW CAN WE HELP (pro_detail08) ================= */
.pro_detail08 {
    margin-top: 70px;
    height: 460px;
    background: url('{{ asset("images/series/pro_detail08_1.jpg") }}') no-repeat center;
    background-size: cover;
    position: relative;
}
.pro_detail08::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0, 22, 60, 0.45);
    z-index: 1;
}
.pro_detail08 .content {
    position: relative;
    z-index: 2;
    height: 100%;
}
.pro_detail08 .content .info {
    width: 80%;
    max-width: 800px;
    height: 100%;
    position: absolute;
    left: 50%;
    top: 0;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    text-decoration: none;
}
.pro_detail08 .content .info .box {
    color: #fff;
}
.pro_detail08 .content .info .box .tit {
    font-size: 36px;
    line-height: 44px;
    color: #ffffff !important;
    font-family: 'Barlow Condensed', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    margin-bottom: 14px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.8);
}
.pro_detail08 .content .info .box .con {
    font-size: 15px;
    line-height: 26px;
    color: #ffffff !important;
    opacity: 0.95;
    margin-bottom: 32px;
    text-shadow: 0 1px 6px rgba(0,0,0,0.8);
}
.pro_detail08 .content .info .box .more {
    display: inline-block;
    padding: 0 44px;
    line-height: 50px;
    background: #0067b1;
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.05em;
    text-decoration: none;
    transition: background 0.3s ease;
}
.pro_detail08 .content .info .box .more:hover {
    background: #005a9c;
}

/* ================= RESPONSIVE QUERIES ================= */
@media (max-width: 1024px) {
    .pro_detail .container { padding: 50px 0; }
    .pro_detail01 .container { padding-top: 30px; }
    .pro_detail .infor.has_con { flex-direction: column; gap: 15px; }
    .pro_detail .infor.has_con .tit,
    .pro_detail .infor.has_con .con { width: 100%; }
    .pro_detail01 .content { padding-bottom: 0; }
    .pro_detail01 .content .car { display: none; }
    .pro_detail01 .content .info { width: 100%; float: none; padding: 25px 0 0; }
    .pro_detail03 .content ul { flex-direction: column; }
    .pro_qiehuan .content { flex-direction: column; }
    .pro_qiehuan .content .left,
    .pro_qiehuan .content .right { width: 100%; }
    .pro_detail05 .content ul { grid-template-columns: 1fr; }
    .pro_detail_521 .content { flex-direction: column; }
    .pro_detail_521 .content .left,
    .pro_detail_521 .content .right { width: 100%; }
    .pro_detail_521 .content .right ul { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .pro_detail07 .content { flex-direction: column; }
}

@media (max-width: 640px) {
    .fz32 { font-size: 26px; line-height: 32px; }
    .pro_detail01 .content .info .btn_group {
        flex-direction: column;
        align-items: stretch;
        width: 100%;
    }
    .btn_quote,
    .btn_manual {
        width: 100%;
        justify-content: center;
    }
    .pro_detail_521 .content .right ul { grid-template-columns: 1fr; }
    .pro_detail08 { height: 380px; }
    .pro_detail08 .content .info .box .tit { font-size: 26px; line-height: 32px; }
}
</style>
@endpush

@section('content')
    @php
        $waPhone = preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890');
        if (str_starts_with($waPhone, '0')) {
            $waPhone = '62' . substr($waPhone, 1);
        }
        $quoteMsg = urlencode("Halo PT Shindo Tractors Adiperkasa, saya tertarik meminta informasi spesifikasi teknis dan penawaran harga resmi untuk unit SHACMAN " . ($seriesData['key'] ?? '') . " Series.");
    @endphp

    <!-- ================= BREADCRUMBS ================= -->
    <div class="w-full bg-white border-b border-slate-200">
        <div class="max-w-[1400px] mx-auto px-5 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <a href="{{ url('/produk') }}" class="hover:text-[#0067b1] transition-colors">Produk</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">{{ $seriesData['key'] }}</span>
            </div>
        </div>
    </div>

    <!-- ================= MAIN CONTENT (channel_content pro_detail) ================= -->
    <section class="channel_content pro_detail pro_detail_{{ $seriesKeyLower }}">

        <!-- ================= SECTION 01: HERO & INTRO (pro_detail01) ================= -->
        <div class="pro_detail01">
            <div class="wrap">
                <div class="container">
                    <div class="infor fix has_con">
                        <div class="tit l fz32">
                            {{ $seriesData['key'] }} <br>{{ $seriesData['tagline'] ?? '' }}
                        </div>
                        <div class="con r fz14">
                            <p>{{ $seriesData['intro'] }}</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="img_">
                            <img src="{{ asset($seriesData['hero_image']) }}" alt="{{ $seriesData['name'] }}">
                        </div>
                        <div class="info">
                            <div class="box">
                                <div class="text fz14">
                                    <p>{{ $seriesData['intro'] }}</p>
                                </div>
                                <div class="btn_group">
                                    <a href="https://wa.me/{{ $waPhone }}?text={{ $quoteMsg }}" target="_blank" rel="noopener noreferrer" class="btn_quote">
                                        <span>Hubungi Kami</span>
                                        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>

                                    @php
                                        $universalManual = 'https://shacman.com/upload/file/2025/03/28/62664cf7a6a3429d9ea7c4bceeee4551.pdf';
                                        $rawManualUrl = $seriesData['manual_url'] ?? $universalManual;
                                        $manualTarget = str_starts_with($rawManualUrl, 'http') ? $rawManualUrl : asset($rawManualUrl);
                                    @endphp
                                    <a href="{{ $manualTarget }}" target="_blank" rel="noopener noreferrer" class="btn_manual">
                                        <span>Download Product Manual</span>
                                        <img src="{{ asset('images/series/pro_detail01_3.png') }}" alt="Download">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if(!empty($seriesData['truck_render']) && file_exists(public_path($seriesData['truck_render'])))
                            <div class="car">
                                <img src="{{ asset($seriesData['truck_render']) }}" alt="SHACMAN {{ $seriesData['name'] }}" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= SECTION 02: A CLOSER LOOK (pro_detail02) ================= -->
        @if(!empty($seriesData['closer_look_image']) && !empty($seriesData['vr_360_url']))
            <div class="pro_detail02">
                <div class="wrap">
                    <div class="container">
                        <div class="infor fix">
                            <div class="tit fz32">A CLOSER LOOK</div>
                        </div>
                        <div class="content">
                            <a href="{{ $seriesData['vr_360_url'] }}" target="_blank" rel="noopener noreferrer" title="Buka Virtual Tour 360° SHACMAN">
                                <img src="{{ asset($seriesData['closer_look_image']) }}" alt="{{ $seriesData['name'] }}">
                                <div class="icon"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- ================= SECTION 03: RELIABLE RESULTS (pro_detail03) ================= -->
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
                                                <img src="{{ asset($card['image']) }}" class="_full" alt="{{ $card['title'] }}">
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

        <!-- ================= SECTION 04: INTELLIGENT CONTROLS / ACCORDION (pro_detail04 pro_qiehuan) ================= -->
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
                                    @foreach($seriesData['section4']['items'] ?? [] as $idx => $item)
                                        <li class="{{ $loop->first ? 'cur' : '' }}">
                                            <div class="li_top el"><span>{{ $item['title'] }}</span></div>
                                            <div class="li_bott fz14"><p>{{ $item['desc'] }}</p></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <div class="rect-684">
                                    @foreach($seriesData['section4']['items'] ?? [] as $idx => $item)
                                        @if(!empty($item['image']) && file_exists(public_path($item['image'])))
                                            <img src="{{ asset($item['image']) }}" class="_full {{ $loop->first ? 'cur' : '' }}" alt="{{ $item['title'] }}">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- ================= SECTION 05: DELIVERING EFFICIENCY (pro_detail05) ================= -->
        @if(!empty($seriesData['section5']))
            <div class="pro_detail05">
                <div class="wrap">
                    <div class="container">
                        <div class="infor">
                            <div class="tit fz32">{{ $seriesData['section5']['title'] }}</div>
                        </div>
                        <div class="content">
                            @if(!empty($seriesData['section5']['main_image']) && file_exists(public_path($seriesData['section5']['main_image'])))
                                <div class="img_">
                                    <img src="{{ asset($seriesData['section5']['main_image']) }}" alt="{{ $seriesData['section5']['title'] }}">
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
                                                <img src="{{ asset($card['image']) }}" class="_full" alt="{{ $card['title'] }}">
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

        <!-- ================= SECTION 06: CABIN / EASY TO LIVE IN (pro_detail06 pro_qiehuan) ================= -->
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
                                <img src="{{ asset($seriesData['section6']['main_image']) }}" alt="{{ $seriesData['section6']['title'] }}">
                            </div>
                        @endif
                        <div class="content fix">
                            <div class="left">
                                <ul class="list">
                                    @foreach($seriesData['section6']['items'] ?? [] as $idx => $item)
                                        <li class="{{ $loop->first ? 'cur' : '' }}">
                                            <div class="li_top el"><span>{{ $item['title'] }}</span></div>
                                            <div class="li_bott fz14"><p>{{ $item['desc'] }}</p></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <div class="rect-684">
                                    @foreach($seriesData['section6']['items'] ?? [] as $idx => $item)
                                        @if(!empty($item['image']) && file_exists(public_path($item['image'])))
                                            <img src="{{ asset($item['image']) }}" class="_full {{ $loop->first ? 'cur' : '' }}" alt="{{ $item['title'] }}">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- ================= SECTION 07: SPECIFICATION DATA TABLE (pro_detail_521 PLEK KETIPLEK) ================= -->
        <div class="pro_detail_521" id="spesifikasi">
            <div class="wrap">
                <div class="container">
                    <div class="infor">
                        <div class="tit fz32">Specification</div>
                    </div>
                    <div class="content">
                        <!-- Left: Authentic 3-Tier Merged Shacman Table -->
                        <div class="left">
                            <div class="table-responsive">
                                <table class="table datalist" cellspacing="0" cellpadding="0" width="100%">
                                    <tbody>
                                        <tr class="firstRow">
                                            <th colspan="3" style="width: 35%;">Type</th>
                                            <th colspan="4">{{ $seriesData['spec_type'] ?? 'Tractor, dump, cargo' }}</th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="font-weight: 500;">Drive</td>
                                            <td colspan="4">{{ $seriesData['spec_drive'] ?? '4×2， 6×4， 8x4' }}</td>
                                        </tr>

                                        @php
                                            $totalConfigRows = 0;
                                            foreach($seriesData['spec_config'] ?? [] as $catItems) {
                                                $totalConfigRows += count($catItems);
                                            }
                                            $firstCat = true;
                                        @endphp

                                        @foreach($seriesData['spec_config'] ?? [] as $catName => $catItems)
                                            @foreach($catItems as $itemIdx => $catItem)
                                                <tr>
                                                    @if($firstCat)
                                                        <td rowspan="{{ $totalConfigRows }}" class="main-config-td">
                                                            Main configuration
                                                        </td>
                                                        @php $firstCat = false; @endphp
                                                    @endif

                                                    @if($itemIdx === 0)
                                                        <td rowspan="{{ count($catItems) }}" class="sub-cat-td">
                                                            {{ $catName }}
                                                        </td>
                                                    @endif

                                                    <td style="width: 22%;">{{ $catItem['name'] }}</td>
                                                    <td colspan="4">{{ $catItem['val'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Right: Blueprint Diagrams (Isometric + Top Cutaways) -->
                        <div class="right">
                            <ul>
                                @foreach($seriesData['spec_variants'] ?? [] as $variant)
                                    <li>
                                        <div class="img_">
                                            <div class="rect-542">
                                                <img src="{{ asset($variant['image']) }}" class="_full" alt="{{ $variant['name'] }}">
                                            </div>
                                        </div>
                                        <div class="info_">
                                            <div class="txt">{{ $variant['name'] }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= SECTION 08: TWO ACTION CARDS (pro_detail07) ================= -->
        <div class="pro_detail07">
            <div class="wrap">
                <div class="content fix">
                    <div class="item l">
                        <div class="rect-66">
                            <img src="{{ asset('images/series/picker.jpg') }}" class="_full" alt="Pilih Unit Dump Truck" />
                        </div>
                        <a href="{{ url('/produk?seri=' . strtolower($seriesData['key'])) }}" class="info">
                            <div class="box">
                                <div class="tit fz32" style="color: #ffffff !important;">PILIH UNIT DUMP TRUCK</div>
                                <div class="con" style="color: #ffffff !important;">Lihat ketersediaan unit armada SHACMAN di katalog resmi dealer PT SHINDO</div>
                                <div class="more">Lihat di Katalog</div>
                            </div>
                        </a>
                    </div>
                    <div class="item r">
                        <div class="rect-66">
                            <img src="{{ asset('images/series/gallery.jpg') }}" class="_full" alt="Layanan & Suku Cadang" />
                        </div>
                        <a href="{{ url('/layanan') }}" class="info">
                            <div class="box">
                                <div class="tit fz32" style="color: #ffffff !important;">LAYANAN & SUKU CADANG</div>
                                <div class="con" style="color: #ffffff !important;">Dukungan mekanik siaga 24 jam dan jaminan ketersediaan suku cadang asli di site Anda</div>
                                <div class="more">Pelajari Layanan</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= CINEMATIC ARMADA SHOWCASE BANNER ================= -->
        <section class="relative w-full overflow-hidden bg-[#070e1e] border-t border-slate-800 mt-12 sm:mt-16 lg:mt-24">
            <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk SHACMAN PT SHINDO"
                class="w-full h-auto block select-none pointer-events-none">
        </section>

    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Shacman Authentic Qiehuan Accordion Switcher
        const switchers = document.querySelectorAll('.pro_qiehuan');

        switchers.forEach(function (switcher) {
            const listItems = switcher.querySelectorAll('.content .left li');
            const rightImgs = switcher.querySelectorAll('.content .right img');

            listItems.forEach(function (li, idx) {
                const trigger = li.querySelector('.li_top');
                if (!trigger) return;

                trigger.addEventListener('click', function () {
                    // Switch corresponding image on right stage
                    rightImgs.forEach(function (img, imgIdx) {
                        if (imgIdx === idx) {
                            img.classList.add('cur');
                        } else {
                            img.classList.remove('cur');
                        }
                    });

                    // Toggle active item
                    if (li.classList.contains('cur')) {
                        // Keep active or toggle
                    } else {
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
