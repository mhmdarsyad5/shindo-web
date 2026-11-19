<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceSetting extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'advantages_items' => 'array',
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
            'hero_badge' => 'LAYANAN AFTERSALES',
            'hero_title' => 'DUKUNGAN PENUH UNTUK BISNIS ANDA',
            'hero_subtitle' => 'Memastikan performa dan ketersediaan armada dump truck SHACMAN di site tambang tetap optimal dengan dukungan mekanik tersertifikasi ATPM dan pasokan suku cadang asli.',

            'advantages_badge' => 'KEUNGGULAN OPERASIONAL',
            'advantages_title' => 'MENGAPA MEMILIH SHACMAN?',
            'advantages_subtitle' => 'Kombinasi teknologi mesin tangguh, konstruksi kokoh, dan dukungan purna jual menyeluruh untuk menunjang profitabilitas armada Anda.',
            'advantages_items' => [
                [
                    'title' => 'Torsi Mesin Weichai Lebih Tangguh',
                    'description' => 'Tenaga maksimal di putaran rendah, dirancang khusus untuk tanjakan terjal dan muatan tambang ekstrem.',
                    'icon' => 'cpu',
                ],
                [
                    'title' => 'Efisiensi Bahan Bakar Optimal',
                    'description' => 'Sistem injeksi common rail generasi terbaru membantu memangkas biaya operasional solar secara signifikan.',
                    'icon' => 'fuel',
                ],
                [
                    'title' => 'Kabin Nyaman & Standar Aman',
                    'description' => 'Ruang kemudi ergonomis dengan suspensi kabin empuk dan visibilitas luas untuk keselamatan pengemudi.',
                    'icon' => 'truck',
                ],
                [
                    'title' => 'Suku Cadang Asli Terjamin',
                    'description' => 'Ketersediaan komponen mesin Weichai, transmisi FAST, dan gardan Hande terjamin di seluruh jaringan dealer.',
                    'icon' => 'cog',
                ],
            ],

            'banner_image' => 'services/pro_detail08_1.jpg',
        ]);
    }
}
