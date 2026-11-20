<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(['default' => 1, 'lg' => 3])
                    ->schema([
                        // Left / Main Content Column
                        Group::make([
                            Section::make('Konten Artikel')
                                ->schema([
                                    TextInput::make('title')
                                        ->label('Judul Halaman')
                                        ->placeholder('Masukkan judul artikel...')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                            if (empty($get('slug'))) {
                                                $set('slug', Str::slug((string) $state));
                                            }
                                        }),

                                    RichEditor::make('content')
                                        ->label('Konten Halaman')
                                        ->columnSpanFull(),

                                    Textarea::make('excerpt')
                                        ->label('Ringkasan / Excerpt')
                                        ->rows(3)
                                        ->placeholder('Deskripsi ringkas artikel...')
                                        ->helperText('Maksimal 200 karakter. Jika dikosongkan, deskripsi diambil otomatis dari konten.')
                                        ->columnSpanFull(),
                                ]),
                        ])->columnSpan(['default' => 1, 'lg' => 2]),

                        // Right Sidebar Column
                        Group::make([
                            Section::make('Detail Post')
                                ->schema([
                                    TextInput::make('slug')
                                        ->label('Slug / URL')
                                        ->required()
                                        ->unique('posts', 'slug', ignoreRecord: true)
                                        ->placeholder('judul-artikel-anda'),

                                    Select::make('is_published')
                                        ->label('Status')
                                        ->options([
                                            1 => 'Published',
                                            0 => 'Draft',
                                        ])
                                        ->default(1)
                                        ->required(),

                                    DateTimePicker::make('published_at')
                                        ->label('Tanggal Publikasi')
                                        ->default(now())
                                        ->helperText('Waktu rilis publikasi artikel.'),

                                    TextInput::make('category')
                                        ->label('Kategori')
                                        ->placeholder('Contoh: Berita, Heavy Duty, Servis'),

                                    TagsInput::make('tags')
                                        ->label('Tags / Label')
                                        ->placeholder('Ketik tag lalu tekan Enter'),

                                    Toggle::make('is_featured')
                                        ->label('Tampil di Beranda (Featured)')
                                        ->default(true),
                                ]),

                            Section::make('Gambar Post')
                                ->schema([
                                    CmsImageField::make(
                                        name: 'image',
                                        label: 'Thumbnail / Cover Image',
                                        directory: 'posts',
                                        defaultFallbackAsset: 'homepage/blog-dump-truck.jpg',
                                        helperText: 'Thumbnail rekomen: 1200x675 px. Format: JPG, PNG, atau WebP.',
                                    ),
                                ]),

                            Section::make('SEO Content')
                                ->schema([
                                    TextInput::make('seo_title')
                                        ->label('SEO Title')
                                        ->placeholder('Judul khusus SEO Google...')
                                        ->helperText('Jika kosong, otomatis menggunakan judul halaman.'),

                                    Textarea::make('seo_description')
                                        ->label('Meta Description')
                                        ->rows(3)
                                        ->placeholder('Deskripsi ringkas pencarian Google...')
                                        ->helperText('Deskripsi singkat untuk snippet hasil pencarian Google.'),

                                    TextInput::make('seo_keywords')
                                        ->label('Meta Keywords')
                                        ->placeholder('shacman, dump truck, spareparts, hauling')
                                        ->helperText('Pisahkan kata kunci dengan tanda koma (,).'),
                                ]),
                        ])->columnSpan(['default' => 1, 'lg' => 1]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
