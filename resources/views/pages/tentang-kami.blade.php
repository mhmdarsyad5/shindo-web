@extends('layouts.public')

@section('title', 'Tentang Kami | PT Shindo Tractors Adiperkasa - Mitra Terpercaya Solusi Transportasi Alat Berat')
@section('meta_description', 'Profil PT Shindo Tractors Adiperkasa, distributor utama SHACMAN Dump Truck di Indonesia dengan pengalaman lebih dari lima dekade dan layanan purna jual SHASS.')

@section('content')
    <!-- ================= 1. PAGE HERO HEADER ================= -->
    <section class="relative bg-[#070e1e] text-white py-12 sm:py-16 lg:py-20 border-b border-slate-800 overflow-hidden">
        <!-- Background Image Texture -->
        <div class="absolute inset-0 z-0 select-none pointer-events-none">
            <img src="{{ asset('images/page-header-bg.png') }}" alt=""
                class="w-full h-full object-cover object-center opacity-90">
            <div class="absolute inset-0 bg-gradient-to-r from-[#070e1e]/95 via-[#070e1e]/80 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumb Navigation -->
            <div class="flex items-center space-x-2 text-xs text-slate-400 mb-5 font-sans uppercase tracking-wider">
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors">Home</a>
                <span>/</span>
                <span class="text-amber-400 font-bold">Tentang Kami</span>
            </div>

            <div class="max-w-4xl">
                <!-- Company Name Subhead with Accent Line -->
                <div class="flex items-center space-x-3 mb-3">
                    <span class="w-8 h-[3px] bg-[#0067b1]"></span>
                    <span class="text-xs sm:text-sm font-bold uppercase font-sans tracking-widest text-slate-300">
                        PT Shindo Tractors Adiperkasa
                    </span>
                </div>

                <!-- Big Main Title (Bold, Not Extrabold) -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-bold italic uppercase font-barlow-condensed tracking-tight text-white leading-none">
                    MITRA TERPERCAYA SOLUSI TRANSPORTASI ALAT BERAT
                </h1>

                <!-- Lead Paragraph -->
                <p class="mt-5 text-slate-300 text-base sm:text-lg lg:text-xl leading-relaxed font-normal max-w-3xl">
                    Selamat datang di PT Shindo Tractors Adiperkasa, mitra terpercaya Anda dalam solusi transportasi alat berat di Indonesia. Dengan pengalaman lebih dari lima dekade di industri ini, kami telah memantapkan diri sebagai dealer resmi terkemuka untuk truk SHACMAN. Komitmen kami adalah menyediakan kendaraan berkualitas tinggi yang dirancang untuk kinerja maksimal dan keandalan di setiap medan.
                </p>

                <!-- Highlight Badges -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-8 pt-6 border-t border-slate-800/80 font-sans">
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider">
                            50+ Tahun Pengalaman
                        </span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#0067b1]"></span>
                        <span class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider">
                            Distributor Resmi SHACMAN
                        </span>
                    </div>
                    <div class="flex items-center space-x-3 col-span-2 sm:col-span-1">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        <span class="text-xs sm:text-sm font-bold text-white uppercase tracking-wider">
                            Layanan Purna Jual SHASS
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. SECTION: DISTRIBUTOR UTAMA SHACMAN DUMP TRUCK ================= -->
    <section class="w-full bg-white py-14 sm:py-20 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

                <!-- Left Column: Copywriting & Pillars -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <span class="inline-flex items-center px-3.5 py-1.5 bg-[#0067b1]/10 text-[#0067b1] border border-[#0067b1]/20 text-xs font-sans font-bold uppercase tracking-wider mb-3">
                            Pemimpin Pasar di Indonesia
                        </span>
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-bold uppercase italic font-barlow-condensed tracking-tight text-slate-900 leading-[1.05]">
                            DISTRIBUTOR UTAMA SHACMAN DUMP TRUCK
                        </h2>
                    </div>

                    <p class="text-slate-700 text-base sm:text-lg leading-relaxed font-normal">
                        Kami bangga menjadi distributor utama SHACMAN Dump Truck, yang dikenal luas sebagai pemimpin pasar di Indonesia. Truk-truk kami dirancang untuk menghadapi tantangan terberat, memastikan produktivitas dan efisiensi operasional bisnis Anda.
                    </p>

                    <!-- Feature Pillars -->
                    <div class="space-y-4 pt-2">
                        <div class="flex items-start space-x-3.5 p-3.5 bg-slate-50 border-l-4 border-[#0067b1] border-y border-r border-slate-200">
                            <svg class="w-6 h-6 text-[#0067b1] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold font-sans text-slate-900">
                                    Tangguh di Segala Medan Tambang & Konstruksi
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 mt-0.5 leading-relaxed">
                                    Dibuat khusus untuk medan tambang nikel, batu bara, quarry, dan hauling road ekstrem dengan durabilitas sasis dan gardan berstandar MAN Jerman.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3.5 p-3.5 bg-slate-50 border-l-4 border-amber-500 border-y border-r border-slate-200">
                            <svg class="w-6 h-6 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <div>
                                <h3 class="text-sm sm:text-base font-bold font-sans text-slate-900">
                                    Efisiensi Bahan Bakar & Daya Angkut Maksimal
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 mt-0.5 leading-relaxed">
                                    Ditenagai mesin Weichai generasi mutakhir yang terkenal bertenaga besar, responsif pada torsi rendah, dan sangat hemat konsumsi solar.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 flex items-center gap-4">
                        <a href="{{ url('/produk') }}"
                            class="inline-flex items-center px-6 py-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-colors shadow-sm">
                            <span>Lihat Katalog Dump Truck</span>
                            <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="{{ url('/kontak') }}"
                            class="inline-flex items-center px-6 py-3 bg-white hover:bg-slate-50 text-slate-800 border border-slate-300 font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-colors shadow-2xs">
                            Hubungi Sales
                        </a>
                    </div>
                </div>

                <!-- Right Column: Big Prominent Truck Photo -->
                <div class="lg:col-span-6">
                    <div class="relative bg-slate-100 p-2 sm:p-3 border border-slate-300 shadow-sm">
                        <!-- Main Large Image -->
                        <div class="relative overflow-hidden bg-slate-900 aspect-[4/3] flex items-center justify-center">
                            <img src="{{ asset('images/about-truck.png') }}" alt="SHACMAN Dump Truck PT Shindo Tractors Adiperkasa"
                                class="w-full h-full object-cover select-none">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <span class="text-[11px] font-sans font-bold uppercase tracking-wider text-amber-400">
                                    Flagship Commercial Unit
                                </span>
                                <p class="text-lg sm:text-xl font-bold font-barlow-condensed uppercase italic text-white leading-tight mt-0.5">
                                    SHACMAN Heavy-Duty Tipper 6x4 & 8x4
                                </p>
                            </div>
                        </div>

                        <!-- Technical Footnote -->
                        <div class="mt-3 px-3 py-2 flex items-center justify-between text-xs font-sans text-slate-600 border-t border-slate-200">
                            <span class="font-medium">PT SHINDO TRACTORS ADIPERKASA</span>
                            <span class="text-[#0067b1] font-bold">AUTHORIZED DISTRIBUTOR</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 3. SECTION: LAYANAN PURNA JUAL SHASS ================= -->
    <section class="w-full bg-[#070e1e] text-white py-14 sm:py-20 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Intro -->
            <div class="max-w-3xl mb-12 sm:mb-16">
                <span class="inline-flex items-center px-3.5 py-1.5 bg-amber-400/10 text-amber-400 border border-amber-400/25 text-xs font-sans font-bold uppercase tracking-wider mb-3">
                    SHINDO After-Sales Service
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold uppercase italic font-barlow-condensed tracking-tight text-white leading-[1.05]">
                    LAYANAN PURNA JUAL SHASS
                </h2>
                <p class="mt-4 text-slate-300 text-base sm:text-lg leading-relaxed font-normal">
                    Namun, dedikasi kami tidak berhenti pada penjualan unit semata. Kami memahami bahwa dukungan purna jual adalah kunci keberhasilan jangka panjang. Oleh karena itu, kami menghadirkan SHASS (SHINDO After-Sales Service), sebuah sistem layanan purna jual yang komprehensif dan tak tertandingi.
                </p>
                <p class="mt-3 text-slate-400 text-sm sm:text-base leading-relaxed">
                    Dengan dukungan tersebut, kami memastikan bahwa operasional Anda berjalan lancar tanpa hambatan berarti.
                </p>
            </div>

            <!-- 4 Keunggulan SHASS: Big Photographic Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card 1: Mekanik Profesional -->
                <div class="bg-[#0f172a] border border-slate-800 flex flex-col justify-between overflow-hidden shadow-sm hover:border-[#0067b1] transition-all duration-300 group">
                    <div class="relative w-full h-48 overflow-hidden bg-slate-900">
                        <img src="{{ asset('images/service-banner-mechanic.jpg') }}" alt="124+ Mekanik Profesional SHASS"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3 bg-[#0067b1] text-white px-2.5 py-1 text-xs font-bold font-sans uppercase tracking-wider">
                            SDM Ahli
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="text-3xl font-bold font-barlow-condensed uppercase italic text-amber-400">
                                124+ MEKANIK
                            </div>
                            <h3 class="text-base font-bold font-sans text-white mt-1">
                                Lebih Dari 124 Mekanik Profesional
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed font-normal">
                                Teknisi tersertifikasi pabrikan yang terlatih menangani overhaul mesin, transmisi FAST, serta sistem hidrolik langsung di lokasi site.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: 5 Cabang Eksklusif -->
                <div class="bg-[#0f172a] border border-slate-800 flex flex-col justify-between overflow-hidden shadow-sm hover:border-[#0067b1] transition-all duration-300 group">
                    <div class="relative w-full h-48 overflow-hidden bg-slate-900">
                        <img src="{{ asset('images/service-banner-facility.jpg') }}" alt="5 Cabang Eksklusif Seluruh Indonesia"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3 bg-[#0067b1] text-white px-2.5 py-1 text-xs font-bold font-sans uppercase tracking-wider">
                            Jaringan
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="text-3xl font-bold font-barlow-condensed uppercase italic text-amber-400">
                                5 CABANG
                            </div>
                            <h3 class="text-base font-bold font-sans text-white mt-1">
                                Didukung Oleh 5 Cabang Eksklusif
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed font-normal">
                                Fasilitas workshop representatif dan kantor operasional yang tersebar strategis di sentra logistik dan pertambangan di seluruh Indonesia.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Layanan 24/7 -->
                <div class="bg-[#0f172a] border border-slate-800 flex flex-col justify-between overflow-hidden shadow-sm hover:border-[#0067b1] transition-all duration-300 group">
                    <div class="relative w-full h-48 overflow-hidden bg-slate-900">
                        <img src="{{ asset('images/service-banner-support.jpg') }}" alt="Layanan Pelanggan 24/7"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3 bg-amber-500 text-black px-2.5 py-1 text-xs font-bold font-sans uppercase tracking-wider">
                            Siaga Penuh
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="text-3xl font-bold font-barlow-condensed uppercase italic text-amber-400">
                                SIAGA 24/7
                            </div>
                            <h3 class="text-base font-bold font-sans text-white mt-1">
                                Layanan Pelanggan 24/7
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed font-normal">
                                Customer support dan unit servis darurat yang siap merespons kebutuhan Anda setiap saat agar produktivitas operasional tidak terhenti.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Suku Cadang di Lokasi (Site Support) -->
                <div class="bg-[#0f172a] border border-slate-800 flex flex-col justify-between overflow-hidden shadow-sm hover:border-[#0067b1] transition-all duration-300 group">
                    <div class="relative w-full h-48 overflow-hidden bg-slate-900">
                        <img src="{{ asset('images/service-banner-parts.jpg') }}" alt="Ketersediaan Suku Cadang di Lokasi Site Support"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-90">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3 bg-[#0067b1] text-white px-2.5 py-1 text-xs font-bold font-sans uppercase tracking-wider">
                            Site Support
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="text-3xl font-bold font-barlow-condensed uppercase italic text-amber-400">
                                SITE SUPPORT
                            </div>
                            <h3 class="text-base font-bold font-sans text-white mt-1">
                                Suku Cadang di Lokasi Proyek
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed font-normal">
                                Depo suku cadang konsinyasi orisinal yang disiapkan langsung di area proyek Anda untuk memangkas waktu tunggu komponen (*zero downtime*).
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 4. SECTION: KOMITMEN KEMITRAAN JANGKA PANJANG ================= -->
    <section class="w-full bg-slate-50 py-14 sm:py-20 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">

                <!-- Left Column: Big Panoramic Image -->
                <div class="lg:col-span-6 order-2 lg:order-1">
                    <div class="relative bg-white p-2 sm:p-3 border border-slate-300 shadow-sm">
                        <div class="relative overflow-hidden bg-slate-900 aspect-[4/3] flex items-center justify-center">
                            <img src="{{ asset('images/about-shacman-fleet-bg.png') }}" alt="Komitmen Kemitraan Armada SHACMAN PT SHINDO"
                                class="w-full h-full object-cover select-none">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <span class="text-[11px] font-sans font-bold uppercase tracking-wider text-amber-400">
                                    Solusi Terintegrasi
                                </span>
                                <p class="text-lg sm:text-xl font-bold font-barlow-condensed uppercase italic text-white leading-tight mt-0.5">
                                    Armada Tangguh, Operasional Tanpa Henti
                                </p>
                            </div>
                        </div>

                        <!-- Technical Footnote -->
                        <div class="mt-3 px-3 py-2 flex items-center justify-between text-xs font-sans text-slate-600 border-t border-slate-200">
                            <span class="font-medium">PT SHINDO TRACTORS ADIPERKASA</span>
                            <span class="text-[#0067b1] font-bold">LONG-TERM PARTNERSHIP</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Copywriting & Value Propositions -->
                <div class="lg:col-span-6 order-1 lg:order-2 space-y-6">
                    <div>
                        <span class="inline-flex items-center px-3.5 py-1.5 bg-[#0067b1]/10 text-[#0067b1] border border-[#0067b1]/20 text-xs font-sans font-bold uppercase tracking-wider mb-3">
                            Kemitraan Jangka Panjang
                        </span>
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-bold uppercase italic font-barlow-condensed tracking-tight text-slate-900 leading-[1.05]">
                            KOMITMEN KEMITRAAN JANGKA PANJANG
                        </h2>
                    </div>

                    <p class="text-slate-700 text-base sm:text-lg leading-relaxed font-normal">
                        Di PT Shindo Tractors Adiperkasa, kami percaya pada pembangunan kemitraan jangka panjang dengan pelanggan. Dengan tim yang terampil dan berpengalaman, kami bertekad untuk memberikan layanan penjualan dan purna jual terbaik. Komitmen ini menjamin kepuasan Anda dan kinerja optimal dari setiap investasi SHACMAN Anda.
                    </p>

                    <!-- 3 Core Commitments -->
                    <div class="space-y-3.5 pt-2 font-sans">
                        <div class="p-4 bg-white border border-slate-200 shadow-2xs">
                            <div class="flex items-center space-x-3 mb-1">
                                <span class="w-2.5 h-2.5 bg-[#0067b1]"></span>
                                <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                    Tim Terampil & Berpengalaman
                                </h3>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 pl-5.5 leading-relaxed">
                                Konsultan armada dan staf operasional kami siap memandu pemilihan rasio gardan, kapasitas kubikasi dump body, hingga kalkulasi efisiensi ritase.
                            </p>
                        </div>

                        <div class="p-4 bg-white border border-slate-200 shadow-2xs">
                            <div class="flex items-center space-x-3 mb-1">
                                <span class="w-2.5 h-2.5 bg-[#0067b1]"></span>
                                <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                    Jaminan Kepuasan & Kinerja Optimal
                                </h3>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 pl-5.5 leading-relaxed">
                                Perlindungan menyeluruh dari garansi resmi pabrikan, ketersediaan komponen orisinal, serta supervisi berkala di lapangan kerja Anda.
                            </p>
                        </div>

                        <div class="p-4 bg-white border border-slate-200 shadow-2xs">
                            <div class="flex items-center space-x-3 mb-1">
                                <span class="w-2.5 h-2.5 bg-amber-500"></span>
                                <h3 class="text-sm sm:text-base font-bold text-slate-900">
                                    Proteksi Nilai Investasi Bisnis
                                </h3>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 pl-5.5 leading-relaxed">
                                Memastikan setiap rupiah investasi kendaraan komersial SHACMAN Anda menghasilkan tingkat produktivitas tinggi dengan biaya pemeliharaan terukur.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 5. SECTION: CORPORATE BOTTOM CTA ================= -->
    <section class="relative w-full overflow-hidden text-white py-14 sm:py-20 lg:py-24 border-t border-slate-800">
        <!-- Background Image with 5 Shacman Trucks Twilight Headlights -->
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk Shacman Operasional"
            class="absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none">
        <div class="absolute inset-0 bg-[#00163c]/75 sm:bg-[#00163c]/65 backdrop-brightness-90"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 bg-black/40 backdrop-blur-sm border border-white/20 p-8 sm:p-12 shadow-2xl">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-sans text-amber-400 font-bold uppercase tracking-wider drop-shadow">
                        Konsultasi Pengadaan Armada & Layanan Purna Jual
                    </span>
                    <h3 class="text-2xl sm:text-4xl font-bold uppercase font-barlow-condensed italic text-white leading-tight drop-shadow-md">
                        SIAP MENJALIN KEMITRAAN DENGAN PT SHINDO?
                    </h3>
                    <p class="text-slate-100 text-sm sm:text-base leading-relaxed drop-shadow">
                        Diskusikan kebutuhan armada dump truck SHACMAN dan dukungan after-sales SHASS untuk kelancaran operasional tambang dan logistik Anda bersama tim ahli kami.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 flex-shrink-0 w-full sm:w-auto">
                    <a href="{{ url('/kontak') }}"
                        class="inline-flex items-center justify-center px-7 py-3.5 bg-[#0067b1] hover:bg-[#005a9c] text-white font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-colors shadow-lg text-center">
                        Minta Penawaran Harga
                    </a>
                    <a href="{{ url('/produk') }}"
                        class="inline-flex items-center justify-center px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white border border-white/60 font-bold text-xs sm:text-sm uppercase font-barlow-condensed tracking-wider transition-colors text-center">
                        Lihat Katalog Truk
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
