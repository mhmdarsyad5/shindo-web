<?php

namespace App\Filament\Resources\AboutSettings\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class AboutSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('About Us Page Settings')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Banner')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Hero Header')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge')
                                            ->placeholder('ABOUT US'),

                                        TextInput::make('hero_title')
                                            ->label('Headline')
                                            ->required(),

                                        TextInput::make('hero_subtitle')
                                            ->label('Subheadline')
                                            ->required(),

                                        Textarea::make('hero_description')
                                            ->label('Description')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'hero_image',
                                            label: 'Hero Background Image',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/about-shacman-fleet-bg.png',
                                        ),
                                    ]),
                            ]),

                        // TAB 2: DEALER PROFILE
                        Tab::make('Distributor Profile')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Authorized Dealer Information')
                                    ->schema([
                                        TextInput::make('profile_title')
                                            ->label('Section Title')
                                            ->required(),

                                        Textarea::make('profile_description')
                                            ->label('Description')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'profile_image',
                                            label: 'Showcase Image',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/about-truck.png',
                                        ),

                                        TextInput::make('profile_cta_text')
                                            ->label('Button Label')
                                            ->default('View Truck Catalog'),

                                        TextInput::make('profile_cta_url')
                                            ->label('Button URL')
                                            ->default('/produk'),
                                    ]),
                            ]),

                        // TAB 3: VISION & MISSION
                        Tab::make('Vision & Mission')
                            ->icon('heroicon-o-flag')
                            ->schema([
                                Section::make('Company Vision')
                                    ->schema([
                                        TextInput::make('vision_badge')
                                            ->label('Badge')
                                            ->default('VISION'),

                                        TextInput::make('vision_title')
                                            ->label('Title')
                                            ->required(),

                                        Textarea::make('vision_text')
                                            ->label('Statement')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Company Mission')
                                    ->schema([
                                        TextInput::make('mission_badge')
                                            ->label('Badge')
                                            ->default('MISSION'),

                                        TextInput::make('mission_title')
                                            ->label('Title')
                                            ->required(),

                                        Repeater::make('mission_items')
                                            ->label('Mission Points')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Number')
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

                        // TAB 4: SHASS AFTERSALES
                        Tab::make('SHASS Aftersales')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('SHASS Highlights')
                                    ->schema([
                                        TextInput::make('shass_badge')
                                            ->label('Badge')
                                            ->default('AFTERSALES SERVICES'),

                                        TextInput::make('shass_title')
                                            ->label('Title')
                                            ->required(),

                                        Textarea::make('shass_subtitle')
                                            ->label('Description')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        Repeater::make('shass_items')
                                            ->label('Service Cards')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Number (e.g. 01)')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->required(),
                                                FileUpload::make('image')
                                                    ->label('Image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('about'),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 5: BRANCHES & COMMITMENT
                        Tab::make('Branches & Commitment')
                            ->icon('heroicon-o-map-pin')
                            ->schema([
                                Section::make('Branch Network')
                                    ->schema([
                                        TextInput::make('branches_badge')
                                            ->label('Badge')
                                            ->default('LOCATIONS'),

                                        TextInput::make('branches_title')
                                            ->label('Title')
                                            ->required(),

                                        Textarea::make('branches_subtitle')
                                            ->label('Description')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'branches_map_image',
                                            label: 'Branch Map Image',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/about-branch-map.jpg',
                                        ),
                                    ]),

                                Section::make('Long-term Commitment')
                                    ->schema([
                                        TextInput::make('commitment_title')
                                            ->label('Title')
                                            ->required(),

                                        Textarea::make('commitment_subtitle')
                                            ->label('Description')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'commitment_image',
                                            label: 'Banner Image',
                                            directory: 'about',
                                            defaultFallbackAsset: 'images/cta-mining-bg.jpg',
                                        ),

                                        Repeater::make('commitment_items')
                                            ->label('Commitment Points')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Number (e.g. 01)')
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
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
