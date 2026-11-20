<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class IconAsset extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the full URL to the icon asset.
     */
    public function getUrlAttribute(): string
    {
        if (! $this->file_path) {
            return '';
        }

        if (str_starts_with($this->file_path, 'http://') || str_starts_with($this->file_path, 'https://')) {
            return $this->file_path;
        }

        if (Storage::disk('public')->exists($this->file_path)) {
            return Storage::disk('public')->url($this->file_path);
        }

        if (file_exists(public_path($this->file_path))) {
            return asset($this->file_path);
        }

        return Storage::disk('public')->url($this->file_path);
    }

    /**
     * Resolve icon HTML (either uploaded asset <img> or SVG preset).
     */
    public static function renderIcon(?string $icon, string $class = 'w-5 h-5'): string
    {
        if (empty($icon)) {
            return '';
        }

        // If it refers to an IconAsset via key or asset:key
        $cleanKey = str_starts_with($icon, 'asset:') ? substr($icon, 6) : $icon;
        $asset = static::where('key', $cleanKey)->first();

        if ($asset && $asset->url) {
            $safeTitle = e($asset->title);
            $safeUrl = e($asset->url);

            return '<img src="'.$safeUrl.'" alt="'.$safeTitle.'" class="'.e($class).' object-contain inline-block">';
        }

        // If it's a direct file path stored
        if (str_contains($icon, '/') && (str_ends_with($icon, '.svg') || str_ends_with($icon, '.png') || str_ends_with($icon, '.webp'))) {
            $url = Storage::disk('public')->url($icon);

            return '<img src="'.e($url).'" alt="Icon" class="'.e($class).' object-contain inline-block">';
        }

        return '';
    }

    /**
     * Get options array for Filament Select fields.
     */
    public static function getSelectOptions(array $presets = []): array
    {
        $options = [];

        $customIcons = static::orderBy('title')->get();
        if ($customIcons->isNotEmpty()) {
            $customGroup = [];
            foreach ($customIcons as $item) {
                $customGroup['asset:'.$item->key] = $item->title;
            }
            $options['Custom Icons (Icons & Assets)'] = $customGroup;
        }

        if (! empty($presets)) {
            $options['System Presets'] = $presets;
        }

        return $options;
    }
}
