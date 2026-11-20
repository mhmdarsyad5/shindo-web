<?php

namespace App\Filament\Resources\ServiceSettings\Schemas;

use App\Filament\Support\CmsImageField;
use App\Models\IconAsset;
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
                Tabs::make('Services Page Settings')
                    ->tabs([
                        // TAB 1: HERO HEADER
                        Tab::make('Hero Header')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Services Header')
                                    ->description('Headline used across both Homepage and Services Page. Manage individual service cards under "Content Management > Services".')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge')
                                            ->placeholder('AFTERSALES SERVICES')
                                            ->default('AFTERSALES SERVICES'),

                                        TextInput::make('hero_title')
                                            ->label('Headline')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Subtitle')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: KEUNGGULAN OPERASIONAL
                        Tab::make('Operational Highlights')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('Highlights Section')
                                    ->schema([
                                        TextInput::make('advantages_badge')
                                            ->label('Badge')
                                            ->default('OPERATIONAL EXCELLENCE'),

                                        TextInput::make('advantages_title')
                                            ->label('Section Title')
                                            ->required(),

                                        Textarea::make('advantages_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Repeater::make('advantages_items')
                                            ->label('Highlights Cards')
                                            ->schema([
                                                Select::make('icon')
                                                    ->label('Icon')
                                                    ->options(fn () => IconAsset::getSelectOptions([
                                                        'cpu' => 'High Torque / Engine',
                                                        'fuel' => 'Fuel Efficiency',
                                                        'truck' => 'Cabin Safety & Comfort',
                                                        'cog' => 'Genuine Parts & Gear',
                                                    ]))
                                                    ->searchable()
                                                    ->default('cpu')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: BANNER BAWAH
                        Tab::make('Showcase Banner')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make('Fleet Banner')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'banner_image',
                                            label: 'Wide Banner Image',
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
