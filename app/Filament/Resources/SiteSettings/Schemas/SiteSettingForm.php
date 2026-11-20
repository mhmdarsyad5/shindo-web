<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Global Site Settings')
                    ->tabs([
                        // TAB 1: NAVBAR
                        Tab::make('Navigation Bar')
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                Section::make('Navbar Branding & CTA')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'navbar_logo',
                                            label: 'Navbar Logo',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/shacman-shindo-white.png',
                                            helperText: 'Transparent PNG or SVG.',
                                        ),

                                        Grid::make(2)->schema([
                                            TextInput::make('cta_text')
                                                ->label('CTA Button Text')
                                                ->default('Contact Us')
                                                ->required(),
                                            TextInput::make('cta_url')
                                                ->label('CTA Button URL')
                                                ->default('/kontak')
                                                ->required(),
                                        ]),
                                    ]),

                                Section::make('Navigation Links')
                                    ->description('Links displayed in the site navbar.')
                                    ->schema([
                                        Repeater::make('nav_items')
                                            ->label('Links')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Label')
                                                    ->placeholder('Products')
                                                    ->required(),
                                                TextInput::make('url')
                                                    ->label('URL')
                                                    ->placeholder('/produk')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->reorderable()
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Add Navigation Link'),
                                    ]),
                            ]),

                        // TAB 2: FOOTER
                        Tab::make('Footer')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Footer Branding & Bio')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'footer_logo',
                                            label: 'Footer Logo',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/shindo-logo-white.png',
                                            helperText: 'Transparent PNG or SVG.',
                                        ),
                                        Textarea::make('footer_description')
                                            ->label('Company Summary')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: CONTACT & HOURS
                        Tab::make('Contact & Hours')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Section::make('Office & Operating Information')
                                    ->schema([
                                        TextInput::make('office_address')
                                            ->label('Office Address')
                                            ->columnSpanFull(),
                                        Grid::make(2)->schema([
                                            TextInput::make('office_phone')
                                                ->label('Phone Number'),
                                            TextInput::make('office_email')
                                                ->label('Email Address'),
                                        ]),
                                        Grid::make(2)->schema([
                                            TextInput::make('office_hours')
                                                ->label('Office Hours'),
                                            TextInput::make('mechanic_hours')
                                                ->label('Emergency Mechanic Hours'),
                                        ]),
                                    ]),
                            ]),

                        // TAB 4: SOSIAL MEDIA
                        Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Section::make('Official Channels')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('facebook_url')
                                                ->label('Facebook URL')
                                                ->placeholder('https://facebook.com/...'),
                                            TextInput::make('instagram_url')
                                                ->label('Instagram URL')
                                                ->placeholder('https://instagram.com/...'),
                                            TextInput::make('linkedin_url')
                                                ->label('LinkedIn URL')
                                                ->placeholder('https://linkedin.com/...'),
                                            TextInput::make('youtube_url')
                                                ->label('YouTube URL')
                                                ->placeholder('https://youtube.com/...'),
                                        ]),
                                    ]),
                            ]),

                        // TAB 5: SITE IDENTITY
                        Tab::make('Site Identity')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Section::make('Site Name & Copyright')
                                    ->schema([
                                        TextInput::make('site_name')
                                            ->label('Site Name')
                                            ->required(),
                                        TextInput::make('copyright_text')
                                            ->label('Copyright Notice')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
