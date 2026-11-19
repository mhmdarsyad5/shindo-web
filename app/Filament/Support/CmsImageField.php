<?php

namespace App\Filament\Support;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Grid;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class CmsImageField
{
    /**
     * Create a composite image field with live active preview + file upload.
     */
    public static function make(
        string $name,
        string $label,
        string $directory = 'uploads',
        ?string $defaultFallbackAsset = null,
        ?string $helperText = 'Format: JPG, PNG, atau WebP. Maksimal 5MB.',
        bool $required = false,
        string|int|array $columnSpan = 'full'
    ): Grid {
        return Grid::make(['default' => 1, 'md' => 12])
            ->schema([
                Placeholder::make($name.'_current_preview')
                    ->label('Gambar Saat Ini: '.strip_tags($label))
                    ->content(function ($record) use ($name, $defaultFallbackAsset) {
                        $raw = $record?->{$name};
                        $url = null;
                        $isFallback = false;

                        if ($raw) {
                            if (str_starts_with($raw, 'http://') || str_starts_with($raw, 'https://')) {
                                $url = $raw;
                            } elseif (Storage::disk('public')->exists($raw)) {
                                $url = Storage::disk('public')->url($raw);
                            } elseif (file_exists(public_path($raw))) {
                                $url = asset($raw);
                            } elseif (file_exists(public_path('images/'.basename($raw)))) {
                                $url = asset('images/'.basename($raw));
                            }
                        }

                        if (! $url && $defaultFallbackAsset) {
                            $isFallback = true;
                            if (str_starts_with($defaultFallbackAsset, 'http://') || str_starts_with($defaultFallbackAsset, 'https://')) {
                                $url = $defaultFallbackAsset;
                            } elseif (Storage::disk('public')->exists($defaultFallbackAsset)) {
                                $url = Storage::disk('public')->url($defaultFallbackAsset);
                            } elseif (file_exists(public_path($defaultFallbackAsset))) {
                                $url = asset($defaultFallbackAsset);
                            } else {
                                $url = asset($defaultFallbackAsset);
                            }
                        }

                        if (! $url) {
                            return new HtmlString('
                                <div class="flex flex-col items-center justify-center p-4 text-center rounded-xl border border-dashed border-neutral-300 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-900/50 text-neutral-400 text-xs">
                                    <svg class="w-8 h-8 mb-1 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>Belum ada gambar aktif</span>
                                </div>
                            ');
                        }

                        $filename = basename($url);
                        $badgeText = $isFallback ? 'Bawaan Sistem' : 'Aktif di Web';
                        $badgeColor = $isFallback ? 'bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300' : 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/50 dark:text-emerald-300';

                        return new HtmlString("
                            <div class='flex flex-col gap-2 p-3 bg-neutral-50 dark:bg-neutral-900/80 rounded-xl border border-neutral-200 dark:border-neutral-800 shadow-sm'>
                                <div class='flex items-center justify-between gap-2 pb-1 border-b border-neutral-200/80 dark:border-neutral-800/80 text-[11px]'>
                                    <span class='inline-flex items-center gap-1.5 font-medium'>
                                        <span class='w-2 h-2 rounded-full ".($isFallback ? 'bg-amber-500' : 'bg-emerald-500')." animate-pulse'></span>
                                        <span class='text-neutral-700 dark:text-neutral-300 font-semibold'>Status:</span>
                                    </span>
                                    <span class='px-2 py-0.5 text-[10px] font-semibold rounded-full {$badgeColor}'>{$badgeText}</span>
                                </div>
                                <div class='relative overflow-hidden rounded-lg bg-neutral-900/5 dark:bg-white/5 flex items-center justify-center p-2 min-h-[110px] max-h-44 border border-neutral-200/50 dark:border-neutral-800/50 group'>
                                    <img src='{$url}' alt='{$filename}' class='max-h-40 max-w-full rounded object-contain drop-shadow-sm transition-transform duration-300 group-hover:scale-105' />
                                </div>
                                <div class='flex items-center justify-between gap-2 pt-1 border-t border-neutral-200 dark:border-neutral-800 text-[11px]'>
                                    <span class='font-mono text-neutral-500 dark:text-neutral-400 truncate max-w-[160px]' title='{$url}'>{$filename}</span>
                                    <a href='{$url}' target='_blank' rel='noopener noreferrer' class='inline-flex items-center gap-1 font-semibold text-primary-600 hover:text-primary-500 hover:underline'>
                                        Buka Full ↗
                                    </a>
                                </div>
                            </div>
                        ");
                    })
                    ->columnSpan(['default' => 1, 'md' => 4]),

                FileUpload::make($name)
                    ->label('Upload / Ganti '.strip_tags($label))
                    ->image()
                    ->disk('public')
                    ->directory($directory)
                    ->openable()
                    ->downloadable()
                    ->helperText($helperText)
                    ->required($required)
                    ->columnSpan(['default' => 1, 'md' => 8]),
            ])
            ->columnSpan($columnSpan);
    }
}
