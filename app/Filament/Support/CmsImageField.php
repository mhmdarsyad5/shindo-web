<?php

namespace App\Filament\Support;

use Filament\Forms\Components\FileUpload;

class CmsImageField
{
    /**
     * Create a unified Filament FileUpload field for CMS images.
     */
    public static function make(
        string $name,
        string $label,
        string $directory = 'uploads',
        ?string $defaultFallbackAsset = null,
        ?string $helperText = 'Format: JPG, PNG, atau WebP. Maksimal 5MB.',
        bool $required = false,
        string|int|array $columnSpan = 'full'
    ): FileUpload {
        return FileUpload::make($name)
            ->label($label)
            ->image()
            ->disk('public')
            ->directory($directory)
            ->openable()
            ->downloadable()
            ->previewable()
            ->helperText($helperText)
            ->required($required)
            ->columnSpan($columnSpan);
    }
}
