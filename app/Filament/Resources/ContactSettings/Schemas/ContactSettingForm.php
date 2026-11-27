<?php

namespace App\Filament\Resources\ContactSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ContactSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Contact Page Settings')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Header')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Hero Header')
                                    ->schema([
                                        TextInput::make('hero_title')
                                            ->label('Headline')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Subtitle')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: OFFICE DETAILS
                        Tab::make('Office Details')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make('Office & Contact Information')
                                    ->schema([
                                        TextInput::make('office_title')
                                            ->label('Office Label')
                                            ->default('HEADQUARTERS')
                                            ->required(),

                                        Textarea::make('office_address')
                                            ->label('Office Address')
                                            ->rows(3)
                                            ->maxLength(255)
                                            ->columnSpanFull()
                                            ->required(),

                                        TextInput::make('office_phone')
                                            ->label('Phone Number / Hotline')
                                            ->required(),

                                        TextInput::make('office_email')
                                            ->label('Email Address')
                                            ->email()
                                            ->required(),

                                        TextInput::make('office_hours')
                                            ->label('Operating Hours')
                                            ->default('Monday - Friday, 09:00 - 17:00 WIB')
                                            ->required(),

                                        TextInput::make('mechanic_hours')
                                            ->label('24/7 Mechanic Support Notice')
                                            ->default('24/7 emergency mobile mechanic team on standby.')
                                            ->required(),
                                    ]),
                            ]),

                        // TAB 3: GOOGLE MAPS
                        Tab::make('Google Maps')
                            ->icon('heroicon-o-map')
                            ->schema([
                                Section::make('Interactive Map')
                                    ->schema([
                                        Textarea::make('map_embed_url')
                                            ->label('Google Maps Embed URL (Iframe src)')
                                            ->rules(['url'])
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        TextInput::make('map_link_url')
                                            ->label('Google Maps External Link')
                                            ->url()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 4: INQUIRY FORM
                        Tab::make('Inquiry Form')
                            ->icon('heroicon-o-pencil-square')
                            ->schema([
                                Section::make('Form Settings & Callout')
                                    ->schema([
                                        TextInput::make('form_title')
                                            ->label('Form Title')
                                            ->required(),

                                        Textarea::make('form_subtitle')
                                            ->label('Form Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        TextInput::make('submit_button_text')
                                            ->label('Submit Button Label')
                                            ->default('Contact Us')
                                            ->required(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
