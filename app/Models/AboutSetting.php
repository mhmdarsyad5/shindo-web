<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutSetting extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'mission_items' => 'array',
            'shass_items' => 'array',
            'commitment_items' => 'array',
        ];
    }

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

    public static function defaultAttributes(): array
    {
        return [
            'hero_badge' => 'TENTANG KAMI',
            'hero_title' => 'PT SHINDO TRACTORS ADIPERKASA',
            'hero_subtitle' => 'Mitra Terpercaya Solusi Transportasi Alat Berat',
            'hero_description' => 'Selamat datang di PT Shindo Tractors Adiperkasa, mitra terpercaya Anda dalam solusi transportasi alat berat di Indonesia. Dengan pengalaman lebih dari lima dekade di industri ini, kami telah memantapkan diri sebagai dealer resmi terkemuka untuk truk SHACMAN. Komitmen kami adalah menyediakan kendaraan berkualitas tinggi yang dirancang untuk kinerja maksimal dan keandalan di setiap medan.',
            'hero_image' => 'about/about-shacman-fleet-bg.png',

            'profile_title' => "AUTHORIZED DEALER \n SHACMAN Dump Truck",
            'profile_description' => 'Kami bangga menjadi distributor utama SHACMAN Dump Truck, yang dikenal luas sebagai pemimpin pasar di Indonesia. Truk-truk kami dirancang untuk menghadapi tantangan terberat, memastikan produktivitas dan efisiensi operasional bisnis Anda.',
            'profile_image' => 'about/about-truck.png',
            'profile_cta_text' => 'Lihat Katalog Truck',
            'profile_cta_url' => '/produk',

            'vision_badge' => 'VISI',
            'vision_title' => 'Menjadi Dealer Truk SHACMAN Terkemuka di Indonesia',
            'vision_text' => 'Menjadi dealer truk SHACMAN terkemuka di Indonesia yang menawarkan truk berkualitas tinggi dan layanan purna jual yang baik kepada pelanggan, serta meningkatkan kepuasan pelanggan dan pangsa pasar di industri truk.',

            'mission_badge' => 'MISI',
            'mission_title' => 'Tiga Komitmen Operasional Utama Kami',
            'mission_items' => [
                [
                    'number' => '1',
                    'title' => 'Meningkatkan Kualitas Layanan',
                    'description' => 'Menjamin kualitas layanan yang tinggi kepada pelanggan melalui pelatihan dan pengembangan sumber daya manusia.',
                ],
                [
                    'number' => '2',
                    'title' => 'Meningkatkan Penjualan',
                    'description' => 'Meningkatkan penjualan truk Shacman & Spare parts melalui strategi pemasaran yang efektif dan jaringan pemasaran yang luas.',
                ],
                [
                    'number' => '3',
                    'title' => 'Meningkatkan Kepuasan Pelanggan',
                    'description' => 'Meningkatkan kepuasan pelanggan melalui layanan purna jual yang baik dan responsif terhadap kebutuhan pelanggan.',
                ],
            ],

            'shass_badge' => 'LAYANAN AFTERSALES',
            'shass_title' => 'Layanan Purna Jual SHASS',
            'shass_subtitle' => 'Dedikasi kami tidak berhenti pada penjualan unit semata. Melalui SHASS (SHINDO After-Sales Service), kami menghadirkan sistem layanan purna jual komprehensif demi memastikan operasional armada Anda selalu berjalan optimal dan lancar tanpa hambatan di setiap lokasi kerja.',
            'shass_items' => [
                [
                    'number' => '01',
                    'title' => 'Lebih dari 124 Mekanik Profesional',
                    'description' => 'Teknisi tersertifikasi ATPM yang terlatih menangani overhaul mesin Weichai, transmisi FAST, serta sistem hidrolik langsung di lokasi site.',
                    'image' => 'images/service-banner-mechanic.jpg',
                ],
                [
                    'number' => '02',
                    'title' => 'Didukung 5 Cabang Eksklusif',
                    'description' => 'Fasilitas workshop representatif dan kantor operasional yang tersebar strategis di sentra logistik dan pertambangan di seluruh Indonesia.',
                    'image' => 'images/service-banner-facility.jpg',
                ],
                [
                    'number' => '03',
                    'title' => 'Layanan Pelanggan Siaga 24/7',
                    'description' => 'Customer support dan unit servis darurat yang siap merespons kebutuhan Anda setiap saat agar produktivitas operasional tidak terhenti.',
                    'image' => 'images/service-banner-support.jpg',
                ],
                [
                    'number' => '04',
                    'title' => 'Ketersediaan Suku Cadang di Lokasi',
                    'description' => 'Depo suku cadang konsinyasi orisinal yang disiapkan langsung di area proyek Anda untuk memangkas waktu tunggu komponen armada.',
                    'image' => 'images/service-banner-parts.jpg',
                ],
            ],

            'branches_badge' => 'ALAMAT & LOKASI',
            'branches_title' => 'Jaringan Cabang & Workshop PT Shindo Tractors Adiperkasa',
            'branches_subtitle' => 'Didukung 5 cabang representatif di sentra industri dan pertambangan Indonesia untuk menjamin respon cepat aftersales service dan ketersediaan spare parts.',
            'branches_map_image' => 'about/about-branch-map.jpg',

            'commitment_title' => 'Komitmen Kemitraan Jangka Panjang',
            'commitment_subtitle' => 'Di PT Shindo Tractors Adiperkasa, kami percaya pada pembangunan kemitraan jangka panjang dengan pelanggan. Dengan tim yang terampil dan berpengalaman, kami bertekad untuk memberikan layanan penjualan dan purna jual terbaik. Komitmen ini menjamin kepuasan Anda dan kinerja optimal dari setiap investasi SHACMAN Anda.',
            'commitment_image' => 'about/cta-mining-bg.jpg',
            'commitment_items' => [
                [
                    'number' => '01',
                    'title' => 'Tim Terampil & Berpengalaman',
                    'description' => 'Konsultan armada dan staf operasional kami siap memandu pemilihan rasio gardan, kapasitas kubikasi dump body, hingga kalkulasi efisiensi ritase.',
                ],
                [
                    'number' => '02',
                    'title' => 'Jaminan Kepuasan & Kinerja Optimal',
                    'description' => 'Perlindungan menyeluruh dari garansi resmi pabrikan, ketersediaan komponen orisinal, serta supervisi berkala di lapangan kerja Anda.',
                ],
                [
                    'number' => '03',
                    'title' => 'Proteksi Nilai Investasi Bisnis',
                    'description' => 'Memastikan setiap investasi kendaraan komersial SHACMAN Anda menghasilkan tingkat produktivitas tinggi dengan biaya pemeliharaan terukur.',
                ],
            ],
        ];
    }

    public static function current(): self
    {
        $setting = static::first();
        $defaults = static::defaultAttributes();

        if (! $setting) {
            return static::create($defaults);
        }

        $needsSave = false;
        foreach ($defaults as $key => $value) {
            if (empty($setting->{$key})) {
                $setting->{$key} = $value;
                $needsSave = true;
            }
        }

        if ($needsSave) {
            $setting->save();
        }

        return $setting;
    }
}
