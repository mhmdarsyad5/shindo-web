<?php

namespace Database\Seeders;

use App\Models\HomepageSetting;
use Illuminate\Database\Seeder;

class HomepageSettingSeeder extends Seeder
{
    public function run(): void
    {
        $setting = HomepageSetting::first();
        if (! $setting) {
            $setting = new HomepageSetting;
        }

        $setting->site_title = 'SHACMAN Indonesia | Authorized Dealer SHINDO - Tangguh di Segala Medan';
        $setting->meta_description = 'Authorized Dealer Resmi SHACMAN Indonesia - Solusi Truk Heavy Duty Terbaik & Tangguh di Segala Medan.';
        $setting->navbar_logo = 'homepage/shacman-shindo-white.png';
        $setting->nav_items = [
            ['label' => 'Beranda', 'url' => '/', 'is_active' => true],
            ['label' => 'Produk', 'url' => '/produk', 'is_active' => false],
            ['label' => 'Layanan', 'url' => '/layanan', 'is_active' => false],
            ['label' => 'Tentang Kami', 'url' => '/tentang-kami', 'is_active' => false],
            ['label' => 'Blog', 'url' => '/blog', 'is_active' => false],
            ['label' => 'Kontak', 'url' => '/kontak', 'is_active' => false],
        ];
        $setting->cta_text = 'Hubungi Kami';
        $setting->cta_url = '/kontak';

        // Hero
        $setting->hero_background_image = 'homepage/hero-trucks.jpg';
        $setting->hero_logo = 'homepage/shacman-logo.png';
        $setting->hero_tagline = 'TANGGUH DI SEGALA MEDAN';

        // Stats
        $setting->stats = [
            ['value' => '56+ Tahun', 'label' => 'Pengalaman Armada', 'icon' => 'truck'],
            ['value' => '124+ Klien', 'label' => 'Klien Puas & Loyal', 'icon' => 'handshake'],
            ['value' => '25+ Kota', 'label' => 'Wilayah Layanan', 'icon' => 'map-pin'],
            ['value' => '24/7', 'label' => 'Dukungan Purna Jual', 'icon' => 'shield-check'],
        ];

        // Showroom / Seri Truk
        $setting->showroom_badge = 'SERI TRUK UNGGULAN';
        $setting->showroom_title = 'PILIHAN ARMADA TERBAIK UNTUK SEGALA KEBUTUHAN';
        $setting->showroom_subtitle = 'Pilih lini produk heavy-duty kami yang telah terbukti tangguh, efisien, dan siap bekerja optimal di kondisi operasional terberat sekalipun.';
        $setting->truck_series = [
            [
                'key' => 'X3000',
                'name' => 'X3000',
                'title' => 'Truk Heavy Duty Seri X3000',
                'image' => 'homepage/shacman-x3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">X3000</strong> adalah lini <strong class="font-bold text-neutral-950">kendaraan berat (heavy-duty truck) premium</strong> yang dirancang untuk kebutuhan <strong class="font-bold text-neutral-950">transportasi logistik, pertambangan, dan konstruksi skala besar</strong>. Truk ini mengombinasikan kekuatan mesin kelas atas, efisiensi operasional yang ketat, serta kenyamanan berkendara yang optimal untuk medan ekstrem.',
                'detail_url' => '/produk',
            ],
            [
                'key' => 'F3000',
                'name' => 'F3000',
                'title' => 'Truk Heavy Duty Seri F3000',
                'image' => 'homepage/shacman-f3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">F3000</strong> adalah lini <strong class="font-bold text-neutral-950">truk heavy-duty legendaris dan teruji</strong> dengan ketahanan luar biasa di medan off-road, pertambangan, dan industri berat. Dilengkapi struktur chassis kokoh serta performa mesin andal dengan perawatan yang mudah dan efisien.',
                'detail_url' => '/produk',
            ],
            [
                'key' => 'H3000',
                'name' => 'H3000',
                'title' => 'Truk Heavy Duty Seri H3000',
                'image' => 'homepage/shacman-h3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">H3000</strong> dirancang khusus untuk efisiensi tinggi dalam <strong class="font-bold text-neutral-950">angkutan kargo antar-kota, distribusi logistik regional, dan konstruksi perkotaan</strong>. Menghadirkan bobot kendaraan lebih ringan, konsumsi bahan bakar lebih hemat, serta visibilitas kabin terbaik.',
                'detail_url' => '/produk',
            ],
        ];

        // Tentang Kami
        $setting->about_badge = 'TENTANG KAMI';
        $setting->about_title = 'KOMITMEN KAMI UNTUK EFISIENSI & PERFORMA TINGGI';
        $setting->about_description_1 = 'Sebagai agen penyalur resmi SHACMAN di Indonesia, kami berdedikasi menyediakan lini truk kelas dunia yang dirancang khusus untuk menaklukkan medan operasional paling menantang.';
        $setting->about_description_2 = 'Kami tidak hanya menyediakan unit truk berkualitas tinggi, tetapi juga menghadirkan ekosistem layanan purna jual menyeluruh — mulai dari ketersediaan suku cadang asli hingga pemeliharaan berkala oleh teknisi bersertifikasi.';
        $setting->about_image = 'homepage/about-truck.png';
        $setting->about_features = [
            [
                'title' => 'Garansi & Servis ATPM',
                'description' => 'Didukung mekanik bersertifikasi dan peralatan diagnosa terkini langsung dari prinsipal.',
            ],
            [
                'title' => 'Distribusi Suku Cadang Cepat',
                'description' => 'Jaminan pasokan spare part cepat dan orisinal untuk menjaga kelangsungan operasional armada Anda.',
            ],
        ];

        // Produk Unggulan
        $setting->products_badge = 'PRODUK UNGGULAN KAMI';
        $setting->products_title = 'LINI TERBAIK DUMP TRUCK SHACMAN';
        $setting->products_subtitle = 'Dirancang khusus untuk efisiensi ritase maksimal, daya tahan beban ekstrem, serta kenyamanan berkendara di setiap medan operasional.';
        $setting->product_cards = [
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
        ];

        // Keunggulan Operasional
        $setting->advantages_badge = 'KEUNGGULAN OPERASIONAL';
        $setting->advantages_title = 'MENGAPA MEMILIH SHACMAN?';
        $setting->advantages_subtitle = 'Kombinasi teknologi mesin tangguh, konstruksi kokoh, dan dukungan purna jual menyeluruh untuk menunjang profitabilitas armada Anda.';
        $setting->advantages_items = [
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
        ];

        // Layanan
        $setting->services_badge = 'LAYANAN';
        $setting->services_title = 'DUKUNGAN PENUH UNTUK BISNIS ANDA';
        $setting->services_subtitle = 'Dari pembelian awal hingga peremajaan armada, tim ahli kami siap mendampingi setiap tahap operasional Anda.';
        $setting->services_items = [
            ['icon' => 'unit', 'title' => 'Penjualan Unit Baru'],
            ['icon' => 'contract', 'title' => 'Program Kontak Servis'],
            ['icon' => 'guarantee', 'title' => 'Garansi Terjamin'],
            ['icon' => 'parts', 'title' => 'Suku Cadang Asli'],
            ['icon' => 'service', 'title' => 'Servis & Perawatan Rutin'],
            ['icon' => 'support', 'title' => 'Dukungan Layanan 24/7'],
        ];

        // Blog / Artikel
        $setting->blog_badge = 'ARTIKEL';
        $setting->blog_title = 'BLOG TERBARU';
        $setting->blog_subtitle = 'Dapatkan berbagai artikel edukatif seputar tips praktis dan pengetahuan teknis untuk mendukung operasional yang lebih aman, efisien, dan produktif.';
        $setting->blog_items = [
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
        ];

        // CTA Banner
        $setting->cta_banner_title = 'SIAP MEMILIKI DUMP TRUCK SHACMAN ANDA?';
        $setting->cta_banner_subtitle = 'Hubungi tim kami sekarang untuk simulasi ritase muatan, kebutuhan suku cadang, serta dapatkan penawaran harga terbaik untuk Anda.';
        $setting->cta_banner_bg_image = 'homepage/cta-mining-clean.jpg';
        $setting->whatsapp_number = '628123456789';
        $setting->whatsapp_text = 'Hubungi via WhatsApp';
        $setting->brochure_text = 'Dapatkan Brosur Unit';
        $setting->brochure_url = '/kontak';

        // Footer
        $setting->footer_logo = 'homepage/shindo-logo-white.png';
        $setting->footer_description = 'PT Shindo Tracktors Adiperkasa adalah agen penyalur resmi dump truck SHACMAN andal di Indonesia. Berkomitmen tinggi menjaga ritase kerja tambang dan konstruksi nasional Anda tetap optimal tanpa hambatan.';
        $setting->facebook_url = 'https://facebook.com';
        $setting->instagram_url = 'https://instagram.com';
        $setting->linkedin_url = 'https://linkedin.com';
        $setting->youtube_url = 'https://youtube.com';
        $setting->office_address = 'THC 59 Kamal Jakut';
        $setting->office_phone = '(021) 555-8321';
        $setting->office_email = 'sales@shindo.id';
        $setting->office_hours = 'Senin - Jumat, 09:00 - 17:00';
        $setting->mechanic_hours = 'Siaga Darurat 24 Jam';
        $setting->copyright_text = 'Copyright © PT Shindo Tractors Adiperkasa, 2026, All Right Reserved.';

        $setting->save();
    }
}
