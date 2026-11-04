<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomepageSetting extends Model
{
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'nav_items' => 'array',
            'stats' => 'array',
            'truck_series' => 'array',
            'about_features' => 'array',
            'product_cards' => 'array',
            'advantages_items' => 'array',
            'services_items' => 'array',
            'blog_items' => 'array',
        ];
    }

    /**
     * Resolve image URL from storage or fallback to public/images asset.
     */
    public function resolveImageUrl(?string $path, string $defaultAsset = ''): string
    {
        if ($path) {
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            if (Storage::disk('public')->exists($path)) {
                return Storage::disk('public')->url($path);
            }
            $filename = basename($path);
            if (file_exists(public_path('images/'.$filename))) {
                return asset('images/'.$filename);
            }
        }

        return $defaultAsset ? asset($defaultAsset) : '';
    }

    /**
     * Get the display URL for the navbar logo.
     */
    public function getNavbarLogoUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->navbar_logo, 'images/shacman-shindo-white.png');
    }

    /**
     * Get the display URL for the hero logo.
     */
    public function getHeroLogoUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->hero_logo, 'images/shacman-logo.png');
    }

    /**
     * Get the display URL for the hero background image.
     */
    public function getHeroBackgroundImageUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->hero_background_image, 'images/hero-trucks.jpg');
    }

    /**
     * Get the display URL for the about section truck image.
     */
    public function getAboutImageUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->about_image, 'images/about-truck.png');
    }

    /**
     * Get the display URL for the CTA banner background image.
     */
    public function getCtaBannerBgImageUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->cta_banner_bg_image, 'images/cta-mining-clean.jpg');
    }

    /**
     * Get the display URL for the footer logo.
     */
    public function getFooterLogoUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->footer_logo, 'images/shindo-logo-white.png');
    }

    /**
     * Get the current settings instance with defaults.
     */
    public static function current(): self
    {
        return static::firstOrCreate([], [
            'site_title' => 'SHACMAN Indonesia | Authorized Dealer SHINDO - Tangguh di Segala Medan',
            'meta_description' => 'Authorized Dealer Resmi SHACMAN Indonesia - Solusi Truk Heavy Duty Terbaik & Tangguh di Segala Medan.',
            'navbar_logo' => 'homepage/shacman-shindo-white.png',
            'nav_items' => [
                ['label' => 'Beranda', 'url' => '/', 'is_active' => true],
                ['label' => 'Produk', 'url' => '/produk', 'is_active' => false],
                ['label' => 'Layanan', 'url' => '/layanan', 'is_active' => false],
                ['label' => 'Tentang Kami', 'url' => '/tentang-kami', 'is_active' => false],
                ['label' => 'Blog', 'url' => '/blog', 'is_active' => false],
                ['label' => 'Kontak', 'url' => '/kontak', 'is_active' => false],
            ],
            'cta_text' => 'Hubungi Kami',
            'cta_url' => '/kontak',
            'hero_background_image' => 'homepage/hero-trucks.jpg',
            'hero_logo' => 'homepage/shacman-logo.png',
            'hero_tagline' => 'TANGGUH DI SEGALA MEDAN',
            'stats' => [
                ['value' => '56+ Tahun', 'label' => 'Pengalaman Armada', 'icon' => 'truck'],
                ['value' => '124+ Klien', 'label' => 'Klien Puas & Loyal', 'icon' => 'handshake'],
                ['value' => '25+ Kota', 'label' => 'Wilayah Layanan', 'icon' => 'map-pin'],
                ['value' => '24/7', 'label' => 'Dukungan Purna Jual', 'icon' => 'shield-check'],
            ],
            // Showroom / Seri Truk
            'showroom_badge' => 'SERI TRUK UNGGULAN',
            'showroom_title' => 'PILIHAN ARMADA TERBAIK UNTUK SEGALA KEBUTUHAN',
            'showroom_subtitle' => 'Pilih lini produk heavy-duty kami yang telah terbukti tangguh, efisien, dan siap bekerja optimal di kondisi operasional terberat sekalipun.',
            'truck_series' => [
                [
                    'key' => 'X3000',
                    'name' => 'X3000',
                    'title' => 'Truk Heavy Duty Seri X3000',
                    'image' => 'homepage/shacman-x3000.png',
                    'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">X3000</strong> adalah lini <strong class="font-bold text-neutral-950">kendaraan berat (heavy-duty truck) premium</strong> yang dirancang untuk kebutuhan <strong class="font-bold text-neutral-950">transportasi logistik, pertambangan, dan konstruksi skala besar</strong>. Truk ini mengombinasikan kekuatan mesin kelas atas, efisiensi operasional yang ketat, serta kenyamanan berkendara yang optimal untuk medan ekstrem.',
                    'detail_url' => '#produk-x3000',
                ],
                [
                    'key' => 'F3000',
                    'name' => 'F3000',
                    'title' => 'Truk Heavy Duty Seri F3000',
                    'image' => 'homepage/shacman-f3000.png',
                    'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">F3000</strong> adalah lini <strong class="font-bold text-neutral-950">truk heavy-duty legendaris dan teruji</strong> dengan ketahanan luar biasa di medan off-road, pertambangan, dan industri berat. Dilengkapi struktur chassis kokoh serta performa mesin andal dengan perawatan yang mudah dan efisien.',
                    'detail_url' => '#produk-f3000',
                ],
                [
                    'key' => 'H3000',
                    'name' => 'H3000',
                    'title' => 'Truk Heavy Duty Seri H3000',
                    'image' => 'homepage/shacman-h3000.png',
                    'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">H3000</strong> dirancang khusus untuk efisiensi tinggi dalam <strong class="font-bold text-neutral-950">angkutan kargo antar-kota, distribusi logistik regional, dan konstruksi perkotaan</strong>. Menghadirkan bobot kendaraan lebih ringan, konsumsi bahan bakar lebih hemat, serta visibilitas kabin terbaik.',
                    'detail_url' => '#produk-h3000',
                ],
            ],
            // Tentang Kami
            'about_badge' => 'TENTANG KAMI',
            'about_title' => 'SHACMAN – TRUK HEAVY-DUTY PILIHAN UTAMA INDONESIA',
            'about_description_1' => 'Sebagai authorized dealer resmi, kami berkomitmen menjaga produktivitas operasional Anda dengan Advance features yang mendukung kinerja tinggi dan stabil. Kami melayani pengadaan unit baru, penyediaan suku cadang asli bergaransi, hingga perawatan berkala oleh teknisi bersertifikat langsung di site Anda.',
            'about_description_2' => 'Kami tidak hanya menyediakan unit truk berkualitas tinggi, tetapi juga menghadirkan ekosistem layanan purna jual menyeluruh — mulai dari ketersediaan suku cadang asli hingga pemeliharaan berkala oleh teknisi bersertifikasi.',
            'about_image' => 'homepage/about-truck.png',
            'about_features' => [
                [
                    'title' => 'Mitra Penjualan Resmi Bersertifikasi SHACMAN Global',
                ],
                [
                    'title' => 'Layanan Purna Jual SHASS (Shacman After Sales Service) 24 Jam',
                ],
                [
                    'title' => 'Jaminan Ketersediaan Suku Cadang Orisinal',
                ],
            ],
            // Produk Unggulan
            'products_badge' => 'PRODUK UNGGULAN KAMI',
            'products_title' => 'PILIHAN ARMADA SHACMAN',
            'products_subtitle' => 'Solusi armada dan alat angkut berat tangguh untuk setiap kebutuhan bisnis Anda.',
            'product_cards' => [
                [
                    'name' => 'SHACMAN X3000',
                    'type' => 'Dump Truck 6x4 & 8x4',
                    'badge' => 'Flagship Heavy-Duty',
                    'image' => 'homepage/shacman-x3000.png',
                    'capacity' => '30 - 45 Ton',
                    'engine' => 'Weichai WP12 / Cummins ISM',
                    'drive' => '6x4 / 8x4 Heavy Axle',
                    'description' => 'Truk heavy-duty premium dengan kabin suspensi udara, mesin torsi tinggi bertenaga besar, serta efisiensi konsumsi BBM terbaik untuk rute tambang dan jalan raya.',
                    'detail_url' => '/produk',
                ],
                [
                    'name' => 'SHACMAN H3000',
                    'type' => 'Dump Truck 6x4 & Cargo',
                    'badge' => 'Efisiensi Tinggi',
                    'image' => 'homepage/shacman-h3000.png',
                    'capacity' => '25 - 35 Ton',
                    'engine' => 'Weichai WP10 / WP12',
                    'drive' => '6x4 Hande Axle',
                    'description' => 'Dirancang dengan bobot sasis lebih ringan, radius putar lincah, serta konsumsi bahan bakar yang sangat hemat untuk operasional material dan logistik regional.',
                    'detail_url' => '/produk',
                ],
                [
                    'name' => 'SHACMAN F3000',
                    'type' => 'Dump Truck Mining Extreme',
                    'badge' => 'Legendaris & Teruji',
                    'image' => 'homepage/shacman-f3000.png',
                    'capacity' => '35 - 50 Ton',
                    'engine' => 'Weichai WP12 High Output',
                    'drive' => '6x4 / 8x4 Double Reduction',
                    'description' => 'Sasis baja berlapis ganda terkuat di kelasnya, gardan reduksi ganda handal, dan ketahanan mekanikal legendaris di medan tambang terbuka tanpa kompromi.',
                    'detail_url' => '/produk',
                ],
            ],
            // Keunggulan Operasional
            'advantages_badge' => 'KEUNGGULAN OPERASIONAL',
            'advantages_title' => 'MENGAPA MEMILIH SHACMAN?',
            'advantages_subtitle' => 'Kombinasi teknologi mesin tangguh, konstruksi kokoh, dan dukungan purna jual menyeluruh untuk menunjang profitabilitas armada Anda.',
            'advantages_items' => [
                [
                    'icon' => 'flame',
                    'title' => 'Mesin Torsi Tinggi',
                    'description' => 'Didukung mesin Weichai & Cummins bertenaga besar dengan daya tanjak optimal di medan berat.',
                ],
                [
                    'icon' => 'droplet',
                    'title' => 'Efisiensi Konsumsi BBM',
                    'description' => 'Sistem powertrain yang disesuaikan menghasilkan konsumsi solar lebih hemat pada setiap ritase muatan.',
                ],
                [
                    'icon' => 'shield',
                    'title' => 'Kabin Ergonomis & Aman',
                    'description' => 'Dilengkapi suspensi kabin empuk, AC maksimal, serta visibilitas luas demi keselamatan operator.',
                ],
                [
                    'icon' => 'cog',
                    'title' => 'Ketersediaan Suku Cadang',
                    'description' => 'Dukungan penuh stok sparepart orisinal langsung dari pabrik utama untuk durasi perawatan minimum.',
                ],
            ],
            // Layanan
            'services_badge' => 'LAYANAN',
            'services_title' => 'DUKUNGAN PENUH UNTUK BISNIS ANDA',
            'services_subtitle' => 'Dari pembelian awal hingga peremajaan armada, tim ahli kami siap mendampingi setiap tahap operasional Anda.',
            'services_items' => [
                ['icon' => 'unit', 'title' => 'Penjualan Unit Baru'],
                ['icon' => 'contract', 'title' => 'Program Kontak Servis'],
                ['icon' => 'guarantee', 'title' => 'Garansi Terjamin'],
                ['icon' => 'parts', 'title' => 'Suku Cadang Asli'],
                ['icon' => 'service', 'title' => 'Servis & Perawatan Rutin'],
                ['icon' => 'support', 'title' => 'Dukungan Layanan 24/7'],
            ],
            // Blog / Artikel
            'blog_badge' => 'ARTIKEL',
            'blog_title' => 'BLOG TERBARU',
            'blog_subtitle' => 'Dapatkan berbagai artikel edukatif seputar tips praktis dan pengetahuan teknis untuk mendukung operasional yang lebih aman, efisien, dan produktif.',
            'blog_items' => [
                [
                    'image' => 'homepage/blog-dump-truck.jpg',
                    'title' => 'Penjualan Unit Baru',
                    'description' => 'Menyediakan seluruh varian Shacman truck dalam kondisi prima lengkap dengan jaminan garansi ATPM terjamin dan resmi di Indonesia.',
                    'url' => '/blog',
                ],
                [
                    'image' => 'homepage/blog-service-routine.jpg',
                    'title' => 'Servis & Perawatan Rutin',
                    'description' => 'Penanganan pemeliharaan terjadwal dan tim mekanik tersedia 24/7 bersertifikasi resmi.',
                    'url' => '/blog',
                ],
                [
                    'image' => 'homepage/blog-spare-parts.jpg',
                    'title' => 'Suku Cadang Asli',
                    'description' => 'Stok lengkap suku cadang orisinal Shacman, FAST Transmission, dan Weichai Engine untuk memangkas downtime masa perbaikan alat.',
                    'url' => '/blog',
                ],
            ],
            // CTA Banner
            'cta_banner_title' => 'SIAP MEMILIKI ARMADA TRUK SHACMAN ANDA?',
            'cta_banner_subtitle' => 'Hubungi tim kami sekarang untuk konsultasi konfigurasi unit, kebutuhan suku cadang, serta penawaran harga resmi.',
            'cta_banner_bg_image' => 'homepage/cta-mining-clean.jpg',
            'whatsapp_number' => '628123456789',
            'whatsapp_text' => 'Hubungi via WhatsApp',
            'brochure_text' => 'Dapatkan Brosur Unit',
            'brochure_url' => '/kontak',
            // Footer
            'footer_logo' => 'homepage/shindo-logo-white.png',
            'footer_description' => 'PT Shindo Tracktors Adiperkasa adalah agen penyalur resmi dump truck SHACMAN andal di Indonesia. Berkomitmen tinggi menjaga ritase kerja tambang dan konstruksi nasional Anda tetap optimal tanpa hambatan.',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'linkedin_url' => 'https://linkedin.com',
            'youtube_url' => 'https://youtube.com',
            'office_address' => 'Town House Cordoba No. 59, RT.6/RW.2, Kamal Muara, Penjaringan, Jakarta Utara, DKI Jakarta 14470',
            'office_phone' => '(021) 555-8321',
            'office_email' => 'sales@shindo.id',
            'office_hours' => 'Senin - Jumat, 09:00 - 17:00',
            'mechanic_hours' => 'Siaga Darurat 24 Jam',
            'copyright_text' => 'Copyright © PT Shindo Tractors Adiperkasa, 2026, All Right Reserved.',
        ]);
    }
}
