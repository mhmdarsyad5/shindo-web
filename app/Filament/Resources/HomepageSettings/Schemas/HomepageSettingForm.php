<?php

namespace App\Filament\Resources\HomepageSettings\Schemas;

use App\Filament\Support\CmsImageField;
use App\Models\Service;
use App\Models\ServiceSetting;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

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
                                        CmsImageField::make(
                                            name: 'hero_background_image',
                                            label: 'Gambar Utama Truk Hero',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/hero-trucks.jpg',
                                        ),

                                        CmsImageField::make(
                                            name: 'hero_logo',
                                            label: 'Logo SHACMAN di Hero',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/shacman-logo.png',
                                        ),

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
                                        CmsImageField::make(
                                            name: 'about_image',
                                            label: 'Foto Samping Unit Truk',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/about-truck.png',
                                        ),

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

                        // TAB 7: LAYANAN SECTION (Single Source of Truth)
                        Tab::make('Layanan Purna Jual')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('Sinkronisasi Terpusat Layanan')
                                    ->description('Section Layanan di Beranda otomatis tersinkronisasi 100% dengan master data di Pengaturan Layanan.')
                                    ->schema([
                                        Placeholder::make('services_sync_info')
                                            ->label('')
                                            ->content(function () {
                                                $serviceSetting = ServiceSetting::current();
                                                $servicesCount = Service::where('is_active', true)->count();
                                                $editSettingUrl = route('filament.admin.resources.service-settings.edit', ['record' => $serviceSetting->id]);
                                                $servicesListUrl = route('filament.admin.resources.services.index');

                                                return new HtmlString("
                                                    <div class='p-5 bg-sky-50 dark:bg-sky-950/40 border border-sky-200 dark:border-sky-800 rounded-xl space-y-4'>
                                                        <div class='flex items-start gap-3.5'>
                                                            <div class='p-2.5 bg-[#0067b1] text-white rounded-lg shadow-xs shrink-0'>
                                                                <svg class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'/></svg>
                                                            </div>
                                                            <div class='space-y-1'>
                                                                <h4 class='text-sm font-bold text-sky-950 dark:text-sky-100 flex items-center gap-2'>
                                                                    <span>Sistem Single Source of Truth Aktif</span>
                                                                    <span class='px-2 py-0.5 text-[10px] bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-300 font-semibold rounded-full'>Tersinkron Otomatis</span>
                                                                </h4>
                                                                <p class='text-xs text-sky-800 dark:text-sky-200 leading-relaxed'>
                                                                    Header, deskripsi, serta <strong>{$servicesCount} kartu layanan aktif</strong> di Beranda dan Halaman Layanan terhubung ke satu master data yang sama. Perubahan yang Anda simpan di menu Layanan langsung aktif di Beranda tanpa perlu diedit berulang kali.
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class='p-3.5 bg-white dark:bg-neutral-900 rounded-lg border border-sky-200/80 dark:border-sky-800/80 text-xs space-y-1.5'>
                                                            <div class='text-neutral-500 dark:text-neutral-400 font-medium'>Teks Header Layanan Saat Ini:</div>
                                                            <div class='font-bold text-neutral-900 dark:text-white text-sm'>{$serviceSetting->hero_title}</div>
                                                            <div class='text-neutral-600 dark:text-neutral-300 line-clamp-2'>{$serviceSetting->hero_subtitle}</div>
                                                        </div>

                                                        <div class='pt-2 flex flex-wrap items-center gap-2.5'>
                                                            <a href='{$editSettingUrl}' class='inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#0067b1] hover:bg-[#00528e] text-white text-xs font-semibold rounded-lg shadow-xs transition-colors'>
                                                                ✏️ Edit Header & Teks Layanan ↗
                                                            </a>
                                                            <a href='{$servicesListUrl}' class='inline-flex items-center gap-1.5 px-3.5 py-2 bg-white dark:bg-neutral-800 hover:bg-neutral-50 text-neutral-800 dark:text-neutral-200 border border-neutral-300 dark:border-neutral-700 text-xs font-semibold rounded-lg shadow-xs transition-colors'>
                                                                📋 Kelola {$servicesCount} Kartu Layanan Purna Jual ↗
                                                            </a>
                                                        </div>
                                                    </div>
                                                ");
                                            }),
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

                                        CmsImageField::make(
                                            name: 'cta_banner_bg_image',
                                            label: 'Foto Background Banner (Pertambangan / Quarry)',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/cta-mining-clean.jpg',
                                        ),

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
