<?php

namespace App\Filament\Resources\TruckSeries\Schemas;

use App\Filament\Support\CmsImageField;
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
                Section::make('Truck Series Information')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('key')
                                ->label('Series Key (Unique)')
                                ->placeholder('X3000')
                                ->required(),
                            TextInput::make('name')
                                ->label('Series Name')
                                ->placeholder('X3000')
                                ->required(),
                            TextInput::make('badge')
                                ->label('Badge Label')
                                ->placeholder('FLAGSHIP HEAVY-DUTY'),
                        ]),
                        TextInput::make('title')
                            ->label('Full Title')
                            ->placeholder('X3000 Series Heavy-Duty Truck')
                            ->columnSpanFull(),
                        CmsImageField::make(
                            name: 'image',
                            label: 'Series Image (Transparent PNG)',
                            directory: 'homepage',
                            defaultFallbackAsset: 'homepage/shacman-x3000.png',
                        ),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            TextInput::make('detail_url')
                                ->label('Detail URL')
                                ->default('/produk'),
                            TextInput::make('order_column')
                                ->label('Sort Order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_active')
                                ->label('Active')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),
            ]);
    }
}
