<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'nav_items' => 'array',
    ];

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
