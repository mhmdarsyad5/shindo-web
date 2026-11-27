<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'site_name' => 'SHINDO - Official SHACMAN Distributor',
        'cta_text' => 'Hubungi Kami',
        'cta_url' => '/kontak',
        'nav_items' => '[{"url":"\/","label":"Beranda"},{"url":"\/produk","label":"Produk"},{"url":"\/layanan","label":"Layanan"},{"url":"\/spareparts","label":"Spareparts"},{"url":"\/tentang-kami","label":"Tentang Kami"},{"url":"\/blog","label":"Blog"},{"url":"\/kontak","label":"Kontak"}]',
        'products_page_title' => 'KATALOG ARMADA TRUK SHACMAN',
        'products_page_subtitle' => 'Pilihan dump truck dan tractor head bertenaga tinggi untuk sektor pertambangan nikel, batu bara, quarry, serta logistik angkutan berat di seluruh Indonesia.',
        'blog_page_title' => 'BLOG & ARTIKEL TERBARU',
        'blog_page_subtitle' => 'Informasi terkini mengenai inovasi armada SHACMAN, tips perawatan mesin Weichai, panduan keselamatan hauling tambang, dan perkembangan industri alat berat.',
        'blog_cta_badge' => 'SHINDO AFTERSALES & SALES',
        'blog_cta_title' => 'Butuh Konsultasi Armada Truk SHACMAN?',
        'blog_cta_subtitle' => 'Diskusikan kebutuhan unit dump truck, tronton, atau suku cadang resmi untuk operasional proyek Anda.',
        'blog_cta_button_text' => 'Hubungi Kami',
    ];

    protected $casts = [
        'nav_items' => 'array',
    ];

    public static function current(): self
    {
        return static::firstOrCreate([], [
            'site_name' => 'SHINDO - Official SHACMAN Distributor',
            'navbar_logo' => 'homepage/shacman-shindo-white.png',
            'footer_logo' => 'homepage/shindo-logo-white.png',
            'office_email' => 'sales@shindo.id',
            'office_phone' => '0821-2888-9556',
        ]);
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
            if (file_exists(public_path($path))) {
                return asset($path);
            }
            $filename = basename($path);
            if (file_exists(public_path('images/'.$filename))) {
                return asset('images/'.$filename);
            }
        }

        return $defaultAsset ? asset($defaultAsset) : '';
    }

    public function getNavbarLogoUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->navbar_logo, 'images/shacman-shindo-white.png');
    }

    public function getFooterLogoUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->footer_logo, 'images/shindo-logo-white.png');
    }

    public function getWhatsappAttribute(): string
    {
        $raw = (string) ($this->office_phone ?: '0821-2888-9556');
        $clean = preg_replace('/[^0-9]/', '', $raw);

        if (str_starts_with($clean, '0')) {
            $clean = '62'.substr($clean, 1);
        } elseif (! str_starts_with($clean, '62')) {
            $clean = '62'.$clean;
        }

        if (strlen($clean) < 8) {
            return '6282128889556';
        }

        return $clean;
    }

    public function getWhatsappUrlAttribute(): string
    {
        return 'https://wa.me/'.$this->whatsapp;
    }
}
