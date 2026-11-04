@extends('layouts.public')

@section('title', 'Kontak & Permintaan Penawaran | PT SHINDO Authorized Dealer SHACMAN Indonesia')
@section('meta_description', 'Hubungi head office, central workshop, dan tim sales resmi PT SHINDO untuk permintaan quotation armada truk SHACMAN, order suku cadang, dan on-site breakdown service.')

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

        .reveal-delay-100 {
            transition-delay: 100ms;
        }

        .reveal-delay-150 {
            transition-delay: 150ms;
        }

        .reveal-delay-200 {
            transition-delay: 200ms;
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
    <!-- ================= BREADCRUMBS (SERIES PRODUK STYLE) ================= -->
    <div class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4">
            <div class="flex items-center space-x-2 text-xs font-sans uppercase tracking-wider text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-[#0067b1] transition-colors">Home</a>
                <span class="text-slate-300">/</span>
                <span class="text-[#00163c] font-bold">Kontak</span>
            </div>
        </div>
    </div>

    <!-- ================= 1. PAGE HEADER (TERANG & BERSIH) ================= -->
    <section class="w-full bg-white py-8 sm:py-12 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 reveal-on-scroll">
                <div>
                    <h1
                        class="text-3xl sm:text-5xl lg:text-6xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c] leading-none tracking-tight">
                        HUBUNGI KAMI
                    </h1>
                </div>
                <div class="max-w-xl text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        Konsultasi pengadaan unit, suku cadang asli, atau dukungan teknisi langsung di lokasi proyek Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. CONTACT & FORM SECTION ================= -->
    <section class="w-full bg-[#f8fafc] py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">

                <!-- Left Column: Workshop & Office Directory -->
                <div class="lg:col-span-5 space-y-5 reveal-on-scroll">
                    <!-- Contact Details Box -->
                    <div class="space-y-3 font-sans text-xs">
                        <!-- Alamat Kantor -->
                        <div class="p-4 bg-white border border-slate-200 shadow-xs">
                            <div class="flex items-center justify-between mb-1">
                                <div class="text-[11px] font-bold uppercase text-slate-400">KANTOR PUSAT</div>
                                <a href="https://maps.app.goo.gl/jUThKPX3Arf6VNVW8" target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-[11px] font-bold text-[#0067b1] hover:underline inline-flex items-center gap-1 font-sans">
                                    <span>Buka di Maps</span>
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            </div>
                            <p class="text-sm font-semibold text-slate-900 font-sans leading-snug">
                                {{ $site->office_address ?? 'Town House Cordoba No. 59, RT.6/RW.2, Kamal Muara, Penjaringan, Jakarta Utara, DKI Jakarta 14470' }}
                            </p>
                        </div>

                        <!-- Telepon & Hotline -->
                        <div class="p-4 bg-white border border-slate-200 shadow-xs">
                            <div class="text-[11px] font-bold uppercase text-slate-400 mb-1">SALES & PENAWARAN HARGA</div>
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $site->office_phone ?? '0215558321') }}"
                                class="text-base font-bold text-[#0067b1] hover:underline font-sans">
                                {{ $site->office_phone ?? '(021) 555-8321' }}
                            </a>
                            <span class="text-[11px] text-slate-500 mt-1 block">Konsultasi unit baru, karoseri, dan
                                pembiayaan.</span>
                        </div>

                        <!-- Email Resmi -->
                        <div class="p-4 bg-white border border-slate-200 shadow-xs">
                            <div class="text-[11px] font-bold uppercase text-slate-400 mb-1">EMAIL PERUSAHAAN</div>
                            <a href="mailto:{{ $site->office_email ?? 'sales@shindo.id' }}"
                                class="text-sm font-bold text-slate-900 hover:text-[#0067b1] font-sans">
                                {{ $site->office_email ?? 'sales@shindo.id' }}
                            </a>
                            <span class="text-[11px] text-slate-500 mt-1 block">Kirim permintaan penawaran harga atau
                                dokumen kerja sama.</span>
                        </div>

                        <!-- 24/7 Breakdown Hotline -->
                        <div class="p-4 bg-[#00163c] text-white border border-[#00163c] shadow-xs">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[11px] font-bold text-blue-300 uppercase tracking-wider">LAYANAN MEKANIK
                                    24/7</span>
                                <span class="w-2 h-2 bg-blue-400 animate-pulse"></span>
                            </div>
                            <div class="text-lg font-bold text-white font-sans">
                                {{ $site->office_phone ?? '(021) 555-8321' }}
                            </div>
                            <div class="mt-2 text-[11px] text-slate-300 font-sans leading-tight">
                                Tim mekanik siaga meluncur ke lokasi proyek Anda.
                            </div>
                        </div>

                        <!-- Jam Operasional -->
                        <div class="p-3 bg-white border border-slate-200 flex justify-between items-center text-[11px]">
                            <span class="text-slate-600">Jam Operasional:</span>
                            <span
                                class="font-bold text-slate-900">{{ $site->office_hours ?? 'Senin - Jumat, 09:00 - 17:00 WIB' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Quotation & Consultation Form -->
                <div class="lg:col-span-7 reveal-on-scroll reveal-delay-200">
                    <div class="bg-white border border-slate-200 p-6 sm:p-7 shadow-xs">
                        <div class="border-b border-slate-200 pb-3.5 mb-5">
                            <h2
                                class="text-xl sm:text-2xl font-bold uppercase font-barlow-condensed not-italic text-[#00163c]">
                                HUBUNGI KAMI
                            </h2>
                            <p class="mt-1 text-slate-600 text-xs sm:text-sm">
                                Konsultasikan kebutuhan armada truk dan spesifikasi unit bersama tim kami.
                            </p>
                        </div>

                        <form id="contact-form" class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Nama
                                        Lengkap *</label>
                                    <input type="text" id="contact-name" required placeholder="Nama"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Perusahaan / Proyek</label>
                                    <input type="text" id="contact-company"
                                        placeholder="Perusahaan / Proyek"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">No.
                                        WhatsApp / Telepon *</label>
                                    <input type="tel" id="contact-phone" required
                                        placeholder="Nomor WhatsApp / Telepon"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Email</label>
                                    <input type="email" id="contact-email"
                                        placeholder="Email"
                                        class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-sans font-bold uppercase text-slate-700 mb-1">Kebutuhan Armada / Catatan</label>
                                <textarea id="contact-message" rows="3"
                                    placeholder="Kebutuhan"
                                    class="w-full px-3.5 py-2.5 border border-slate-300 text-sm focus:outline-none focus:border-[#0067b1] focus:ring-1 focus:ring-[#0067b1] bg-white"></textarea>
                            </div>

                            <div class="pt-1">
                                <button type="submit" id="contact-submit-btn"
                                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#0067b1] hover:bg-[#00528e] text-white font-bold text-sm uppercase font-barlow-condensed not-italic tracking-wider shadow-sm transition-colors cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed">
                                    <span id="contact-btn-text">Hubungi Kami</span>
                                    <svg id="contact-btn-spinner" class="hidden w-4 h-4 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                </button>
                                <span class="text-[11px] font-sans text-slate-500 mt-2 block text-center">
                                    Data Anda otomatis tersimpan & terhubung langsung ke WhatsApp tim sales kami.
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Interactive Map Frame with Sharp Non-rounded Borders -->
            <div
                class="w-full h-[360px] sm:h-[420px] lg:h-[460px] bg-slate-100 border border-slate-300 shadow-sm overflow-hidden reveal-scale">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0988078345155!2d106.7397087!3d-6.1107176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d0049700fdb%3A0xe4077963238b9056!2sPT%20Shindo%20Tractors%20Adiperkasa!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi PT Shindo Tractors Adiperkasa">
                </iframe>
            </div>
        </div>
    </section>
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

            const form = document.getElementById('contact-form');
            if (form) {
                const urlParams = new URLSearchParams(window.location.search);
                const unit = urlParams.get('unit');
                if (unit) {
                    const msgEl = document.getElementById('contact-message');
                    if (msgEl) {
                        msgEl.value = 'Halo Tim Sales PT SHINDO, mohon informasi spesifikasi teknis dan penawaran harga resmi (Quotation) untuk unit: ' + decodeURIComponent(unit) + '.';
                    }
                }

                form.addEventListener('submit', async function (e) {
                    e.preventDefault();
                    const btn = document.getElementById('contact-submit-btn');
                    const btnText = document.getElementById('contact-btn-text');
                    const spinner = document.getElementById('contact-btn-spinner');

                    const name = document.getElementById('contact-name').value.trim();
                    const company = (document.getElementById('contact-company')?.value || '').trim();
                    const phone = document.getElementById('contact-phone').value.trim();
                    const email = (document.getElementById('contact-email')?.value || '').trim();
                    const message = (document.getElementById('contact-message')?.value || '').trim();

                    if (!name || !phone) {
                        alert('Mohon isi nama lengkap dan nomor WhatsApp / telepon aktif Anda.');
                        return;
                    }

                    if (btn) {
                        btn.disabled = true;
                        if (btnText) btnText.textContent = 'Menghubungkan...';
                        if (spinner) spinner.classList.remove('hidden');
                    }

                    try {
                        const response = await fetch('{{ route('leads.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                name,
                                phone,
                                email,
                                company,
                                notes: message,
                                source: 'contact_page'
                            })
                        });

                        const data = await response.json();

                        if (response.ok && data.success && data.whatsapp_url) {
                            window.location.href = data.whatsapp_url;
                        } else {
                            alert(data.message || 'Terjadi kendala saat menyimpan formulir. Silakan coba kembali.');
                            if (btn) {
                                btn.disabled = false;
                                if (btnText) btnText.textContent = 'Hubungi Kami';
                                if (spinner) spinner.classList.add('hidden');
                            }
                        }
                    } catch (err) {
                        console.error('Lead submission error:', err);
                        let waNumber = '{{ preg_replace('/[^0-9]/', '', $site->office_phone ?? '6281234567890') }}';
                        if (waNumber.startsWith('0')) {
                            waNumber = '62' + waNumber.substring(1);
                        }
                        const fallbackText = `*Pesan Kontak / Konsultasi - PT SHINDO*\n\n` +
                            `*Nama:* ${name}\n` +
                            `*No. WhatsApp / HP:* ${phone}\n` +
                            (company ? `*Perusahaan / Proyek:* ${company}\n` : '') +
                            (email ? `*Email:* ${email}\n` : '') +
                            (message ? `*Kebutuhan Armada / Catatan:*\n${message}` : '');
                        window.location.href = `https://wa.me/${waNumber}?text=${encodeURIComponent(fallbackText)}`;
                        if (btn) {
                            btn.disabled = false;
                            if (btnText) btnText.textContent = 'Hubungi Kami';
                            if (spinner) spinner.classList.add('hidden');
                        }
                    }
                });
            }
        });
    </script>
@endpush