@php
    $currentPath = request()->path();
    $isHome = request()->is('/');
    $isProduk = request()->is('produk*');
    $isLayanan = request()->is('layanan*');
    $isSpareparts = request()->is('spareparts*');
    $isOtherActive = request()->is('tentang-kami*', 'blog*', 'kontak*');

    $siteSetting = $site ?? \App\Models\SiteSetting::current();
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
<div id="mobile-nav-sheet-container" class="fixed inset-0 z-50 lg:hidden pointer-events-none invisible">
    <!-- Backdrop with Fade Transition -->
    <div id="mobile-nav-backdrop"
        class="absolute inset-0 bg-black/75 pointer-events-none will-change-opacity"
        style="opacity: 0; transition: opacity 0.3s ease;"></div>

    <!-- Sheet Panel with Slide Transition -->
    <div id="mobile-nav-sheet"
        role="dialog"
        aria-modal="true"
        aria-label="Menu Lengkap PT SHINDO"
        class="absolute bottom-0 inset-x-0 bg-[#00163c] border-t-2 border-t-[#0067b1] p-5 sm:p-6 shadow-2xl max-h-[88vh] overflow-y-auto pointer-events-auto touch-pan-y will-change-transform"
        style="transform: translate3d(0, 120%, 0);">

        <!-- Top Drag Handle -->
        <div class="py-1 cursor-grab active:cursor-grabbing flex justify-center" id="mobile-sheet-drag-area">
            <div class="w-10 h-1 bg-white/25 mx-auto mb-3" id="mobile-sheet-drag-handle"></div>
        </div>

        <!-- Sheet Header -->
        <div class="flex items-center justify-between pb-4 border-b border-white/10">
            <div class="flex items-center space-x-2">
                <img src="{{ $siteSetting->navbar_logo_url }}" alt="PT SHINDO" class="h-7 w-auto object-contain">
            </div>
            <button type="button"
                id="btn-close-mobile-sheet"
                aria-label="Tutup Menu"
                class="ios-spring-tap w-9 h-9 bg-white/10 hover:bg-white/20 border border-white/10 text-white flex items-center justify-center transition-colors focus:outline-none focus:ring-2 focus:ring-white">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Secondary Navigation Links -->
        <div class="py-4 space-y-2">
            <p class="text-[11px] font-bold font-sans uppercase tracking-widest text-blue-300 mb-2.5">Navigasi</p>

            <a href="{{ url('/tentang-kami') }}"
                class="ios-spring-tap flex items-center justify-between px-3.5 py-3 border transition-colors {{ request()->is('tentang-kami*') ? 'bg-[#0067b1] border-[#0067b1] text-white font-semibold' : 'bg-white/[0.03] border-white/10 text-slate-100 hover:bg-white/10 font-medium' }}">
                <span class="text-sm font-sans">Tentang Kami</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ url('/blog') }}"
                class="ios-spring-tap flex items-center justify-between px-3.5 py-3 border transition-colors {{ request()->is('blog*') ? 'bg-[#0067b1] border-[#0067b1] text-white font-semibold' : 'bg-white/[0.03] border-white/10 text-slate-100 hover:bg-white/10 font-medium' }}">
                <span class="text-sm font-sans">Blog &amp; Artikel</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ url('/kontak') }}"
                class="ios-spring-tap flex items-center justify-between px-3.5 py-3 border transition-colors {{ request()->is('kontak*') ? 'bg-[#0067b1] border-[#0067b1] text-white font-semibold' : 'bg-white/[0.03] border-white/10 text-slate-100 hover:bg-white/10 font-medium' }}">
                <span class="text-sm font-sans">Kontak</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <!-- Seri Truk SHACMAN -->
        <div class="py-4 border-t border-white/10">
            <p class="text-[11px] font-bold font-sans uppercase tracking-widest text-blue-300 mb-2.5">Seri Truk SHACMAN</p>
            <div class="grid grid-cols-3 gap-2">
                <a href="{{ route('produk.series', 'x3000') }}"
                    class="ios-spring-tap flex items-center justify-center py-3 px-2 bg-white/[0.04] hover:bg-[#0067b1] border border-white/10 hover:border-[#0067b1] text-center transition-colors">
                    <span class="text-base font-bold font-barlow-condensed tracking-wider text-white">X3000</span>
                </a>
                <a href="{{ route('produk.series', 'f3000') }}"
                    class="ios-spring-tap flex items-center justify-center py-3 px-2 bg-white/[0.04] hover:bg-[#0067b1] border border-white/10 hover:border-[#0067b1] text-center transition-colors">
                    <span class="text-base font-bold font-barlow-condensed tracking-wider text-white">F3000</span>
                </a>
                <a href="{{ route('produk.series', 'h3000') }}"
                    class="ios-spring-tap flex items-center justify-center py-3 px-2 bg-white/[0.04] hover:bg-[#0067b1] border border-white/10 hover:border-[#0067b1] text-center transition-colors">
                    <span class="text-base font-bold font-barlow-condensed tracking-wider text-white">H3000</span>
                </a>
            </div>
        </div>

        <!-- Single Contact CTA -->
        <div class="pt-4 border-t border-white/10">
            <a href="{{ route('kontak') }}"
                class="ios-spring-tap w-full inline-flex items-center justify-center gap-2 py-3.5 px-5 bg-[#0067b1] hover:bg-[#0284c7] text-white text-sm font-barlow-condensed font-bold uppercase tracking-wider shadow-md transition-colors">
                <span>{{ $siteSetting->cta_text ?? 'Hubungi Kami' }}</span>
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
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
                    if (targetItem.getAttribute('data-is-drawer') === 'true') {
                        // User dragged to Menu: reset capsule quietly to activeItem and open sheet
                        setTimeout(() => {
                            placeCapsule(activeItem, false, 1, 1);
                            setHighlightedItem(activeItem);
                            openSheet();
                        }, 140);
                    } else if (targetItem !== activeItem) {
                        placeCapsule(targetItem, true, 1, 1);
                        setHighlightedItem(targetItem);
                        const href = targetItem.getAttribute('data-nav-href');
                        if (href) {
                            setTimeout(() => {
                                window.location.href = href;
                            }, 200);
                        }
                    } else {
                        placeCapsule(activeItem, true, 1, 1);
                        setHighlightedItem(activeItem);
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

                    if (isDrawer) {
                        e.preventDefault();
                        // Tactile tap feedback on Menu button without shifting active page capsule
                        const icon = item.querySelector('.nav-icon');
                        if (icon) {
                            icon.style.transform = 'scale(0.88)';
                            setTimeout(() => { icon.style.transform = 'scale(1)'; }, 140);
                        }
                        openSheet();
                        return;
                    }

                    if (href && item !== activeItem) {
                        e.preventDefault();
                        placeCapsule(item, true, 1.04, 0.95);
                        setHighlightedItem(item);
                        setTimeout(() => {
                            placeCapsule(item, true, 1, 1);
                        }, 180);

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

                // Pastikan kapsul tetap anteng di activeItem (tanpa animasi aneh)
                placeCapsule(activeItem, false, 1, 1);
                setHighlightedItem(activeItem);

                // 1. Navbar turun ke bawah keluar layar
                hideNavbar();

                // 2. Aktifkan container (hapus invisible agar dapat dirender)
                container.classList.remove('pointer-events-none', 'invisible');
                container.classList.add('pointer-events-auto', 'visible');

                backdrop.classList.remove('pointer-events-none');
                backdrop.classList.add('pointer-events-auto');

                // 3. Pastikan sheet mulai dari bawah layar (120% offscreen)
                sheet.style.transition = 'none';
                sheet.style.transform = 'translate3d(0, 120%, 0)';

                // Force browser layout reflow agar posisi awal 120% ter-commit
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

                // Kapsul langsung tenang di tab aktif tanpa horizontal slide (animate = false)
                placeCapsule(activeItem, false, 1, 1);
                setHighlightedItem(activeItem);

                // 1. Animasikan sheet meluncur TURUN ke bawah keluar layar (120%)
                sheet.style.transition = 'transform 0.32s cubic-bezier(0.32, 0.72, 0, 1)';
                sheet.style.transform = 'translate3d(0, 120%, 0)';

                // 2. Fade out backdrop
                backdrop.style.opacity = '0';
                backdrop.classList.remove('pointer-events-auto');
                backdrop.classList.add('pointer-events-none');

                if (openBtn) openBtn.setAttribute('aria-expanded', 'false');
                if (topHeaderMenuBtn) topHeaderMenuBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';

                // 3. Navbar naik kembali dengan fluid spring (kapsul sudah diam rapi di Beranda)
                setTimeout(showNavbar, 100);

                // 4. Nonaktifkan container & sembunyikan total (invisible) setelah animasi turun selesai
                setTimeout(() => {
                    if (!isSheetOpen) {
                        container.classList.remove('pointer-events-auto', 'visible');
                        container.classList.add('pointer-events-none', 'invisible');
                        sheet.style.transition = '';
                    }
                }, 340);
            }

            if (closeBtn) closeBtn.addEventListener('click', closeSheet);
            if (backdrop) backdrop.addEventListener('click', closeSheet);

            if (topHeaderMenuBtn) {
                topHeaderMenuBtn.addEventListener('click', function (e) {
                    if (window.innerWidth < 1024) {
                        e.stopImmediatePropagation();
                        openSheet();
                        topHeaderMenuBtn.setAttribute('aria-expanded', 'true');
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
