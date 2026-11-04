@extends('layouts.public')

@section('title', 'Tentang Kami | PT Shindo Tractors Adiperkasa - Dealer Resmi SHACMAN Indonesia')
@section('meta_description', 'Profil PT Shindo Tractors Adiperkasa, distributor utama SHACMAN Dump Truck di Indonesia dengan pengalaman lebih dari lima dekade, visi misi perusahaan, jaringan cabang, dan layanan purna jual SHASS.')

@push('styles')
    <style>
        /* ================= COMMERCIAL VEHICLE INDUSTRIAL MOTION & UTILS ================= */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .reveal-on-scroll.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-100 {
            transition-delay: 100ms;
        }

        .reveal-delay-150 {
            transition-delay: 150ms;
        }

        .reveal-delay-200 {
            transition-delay: 200ms;
        }

        .reveal-delay-250 {
            transition-delay: 250ms;
        }

        .reveal-delay-300 {
            transition-delay: 300ms;
        }

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
    <!-- ================= 1. HERO SECTION (DENGAN GAMBAR HERO YANG SUDAH ADA) ================= -->
    <section class="relative w-full bg-[#f4f6f9] text-slate-900 border-b border-slate-200 overflow-hidden">
        <!-- Background Hero Armada Truk SHACMAN -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/about-shacman-fleet-bg.png') }}"
                alt="Armada Truk SHACMAN PT Shindo Tractors Adiperkasa"
                class="w-full h-full object-cover object-[center_30%] opacity-20 select-none pointer-events-none scale-105 transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-t from-[#f4f6f9] via-[#f4f6f9]/85 to-[#f4f6f9]/50"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#f4f6f9] via-[#f4f6f9]/90 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-12 sm:pt-10 sm:pb-16 lg:pt-12 lg:pb-20 relative z-10">
            <!-- Breadcrumbs -->
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500 mb-6 sm:mb-8">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-400">/</span>
                <span class="text-[#0067b1] font-bold">Tentang Kami</span>
            </div>

            <!-- Asymmetrical Split Grid: Headline + Hero Truck Visual -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                <!-- Left: Authoritative Brand Information -->
                <div class="lg:col-span-7 space-y-6 reveal-on-scroll">


                    <h1
                        class="text-4xl sm:text-6xl lg:text-7xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-[0.92] tracking-tight">
                        PT SHINDO TRACTORS ADIPERKASA
                    </h1>

                    <p
                        class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-[#0067b1] tracking-wide">
                        Mitra Terpercaya Solusi Transportasi Alat Berat
                    </p>

                    <div class="border-l-4 border-l-[#0067b1] bg-white p-5 sm:p-6 border border-slate-200 shadow-xs">
                        <p class="text-slate-700 text-sm sm:text-base leading-relaxed">
                            Selamat datang di PT Shindo Tractors Adiperkasa, mitra terpercaya Anda dalam solusi transportasi
                            alat berat di Indonesia. Dengan pengalaman lebih dari lima dekade di industri ini, kami telah
                            memantapkan diri sebagai dealer resmi terkemuka untuk truk SHACMAN. Komitmen kami adalah
                            menyediakan
                            kendaraan berkualitas tinggi yang dirancang untuk kinerja maksimal dan keandalan di setiap
                            medan.
                        </p>
                    </div>

                </div>

                <!-- Right: High-Impact Truck Showcase Visual -->
                <div class="lg:col-span-5 reveal-on-scroll reveal-delay-150">
                    <div class="relative bg-white p-3 sm:p-4 border-2 border-slate-200 shadow-xl group">
                        <!-- Corner Crosshairs -->
                        <div class="absolute -top-1.5 -left-1.5 w-3.5 h-3.5 border-t-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -top-1.5 -right-1.5 w-3.5 h-3.5 border-t-2 border-r-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-1.5 -left-1.5 w-3.5 h-3.5 border-b-2 border-l-2 border-[#0067b1]">
                        </div>
                        <div class="absolute -bottom-1.5 -right-1.5 w-3.5 h-3.5 border-b-2 border-r-2 border-[#0067b1]">
                        </div>

                        <div class="relative overflow-hidden aspect-[4/3] bg-slate-100 flex items-center justify-center">
                            <img src="{{ asset('images/about-shacman-fleet-bg.png') }}"
                                alt="Armada SHACMAN PT Shindo Tractors Adiperkasa"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 select-none">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#00163c]/75 via-transparent to-transparent pointer-events-none">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= 2. SECTION: DISTRIBUTOR UTAMA SHACMAN DUMP TRUCK ================= -->
    <section class="w-full bg-white py-16 sm:py-24 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- Left Column: Dealer Information & Engineering Specs -->
                <div class="lg:col-span-6 space-y-6 reveal-on-scroll">
                    <div>
                        <h2
                            class="text-3xl sm:text-4xl lg:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c] leading-[1.02]">
                            AUTHORIZED DEALER <br> SHACMAN Dump Truck
                        </h2>
                    </div>

                    <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-normal">
                        Kami bangga menjadi distributor utama SHACMAN Dump Truck, yang dikenal luas sebagai pemimpin pasar
                        di Indonesia. Truk-truk kami dirancang untuk menghadapi tantangan terberat, memastikan produktivitas
                        dan efisiensi operasional bisnis Anda.
                    </p>

                    <div class="pt-2">
                        <a href="{{ url('/produk') }}"
                            class="inline-flex items-center px-8 py-3.5 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed not-italic tracking-wider transition-all duration-200 shadow-sm hover:shadow-md group">
                            <span>Lihat Katalog Truck</span>
                            <svg class="w-4 h-4 ml-2.5 transform group-hover:translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Truck Photo in Architectural Showcase Frame -->
                <div class="lg:col-span-6 reveal-on-scroll reveal-delay-200">
                    <div class="relative bg-white p-3 sm:p-5 border-2 border-slate-200 shadow-xl">
                        <!-- Corner Crosshairs -->
                        <div class="absolute -top-2 -left-2 w-4 h-4 border-t-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -top-2 -right-2 w-4 h-4 border-t-2 border-r-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -left-2 w-4 h-4 border-b-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -right-2 w-4 h-4 border-b-2 border-r-2 border-[#0067b1]"></div>

                        <div
                            class="relative overflow-hidden aspect-[4/3] bg-gradient-to-b from-slate-50 to-slate-100 flex items-center justify-center p-2">
                            <img src="{{ asset('images/about-truck.png') }}"
                                alt="SHACMAN Dump Truck PT Shindo Tractors Adiperkasa"
                                class="w-full h-full object-contain select-none transform hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 3. SECTION: VISI & MISI PERUSAHAAN (SESUAI DEALERSHACMAN.COM) ================= -->
    <section class="w-full bg-[#f4f6f9] py-16 sm:py-24 border-b border-slate-200 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Intro -->
            <div class="text-center max-w-3xl mx-auto mb-14 reveal-on-scroll">
                <h2
                    class="text-3xl sm:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c]">
                    VISI & MISI KAMI
                </h2>
            </div>

            <!-- Visi & Misi Side-by-Side Architectural Presentation -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">

                <!-- VISI CARD -->
                <div
                    class="lg:col-span-5 bg-white border border-slate-300 border-t-4 border-t-[#00163c] p-6 sm:p-8 shadow-sm flex flex-col justify-between reveal-on-scroll reveal-delay-100">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span
                                class="px-3.5 py-1 bg-[#00163c] text-white text-xs font-sans font-bold uppercase tracking-wider">
                                VISI
                            </span>
                        </div>

                        <h3
                            class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] mb-4">
                            Menjadi Dealer Truk SHACMAN Terkemuka di Indonesia
                        </h3>

                        <div class="bg-slate-50 border-l-4 border-l-[#00163c] p-4 sm:p-5 mb-6">
                            <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-medium">
                                "Menjadi dealer truk SHACMAN terkemuka di Indonesia yang menawarkan truk berkualitas tinggi
                                dan layanan purna jual yang baik kepada pelanggan, serta meningkatkan kepuasan pelanggan dan
                                pangsa pasar di industri truk."
                            </p>
                        </div>
                    </div>
                </div>

                <!-- MISI CARD -->
                <div
                    class="lg:col-span-7 bg-white border border-slate-300 border-t-4 border-t-[#0067b1] p-6 sm:p-8 shadow-sm flex flex-col justify-between reveal-on-scroll reveal-delay-200">
                    <div>
                        <div class="flex items-center justify-between mb-6">
                            <span
                                class="px-3.5 py-1 bg-[#0067b1] text-white text-xs font-sans font-bold uppercase tracking-wider">
                                MISI
                            </span>
                        </div>

                        <h3
                            class="text-xl sm:text-2xl font-bold font-barlow-condensed uppercase not-italic text-[#00163c] mb-4">
                            Tiga Komitmen Operasional Utama Kami
                        </h3>

                        <!-- 3 Poin Misi -->
                        <div class="space-y-4 font-sans mb-6">
                            <!-- Misi 1 -->
                            <div
                                class="p-4 bg-slate-50 border border-slate-200 flex items-start gap-3.5 hover:border-[#0067b1] transition-colors">
                                <span
                                    class="w-6 h-6 rounded-full bg-[#0067b1] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">1</span>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wide">
                                        Meningkatkan Kualitas Layanan
                                    </h4>
                                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                        Menjamin kualitas layanan yang tinggi kepada pelanggan melalui pelatihan dan
                                        pengembangan sumber daya manusia.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 2 -->
                            <div
                                class="p-4 bg-slate-50 border border-slate-200 flex items-start gap-3.5 hover:border-[#0067b1] transition-colors">
                                <span
                                    class="w-6 h-6 rounded-full bg-[#0067b1] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">2</span>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wide">
                                        Meningkatkan Penjualan
                                    </h4>
                                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                        Meningkatkan penjualan truk Shacman & Spare parts melalui strategi pemasaran yang
                                        efektif dan jaringan pemasaran yang luas.
                                    </p>
                                </div>
                            </div>

                            <!-- Misi 3 -->
                            <div
                                class="p-4 bg-slate-50 border border-slate-200 flex items-start gap-3.5 hover:border-[#0067b1] transition-colors">
                                <span
                                    class="w-6 h-6 rounded-full bg-[#0067b1] text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">3</span>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wide">
                                        Meningkatkan Kepuasan Pelanggan
                                    </h4>
                                    <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                        Meningkatkan kepuasan pelanggan melalui layanan purna jual yang baik dan responsif
                                        terhadap kebutuhan pelanggan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ================= 4. SECTION: LAYANAN PURNA JUAL SHASS ================= -->
    <section class="w-full bg-white text-slate-900 py-16 sm:py-24 border-b border-slate-200 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Intro -->
            <div class="max-w-3xl mb-12 sm:mb-16 reveal-on-scroll">
                <h2
                    class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c] leading-[0.98]">
                    Layanan Purna Jual SHASS
                </h2>
                <p class="mt-4 text-slate-600 text-sm sm:text-base leading-relaxed font-normal max-w-2xl">
                    Namun, dedikasi kami tidak berhenti pada penjualan unit semata. Kami memahami bahwa dukungan purna jual
                    adalah
                    kunci keberhasilan jangka panjang. Oleh karena itu, kami menghadirkan <strong>SHASS (SHINDO After-Sales
                        Service)</strong>,
                    sebuah sistem layanan purna jual yang komprehensif dan tak tertandingi.
                </p>
                <p class="mt-2 text-slate-600 text-sm sm:text-base leading-relaxed font-normal">
                    Dengan dukungan tersebut, kami memastikan bahwa operasional Anda berjalan lancar tanpa hambatan berarti.
                </p>
            </div>

            <!-- 4 Keunggulan SHASS: Dynamic Heavy-Duty Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card 1: Mekanik Profesional -->
                <div
                    class="bg-white border border-slate-200 hover:border-[#0067b1] flex flex-col justify-between overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 group reveal-on-scroll reveal-delay-100">
                    <div class="relative w-full h-56 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/service-banner-mechanic.jpg') }}" alt="124+ Mekanik Profesional SHASS"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="text-[11px] font-sans font-bold uppercase tracking-wider text-white bg-[#00163c]/90 px-2.5 py-0.5 border border-white/20">
                                SERTIFIKASI ATPM
                            </span>
                        </div>
                        <div class="absolute bottom-2.5 left-3.5">
                            <span
                                class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase not-italic text-white tracking-wider block drop-shadow-md">
                                124+ MEKANIK
                            </span>
                        </div>
                    </div>
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3
                                class="text-base font-bold font-sans text-slate-900 group-hover:text-[#0067b1] transition-colors">
                                Lebih dari 124 mekanik profesional
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed font-normal">
                                Teknisi tersertifikasi pabrikan yang terlatih menangani overhaul mesin, transmisi FAST,
                                serta sistem hidrolik langsung di lokasi site.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: 5 Cabang Eksklusif -->
                <div
                    class="bg-white border border-slate-200 hover:border-[#0067b1] flex flex-col justify-between overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 group reveal-on-scroll reveal-delay-150">
                    <div class="relative w-full h-56 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/service-banner-facility.jpg') }}"
                            alt="5 Cabang Eksklusif Seluruh Indonesia"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="text-[11px] font-sans font-bold uppercase tracking-wider text-white bg-[#0067b1]/90 px-2.5 py-0.5 border border-white/20">
                                JANGKAUAN
                            </span>
                        </div>
                        <div class="absolute bottom-2.5 left-3.5">
                            <span
                                class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase not-italic text-white tracking-wider block drop-shadow-md">
                                5 CABANG
                            </span>
                        </div>
                    </div>
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3
                                class="text-base font-bold font-sans text-slate-900 group-hover:text-[#0067b1] transition-colors">
                                Didukung oleh 5 cabang eksklusif di seluruh Indonesia
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed font-normal">
                                Fasilitas workshop representatif dan kantor operasional yang tersebar strategis di sentra
                                logistik dan pertambangan di seluruh Indonesia.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Layanan 24/7 -->
                <div
                    class="bg-white border border-slate-200 hover:border-[#0067b1] flex flex-col justify-between overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 group reveal-on-scroll reveal-delay-200">
                    <div class="relative w-full h-56 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/service-banner-support.jpg') }}" alt="Layanan Pelanggan 24/7"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="text-[11px] font-sans font-bold uppercase tracking-wider text-white bg-[#00163c]/90 px-2.5 py-0.5 border border-white/20">
                                RESPONSE TIME
                            </span>
                        </div>
                        <div class="absolute bottom-2.5 left-3.5">
                            <span
                                class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase not-italic text-white tracking-wider block drop-shadow-md">
                                SIAGA 24/7
                            </span>
                        </div>
                    </div>
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3
                                class="text-base font-bold font-sans text-slate-900 group-hover:text-[#0067b1] transition-colors">
                                Layanan pelanggan 24/7
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed font-normal">
                                Customer support dan unit servis darurat yang siap merespons kebutuhan Anda setiap saat agar
                                produktivitas operasional tidak terhenti.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Suku Cadang di Lokasi (Site Support) -->
                <div
                    class="bg-white border border-slate-200 hover:border-[#0067b1] flex flex-col justify-between overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 group reveal-on-scroll reveal-delay-300">
                    <div class="relative w-full h-56 overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/service-banner-parts.jpg') }}"
                            alt="Ketersediaan Suku Cadang di Lokasi Site Support"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span
                                class="text-[11px] font-sans font-bold uppercase tracking-wider text-white bg-[#00163c]/90 px-2.5 py-0.5 border border-white/20">
                                INVENTORY ON-SITE
                            </span>
                        </div>
                        <div class="absolute bottom-2.5 left-3.5">
                            <span
                                class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase not-italic text-white tracking-wider block drop-shadow-md">
                                SITE SUPPORT
                            </span>
                        </div>
                    </div>
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3
                                class="text-base font-bold font-sans text-slate-900 group-hover:text-[#0067b1] transition-colors">
                                Ketersediaan suku cadang di lokasi (site support)
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed font-normal">
                                Depo suku cadang konsinyasi orisinal yang disiapkan langsung di area proyek Anda untuk
                                memangkas waktu tunggu komponen.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 5. SECTION: GAMBAR BRANCH (ALAMAT & LOKASI CABANG DEALER) ================= -->
    <section class="w-full bg-[#f4f6f9] py-16 sm:py-24 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 reveal-on-scroll">
                <span class="text-xs font-sans font-bold uppercase tracking-widest text-[#0067b1] block mb-2">
                    ALAMAT & LOKASI
                </span>
                <h2
                    class="text-3xl sm:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c]">
                    Jaringan Cabang & Workshop PT Shindo Tractors Adiperkasa
                </h2>
                <p class="mt-3 text-slate-600 text-sm sm:text-base leading-relaxed">
                    Didukung 5 cabang representatif di sentra industri dan pertambangan Indonesia untuk menjamin respon
                    cepat aftersales service dan ketersediaan spare parts.
                </p>
            </div>

            <!-- Showcase Gambar Branch (Peta Jaringan Cabang dari dealershacman.com) -->
            <div class="bg-white p-3 sm:p-6 border-2 border-slate-200 shadow-xl mb-12 reveal-on-scroll">
                <div class="relative overflow-hidden bg-slate-100 flex items-center justify-center">
                    <img src="{{ asset('images/about-branch-map.jpg') }}"
                        alt="Peta Jaringan Cabang PT Shindo Tractors Adiperkasa di Indonesia"
                        class="w-full h-auto max-h-[550px] object-contain select-none">
                </div>
            </div>

            <!-- Detail 5 Alamat Cabang Resmi (Berdasarkan Data Branch Resmi) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 font-sans reveal-on-scroll reveal-delay-150">
                <!-- Branch 1: Jakarta Headquarter -->
                <div
                    class="bg-white p-6 border border-slate-200 border-t-4 border-t-[#00163c] shadow-xs hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-[#00163c] uppercase tracking-wider">HEADQUARTER</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Jakarta Headquarter</h3>
                    <p class="text-xs text-[#0067b1] font-semibold mb-3">Unit Showroom, After Sales Support & Sparepart</p>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        THC 59 Kamal Penjaringan, Jakarta Utara DKI Jakarta 14470
                    </p>
                    <div class="border-t border-slate-100 pt-3 text-xs space-y-1 text-slate-600">
                        <p><span class="font-semibold text-slate-800">Tel:</span> (021) 225 743 51</p>
                        <p><span class="font-semibold text-slate-800">HP / WA:</span> +62 821 2888 9556</p>
                        <p><span class="font-semibold text-slate-800">Email:</span> sales@shindo.id</p>
                    </div>
                </div>

                <!-- Branch 2: Balikpapan Branches -->
                <div
                    class="bg-white p-6 border border-slate-200 border-t-4 border-t-[#0067b1] shadow-xs hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-[#0067b1] uppercase tracking-wider">KALIMANTAN HUB</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Balikpapan Branches</h3>
                    <p class="text-xs text-[#0067b1] font-semibold mb-3">After Sales Support & Sparepart</p>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Ruko Stallkuda, Jl. Jenderal Sudirman No.41B, Gunung Bahagia, Kecamatan Balikpapan Selatan, Kota
                        Balikpapan, Kalimantan Timur 76114
                    </p>
                    <div class="border-t border-slate-100 pt-3 text-xs text-slate-600">
                        <p><span class="font-semibold text-slate-800">Fokus:</span> Tambang Batubara & Konstruksi IKN</p>
                    </div>
                </div>

                <!-- Branch 3: Morowali Branches -->
                <div
                    class="bg-white p-6 border border-slate-200 border-t-4 border-t-[#0067b1] shadow-xs hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-[#0067b1] uppercase tracking-wider">SULAWESI NIKEL</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Morowali Branches</h3>
                    <p class="text-xs text-[#0067b1] font-semibold mb-3">After Sales Support & Sparepart</p>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Desa Lalampu, Kecamatan Bahodopi, Morowali, Sulawesi Tengah
                    </p>
                    <div class="border-t border-slate-100 pt-3 text-xs text-slate-600">
                        <p><span class="font-semibold text-slate-800">Fokus:</span> Hauling Tambang Nikel & Smelter</p>
                    </div>
                </div>

                <!-- Branch 4: Semarang Branches -->
                <div
                    class="bg-white p-6 border border-slate-200 border-t-4 border-t-slate-700 shadow-xs hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">JAWA TENGAH</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Semarang Branches</h3>
                    <p class="text-xs text-[#0067b1] font-semibold mb-3">After Sales Support & Sparepart</p>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Jl. Citarum No.31, Bugangan, Kec. Semarang Timur, Kota Semarang, Jawa Tengah 50126
                    </p>
                    <div class="border-t border-slate-100 pt-3 text-xs text-slate-600">
                        <p><span class="font-semibold text-slate-800">Fokus:</span> Koridor Logistik Pantura & Quarry</p>
                    </div>
                </div>

                <!-- Branch 5: Surabaya Branches -->
                <div
                    class="bg-white p-6 border border-slate-200 border-t-4 border-t-slate-700 shadow-xs hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">JAWA TIMUR</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Surabaya Branches</h3>
                    <p class="text-xs text-[#0067b1] font-semibold mb-3">After Sales Support</p>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Ruko Pondok Candra Indah TF 19, Pondok Candra, Palem, Wadungasri, Kabupaten Sidoarjo, Jawa Timur
                        60400
                    </p>
                    <div class="border-t border-slate-100 pt-3 text-xs text-slate-600">
                        <p><span class="font-semibold text-slate-800">Fokus:</span> Distribusi Pelabuhan & Hauling Jawa
                            Timur</p>
                    </div>
                </div>

                <!-- Quick Action Box: Konsultasi Armada -->
                <div class="bg-[#00163c] text-white p-6 border border-[#00163c] shadow-xs flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-blue-300 uppercase tracking-wider block mb-2">KONSULTASI
                            ARMADA</span>
                        <h3 class="text-xl font-bold font-barlow-condensed uppercase tracking-wide mb-2">
                            Percayakan Alat Berat Anda kepada Kami
                        </h3>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Percayakan kebutuhan transportasi alat berat Anda kepada kami, dan rasakan perbedaan yang dibawa
                            oleh kualitas, keandalan, dan layanan pelanggan yang luar biasa.
                        </p>
                    </div>
                    <div class="pt-4">
                        <a href="{{ url('/kontak') }}"
                            class="inline-flex items-center justify-center w-full px-5 py-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
                            <span>Hubungi Kami Sekarang</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 6. SECTION: KOMITMEN KEMITRAAN JANGKA PANJANG ================= -->
    <section class="w-full bg-white py-16 sm:py-24 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- Left Column: Big Panoramic Image with Heavy Border -->
                <div class="lg:col-span-6 order-2 lg:order-1 reveal-on-scroll">
                    <div class="relative bg-white p-3 sm:p-5 border-2 border-slate-200 shadow-xl">
                        <!-- Corner Crosshairs -->
                        <div class="absolute -top-2 -left-2 w-4 h-4 border-t-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -top-2 -right-2 w-4 h-4 border-t-2 border-r-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -left-2 w-4 h-4 border-b-2 border-l-2 border-[#0067b1]"></div>
                        <div class="absolute -bottom-2 -right-2 w-4 h-4 border-b-2 border-r-2 border-[#0067b1]"></div>

                        <div class="relative overflow-hidden bg-slate-100 aspect-[4/3] flex items-center justify-center">
                            <img src="{{ asset('images/about-shacman-fleet-bg.png') }}"
                                alt="Komitmen Kemitraan Armada SHACMAN PT SHINDO"
                                class="w-full h-full object-cover select-none">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#00163c]/50 via-transparent to-transparent">
                            </div>
                            <div
                                class="absolute bottom-4 left-4 text-white text-xs font-sans font-bold uppercase tracking-wider bg-black/60 px-3 py-1 border border-white/20">
                                STRATEGIC HAULING PARTNER
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Copywriting & Commitments -->
                <div class="lg:col-span-6 order-1 lg:order-2 space-y-6 reveal-on-scroll reveal-delay-200">
                    <div>
                        <span
                            class="inline-flex items-center px-3 py-1 bg-[#0067b1]/10 text-[#0067b1] border border-[#0067b1]/20 text-xs font-sans font-bold uppercase tracking-wider mb-3">
                            KEMITRAAN
                        </span>
                        <h2
                            class="text-3xl sm:text-4xl lg:text-5xl font-bold uppercase not-italic font-barlow-condensed tracking-tight text-[#00163c] leading-[1.02]">
                            Komitmen Kemitraan Jangka Panjang
                        </h2>
                    </div>

                    <p class="text-slate-700 text-sm sm:text-base leading-relaxed font-normal">
                        Di PT Shindo Tractors Adiperkasa, kami percaya pada pembangunan kemitraan jangka panjang dengan
                        pelanggan. Dengan tim yang terampil dan berpengalaman, kami bertekad untuk memberikan layanan
                        penjualan dan purna jual terbaik. Komitmen ini menjamin kepuasan Anda dan kinerja optimal dari
                        setiap
                        investasi SHACMAN Anda.
                    </p>

                    <!-- 3 Core Commitments: Industrial Protocol Rows with Distinct Identifiers -->
                    <div class="space-y-4 pt-1 font-sans">
                        <div
                            class="p-5 sm:p-6 bg-[#f8fafc] border border-slate-200 shadow-xs flex items-start gap-4 hover:border-[#0067b1] hover:bg-white transition-all">
                            <span
                                class="text-3xl font-bold font-barlow-condensed text-[#0067b1] leading-none flex-shrink-0 mt-0.5">
                                01
                            </span>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                    Tim Terampil & Berpengalaman
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                    Konsultan armada dan staf operasional kami siap memandu pemilihan rasio gardan,
                                    kapasitas
                                    kubikasi dump body, hingga kalkulasi efisiensi ritase.
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 sm:p-6 bg-[#f8fafc] border border-slate-200 shadow-xs flex items-start gap-4 hover:border-[#0067b1] hover:bg-white transition-all">
                            <span
                                class="text-3xl font-bold font-barlow-condensed text-[#0067b1] leading-none flex-shrink-0 mt-0.5">
                                02
                            </span>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                    Jaminan Kepuasan & Kinerja Optimal
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                    Perlindungan menyeluruh dari garansi resmi pabrikan, ketersediaan komponen orisinal,
                                    serta
                                    supervisi berkala di lapangan kerja Anda.
                                </p>
                            </div>
                        </div>

                        <div
                            class="p-5 sm:p-6 bg-[#f8fafc] border border-slate-200 shadow-xs flex items-start gap-4 hover:border-[#0067b1] hover:bg-white transition-all">
                            <span
                                class="text-3xl font-bold font-barlow-condensed text-[#00163c] leading-none flex-shrink-0 mt-0.5">
                                03
                            </span>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                    Proteksi Nilai Investasi Bisnis
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 mt-1 leading-relaxed">
                                    Memastikan setiap investasi kendaraan komersial SHACMAN Anda menghasilkan tingkat
                                    produktivitas tinggi dengan biaya pemeliharaan terukur.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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