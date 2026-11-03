@extends('layouts.public')

@section('title', 'Layanan Purna Jual & Servis Resmi | PT SHINDO SHACMAN Indonesia')
@section('meta_description', 'Layanan aftersales resmi dump truck SHACMAN Indonesia: periodic maintenance, mobile on-site mechanic 24/7, pasokan genuine spare parts Weichai dan FAST, serta kontrak servis armada.')

@section('content')
    <!-- ================= HEADER ================= -->
    <section class="relative bg-[#070e1e] text-white py-10 sm:py-14 border-b border-slate-800 overflow-hidden">
        <!-- Background Image Texture -->
        <div class="absolute inset-0 z-0 select-none pointer-events-none">
            <img src="{{ asset('images/page-header-bg.png') }}" alt="" class="w-full h-full object-cover object-center opacity-95">
            <div class="absolute inset-0 bg-gradient-to-r from-[#070e1e]/85 via-[#070e1e]/40 to-black/10"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase text-slate-400 mb-3">
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors">Home</a>
                <span>/</span>
                <span class="text-amber-400 font-bold">Layanan</span>
            </div>
            <div class="max-w-3xl">
                <h1 class="text-3xl sm:text-5xl font-bold uppercase font-barlow-condensed italic leading-none tracking-normal">
                    Aftersales Service & Spare Parts Support
                </h1>
                <p class="mt-4 text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed">
                    Memastikan ritase dan uptime armada dump truck di site tambang tetap optimal dengan dukungan mekanik tersertifikasi ATPM dan pasokan suku cadang asli.
                </p>
            </div>
        </div>
    </section>

    <!-- ================= 3 PILAR LAYANAN AFTERSALES ================= -->
    <section class="w-full bg-[#f4f6f9] py-10 sm:py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-xs font-sans font-bold uppercase text-slate-500 mb-2">Core Aftersales Capabilities</div>
            <h2 class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase italic text-neutral-900 mb-6">
                Standar Dukungan Operasional Tambang & Proyek
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- 1. Periodic Maintenance -->
                <div class="bg-white border border-slate-300 p-6 flex flex-col justify-between shadow-xs">
                    <div>
                        <div class="flex items-center justify-between pb-3 border-b border-slate-200 mb-4">
                            <span class="font-sans text-xs font-bold text-[#0067b1] uppercase">Program 01</span>
                            <span class="text-[11px] font-sans bg-slate-100 text-slate-600 px-2 py-0.5">Maintenance</span>
                        </div>
                        <h3 class="text-xl font-bold font-barlow-condensed uppercase italic text-neutral-900">
                            Periodic Service & Overhaul
                        </h3>
                        <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                            Servis berkala terjadwal sesuai interval operating hours (HM) mesin. Meliputi ganti oli, filter replacement, tune-up injeksi common rail, kalibrasi sistem rem angin, dan general overhaul transmisi FAST maupun engine Weichai.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-xs font-sans text-slate-500 block">• Standar Checklist ATPM</span>
                        <span class="text-xs font-sans text-slate-500 block">• Diagnostic Tool Resmi SHACMAN</span>
                    </div>
                </div>

                <!-- 2. On-Site Support -->
                <div class="bg-white border border-slate-300 p-6 flex flex-col justify-between shadow-xs">
                    <div>
                        <div class="flex items-center justify-between pb-3 border-b border-slate-200 mb-4">
                            <span class="font-sans text-xs font-bold text-[#0067b1] uppercase">Program 02</span>
                            <span class="text-[11px] font-sans bg-amber-50 text-amber-800 border border-amber-200 px-2 py-0.5 font-bold">24/7 Response</span>
                        </div>
                        <h3 class="text-xl font-bold font-barlow-condensed uppercase italic text-neutral-900">
                            On-Site Mechanic & Breakdown Support
                        </h3>
                        <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                            Penempatan tim mekanik langsung di site tambang (onsite basecamp) untuk respon darurat breakdown cepat. Dilengkapi mobile service unit dengan toolkit hidrolik dan special tools untuk perbaikan langsung di jalur angkut hauling.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-xs font-sans text-slate-500 block">• Siaga Darurat 24 Jam</span>
                        <span class="text-xs font-sans text-slate-500 block">• Meminimalkan Downtime Hauling</span>
                    </div>
                </div>

                <!-- 3. Genuine Parts -->
                <div class="bg-white border border-slate-300 p-6 flex flex-col justify-between shadow-xs">
                    <div>
                        <div class="flex items-center justify-between pb-3 border-b border-slate-200 mb-4">
                            <span class="font-sans text-xs font-bold text-[#0067b1] uppercase">Program 03</span>
                            <span class="text-[11px] font-sans bg-slate-100 text-slate-600 px-2 py-0.5">Supply Chain</span>
                        </div>
                        <h3 class="text-xl font-bold font-barlow-condensed uppercase italic text-neutral-900">
                            Genuine Spare Parts Inventory
                        </h3>
                        <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                            Jaminan pasokan 100% suku cadang asli SHACMAN, Weichai Power, FAST Gearbox, dan Hande Axle. Stok fast-moving part (filter, brake lining, v-belt, spring leaf) selalu tersedia di gudang pusat untuk pengiriman kilat ke seluruh Indonesia.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-xs font-sans text-slate-500 block">• Garansi Resmi Pabrikan</span>
                        <span class="text-xs font-sans text-slate-500 block">• Konsinyasi Spare Part di Site</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CMS SERVICE LISTING ================= -->
    <section class="w-full bg-white py-12 sm:py-16 border-t border-slate-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-xs font-sans font-bold uppercase text-slate-400 mb-2">Service Packages</div>
            <h2 class="text-2xl sm:text-3xl font-bold font-barlow-condensed uppercase italic text-neutral-900 mb-6">
                Cakupan Layanan Resmi PT SHINDO
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($services as $service)
                    <div class="p-5 border border-slate-200 bg-slate-50/60 hover:bg-white hover:border-[#0067b1] transition-all">
                        <div class="flex items-center space-x-2 mb-2 font-sans text-xs text-[#0067b1] font-bold">
                            <span>[ Service #{{ $loop->iteration }} ]</span>
                        </div>
                        <h4 class="text-lg font-bold font-barlow-condensed uppercase italic text-neutral-900">
                            {{ $service->title }}
                        </h4>
                        <p class="text-xs text-slate-600 leading-relaxed mt-1.5">
                            {{ $service->description ?? 'Dukungan teknis berkala dan ketersediaan komponen standar ATPM resmi untuk memastikan operasional unit tetap handal.' }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center font-sans text-xs text-slate-500">
                        Data layanan belum tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ================= EMERGENCY CALLOUT ================= -->
    <section class="relative w-full overflow-hidden text-white py-14 sm:py-20 lg:py-24 border-t border-slate-800">
        <!-- Background Image with 5 Shacman Trucks Twilight Headlights -->
        <img src="{{ asset('images/series/pro_detail08_1.jpg') }}" alt="Armada Truk Shacman Operasional"
            class="absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none">
        <div class="absolute inset-0 bg-[#00163c]/75 sm:bg-[#00163c]/65 backdrop-brightness-90"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="border border-white/20 bg-black/40 backdrop-blur-sm p-6 sm:p-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 shadow-2xl">
                <div>
                    <span class="text-xs font-sans font-bold text-amber-400 uppercase tracking-wider block mb-1 drop-shadow">
                        Emergency Dispatch & Technical Support
                    </span>
                    <h3 class="text-2xl sm:text-4xl font-bold font-barlow-condensed uppercase italic leading-none text-white drop-shadow-md">
                        Butuh Penanganan Breakdown Darurat di Site Tambang?
                    </h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-100 max-w-2xl leading-relaxed drop-shadow">
                        Hubungi koordinator technical service kami untuk pengiriman teknisi darurat, diagnosa kerusakan jarak jauh, atau dispatch suku cadang pengganti.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    @php
                        $waPhone = preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890');
                        if (str_starts_with($waPhone, '0')) {
                            $waPhone = '62' . substr($waPhone, 1);
                        }
                    @endphp
                    <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode('Halo Technical Support PT SHINDO, kami membutuhkan emergency dispatch mekanik / konsultasi kerusakan unit di site.') }}"
                        target="_blank" rel="noopener noreferrer"
                        class="px-6 py-3.5 bg-[#0067b1] hover:bg-[#005a9c] text-white font-bold text-xs uppercase font-barlow-condensed tracking-wider transition-colors text-center shadow-lg">
                        Hubungi Emergency Support (24 Jam)
                    </a>
                    <a href="{{ url('/kontak') }}"
                        class="px-6 py-3.5 border border-white/60 bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase font-barlow-condensed tracking-wider transition-colors text-center">
                        Jadwalkan Servis Berkala
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
