@extends('layouts.public')

@section('title', 'Kontak & Permintaan Penawaran | PT SHINDO Authorized Dealer SHACMAN Indonesia')
@section('meta_description', 'Hubungi head office, central workshop, dan tim sales resmi PT SHINDO untuk permintaan quotation armada truk SHACMAN, order suku cadang, dan on-site breakdown service.')

@section('content')
    <!-- ================= PAGE HERO HEADER ================= -->
    <section class="relative bg-[#070e1e] text-white py-12 sm:py-16 border-b border-slate-800 overflow-hidden">
        <!-- Background Image Texture -->
        <div class="absolute inset-0 z-0 select-none pointer-events-none">
            <img src="{{ asset('images/page-header-bg.png') }}" alt="" class="w-full h-full object-cover object-center opacity-95">
            <div class="absolute inset-0 bg-gradient-to-r from-[#070e1e]/85 via-[#070e1e]/40 to-black/10"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex items-center space-x-2 text-xs text-slate-400 mb-4 font-sans uppercase tracking-wider">
                <a href="{{ url('/') }}" class="hover:text-amber-400 transition-colors">Home</a>
                <span>/</span>
                <span class="text-amber-400 font-semibold">Kontak</span>
            </div>

            <div class="max-w-3xl">
                <h1 class="text-3xl sm:text-5xl font-bold italic uppercase font-barlow-condensed tracking-tight text-white leading-none">
                    HUBUNGI KAMI & PERMINTAAN PENAWARAN
                </h1>
                <p class="mt-4 text-slate-300 text-sm sm:text-base leading-relaxed">
                    Diskusikan pengadaan unit baru dump truck SHACMAN, pemesanan spare parts original, request on-site mechanic dispatch, atau jadwal survei rute hauling bersama technical consultant kami.
                </p>
            </div>
        </div>
    </section>

    <!-- ================= CONTACT & FORM SECTION ================= -->
    <section class="w-full bg-slate-50 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                
                <!-- Left Column: Workshop & Office Directory -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <div class="text-xs font-sans font-bold text-[#0067b1] tracking-wider uppercase mb-1">
                            // DIRECTORY & WORKSHOP
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold uppercase font-barlow-condensed italic text-[#070e1e]">
                            HEAD OFFICE & SUPPORT CENTER
                        </h2>
                        <p class="mt-1 text-slate-600 text-xs sm:text-sm">
                            Hubungi saluran resmi kami di bawah untuk respon cepat dari konsultan teknis kami.
                        </p>
                    </div>

                    <!-- Contact Details Box -->
                    <div class="space-y-3 font-sans text-xs">
                        <!-- Alamat Kantor -->
                        <div class="p-4 bg-white border border-slate-200">
                            <div class="text-[11px] font-bold uppercase text-slate-400 mb-1">HEAD OFFICE & CENTRAL WORKSHOP</div>
                            <p class="text-sm font-semibold text-slate-900 font-sans">
                                {{ $site->office_address ?? 'THC 59 Kamal Jakut, DKI Jakarta' }}
                            </p>
                            <span class="text-[11px] text-slate-500 mt-1 block">Fasilitas workshop perbaikan besar, bengkel bubut, dan gudang sasis.</span>
                        </div>

                        <!-- Telepon & Hotline -->
                        <div class="p-4 bg-white border border-slate-200">
                            <div class="text-[11px] font-bold uppercase text-slate-400 mb-1">SALES & KONSULTASI PENAWARAN</div>
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $site->office_phone ?? '0215558321') }}"
                                class="text-base font-bold text-[#0067b1] hover:underline font-sans">
                                {{ $site->office_phone ?? '(021) 555-8321' }}
                            </a>
                            <span class="text-[11px] text-slate-500 mt-1 block">Melayani inquiry unit baru, spesifikasi karoseri, dan leasing support.</span>
                        </div>

                        <!-- Email Resmi -->
                        <div class="p-4 bg-white border border-slate-200">
                            <div class="text-[11px] font-bold uppercase text-slate-400 mb-1">OFFICIAL EMAIL CORRESPONDENCE</div>
                            <a href="mailto:{{ $site->office_email ?? 'sales@shindo.id' }}"
                                class="text-sm font-bold text-slate-900 hover:text-[#0067b1] font-sans">
                                {{ $site->office_email ?? 'sales@shindo.id' }}
                            </a>
                            <span class="text-[11px] text-slate-500 mt-1 block">Kirim RFQ (Request for Quotation) & dokumen tender armada resmi.</span>
                        </div>

                        <!-- 24/7 Breakdown Hotline -->
                        <div class="p-4 bg-[#070e1e] text-white border border-slate-800">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[11px] font-bold text-amber-400 uppercase tracking-wider">24/7 ON-SITE BREAKDOWN CALLOUT</span>
                                <span class="w-2 h-2 bg-amber-400 animate-pulse"></span>
                            </div>
                            <div class="text-lg font-bold text-white font-sans">
                                {{ $site->office_phone ?? '(021) 555-8321' }}
                            </div>
                            <div class="mt-2 text-[11px] text-slate-400 font-sans leading-tight">
                                Tim mobile mechanic siap diberangkatkan langsung ke konsesi tambang atau area remote proyek.
                            </div>
                        </div>

                        <!-- Jam Operasional -->
                        <div class="p-3 bg-slate-100 border border-slate-200 flex justify-between items-center text-[11px]">
                            <span class="text-slate-600">Jam Kantor Pusat:</span>
                            <span class="font-bold text-slate-900">{{ $site->office_hours ?? 'Senin - Jumat, 09:00 - 17:00' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Quotation & Consultation Form -->
                <div class="lg:col-span-7">
                    <div class="bg-white border border-slate-200 p-6 sm:p-8">
                        <div class="border-b border-slate-200 pb-4 mb-6">
                            <div class="text-xs font-sans font-bold text-[#0067b1] uppercase tracking-wider mb-1">
                                // INQUIRY & PENAWARAN UNIT
                            </div>
                            <h2 class="text-xl sm:text-2xl font-bold uppercase font-barlow-condensed italic text-slate-900">
                                FORMULIR PERMINTAAN PENAWARAN HARGA
                            </h2>
                            <p class="mt-1 text-slate-600 text-xs sm:text-sm">
                                Masukkan rincian kebutuhan unit, jumlah truk, atau suku cadang. Tim kami akan segera mengirimkan penawaran resmi via WhatsApp / Email.
                            </p>
                        </div>

                        <form id="contact-form" class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Nama Lengkap *</label>
                                    <input type="text" id="contact-name" required placeholder="Contoh: Hendra Pratama"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Nama Perusahaan / Proyek</label>
                                    <input type="text" id="contact-company" placeholder="Contoh: PT Mineral Nusantara Logistik"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">No. WhatsApp / HP Aktif *</label>
                                    <input type="tel" id="contact-phone" required placeholder="Contoh: 08128888xxxx"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Kategori Kebutuhan</label>
                                    <select id="contact-category"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                        <option value="Pengadaan Unit Baru (Dump Truck / Prime Mover)">Pengadaan Unit Baru (Dump Truck / Prime Mover)</option>
                                        <option value="Suku Cadang & Fast Moving Spare Parts">Pemesanan Suku Cadang (Spare Parts)</option>
                                        <option value="Kontrak On-Site Service & Overhaul">Kontrak On-Site Service & Overhaul</option>
                                        <option value="Kustomisasi Karoseri Vessel / Tanker">Kustomisasi Karoseri (Vessel / Tanker)</option>
                                        <option value="Permintaan Uji Coba Unit / Demo Unit">Permintaan Uji Coba Unit / Demo Unit</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Rincian Kebutuhan & Lokasi Job Site</label>
                                <textarea id="contact-message" rows="4" placeholder="Tuliskan tipe unit (F3000 / H3000 / X3000), estimasi jumlah unit, tipe karoseri (Vessel U-Shape Hardox / Flatbed), dan lokasi job site..."
                                    class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white"></textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-sm uppercase font-barlow-condensed tracking-wider shadow-sm transition-colors">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                                    Kirim Permintaan Quotation via WhatsApp Resmi
                                </button>
                                <span class="text-[11px] font-sans text-slate-400 mt-2 block text-center">
                                    Format pesan penawaran akan otomatis tersusun rapi untuk tim sales & teknis PT SHINDO.
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contact-form');
        if (form) {
            // Check if unit parameter in URL
            const urlParams = new URLSearchParams(window.location.search);
            const unit = urlParams.get('unit');
            if (unit) {
                const msgEl = document.getElementById('contact-message');
                if (msgEl) {
                    msgEl.value = 'Halo Tim Sales PT SHINDO, mohon informasi spesifikasi teknis dan penawaran harga resmi (Quotation) untuk unit: ' + decodeURIComponent(unit) + '.';
                }
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const name = document.getElementById('contact-name').value;
                const company = document.getElementById('contact-company').value || '-';
                const phone = document.getElementById('contact-phone').value;
                const category = document.getElementById('contact-category').value;
                const message = document.getElementById('contact-message').value;

                let waNumber = '{{ preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890') }}';
                if (waNumber.startsWith('0')) {
                    waNumber = '62' + waNumber.substring(1);
                }

                const fullText = `*Permintaan Penawaran Unit - Website PT SHINDO*\n\n` +
                    `*Nama Pemohon:* ${name}\n` +
                    `*Perusahaan / Proyek:* ${company}\n` +
                    `*No. WhatsApp / HP:* ${phone}\n` +
                    `*Kategori Kebutuhan:* ${category}\n` +
                    `*Detail Spesifikasi / Job Site:*\n${message}`;

                const targetUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(fullText)}`;
                window.open(targetUrl, '_blank');
            });
        }
    });
</script>
@endpush
