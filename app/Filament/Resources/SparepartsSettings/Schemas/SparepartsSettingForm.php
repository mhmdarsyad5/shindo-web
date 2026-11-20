<?php

namespace App\Filament\Resources\SparepartsSettings\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SparepartsSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Spareparts Page Settings')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Banner')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Spare Parts Hero')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge')
                                            ->placeholder('GENUINE SHACMAN SPARE PARTS')
                                            ->default('GENUINE SHACMAN SPARE PARTS'),

                                        TextInput::make('hero_title')
                                            ->label('Headline')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Subtitle')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: PILAR JAMINAN
                        Tab::make('Guarantee Pillars')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('Guarantee Cards')
                                    ->schema([
                                        Repeater::make('pillars_items')
                                            ->label('Pillars')
                                            ->schema([
                                                TextInput::make('number')
                                                    ->label('Number (e.g. 01)')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('desc')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: GUDANG & PENGIRIMAN
                        Tab::make('Logistics & Warehouse')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Rapid Logistics & Distribution')
                                    ->schema([
                                        TextInput::make('warehouse_badge')
                                            ->label('Badge')
                                            ->default('RAPID LOGISTICS & DISTRIBUTION'),

                                        TextInput::make('warehouse_title')
                                            ->label('Section Title')
                                            ->required(),

                                        Textarea::make('warehouse_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Textarea::make('warehouse_description')
                                            ->label('Overview')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'warehouse_image',
                                            label: 'Warehouse Facility Image',
                                            directory: 'spareparts',
                                            defaultFallbackAsset: 'images/service-banner-parts.jpg',
                                        ),

                                        Repeater::make('warehouse_points')
                                            ->label('Distribution Highlights')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Point Title')
                                                    ->required(),
                                                Textarea::make('desc')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 4: MEKANIK & DUKUNGAN
                        Tab::make('Technical Support')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('Mechanic & On-site Support')
                                    ->schema([
                                        TextInput::make('mechanic_badge')
                                            ->label('Badge')
                                            ->default('TECHNICAL SUPPORT'),

                                        TextInput::make('mechanic_title')
                                            ->label('Section Title')
                                            ->required(),

                                        Textarea::make('mechanic_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Repeater::make('mechanic_points')
                                            ->label('Support Pillars')
                                            ->simple(
                                                TextInput::make('point')->required()
                                            )
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 5: CTA WHATSAPP
                        Tab::make('WhatsApp Contact')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Section::make('Consultation Banner')
                                    ->schema([
                                        TextInput::make('cta_title')
                                            ->label('Banner Title')
                                            ->required(),

                                        Textarea::make('cta_subtitle')
                                            ->label('Banner Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        TextInput::make('whatsapp_number')
                                            ->label('WhatsApp Number (e.g. 628111009567)')
                                            ->required(),

                                        TextInput::make('whatsapp_button_text')
                                            ->label('WhatsApp Button Label')
                                            ->default('Consult Spare Parts via WhatsApp')
                                            ->required(),

                                        Textarea::make('whatsapp_message')
                                            ->label('Default WhatsApp Message')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
