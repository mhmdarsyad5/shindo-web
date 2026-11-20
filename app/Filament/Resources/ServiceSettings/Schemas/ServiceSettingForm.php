<?php

namespace App\Filament\Resources\ServiceSettings\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ServiceSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Pengaturan Halaman Layanan')
                    ->tabs([
                        // TAB 1: HERO HEADER
                        Tab::make('Hero Header')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Teks Header Halaman Layanan & Beranda')
                                    ->description('Teks ini otomatis digunakan sebagai headline section Layanan di Beranda dan Halaman Layanan. Pengelolaan 6 kartu layanan purna jual dilakukan melalui menu "Konten & Informasi > Layanan Purna Jual".')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge Atas')
                                            ->placeholder('LAYANAN AFTERSALES')
                                            ->default('LAYANAN AFTERSALES'),

                                        TextInput::make('hero_title')
                                            ->label('Judul Utama Hero')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Deskripsi Subjudul')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: KEUNGGULAN OPERASIONAL
                        Tab::make('Keunggulan Operasional')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('Header Section Biru')
                                    ->schema([
                                        TextInput::make('advantages_badge')
                                            ->label('Badge Section')
                                            ->default('KEUNGGULAN OPERASIONAL'),

                                        TextInput::make('advantages_title')
                                            ->label('Judul Section')
                                            ->required(),

                                        Textarea::make('advantages_subtitle')
                                            ->label('Subjudul Section')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Repeater::make('advantages_items')
                                            ->label('4 Kartu Keunggulan')
                                            ->schema([
                                                Select::make('icon')
                                                    ->label('Pilihan Icon')
                                                    ->options([
                                                        'cpu' => 'Mesin / CPU / Torsi',
                                                        'fuel' => 'BBM / Efisiensi Solar',
                                                        'truck' => 'Truk / Kabin / Keamanan',
                                                        'cog' => 'Gear / Suku Cadang',
                                                    ])
                                                    ->default('cpu')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul Keunggulan')
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

                        // TAB 3: BANNER BAWAH
                        Tab::make('Banner Bawah')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make('Armada Showcase Banner')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'banner_image',
                                            label: 'Gambar Banner Armada Lebar',
                                            directory: 'services',
                                            defaultFallbackAsset: 'images/series/pro_detail08_1.jpg',
                                        ),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
