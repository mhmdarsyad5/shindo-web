<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Filament\Support\CmsImageField;
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
                Section::make('Service Information')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('title')
                                ->label('Service Name')
                                ->placeholder('New Unit Sales')
                                ->required(),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('new-unit-sales')
                                ->required(),
                            Select::make('icon')
                                ->label('Icon')
                                ->options([
                                    'unit' => 'New Truck Units',
                                    'contract' => 'Service Contract',
                                    'guarantee' => 'OEM Warranty',
                                    'parts' => 'Genuine Spare Parts',
                                    'service' => 'Maintenance & Repairs',
                                    'support' => '24/7 Support',
                                ])
                                ->default('unit')
                                ->required(),
                        ]),
                        Textarea::make('description')
                            ->label('Description (Optional)')
                            ->rows(3)
                            ->columnSpanFull(),

                        CmsImageField::make(
                            name: 'image',
                            label: 'Banner Image',
                            directory: 'services',
                            defaultFallbackAsset: 'images/service-banner-facility.jpg',
                            helperText: 'Recommended landscape 4:3 ratio (e.g. 800x600 px). JPG, PNG, or WebP.',
                        ),
                        Grid::make(2)->schema([
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
