<?php

namespace App\Filament\Resources\AboutSettings\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class AboutSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Pengaturan Halaman Tentang Kami')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Banner')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Header & Deskripsi')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge Atas')
                                            ->placeholder('TENTANG KAMI'),

                                        TextInput::make('hero_title')
                                            ->label('Judul Utama Hero')
                                            ->required(),

                                        TextInput::make('hero_subtitle')
                                            ->label('Subjudul / Slogan Hero')
                                            ->required(),

                                        Textarea::make('hero_description')
                                            ->label('Paragraf Pengantar Hero')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'hero_image',
                                            label: 'Gambar Banner Hero (Latar Belakang)',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/about-shacman-fleet-bg.png',
                                        ),
                                    ]),
                            ]),

                        // TAB 2: PROFIL DEALER
                        Tab::make('Profil Distributor')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Informasi Authorized Dealer')
                                    ->schema([
                                        TextInput::make('profile_title')
                                            ->label('Judul Section Profil')
                                            ->required(),

                                        Textarea::make('profile_description')
                                            ->label('Deskripsi Dealer')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'profile_image',
                                            label: 'Foto Truk Profil (Showcase)',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/about-truck.png',
                                        ),

                                        TextInput::make('profile_cta_text')
                                            ->label('Teks Tombol Katalog')
                                            ->default('Lihat Katalog Truck'),

                                        TextInput::make('profile_cta_url')
                                            ->label('Link Tombol Katalog')
                                            ->default('/produk'),
                                    ]),
                            ]),

                        // TAB 3: VISI & MISI
                        Tab::make('Visi & Misi')
                            ->icon('heroicon-o-flag')
                            ->schema([
                                Section::make('Visi Perusahaan')
                                    ->schema([
                                        TextInput::make('vision_badge')
                                            ->label('Badge Visi')
                                            ->default('VISI'),

                                        TextInput::make('vision_title')
                                            ->label('Judul Visi')
                                            ->required(),

                                        Textarea::make('vision_text')
                                            ->label('Uraian Visi Perusahaan')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Misi Perusahaan')
                                    ->schema([
                                        TextInput::make('mission_badge')
                                            ->label('Badge Misi')
                                            ->default('MISI'),

                                        TextInput::make('mission_title')
                                            ->label('Judul Misi')
                                            ->required(),

                                        Repeater::make('mission_items')
                                            ->label('Daftar Poin Misi')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Nomor Urut')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul Misi')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 4: LAYANAN SHASS
                        Tab::make('Layanan SHASS')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('Header Section SHASS')
                                    ->schema([
                                        TextInput::make('shass_badge')
                                            ->label('Badge')
                                            ->default('LAYANAN AFTERSALES'),

                                        TextInput::make('shass_title')
                                            ->label('Judul SHASS')
                                            ->required(),

                                        Textarea::make('shass_subtitle')
                                            ->label('Deskripsi Ringkas')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        Repeater::make('shass_items')
                                            ->label('4 Kartu Keunggulan Layanan SHASS')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Nomor (Contoh: 01)')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi')
                                                    ->rows(2)
                                                    ->required(),
                                                FileUpload::make('image')
                                                    ->label('Gambar Kartu')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('about'),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 5: CABANG & KOMITMEN
                        Tab::make('Cabang & Komitmen')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Section::make('Peta Jaringan Cabang')
                                    ->schema([
                                        TextInput::make('branches_badge')
                                            ->label('Badge Cabang')
                                            ->default('ALAMAT & LOKASI'),

                                        TextInput::make('branches_title')
                                            ->label('Judul Jaringan Cabang')
                                            ->required(),

                                        Textarea::make('branches_subtitle')
                                            ->label('Deskripsi Cabang')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'branches_map_image',
                                            label: 'Gambar Peta Cabang Dealer',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/about-branch-map.jpg',
                                        ),
                                    ]),

                                Section::make('Komitmen Jangka Panjang')
                                    ->schema([
                                        TextInput::make('commitment_title')
                                            ->label('Judul Komitmen')
                                            ->required(),

                                        Textarea::make('commitment_subtitle')
                                            ->label('Deskripsi Komitmen')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'commitment_image',
                                            label: 'Foto Banner Komitmen',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/cta-mining-bg.jpg',
                                        ),

                                        Repeater::make('commitment_items')
                                            ->label('Poin Komitmen Kemitraan')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Nomor (Contoh: 01)')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
