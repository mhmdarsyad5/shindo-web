<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Layanan')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('title')
                                ->label('Nama Layanan')
                                ->placeholder('Penjualan Unit Baru')
                                ->required(),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('penjualan-unit-baru')
                                ->required(),
                            Select::make('icon')
                                ->label('Pilihan Ikon')
                                ->options([
                                    'unit' => 'Unit Truk Baru',
                                    'contract' => 'Kontrak Servis',
                                    'guarantee' => 'Garansi ATPM',
                                    'parts' => 'Suku Cadang Asli',
                                    'service' => 'Servis & Perawatan',
                                    'support' => 'Dukungan 24/7',
                                ])
                                ->default('unit')
                                ->required(),
                        ]),
                        Textarea::make('description')
                            ->label('Deskripsi Layanan (Opsional)')
                            ->rows(3)
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('order_column')
                                ->label('Urutan Tampilan')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')
                                ->label('Aktif')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),
            ]);
    }
}
