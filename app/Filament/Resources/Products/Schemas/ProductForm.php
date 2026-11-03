<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produk Truk')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('name')
                                ->label('Nama Produk')
                                ->placeholder('SHACMAN X3000')
                                ->required(),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('shacman-x3000-dump-truck')
                                ->required(),
                            Select::make('truck_series_id')
                                ->label('Seri Truk')
                                ->relationship('truckSeries', 'name')
                                ->searchable()
                                ->preload()
                                ->nullable(),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('type')
                                ->label('Tipe / Varian')
                                ->placeholder('Dump Truck 6x4 & 8x4'),
                            TextInput::make('badge')
                                ->label('Badge Kategori')
                                ->placeholder('Flagship Heavy-Duty'),
                            TextInput::make('drive')
                                ->label('Sistem Penggerak (Drive)')
                                ->placeholder('6x4 / 8x4 Heavy Axle'),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('engine')
                                ->label('Mesin (Engine)')
                                ->placeholder('Weichai WP12 / Cummins ISM'),
                            TextInput::make('capacity')
                                ->label('Kapasitas Muatan')
                                ->placeholder('30 - 45 Ton'),
                        ]),
                        FileUpload::make('image')
                            ->label('Foto Unit Truk')
                            ->image()
                            ->disk('public')
                            ->directory('homepage')
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Ringkasan / Keunggulan Unit')
                            ->rows(3)
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('detail_url')
                                ->label('Tautan Detail Produk')
                                ->default('/produk'),
                            TextInput::make('whatsapp_message')
                                ->label('Pesan WhatsApp Default')
                                ->placeholder('Halo, saya tertarik dengan unit ini.'),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('order_column')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_featured')
                                ->label('Unggulan (Tampil di Homepage)')
                                ->default(true)
                                ->inline(false),
                            Toggle::make('is_active')
                                ->label('Status Aktif')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),
            ]);
    }
}
