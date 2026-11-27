<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'order_column' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (BlogCategory $category): void {
            if (empty($category->slug)) {
                $base = Str::slug($category->name ?: 'category');
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$base}-{$i}";
                    $i++;
                }
                $category->slug = $slug;
            }
        });
    }
}
