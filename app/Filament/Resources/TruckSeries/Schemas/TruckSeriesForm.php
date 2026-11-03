<?php

namespace App\Filament\Resources\TruckSeries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TruckSeriesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Seri Truk')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('key')
                                ->label('Kode Seri (Unik)')
                                ->placeholder('X3000')
                                ->required(),
                            TextInput::make('name')
                                ->label('Nama Seri')
                                ->placeholder('X3000')
                                ->required(),
                            TextInput::make('badge')
                                ->label('Label Badge')
                                ->placeholder('FLAGSHIP HEAVY-DUTY'),
                        ]),
                        TextInput::make('title')
                            ->label('Judul Lengkap')
                            ->placeholder('Truk Heavy Duty Seri X3000')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Gambar Truk (PNG Transparan)')
                            ->image()
                            ->disk('public')
                            ->directory('homepage')
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Deskripsi Penjelas')
                            ->rows(4)
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            TextInput::make('detail_url')
                                ->label('Tautan Detail')
                                ->default('/produk'),
                            TextInput::make('order_column')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')
                                ->label('Aktif / Tampilkan')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),
            ]);
    }
}
