<?php

namespace App\Filament\Resources\HomepageSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class HomepageSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Pengaturan Konten Beranda')
                    ->tabs([
                        // TAB 1: HERO BANNER
                        Tab::make('Hero Banner')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Teks & Slogan Utama Hero')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge Atas')
                                            ->placeholder('DISTRIBUTOR RESMI SHACMAN INDONESIA')
                                            ->default('DISTRIBUTOR RESMI SHACMAN INDONESIA'),

                                        TextInput::make('hero_title')
                                            ->label('Judul Utama Hero')
                                            ->placeholder('Kekuatan & Keandalan di Medan Berat')
                                            ->default('Kekuatan & Keandalan di Medan Berat')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Deskripsi / Subjudul Hero')
                                            ->rows(3),
                                    ]),

                                Section::make('Gambar & Logo Hero')
                                    ->schema([
                                        FileUpload::make('hero_background_image')
                                            ->label('Gambar Utama Truk Hero')
                                            ->image()
                                            ->disk('public')
                                            ->directory('homepage')
                                            ->openable()
                                            ->downloadable()
                                            ->columnSpanFull(),

                                        FileUpload::make('hero_logo')
                                            ->label('Logo SHACMAN di Hero')
                                            ->image()
                                            ->disk('public')
                                            ->directory('homepage')
                                            ->openable()
                                            ->downloadable()
                                            ->columnSpanFull(),

                                        TextInput::make('hero_logo_tagline')
                                            ->label('Tagline di Bawah Logo Hero')
                                            ->default('TANGGUH DI SEGALA MEDAN')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: POIN & STATISTIK
                        Tab::make('Poin & Statistik')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Section::make('Poin Statistik Baris Bawah')
                                    ->description('Informasi keunggulan atau statistik armada yang tampil di baris bawah gelap.')
                                    ->schema([
                                        Repeater::make('stats')
                                            ->label('Daftar Poin Statistik')
                                            ->schema([
                                                TextInput::make('value')
                                                    ->label('Nilai / Angka')
                                                    ->placeholder('56+ Tahun')
                                                    ->required(),
                                                TextInput::make('label')
                                                    ->label('Keterangan / Judul')
                                                    ->placeholder('Pengalaman Armada')
                                                    ->required(),
                                                Select::make('icon')
                                                    ->label('Pilihan Ikon')
                                                    ->options([
                                                        'truck' => 'Truk (Truck)',
                                                        'handshake' => 'Kemitraan (Handshake)',
                                                        'map-pin' => 'Lokasi / Jangkauan (Map Pin)',
                                                        'shield-check' => 'Keamanan / Garansi (Shield Check)',
                                                    ])
                                                    ->default('truck')
                                                    ->required(),
                                            ])
                                            ->columns(3)
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Tambah Poin Statistik'),
                                    ]),
                            ]),

                        // TAB 3: SHOWROOM SECTION
                        Tab::make('Showroom (Seri Truk)')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Header Section Showroom')
                                    ->description('Data seri truk (X3000, F3000, H3000) dikelola melalui menu "Katalog & Armada > Seri Truk".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('showroom_badge')
                                                ->label('Label Badge')
                                                ->default('SERI TRUK UNGGULAN'),
                                            TextInput::make('showroom_title')
                                                ->label('Judul Section')
                                                ->default('PILIHAN ARMADA TERBAIK UNTUK SEGALA KEBUTUHAN'),
                                        ]),
                                        Textarea::make('showroom_subtitle')
                                            ->label('Subjudul / Keterangan')
                                            ->rows(2),
                                    ]),
                            ]),

                        // TAB 4: TENTANG KAMI
                        Tab::make('Tentang Kami')
                            ->icon('heroicon-o-user-group')
                            ->schema([
                                Section::make('Teks Pengantar Tentang Kami')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('about_badge')
                                                ->label('Label Badge')
                                                ->default('TENTANG KAMI'),
                                            TextInput::make('about_title')
                                                ->label('Judul Utama')
                                                ->default('KOMITMEN KAMI UNTUK EFISIENSI & PERFORMA TINGGI'),
                                        ]),
                                        Textarea::make('about_description_1')
                                            ->label('Paragraf 1 (Pengantar)')
                                            ->rows(3),
                                        Textarea::make('about_description_2')
                                            ->label('Paragraf 2 (Layanan & Nilai Tambah)')
                                            ->rows(3),
                                    ]),

                                Section::make('Foto Unit Truk & Fitur')
                                    ->schema([
                                        FileUpload::make('about_image')
                                            ->label('Foto Samping Unit Truk')
                                            ->image()
                                            ->disk('public')
                                            ->directory('homepage')
                                            ->openable()
                                            ->downloadable()
                                            ->columnSpanFull(),

                                        Repeater::make('about_features')
                                            ->label('Poin Keunggulan Layanan')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Judul Fitur')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi Fitur')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Tambah Poin'),
                                    ]),
                            ]),

                        // TAB 5: PRODUK UNGGULAN
                        Tab::make('Produk Unggulan')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Section::make('Header Section Produk Unggulan')
                                    ->description('Daftar kartu produk dikelola melalui menu "Katalog & Armada > Produk Truk".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('products_badge')
                                                ->label('Label Badge')
                                                ->default('PRODUK UNGGULAN KAMI'),
                                            TextInput::make('products_title')
                                                ->label('Judul Section')
                                                ->default('LINI TERBAIK DUMP TRUCK SHACMAN'),
                                        ]),
                                        Textarea::make('products_subtitle')
                                            ->label('Subjudul / Keterangan')
                                            ->rows(2),
                                    ]),
                            ]),

                        // TAB 6: KEUNGGULAN OPERASIONAL
                        Tab::make('Keunggulan Operasional')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('Header Keunggulan Operasional')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('advantages_badge')
                                                ->label('Label Badge')
                                                ->default('KEUNGGULAN OPERASIONAL'),
                                            TextInput::make('advantages_title')
                                                ->label('Judul Section')
                                                ->default('MENGAPA MEMILIH SHACMAN?'),
                                        ]),
                                        Textarea::make('advantages_subtitle')
                                            ->label('Subjudul')
                                            ->rows(2),
                                    ]),

                                Section::make('4 Kartu Keunggulan')
                                    ->schema([
                                        Repeater::make('advantages_items')
                                            ->label('Daftar Keunggulan')
                                            ->schema([
                                                Select::make('icon')
                                                    ->label('Pilihan Ikon')
                                                    ->options([
                                                        'flame' => 'Api / Torsi (Flame)',
                                                        'droplet' => 'BBM / Tetesan (Droplet)',
                                                        'shield' => 'Perlindungan / Kabin (Shield)',
                                                        'cog' => 'Gear / Sparepart (Cog)',
                                                    ])
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul Keunggulan')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi Penjelas')
                                                    ->rows(2)
                                                    ->columnSpan(2)
                                                    ->required(),
                                            ])
                                            ->columns(4)
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Tambah Keunggulan'),
                                    ]),
                            ]),

                        // TAB 7: LAYANAN SECTION
                        Tab::make('Layanan')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('Header Section Layanan')
                                    ->description('Daftar 6 layanan purna jual dikelola melalui menu "Konten & Informasi > Layanan Purna Jual".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('services_badge')
                                                ->label('Label Badge')
                                                ->default('LAYANAN'),
                                            TextInput::make('services_title')
                                                ->label('Judul Section')
                                                ->default('DUKUNGAN PENUH UNTUK BISNIS ANDA'),
                                        ]),
                                        Textarea::make('services_subtitle')
                                            ->label('Subjudul')
                                            ->rows(2),
                                    ]),
                            ]),

                        // TAB 8: BLOG SECTION
                        Tab::make('Blog & Artikel')
                            ->icon('heroicon-o-newspaper')
                            ->schema([
                                Section::make('Header Section Blog')
                                    ->description('Daftar artikel blog dikelola melalui menu "Konten & Informasi > Artikel & Blog".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('blog_badge')
                                                ->label('Label Badge')
                                                ->default('ARTIKEL'),
                                            TextInput::make('blog_title')
                                                ->label('Judul Section')
                                                ->default('BLOG TERBARU'),
                                        ]),
                                        Textarea::make('blog_subtitle')
                                            ->label('Subjudul')
                                            ->rows(2),
                                    ]),
                            ]),

                        // TAB 9: CTA BANNER
                        Tab::make('Banner CTA')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Konten Banner CTA Bawah')
                                    ->schema([
                                        TextInput::make('cta_banner_title')
                                            ->label('Judul Utama Banner')
                                            ->default('SIAP MEMILIKI DUMP TRUCK SHACMAN ANDA?')
                                            ->columnSpanFull(),

                                        Textarea::make('cta_banner_subtitle')
                                            ->label('Subjudul Banner')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        FileUpload::make('cta_banner_bg_image')
                                            ->label('Foto Background Banner (Pertambangan / Quarry)')
                                            ->image()
                                            ->disk('public')
                                            ->directory('homepage')
                                            ->openable()
                                            ->downloadable()
                                            ->columnSpanFull(),

                                        Grid::make(2)->schema([
                                            TextInput::make('whatsapp_number')
                                                ->label('Nomor WhatsApp (Contoh: 628123456789)')
                                                ->default('628123456789'),
                                            TextInput::make('whatsapp_text')
                                                ->label('Teks Tombol WhatsApp')
                                                ->default('Hubungi via WhatsApp'),
                                        ]),

                                        Grid::make(2)->schema([
                                            TextInput::make('brochure_text')
                                                ->label('Teks Tombol Brosur')
                                                ->default('Dapatkan Brosur Unit'),
                                            TextInput::make('brochure_url')
                                                ->label('Tautan / URL Brosur')
                                                ->default('/kontak'),
                                        ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
