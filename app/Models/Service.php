<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'order_column' => 'integer',
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
            if (file_exists(public_path($path))) {
                return asset($path);
            }
        }

        return $defaultAsset ? asset($defaultAsset) : '';
    }
}
