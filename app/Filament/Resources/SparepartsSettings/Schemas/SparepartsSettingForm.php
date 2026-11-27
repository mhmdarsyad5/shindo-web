<?php

namespace App\Filament\Resources\SparepartsSettings\Schemas;

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

                        // TAB 2: CTA WHATSAPP
                        Tab::make('WhatsApp Contact')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Section::make('WhatsApp Consultation')
                                    ->schema([
                                        TextInput::make('whatsapp_button_text')
                                            ->label('WhatsApp Button Label')
                                            ->default('Hubungi Kami')
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
