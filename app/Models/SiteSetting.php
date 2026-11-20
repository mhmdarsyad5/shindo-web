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
            'office_phone' => '(021) 22574351',
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
}
