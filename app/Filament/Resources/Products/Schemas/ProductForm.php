<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
                Section::make('Product Information')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('name')
                                ->label('Product Name')
                                ->placeholder('SHACMAN X3000')
                                ->required(),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('shacman-x3000-dump-truck')
                                ->required(),
                            Select::make('truck_series_id')
                                ->label('Truck Series')
                                ->relationship('truckSeries', 'name')
                                ->searchable()
                                ->preload()
                                ->nullable(),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('type')
                                ->label('Type / Variant')
                                ->placeholder('Dump Truck 6x4 & 8x4'),
                            TextInput::make('badge')
                                ->label('Category Badge')
                                ->placeholder('Flagship Heavy-Duty'),
                            TextInput::make('drive')
                                ->label('Drive System')
                                ->placeholder('6x4 / 8x4 Heavy Axle'),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('engine')
                                ->label('Engine')
                                ->placeholder('Weichai WP12 / Cummins ISM'),
                            TextInput::make('capacity')
                                ->label('Payload Capacity')
                                ->placeholder('30 - 45 Ton'),
                        ]),
                        CmsImageField::make(
                            name: 'image',
                            label: 'Product Image',
                            directory: 'products',
                            defaultFallbackAsset: 'products/h3000s-dump-truck-6x4.webp',
                        ),
                        Textarea::make('description')
                            ->label('Summary & Highlights')
                            ->rows(3)
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('detail_url')
                                ->label('Product Detail URL')
                                ->default('/produk'),
                            TextInput::make('whatsapp_message')
                                ->label('Default WhatsApp Message')
                                ->placeholder('Hello, I am interested in this unit.'),
                        ]),
                        Grid::make(3)->schema([
                            TextInput::make('order_column')
                                ->label('Sort Order')
                                ->numeric()
                                ->default(0),
                            Toggle::make('is_featured')
                                ->label('Featured on Homepage')
                                ->default(true)
                                ->inline(false),
                            Toggle::make('is_active')
                                ->label('Active')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),

                Section::make('Gallery & Technical Specifications')
                    ->collapsed()
                    ->schema([
                        FileUpload::make('gallery_images')
                            ->label('Additional Gallery Images')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->disk('public')
                            ->directory('products/gallery')
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),
                        Repeater::make('specifications')
                            ->label('Unit Specifications (Optional)')
                            ->schema([
                                TextInput::make('item')
                                    ->label('Specification Item')
                                    ->placeholder('GVM (Gross Vehicle Weight)')
                                    ->required(),
                                TextInput::make('value')
                                    ->label('Value')
                                    ->placeholder('25,000 – 31,000 kg')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->helperText('Leave empty to use standard series specifications.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
