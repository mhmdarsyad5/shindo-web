<!-- ================= TOP INFORMATION BAR ================= -->
<div class="w-full bg-[#06152d] text-white border-b border-white/10 select-none">
    <div class="w-full pl-4 sm:pl-6 lg:pl-8 pr-0 flex items-center justify-between min-h-[40px]">
        
        <!-- Left: Follow Social Media -->
        <div class="flex items-center gap-3 sm:gap-4 py-2">
            <span class="text-slate-300 font-semibold text-xs sm:text-[13px] flex-shrink-0">
                Ikuti Kami:
            </span>
            <div class="flex items-center gap-3.5 sm:gap-4 text-slate-200">
                <!-- Facebook -->
                <a href="{{ $site->facebook_url ?? 'https://facebook.com' }}" 
                   target="_blank" rel="noopener noreferrer" 
                   aria-label="Facebook"
                   class="hover:text-amber-400 transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com/@shindo.shacman" 
                   target="_blank" rel="noopener noreferrer" 
                   aria-label="TikTok"
                   class="hover:text-amber-400 transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 00-.88-.06A6.34 6.34 0 003 15.68a6.34 6.34 0 0010.82 4.47V10.81a8.16 8.16 0 005.77 2.14v-3.45a4.85 4.85 0 01-3.77-2.81z"/>
                    </svg>
                </a>

                <!-- LinkedIn -->
                <a href="{{ $site->linkedin_url ?? 'https://linkedin.com' }}" 
                   target="_blank" rel="noopener noreferrer" 
                   aria-label="LinkedIn"
                   class="hover:text-amber-400 transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.2a1.62 1.62 0 1 0 0 3.24 1.62 1.62 0 0 0 0-3.24z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="{{ $site->instagram_url ?? 'https://instagram.com' }}" 
                   target="_blank" rel="noopener noreferrer" 
                   aria-label="Instagram"
                   class="hover:text-amber-400 transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Right: Angled Blue Contact Info Container -->
        <div class="relative bg-[#0067b1] text-white self-stretch flex items-center pl-7 sm:pl-9 pr-4 sm:pr-6 lg:pr-8 py-2 gap-4 sm:gap-6 text-xs sm:text-[13px] [clip-path:polygon(18px_0,100%_0,100%_100%,0%_100%)] shadow-xs">
            
            <!-- Email -->
            <a href="mailto:{{ $site->office_email ?? 'sales@shindo.id' }}" 
               class="hidden md:inline-flex items-center gap-2 hover:text-amber-300 transition-colors font-medium">
                <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>{{ $site->office_email ?? 'sales@shindo.id' }}</span>
            </a>

            <!-- Divider (Desktop) -->
            <span class="hidden md:inline-block w-px h-4 bg-white/25"></span>

            <!-- Hubungi Kami / Telephone -->
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site->office_phone ?? '(021) 22574351') }}" 
               class="inline-flex items-center gap-2 hover:text-amber-300 transition-colors font-semibold">
                <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>
                    <span class="hidden sm:inline font-medium">Hubungi Kami: </span>{{ $site->office_phone ?? '(021) 22574351' }}
                </span>
            </a>

        </div>

    </div>
</div>
