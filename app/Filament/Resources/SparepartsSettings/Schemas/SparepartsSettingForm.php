<?php

namespace App\Filament\Resources\SparepartsSettings\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SparepartsSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Pengaturan Halaman Spareparts')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Banner')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Header Halaman Spareparts')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge Atas')
                                            ->placeholder('SUKU CADANG RESMI SHACMAN')
                                            ->default('SUKU CADANG RESMI SHACMAN'),

                                        TextInput::make('hero_title')
                                            ->label('Judul Utama Hero')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Deskripsi Subjudul')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: PILAR JAMINAN
                        Tab::make('Pilar Jaminan')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('3 Kartu Pilar Jaminan Suku Cadang')
                                    ->schema([
                                        Repeater::make('pillars_items')
                                            ->label('Kartu Jaminan')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Nomor (Contoh: 01)')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul Jaminan')
                                                    ->required(),
                                                Textarea::make('desc')
                                                    ->label('Deskripsi')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: GUDANG & PENGIRIMAN
                        Tab::make('Gudang & Logistik')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Distribusi Cepat ke Seluruh Indonesia')
                                    ->schema([
                                        TextInput::make('warehouse_badge')
                                            ->label('Badge')
                                            ->default('LOGISTIK & DISTRIBUSI CEPAT'),

                                        TextInput::make('warehouse_title')
                                            ->label('Judul Section')
                                            ->required(),

                                        Textarea::make('warehouse_subtitle')
                                            ->label('Subjudul')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Textarea::make('warehouse_description')
                                            ->label('Paragraf Penjelasan')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'warehouse_image',
                                            label: 'Foto Fasilitas Gudang / Spareparts',
                                            directory: 'spareparts',
                                            defaultFallbackAsset: 'images/service-banner-parts.jpg',
                                        ),

                                        Repeater::make('warehouse_points')
                                            ->label('Poin Keunggulan Distribusi')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Poin Judul')
                                                    ->required(),
                                                Textarea::make('desc')
                                                    ->label('Deskripsi Poin')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 4: MEKANIK & DUKUNGAN
                        Tab::make('Dukungan Mekanik')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('Layanan Pemasangan & Mekanik Siaga')
                                    ->schema([
                                        TextInput::make('mechanic_badge')
                                            ->label('Badge')
                                            ->default('DUKUNGAN TEKNIS'),

                                        TextInput::make('mechanic_title')
                                            ->label('Judul Section Mekanik')
                                            ->required(),

                                        Textarea::make('mechanic_subtitle')
                                            ->label('Subjudul')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Repeater::make('mechanic_points')
                                            ->label('Pilar Dukungan Mekanik')
                                            ->simple(
                                                TextInput::make('point')->required()
                                            )
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 5: CTA WHATSAPP
                        Tab::make('Tombol & Kontak WA')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Section::make('Banner Konsultasi Spareparts')
                                    ->schema([
                                        TextInput::make('cta_title')
                                            ->label('Judul Banner CTA')
                                            ->required(),

                                        Textarea::make('cta_subtitle')
                                            ->label('Subjudul Banner CTA')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        TextInput::make('whatsapp_number')
                                            ->label('Nomor WhatsApp Spareparts (contoh: 628111009567)')
                                            ->required(),

                                        TextInput::make('whatsapp_button_text')
                                            ->label('Teks Tombol WhatsApp')
                                            ->default('Konsultasi Spareparts via WhatsApp')
                                            ->required(),

                                        Textarea::make('whatsapp_message')
                                            ->label('Pesan Awal Otomatis WhatsApp')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
