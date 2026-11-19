<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SparepartsSetting extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'pillars_items' => 'array',
            'warehouse_points' => 'array',
            'mechanic_points' => 'array',
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

    public static function current(): self
    {
        return static::first() ?? new static([
            'hero_badge' => 'SPAREPARTS SUPPORT',
            'hero_title' => 'SUKU CADANG ASLI & TERLENGKAP',
            'hero_subtitle' => 'Jaminan pasokan spare part orisinal langsung dari pabrik utama untuk menjaga keaslian, performa puncak, serta durabilitas armada heavy-duty truk SHACMAN Anda di seluruh Indonesia.',

            'pillars_items' => [
                [
                    'number' => '01',
                    'title' => '100% Suku Cadang Asli & Bergaransi ATPM',
                    'desc' => 'Setiap komponen diproduksi sesuai spesifikasi pabrikan resmi SHACMAN, Weichai Power, FAST Gearbox, dan Hande Axle dengan garansi kualitas terjamin.',
                ],
                [
                    'number' => '02',
                    'title' => 'Jaringan Gudang & Ready Stock Siap Kirim',
                    'desc' => 'Dukungan central warehouse di Jakarta serta depo suku cadang strategis di sentra pertambangan dan perkebunan untuk pengiriman cepat ke site Anda.',
                ],
                [
                    'number' => '03',
                    'title' => 'Konsultasi Nomor Part & Layanan Mekanik 24/7',
                    'desc' => 'Tim spesialis spare parts siap membantu pencarian kode part number akurat dan mekanik siaga mendampingi instalasi di workshop atau lokasi kerja.',
                ],
            ],

            'warehouse_badge' => 'LOGISTIK & DISTRIBUSI CEPAT',
            'warehouse_title' => 'DISTRIBUSI CEPAT KE SELURUH INDONESIA',
            'warehouse_subtitle' => 'Sistem pergudangan terintegrasi dan konsinyasi on-site demi memangkas durasi breakdown unit di site kerja Anda.',
            'warehouse_description' => 'PT SHINDO memahami bahwa setiap jam downtime pada truk operasional adalah potensi kerugian bisnis. Oleh karena itu, kami membangun infrastruktur pergudangan terpusat dengan manajemen inventaris berbasis real-time serta skema konsinyasi on-site parts di lokasi proyek pertambangan Anda.',
            'warehouse_image' => 'spareparts/service-banner-parts.jpg',
            'warehouse_points' => [
                [
                    'title' => 'Fast Dispatch Logistics',
                    'desc' => 'Prioritas pengiriman suku cadang fast-moving dalam waktu kurang dari 24 jam untuk area konsesi utama.',
                ],
                [
                    'title' => 'On-Site Consignment Stock',
                    'desc' => 'Penyediaan stok komponen kritis langsung di gudang site klien tanpa modal awal pembelian di muka.',
                ],
                [
                    'title' => 'Garansi & Nomor Part Resmi',
                    'desc' => 'Seluruh komponen tercatat nomor seri pabrikan resmi untuk memastikan kompatibilitas 100% tanpa modifikasi.',
                ],
            ],

            'mechanic_badge' => 'DUKUNGAN TEKNIS',
            'mechanic_title' => 'Layanan Pemasangan & Mekanik Siaga',
            'mechanic_subtitle' => 'Tidak hanya menyediakan komponen, tim mekanik tersertifikasi PT SHINDO siap membantu instalasi dan overhaul unit di lapangan.',
            'mechanic_points' => [
                'Solusi Cepat, Andal & Profesional',
                'Dukungan Mekanik Terbaik',
                'Siaga 24/7',
            ],

            'cta_title' => 'BUTUH NOMOR PART ATAU KONSULTASI SUKU CADANG?',
            'cta_subtitle' => 'Hubungi tim inventory spareparts PT SHINDO sekarang untuk cek ketersediaan stok, harga resmi, atau skema konsinyasi site proyek.',
            'whatsapp_number' => '628111009567',
            'whatsapp_button_text' => 'Konsultasi Spareparts via WhatsApp',
            'whatsapp_message' => 'Halo Tim Spareparts PT SHINDO, saya membutuhkan informasi ketersediaan suku cadang resmi SHACMAN untuk kebutuhan armada kami.',
        ]);
    }
}
