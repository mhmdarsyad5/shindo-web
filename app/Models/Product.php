<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'gallery_images' => 'array',
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order_column' => 'integer',
    ];

    public function truckSeries(): BelongsTo
    {
        return $this->belongsTo(TruckSeries::class, 'truck_series_id');
    }

    public function resolveImageUrl(?string $path, string $defaultAsset = ''): string
    {
        if ($path) {
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }
            if (file_exists(public_path($path))) {
                return asset($path);
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

    public function getImageUrlAttribute(): string
    {
        return $this->resolveImageUrl($this->image, 'images/shacman-x3000.png');
    }

    /**
     * Resolve all gallery image URLs for the product detail page.
     *
     * @return array<int, string>
     */
    public function getGalleryUrlsAttribute(): array
    {
        $urls = [$this->image_url];

        foreach ($this->gallery_images ?? [] as $path) {
            if (is_string($path) && $path !== '') {
                $resolved = $this->resolveImageUrl($path);
                if ($resolved !== '' && ! in_array($resolved, $urls, true)) {
                    $urls[] = $resolved;
                }
            }
        }

        return $urls;
    }
}
