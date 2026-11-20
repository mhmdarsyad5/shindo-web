<?php

namespace App\Filament\Resources\IconAssets\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class IconAssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Icon & Asset Information')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('title')
                                ->label('Asset Name')
                                ->placeholder('e.g. Heavy Duty Truck, Weichai Engine')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                    if (empty($get('key'))) {
                                        $set('key', Str::slug((string) $state));
                                    }
                                }),

                            TextInput::make('key')
                                ->label('Identifier / Key')
                                ->placeholder('e.g. heavy-duty-truck')
                                ->required()
                                ->unique('icon_assets', 'key', ignoreRecord: true)
                                ->helperText('Unique key used to reference this icon in CMS.'),

                            TextInput::make('category')
                                ->label('Category / Group')
                                ->placeholder('e.g. Fleet, Engine, Service'),
                        ]),

                        FileUpload::make('file_path')
                            ->label('Icon Image File')
                            ->disk('public')
                            ->directory('icons')
                            ->acceptedFileTypes(['image/svg+xml', 'image/png', 'image/webp', 'image/jpeg'])
                            ->openable()
                            ->downloadable()
                            ->previewable()
                            ->required()
                            ->helperText('Supported formats: Transparent SVG, PNG, WebP, or JPG. Max 2MB.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
