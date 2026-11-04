@php
    $hpSettings = $settings ?? \App\Models\HomepageSetting::current();
    $rawPhone = $hpSettings->whatsapp_number ?? ($site->office_phone ?? '628123456789');
    $cleanWaPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    if (str_starts_with($cleanWaPhone, '0')) {
        $cleanWaPhone = '62' . substr($cleanWaPhone, 1);
    }
    if (empty($cleanWaPhone)) {
        $cleanWaPhone = '628123456789';
    }
    $waDefaultMessage = urlencode("Halo PT SHINDO, saya tertarik berkonsultasi mengenai spesifikasi teknis dan penawaran armada dump truck SHACMAN.");
@endphp

<!-- ================= FLOATING ACTION BUTTONS: BACK TO TOP & WHATSAPP ================= -->
<aside aria-label="Aksi Cepat Kontak dan Navigasi" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 flex flex-col items-center gap-3 select-none pointer-events-none">
    
    <!-- 1. Back to Top Button (Diatas Tombol WhatsApp) -->
    <button id="btn-back-to-top"
        type="button"
        aria-label="Kembali ke atas"
        title="Kembali ke atas"
        class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-[#00163c]/90 hover:bg-[#0067b1] text-white shadow-xl flex items-center justify-center border border-white/20 transition-all duration-300 transform opacity-0 translate-y-4 pointer-events-none hover:scale-110 active:scale-95 group focus:outline-none focus:ring-2 focus:ring-[#0067b1]">
        <svg class="w-5 h-5 sm:w-6 sm:h-6 transition-transform duration-200 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
        <span class="sr-only">Kembali ke atas</span>
    </button>

    <!-- 2. WhatsApp Floating Action Button -->
    <a id="btn-floating-whatsapp"
        href="https://wa.me/{{ $cleanWaPhone }}?text={{ $waDefaultMessage }}"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat WhatsApp PT SHINDO"
        title="Hubungi Kami via WhatsApp"
        class="relative w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-[#25D366] hover:bg-[#20bd5a] text-white shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-105 active:scale-95 pointer-events-auto group focus:outline-none focus:ring-4 focus:ring-[#25D366]/40">

        <!-- Official WhatsApp SVG Icon -->
        <svg class="relative w-7 h-7 sm:w-8 sm:h-8 fill-current drop-shadow-xs" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>

        <!-- Tooltip on hover (desktop) -->
        <span class="hidden sm:group-hover:inline-flex items-center absolute right-full mr-3.5 px-3 py-1.5 bg-[#00163c] text-white text-xs font-semibold shadow-xl whitespace-nowrap transition-all duration-200 pointer-events-none">
            Chat WhatsApp
            <span class="absolute top-1/2 -right-1 -translate-y-1/2 border-4 border-transparent border-l-[#00163c]"></span>
        </span>
    </a>
</aside>

<script>
    (function () {
        function initFloatingControls() {
            var backToTopBtn = document.getElementById('btn-back-to-top');
            if (!backToTopBtn) return;

            var showThreshold = 280;

            function handleScroll() {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop > showThreshold) {
                    backToTopBtn.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                    backToTopBtn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                } else {
                    backToTopBtn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                    backToTopBtn.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                }
            }

            window.addEventListener('scroll', handleScroll, { passive: true });
            handleScroll();

            backToTopBtn.addEventListener('click', function (e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFloatingControls);
        } else {
            initFloatingControls();
        }
    })();
</script>
