@php
    $currentPath = request()->path();
    $isHome = request()->is('/');
    $isProduk = request()->is('produk*');
    $isLayanan = request()->is('layanan*');
    $isSpareparts = request()->is('spareparts*');
    $isOtherActive = request()->is('tentang-kami*', 'blog*', 'kontak*');

    $siteSetting = $site ?? \App\Models\SiteSetting::first() ?? new \App\Models\SiteSetting;
    $rawPhone = $siteSetting->office_phone ?? '628123456789';
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    if (str_starts_with($cleanPhone, '0')) {
        $cleanPhone = '62' . substr($cleanPhone, 1);
    }
@endphp

<!-- ================= MOBILE & TABLET FLOATING LIQUID PILL NAVBAR (SMART SLIDE UP/DOWN) ================= -->
<nav id="mobile-pill-navbar"
    aria-label="Navigasi Cepat Mobile"
    class="fixed bottom-3.5 sm:bottom-5 left-1/2 z-40 lg:hidden w-[calc(100%-1.75rem)] max-w-sm sm:max-w-md select-none touch-pan-y will-change-transform"
    style="transform: translate3d(-50%, 0, 0); transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.25s ease;">
    
    <!-- Track Container (Strict 5-Columns Grid for Pixel-Perfect Symmetry) -->
    <div id="mobile-pill-track"
        class="relative bg-[#00163c] border border-slate-700/90 rounded-full shadow-[0_12px_36px_rgba(0,0,0,0.55)] p-1 grid grid-cols-5 gap-1 items-center overflow-hidden transition-transform duration-200">

        <!-- Solid Blue Sliding Capsule Highlight (Flat Brand Blue #0067b1, No Gradient) -->
        <div id="liquid-pill-capsule"
            class="absolute top-1 bottom-1 left-0 rounded-full bg-[#0067b1] pointer-events-none will-change-transform z-0"
            style="opacity: 0; transform-origin: center center;">
        </div>

        <!-- 1. Beranda (Flaticon Style Home Icon) -->
        <a href="{{ url('/') }}"
            data-nav-index="0"
            data-nav-href="{{ url('/') }}"
            class="liquid-nav-item relative z-10 w-full flex flex-col items-center justify-center py-1.5 px-0.5 min-h-[46px] rounded-full transition-colors duration-200 font-normal {{ $isHome ? 'is-active text-white' : 'text-slate-300' }}">
            <svg class="nav-icon w-5 h-5 mb-0.5 pointer-events-none transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2.5 10.5L12 2.5l9.5 8" />
                <path d="M19 8.5V4.5a.5.5 0 00-.5-.5h-2a.5.5 0 00-.5.5v1.8" />
                <path d="M4.5 10v10a1 1 0 001 1h13a1 1 0 001-1V10" />
                <path d="M9.5 21v-6a1.5 1.5 0 011.5-1.5h2a1.5 1.5 0 011.5 1.5v6" />
            </svg>
            <span class="nav-label text-[10.5px] leading-tight tracking-tight pointer-events-none truncate max-w-full font-normal">Beranda</span>
        </a>

        <!-- 2. Produk (Flaticon Style Commercial Heavy Truck Icon) -->
        <a href="{{ url('/produk') }}"
            data-nav-index="1"
            data-nav-href="{{ url('/produk') }}"
            class="liquid-nav-item relative z-10 w-full flex flex-col items-center justify-center py-1.5 px-0.5 min-h-[46px] rounded-full transition-colors duration-200 font-normal {{ $isProduk ? 'is-active text-white' : 'text-slate-300' }}">
            <svg class="nav-icon w-5 h-5 mb-0.5 pointer-events-none transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 5h11v11H2z" />
                <path d="M13 8h4.5a1 1 0 01.8.4l2.7 3.6a1 1 0 01.2.6v3.4H13" />
                <circle cx="6" cy="18" r="2.2" />
                <circle cx="17.5" cy="18" r="2.2" />
                <path d="M8.2 18h7.1M2 16v2h1.8M19.7 18H22v-2" />
                <path d="M15 11h3" />
            </svg>
            <span class="nav-label text-[10.5px] leading-tight tracking-tight pointer-events-none truncate max-w-full font-normal">Produk</span>
        </a>

        <!-- 3. Layanan (Flaticon Style Service / Mechanic Wrench Icon) -->
        <a href="{{ url('/layanan') }}"
            data-nav-index="2"
            data-nav-href="{{ url('/layanan') }}"
            class="liquid-nav-item relative z-10 w-full flex flex-col items-center justify-center py-1.5 px-0.5 min-h-[46px] rounded-full transition-colors duration-200 font-normal {{ $isLayanan ? 'is-active text-white' : 'text-slate-300' }}">
            <svg class="nav-icon w-5 h-5 mb-0.5 pointer-events-none transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19.7 7.7a4.5 4.5 0 00-6.1-6.1l-2.8 2.8a3 3 0 000 4.2l.6.6L3.2 17.4a2 2 0 000 2.8l.6.6a2 2 0 002.8 0l8.2-8.2.6.6a3 3 0 004.2 0l2.8-2.8a4.5 4.5 0 00-2.7-2.7z" />
                <circle cx="5.5" cy="18.5" r="1" fill="currentColor" />
            </svg>
            <span class="nav-label text-[10.5px] leading-tight tracking-tight pointer-events-none truncate max-w-full font-normal">Layanan</span>
        </a>

        <!-- 4. Spareparts (Flaticon Style Automotive Dual Gears Icon) -->
        <a href="{{ url('/spareparts') }}"
            data-nav-index="3"
            data-nav-href="{{ url('/spareparts') }}"
            class="liquid-nav-item relative z-10 w-full flex flex-col items-center justify-center py-1.5 px-0.5 min-h-[46px] rounded-full transition-colors duration-200 font-normal {{ $isSpareparts ? 'is-active text-white' : 'text-slate-300' }}">
            <svg class="nav-icon w-5 h-5 mb-0.5 pointer-events-none transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="9" r="2.5" />
                <path d="M9 3.5v1.2M9 13.3v1.2M3.5 9h1.2M13.3 9h1.2M5.1 5.1l.9.9M12 12l.9.9M5.1 12.9l.9-.9M12 6l.9-.9" />
                <circle cx="9" cy="9" r="4.5" />
                <circle cx="16.5" cy="16.5" r="1.8" />
                <path d="M16.5 12.5v.8M16.5 19.7v.8M12.5 16.5h.8M19.7 16.5h.8M13.7 13.7l.6.6M18.7 18.7l.6.6M13.7 19.3l.6-.6M18.7 14.3l.6-.6" />
                <circle cx="16.5" cy="16.5" r="3.2" />
            </svg>
            <span class="nav-label text-[10.5px] leading-tight tracking-tight pointer-events-none truncate max-w-full font-normal">Spareparts</span>
        </a>

        <!-- 5. Menu Drawer Toggle (Flaticon Style Modern Category Grid Icon) -->
        <button type="button"
            id="btn-open-mobile-sheet"
            data-nav-index="4"
            data-is-drawer="true"
            aria-label="Buka Menu Lainnya"
            aria-expanded="false"
            aria-controls="mobile-nav-sheet"
            class="liquid-nav-item relative z-10 w-full flex flex-col items-center justify-center py-1.5 px-0.5 min-h-[46px] rounded-full transition-colors duration-200 font-normal {{ $isOtherActive ? 'is-active text-white' : 'text-slate-300' }}">
            @if($isOtherActive)
                <span class="absolute top-1.5 right-2.5 w-2 h-2 rounded-full bg-amber-400"></span>
            @endif
            <svg class="nav-icon w-5 h-5 mb-0.5 pointer-events-none transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3.5" y="3.5" width="6.5" height="6.5" rx="2" />
                <rect x="14" y="3.5" width="6.5" height="6.5" rx="2" />
                <rect x="3.5" y="14" width="6.5" height="6.5" rx="2" />
                <rect x="14" y="14" width="6.5" height="6.5" rx="2" />
            </svg>
            <span class="nav-label text-[10.5px] leading-tight tracking-tight pointer-events-none truncate max-w-full font-normal">Menu</span>
        </button>

    </div>
</nav>

<!-- ================= MOBILE SLIDE-UP DRAWER SHEET ================= -->
<div id="mobile-nav-sheet-container" class="fixed inset-0 z-50 lg:hidden pointer-events-none">
    <!-- Backdrop with Fade Transition -->
    <div id="mobile-nav-backdrop"
        class="absolute inset-0 bg-black/75 pointer-events-none will-change-opacity"
        style="opacity: 0; transition: opacity 0.3s ease;"></div>

    <!-- Sheet Panel with iOS Slide Transition (Masuk NAIK dari Bawah, Keluar TURUN ke Bawah) -->
    <div id="mobile-nav-sheet"
        role="dialog"
        aria-modal="true"
        aria-label="Menu Lengkap PT SHINDO"
        class="absolute bottom-0 inset-x-0 bg-[#00163c] border-t border-slate-700/80 rounded-t-3xl p-5 sm:p-6 shadow-2xl max-h-[88vh] overflow-y-auto pointer-events-auto touch-pan-y will-change-transform"
        style="transform: translate3d(0, 100%, 0);">

        <!-- Top Drag Handle with tactile affordance -->
        <div class="py-1 cursor-grab active:cursor-grabbing flex justify-center" id="mobile-sheet-drag-area">
            <div class="w-12 h-1.5 bg-white/30 rounded-full mx-auto mb-3" id="mobile-sheet-drag-handle"></div>
        </div>

        <!-- Sheet Header -->
        <div class="flex items-center justify-between pb-4 border-b border-white/10">
            <div class="flex items-center space-x-2">
                <img src="{{ $siteSetting->navbar_logo_url }}" alt="PT SHINDO" class="h-7 w-auto object-contain">
            </div>
            <button type="button"
                id="btn-close-mobile-sheet"
                aria-label="Tutup Menu"
                class="ios-spring-tap w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Secondary Navigation Grid -->
        <div class="py-4 space-y-2">
            <p class="text-[11px] font-bold font-sans uppercase tracking-wider text-slate-400 px-1">Menu Utama</p>

            <a href="{{ url('/tentang-kami') }}"
                class="ios-spring-tap flex items-center justify-between p-3 rounded-xl transition-colors {{ request()->is('tentang-kami*') ? 'bg-[#0067b1] text-white font-medium' : 'text-slate-200 hover:bg-white/10 font-normal' }}">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm">Tentang Kami</div>
                        <div class="text-[11px] text-slate-400">Profil & jaringan cabang PT SHINDO</div>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ url('/blog') }}"
                class="ios-spring-tap flex items-center justify-between p-3 rounded-xl transition-colors {{ request()->is('blog*') ? 'bg-[#0067b1] text-white font-medium' : 'text-slate-200 hover:bg-white/10 font-normal' }}">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm">Blog & Berita</div>
                        <div class="text-[11px] text-slate-400">Update industri dan panduan armada</div>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ url('/kontak') }}"
                class="ios-spring-tap flex items-center justify-between p-3 rounded-xl transition-colors {{ request()->is('kontak*') ? 'bg-[#0067b1] text-white font-medium' : 'text-slate-200 hover:bg-white/10 font-normal' }}">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-white">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm">Hubungi & Lokasi</div>
                        <div class="text-[11px] text-slate-400">Peta workshop dan nomor hotline</div>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <!-- Seri Truk Pilihan -->
        <div class="py-3 border-t border-white/10">
            <p class="text-[11px] font-bold font-sans uppercase tracking-wider text-slate-400 px-1 mb-2">Pilihan Seri Truk SHACMAN</p>
            <div class="grid grid-cols-3 gap-2">
                <a href="{{ route('produk.series', 'x3000') }}"
                    class="ios-spring-tap flex flex-col items-center justify-center p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-colors">
                    <span class="text-xs font-bold text-white">X3000</span>
                    <span class="text-[9px] text-slate-400">Heavy Duty</span>
                </a>
                <a href="{{ route('produk.series', 'h3000') }}"
                    class="ios-spring-tap flex flex-col items-center justify-center p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-colors">
                    <span class="text-xs font-bold text-white">H3000</span>
                    <span class="text-[9px] text-slate-400">Logistik & Dump</span>
                </a>
                <a href="{{ route('produk.series', 'f3000') }}"
                    class="ios-spring-tap flex flex-col items-center justify-center p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-center transition-colors">
                    <span class="text-xs font-bold text-white">F3000</span>
                    <span class="text-[9px] text-slate-400">Off-Road Mining</span>
                </a>
            </div>
        </div>

        <!-- Direct Contact Actions -->
        <div class="pt-4 border-t border-white/10 flex flex-col sm:flex-row gap-2.5">
            <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Halo PT SHINDO, saya ingin informasi unit dan spesifikasi truk SHACMAN.') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="ios-spring-tap flex-1 inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#25D366] hover:bg-[#20bd5a] text-white text-xs sm:text-sm font-bold shadow-lg transition-colors">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                <span>WhatsApp Sales</span>
            </a>
            <a href="tel:{{ $cleanPhone }}"
                class="ios-spring-tap flex-1 inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#0067b1] hover:bg-[#005a9c] text-white text-xs sm:text-sm font-bold shadow-lg transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>Telepon Hotline</span>
            </a>
        </div>
    </div>
</div>

<!-- Script Controller: High-Precision Liquid Gestures & True Slide Up/Down Drawer Sheet -->
<script>
    (function () {
        function initLiquidMobileNavbar() {
            const navbar = document.getElementById('mobile-pill-navbar');
            const track = document.getElementById('mobile-pill-track');
            const capsule = document.getElementById('liquid-pill-capsule');
            const navItems = Array.from(document.querySelectorAll('.liquid-nav-item'));
            const openBtn = document.getElementById('btn-open-mobile-sheet');
            const closeBtn = document.getElementById('btn-close-mobile-sheet');
            const container = document.getElementById('mobile-nav-sheet-container');
            const backdrop = document.getElementById('mobile-nav-backdrop');
            const sheet = document.getElementById('mobile-nav-sheet');
            const dragArea = document.getElementById('mobile-sheet-drag-area') || document.getElementById('mobile-sheet-drag-handle');
            const topHeaderMenuBtn = document.getElementById('mobile-menu-btn');

            if (!navbar || !track || !capsule || navItems.length === 0 || !sheet || !container || !backdrop) return;

            let activeItem = navItems.find(el => el.classList.contains('is-active')) || navItems[0];
            let isDraggingNavbar = false;
            let startTouchX = 0;
            let startTouchY = 0;
            let lastTouchX = 0;
            let touchVelocityX = 0;
            let isNavbarHidden = false;

            // ================= SMART NAVBAR SHOW / HIDE CONTROLS =================
            function hideNavbar() {
                if (isNavbarHidden) return;
                isNavbarHidden = true;
                navbar.style.transform = 'translate3d(-50%, 140%, 0)';
                navbar.style.opacity = '0';
                navbar.style.pointerEvents = 'none';
            }

            function showNavbar() {
                if (!isNavbarHidden) return;
                isNavbarHidden = false;
                navbar.style.transform = 'translate3d(-50%, 0, 0)';
                navbar.style.opacity = '1';
                navbar.style.pointerEvents = 'auto';
            }

            /**
             * Mathematically calculates exact pixel coordinate to center capsule over targetItem's icon.
             * Formula: (centerOfIcon - trackInnerLeft) - (capsuleWidth / 2)
             */
            function getCapsuleGeometry(targetItem) {
                if (!targetItem) return null;
                const trackRect = track.getBoundingClientRect();
                const itemRect = targetItem.getBoundingClientRect();
                const icon = targetItem.querySelector('.nav-icon');
                const iconRect = icon ? icon.getBoundingClientRect() : itemRect;

                const iconCenterX = iconRect.left + (iconRect.width / 2);
                const trackInnerLeft = trackRect.left + track.clientLeft;
                const capsuleWidth = itemRect.width;
                const capsuleLeft = (iconCenterX - trackInnerLeft) - (capsuleWidth / 2);

                return {
                    left: capsuleLeft,
                    width: capsuleWidth
                };
            }

            function placeCapsule(targetItem, animate = false, scaleX = 1, scaleY = 1) {
                const geo = getCapsuleGeometry(targetItem);
                if (!geo) return;

                capsule.style.width = geo.width + 'px';
                if (animate) {
                    capsule.style.transition = 'transform 0.38s cubic-bezier(0.34, 1.56, 0.64, 1), width 0.22s ease, opacity 0.15s ease';
                } else {
                    capsule.style.transition = 'none';
                }
                capsule.style.transform = `translate3d(${geo.left}px, 0, 0) scale(${scaleX}, ${scaleY})`;
                capsule.style.opacity = '1';
            }

            function setHighlightedItem(targetItem) {
                navItems.forEach(item => {
                    const icon = item.querySelector('.nav-icon');
                    if (item === targetItem) {
                        item.classList.add('text-white');
                        item.classList.remove('text-slate-300');
                        if (icon) {
                            icon.style.transform = 'scale(1.1)';
                        }
                    } else {
                        item.classList.remove('text-white');
                        item.classList.add('text-slate-300');
                        if (icon) {
                            icon.style.transform = 'scale(1)';
                        }
                    }
                });
            }

            function syncInitialPosition() {
                placeCapsule(activeItem, false, 1, 1);
                setHighlightedItem(activeItem);
            }

            syncInitialPosition();
            requestAnimationFrame(syncInitialPosition);
            window.addEventListener('resize', syncInitialPosition, { passive: true });
            window.addEventListener('load', syncInitialPosition, { passive: true });

            // Touch Drag Gesture (Interactive Liquid Morphing)
            track.addEventListener('touchstart', function (e) {
                if (e.touches.length > 1) return;
                const touch = e.touches[0];
                startTouchX = touch.clientX;
                startTouchY = touch.clientY;
                lastTouchX = touch.clientX;
                touchVelocityX = 0;
                isDraggingNavbar = false;
            }, { passive: true });

            track.addEventListener('touchmove', function (e) {
                const touch = e.touches[0];
                const deltaX = touch.clientX - startTouchX;
                const deltaY = touch.clientY - startTouchY;

                if (!isDraggingNavbar) {
                    if (Math.abs(deltaX) > 5 && Math.abs(deltaX) > Math.abs(deltaY)) {
                        isDraggingNavbar = true;
                        track.style.transform = 'scale(0.985)';
                    } else {
                        return;
                    }
                }

                touchVelocityX = touch.clientX - lastTouchX;
                lastTouchX = touch.clientX;

                let nearestItem = null;
                let minDistance = Infinity;

                navItems.forEach(item => {
                    const rect = item.getBoundingClientRect();
                    const itemCenter = rect.left + (rect.width / 2);
                    const dist = Math.abs(touch.clientX - itemCenter);
                    if (dist < minDistance) {
                        minDistance = dist;
                        nearestItem = item;
                    }
                });

                if (nearestItem) {
                    setHighlightedItem(nearestItem);
                }

                const speed = Math.min(Math.abs(touchVelocityX) * 0.035, 0.28);
                const liquidStretchX = 1 + speed;
                const liquidSquashY = Math.max(0.88, 1 - (speed * 0.5));

                const trackRect = track.getBoundingClientRect();
                const trackInnerLeft = trackRect.left + track.clientLeft;
                const fingerXInTrack = touch.clientX - trackInnerLeft;
                const capsuleWidth = activeItem.offsetWidth;

                const targetLeft = fingerXInTrack - (capsuleWidth / 2);
                const maxLeft = track.clientWidth - capsuleWidth;
                const clampedLeft = Math.max(0, Math.min(maxLeft, targetLeft));

                capsule.style.transition = 'transform 0.05s ease-out, opacity 0.2s ease';
                capsule.style.transform = `translate3d(${clampedLeft}px, 0, 0) scale(${liquidStretchX}, ${liquidSquashY})`;
            }, { passive: true });

            track.addEventListener('touchend', function (e) {
                if (!isDraggingNavbar) return;
                isDraggingNavbar = false;
                track.style.transform = '';

                const touch = e.changedTouches[0];
                let targetItem = null;
                let minDistance = Infinity;

                navItems.forEach(item => {
                    const rect = item.getBoundingClientRect();
                    const itemCenter = rect.left + (rect.width / 2);
                    const dist = Math.abs(touch.clientX - itemCenter);
                    if (dist < minDistance) {
                        minDistance = dist;
                        targetItem = item;
                    }
                });

                if (targetItem) {
                    placeCapsule(targetItem, true, 1, 1);
                    setHighlightedItem(targetItem);

                    if (targetItem.getAttribute('data-is-drawer') === 'true') {
                        setTimeout(openSheet, 180);
                    } else if (targetItem !== activeItem) {
                        const href = targetItem.getAttribute('data-nav-href');
                        if (href) {
                            setTimeout(() => {
                                window.location.href = href;
                            }, 200);
                        }
                    }
                } else {
                    placeCapsule(activeItem, true, 1, 1);
                    setHighlightedItem(activeItem);
                }
            }, { passive: true });

            // Tap on items (Sleek fluid glide)
            navItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    if (isDraggingNavbar) {
                        e.preventDefault();
                        return;
                    }

                    const isDrawer = item.getAttribute('data-is-drawer') === 'true';
                    const href = item.getAttribute('data-nav-href');

                    placeCapsule(item, true, 1.04, 0.95);
                    setHighlightedItem(item);
                    setTimeout(() => {
                        placeCapsule(item, true, 1, 1);
                    }, 180);

                    if (isDrawer) {
                        e.preventDefault();
                        openSheet();
                    } else if (href && item !== activeItem) {
                        e.preventDefault();
                        setTimeout(() => {
                            window.location.href = href;
                        }, 200);
                    }
                });
            });

            // ================= BOTTOM SHEET LOGIC: MASUK NAIK DARI BAWAH, KELUAR TURUN KE BAWAH =================
            let isSheetOpen = false;
            let sheetStartY = 0;
            let sheetCurrentY = 0;
            let isDraggingSheet = false;

            function openSheet() {
                if (isSheetOpen) return;
                isSheetOpen = true;

                // 1. Navbar turun ke bawah keluar layar
                hideNavbar();

                // 2. Aktifkan container
                container.classList.remove('pointer-events-none');
                container.classList.add('pointer-events-auto');

                backdrop.classList.remove('pointer-events-none');
                backdrop.classList.add('pointer-events-auto');

                // 3. Pastikan sheet mulai dari bawah layar (100% offscreen)
                sheet.style.transition = 'none';
                sheet.style.transform = 'translate3d(0, 100%, 0)';

                // Force browser layout reflow agar posisi awal 100% ter-commit
                void sheet.offsetHeight;

                // 4. Animasikan meluncur NAIK dari bawah ke atas dengan kurva iOS
                requestAnimationFrame(() => {
                    sheet.style.transition = 'transform 0.42s cubic-bezier(0.32, 0.72, 0, 1)';
                    sheet.style.transform = 'translate3d(0, 0, 0)';
                    backdrop.style.opacity = '1';
                });

                if (openBtn) openBtn.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
            }

            function closeSheet() {
                if (!isSheetOpen) return;
                isSheetOpen = false;

                // 1. Animasikan sheet meluncur TURUN ke bawah keluar layar
                sheet.style.transition = 'transform 0.32s cubic-bezier(0.32, 0.72, 0, 1)';
                sheet.style.transform = 'translate3d(0, 100%, 0)';

                // 2. Fade out backdrop
                backdrop.style.opacity = '0';
                backdrop.classList.remove('pointer-events-auto');
                backdrop.classList.add('pointer-events-none');

                if (openBtn) openBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';

                // 3. Navbar naik kembali dengan fluid spring
                setTimeout(showNavbar, 100);

                // 4. Nonaktifkan container pointer-events setelah animasi turun selesai
                setTimeout(() => {
                    if (!isSheetOpen) {
                        container.classList.remove('pointer-events-auto');
                        container.classList.add('pointer-events-none');
                        sheet.style.transition = '';
                    }
                }, 340);

                // Kembalikan kapsul ke tab aktif
                placeCapsule(activeItem, true, 1, 1);
                setHighlightedItem(activeItem);
            }

            if (closeBtn) closeBtn.addEventListener('click', closeSheet);
            if (backdrop) backdrop.addEventListener('click', closeSheet);

            if (topHeaderMenuBtn) {
                topHeaderMenuBtn.addEventListener('click', function (e) {
                    if (window.innerWidth < 1024) {
                        e.stopImmediatePropagation();
                        openSheet();
                    }
                }, true);
            }

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && isSheetOpen) {
                    closeSheet();
                }
            });

            // Pull down to dismiss inside sheet
            sheet.addEventListener('touchstart', function (e) {
                if (!isSheetOpen) return;
                sheetStartY = e.touches[0].clientY;
                isDraggingSheet = false;
            }, { passive: true });

            sheet.addEventListener('touchmove', function (e) {
                if (!isSheetOpen) return;
                sheetCurrentY = e.touches[0].clientY;
                const deltaY = sheetCurrentY - sheetStartY;

                if (deltaY > 0 && sheet.scrollTop <= 0) {
                    isDraggingSheet = true;
                    const dampedY = Math.pow(deltaY, 0.82) * 2;
                    sheet.style.transition = 'none';
                    sheet.style.transform = `translate3d(0, ${dampedY}px, 0)`;
                    
                    const progress = Math.max(0, 1 - (dampedY / 320));
                    backdrop.style.opacity = progress.toFixed(2);
                }
            }, { passive: true });

            sheet.addEventListener('touchend', function () {
                if (!isDraggingSheet) return;
                isDraggingSheet = false;
                const deltaY = sheetCurrentY - sheetStartY;

                if (deltaY > 90) {
                    closeSheet();
                } else {
                    sheet.style.transition = 'transform 0.35s cubic-bezier(0.32, 0.72, 0, 1)';
                    sheet.style.transform = 'translate3d(0, 0, 0)';
                    backdrop.style.opacity = '1';
                }
            }, { passive: true });

            // ================= SMART SCROLL HIDE / SHOW CONTROLS =================
            let lastScrollY = window.pageYOffset || document.documentElement.scrollTop;
            let scrollTicking = false;

            function handleWindowScroll() {
                if (isSheetOpen || isDraggingNavbar) return;
                const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;

                if (currentScrollY <= 24) {
                    showNavbar();
                    lastScrollY = currentScrollY;
                    return;
                }

                const diff = currentScrollY - lastScrollY;

                if (diff > 10) {
                    hideNavbar();
                } else if (diff < -10) {
                    showNavbar();
                }

                lastScrollY = currentScrollY;
            }

            window.addEventListener('scroll', function () {
                if (!scrollTicking) {
                    window.requestAnimationFrame(function () {
                        handleWindowScroll();
                        scrollTicking = false;
                    });
                    scrollTicking = true;
                }
            }, { passive: true });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initLiquidMobileNavbar);
        } else {
            initLiquidMobileNavbar();
        }
    })();
</script>
