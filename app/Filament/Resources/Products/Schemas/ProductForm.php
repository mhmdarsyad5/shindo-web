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
use Illuminate\Support\Str;

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
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    if (empty($get('slug'))) {
                                        $set('slug', Str::slug((string) $state));
                                    }
                                }),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('shacman-x3000-dump-truck')
                                ->unique(ignoreRecord: true)
                                ->required(),
                            Select::make('truck_series_id')
                                ->label('Truck Series')
                                ->relationship('truckSeries', 'name')
                                ->searchable()
                                ->preload()
                                ->nullable(),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('type')
                                ->label('Type / Variant')
                                ->placeholder('Dump Truck 6x4 & 8x4'),
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
                        TextInput::make('whatsapp_message')
                            ->label('Default WhatsApp Message')
                            ->placeholder('Hello, I am interested in this unit.')
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            TextInput::make('badge')
                                ->label('Badge Label')
                                ->placeholder('e.g. Best Seller, Mining Spec')
                                ->maxLength(50),
                            TextInput::make('order_column')
                                ->label('Sort Order')
                                ->numeric()
                                ->default(0),
                            Grid::make(2)->schema([
                                Toggle::make('is_featured')
                                    ->label('Featured (Homepage)')
                                    ->default(true)
                                    ->inline(false),
                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true)
                                    ->inline(false),
                            ]),
                        ]),
                    ]),

                Section::make('Gallery & Technical Specifications')
                    ->collapsed()
                    ->schema([
                        FileUpload::make('gallery_images')
                            ->label('Additional Gallery Images')
                            ->image()
                            ->maxSize(5120)
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
