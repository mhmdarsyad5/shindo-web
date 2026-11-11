<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TruckSeries;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ModularContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. SITE SETTING (Global Navbar & Footer)
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'SHINDO - Official SHACMAN Distributor',
                'navbar_logo' => 'homepage/shacman-shindo-white.png',
                'cta_text' => 'Hubungi Kami',
                'cta_url' => '/kontak',
                'nav_items' => [
                    ['label' => 'Beranda', 'url' => '/'],
                    ['label' => 'Produk', 'url' => '/produk'],
                    ['label' => 'Layanan', 'url' => '/layanan'],
                    ['label' => 'Spareparts', 'url' => '/spareparts'],
                    ['label' => 'Tentang Kami', 'url' => '/tentang-kami'],
                    ['label' => 'Blog', 'url' => '/blog'],
                    ['label' => 'Kontak', 'url' => '/kontak'],
                ],
                'footer_logo' => 'homepage/shindo-logo-white.png',
                'footer_description' => 'PT Shindo Tractors Adiperkasa adalah Authorized Distributor resmi heavy-duty truck SHACMAN di Indonesia. Menyediakan unit dump truck tambang, prime mover logistik, custom karoseri, dan aftersales service terpadu di seluruh konsesi industri nasional.',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'linkedin_url' => 'https://linkedin.com',
                'youtube_url' => 'https://youtube.com',
                'office_address' => 'Town House Cordoba No. 59, RT.6/RW.2, Kamal Muara, Penjaringan, Jakarta Utara, DKI Jakarta 14470',
                'office_phone' => '(021) 555-8321',
                'office_email' => 'sales@shindo.id',
                'office_hours' => 'Senin - Jumat, 09:00 - 17:00',
                'mechanic_hours' => 'Siaga Darurat 24 Jam',
                'copyright_text' => 'Copyright © PT Shindo Tractors Adiperkasa, '.date('Y').', All Right Reserved.',
            ]
        );

        // 2. TRUCK SERIES (Seri Truk Showroom)
        $seriesX3000 = TruckSeries::updateOrCreate(
            ['key' => 'X3000'],
            [
                'name' => 'X3000',
                'badge' => 'FLAGSHIP HEAVY-DUTY',
                'title' => 'Truk Heavy Duty Seri X3000',
                'image' => 'homepage/shacman-x3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">X3000</strong> adalah lini <strong class="font-bold text-neutral-950">kendaraan berat (heavy-duty truck) premium</strong> yang dirancang untuk kebutuhan <strong class="font-bold text-neutral-950">transportasi logistik, pertambangan, dan konstruksi skala besar</strong>. Truk ini mengombinasikan kekuatan mesin kelas atas, efisiensi operasional yang ketat, serta kenyamanan berkendara yang optimal untuk medan ekstrem.',
                'detail_url' => '/produk',
                'order_column' => 1,
                'is_active' => true,
            ]
        );

        $seriesF3000 = TruckSeries::updateOrCreate(
            ['key' => 'F3000'],
            [
                'name' => 'F3000',
                'badge' => 'LEGENDARIS & TERUJI',
                'title' => 'Truk Heavy Duty Seri F3000',
                'image' => 'homepage/shacman-f3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">F3000</strong> adalah lini <strong class="font-bold text-neutral-950">truk heavy-duty legendaris dan teruji</strong> dengan ketahanan luar biasa di medan off-road, pertambangan, dan industri berat. Dilengkapi struktur chassis kokoh serta performa mesin andal dengan perawatan yang mudah dan efisien.',
                'detail_url' => '/produk',
                'order_column' => 2,
                'is_active' => true,
            ]
        );

        $seriesH3000 = TruckSeries::updateOrCreate(
            ['key' => 'H3000'],
            [
                'name' => 'H3000',
                'badge' => 'EFISIENSI TINGGI',
                'title' => 'Truk Heavy Duty Seri H3000',
                'image' => 'homepage/shacman-h3000.png',
                'description' => 'Truk Shacman seri <strong class="font-bold text-neutral-950">H3000</strong> dirancang khusus untuk efisiensi tinggi dalam <strong class="font-bold text-neutral-950">angkutan kargo antar-kota, distribusi logistik regional, dan konstruksi perkotaan</strong>. Menghadirkan bobot kendaraan lebih ringan, konsumsi bahan bakar lebih hemat, serta visibilitas kabin terbaik.',
                'detail_url' => '/produk',
                'order_column' => 3,
                'is_active' => true,
            ]
        );

        // 3. PRODUCTS (Katalog Produk Truk)
        Product::updateOrCreate(
            ['slug' => 'shacman-x3000-dump-truck'],
            [
                'truck_series_id' => $seriesX3000->id,
                'name' => 'SHACMAN X3000',
                'type' => 'Dump Truck 6x4 & 8x4',
                'badge' => 'Flagship Heavy-Duty',
                'drive' => '6x4 / 8x4 Heavy Axle',
                'engine' => 'Weichai WP12 / Cummins ISM',
                'capacity' => '30 - 45 Ton',
                'image' => 'homepage/shacman-x3000.png',
                'description' => 'Truk heavy-duty premium dengan kabin suspensi udara, mesin torsi tinggi bertenaga besar, serta efisiensi konsumsi BBM terbaik untuk rute tambang dan jalan raya.',
                'detail_url' => '/produk',
                'whatsapp_message' => 'Halo, saya tertarik dengan unit SHACMAN X3000 Dump Truck.',
                'is_featured' => true,
                'is_active' => true,
                'order_column' => 1,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'shacman-h3000-dump-truck'],
            [
                'truck_series_id' => $seriesH3000->id,
                'name' => 'SHACMAN H3000',
                'type' => 'Dump Truck 6x4 & Cargo',
                'badge' => 'Efisiensi Tinggi',
                'drive' => '6x4 Hande Axle',
                'engine' => 'Weichai WP10 / WP12',
                'capacity' => '25 - 35 Ton',
                'image' => 'homepage/shacman-h3000.png',
                'description' => 'Dirancang dengan bobot sasis lebih ringan, radius putar lincah, serta konsumsi bahan bakar yang sangat hemat untuk operasional material dan logistik regional.',
                'detail_url' => '/produk',
                'whatsapp_message' => 'Halo, saya tertarik dengan unit SHACMAN H3000 Dump Truck.',
                'is_featured' => true,
                'is_active' => true,
                'order_column' => 2,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'shacman-f3000-dump-truck'],
            [
                'truck_series_id' => $seriesF3000->id,
                'name' => 'SHACMAN F3000',
                'type' => 'Dump Truck Mining Extreme',
                'badge' => 'Legendaris & Teruji',
                'drive' => '6x4 / 8x4 Double Reduction',
                'engine' => 'Weichai WP12 High Output',
                'capacity' => '35 - 50 Ton',
                'image' => 'homepage/shacman-f3000.png',
                'description' => 'Sasis baja berlapis ganda terkuat di kelasnya, gardan reduksi ganda handal, dan ketahanan mekanikal legendaris di medan tambang terbuka tanpa kompromi.',
                'detail_url' => '/produk',
                'whatsapp_message' => 'Halo, saya tertarik dengan unit SHACMAN F3000 Dump Truck.',
                'is_featured' => true,
                'is_active' => true,
                'order_column' => 3,
            ]
        );

        // 4. SERVICES (Layanan Purna Jual)
        $services = [
            ['title' => 'Penjualan Unit Baru', 'icon' => 'unit', 'order' => 1],
            ['title' => 'Program Kontak Servis', 'icon' => 'contract', 'order' => 2],
            ['title' => 'Garansi Terjamin', 'icon' => 'guarantee', 'order' => 3],
            ['title' => 'Suku Cadang Asli', 'icon' => 'parts', 'order' => 4],
            ['title' => 'Servis & Perawatan Rutin', 'icon' => 'service', 'order' => 5],
            ['title' => 'Dukungan Layanan 24/7', 'icon' => 'support', 'order' => 6],
        ];

        foreach ($services as $svc) {
            Service::updateOrCreate(
                ['slug' => Str::slug($svc['title'])],
                [
                    'title' => $svc['title'],
                    'icon' => $svc['icon'],
                    'order_column' => $svc['order'],
                    'is_active' => true,
                ]
            );
        }

        // 5. POSTS (Blog & Artikel)
        Post::updateOrCreate(
            ['slug' => 'penjualan-unit-baru-shacman'],
            [
                'title' => 'Penjualan Unit Baru',
                'excerpt' => 'Menyediakan seluruh varian Shacman truck dalam kondisi prima lengkap dengan jaminan garansi ATPM terjamin dan resmi di Indonesia.',
                'image' => 'homepage/blog-dump-truck.jpg',
                'url' => '/blog',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'servis-dan-perawatan-rutin'],
            [
                'title' => 'Servis & Perawatan Rutin',
                'excerpt' => 'Penanganan pemeliharaan terjadwal dan tim mekanik tersedia 24/7 bersertifikasi resmi untuk menjaga ritase operasional.',
                'image' => 'homepage/blog-service-routine.jpg',
                'url' => '/blog',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'ketersediaan-suku-cadang-asli'],
            [
                'title' => 'Suku Cadang Asli',
                'excerpt' => 'Stok lengkap suku cadang orisinal Shacman, FAST Transmission, dan Weichai Engine untuk memangkas downtime masa perbaikan alat.',
                'image' => 'homepage/blog-spare-parts.jpg',
                'url' => '/blog',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now(),
            ]
        );
    }
}
