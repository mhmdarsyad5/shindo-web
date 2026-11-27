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
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                        Grid::make(2)->schema([
                                            TextInput::make('office_phone')
                                                ->label('Phone / WhatsApp Number')
                                                ->placeholder('0821-2888-9556')
                                                ->helperText('Pusat nomor kontak & link WhatsApp di seluruh website.'),
                                            TextInput::make('office_email')
                                                ->label('Email Address')
                                                ->email(),
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
                                                ->url()
                                                ->placeholder('https://facebook.com/...'),
                                            TextInput::make('instagram_url')
                                                ->label('Instagram URL')
                                                ->url()
                                                ->placeholder('https://instagram.com/...'),
                                            TextInput::make('linkedin_url')
                                                ->label('LinkedIn URL')
                                                ->url()
                                                ->placeholder('https://linkedin.com/...'),
                                            TextInput::make('youtube_url')
                                                ->label('YouTube URL')
                                                ->url()
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

                        // TAB 6: PAGE HEADERS (Products Catalog & Blog)
                        Tab::make('Page Headers')
                            ->icon('heroicon-o-document-duplicate')
                            ->schema([
                                Section::make('Products Catalog Header (/produk)')
                                    ->schema([
                                        TextInput::make('products_page_title')
                                            ->label('Headline')
                                            ->default('KATALOG ARMADA TRUK SHACMAN')
                                            ->required(),
                                        Textarea::make('products_page_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Blog & Articles Header (/blog)')
                                    ->schema([
                                        TextInput::make('blog_page_title')
                                            ->label('Headline')
                                            ->default('BLOG & ARTIKEL TERBARU')
                                            ->required(),
                                        Textarea::make('blog_page_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Blog Sidebar Consultation Card')
                                    ->description('Controls the dark consultation CTA box in the Blog Detail sidebar.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('blog_cta_badge')
                                                ->label('Badge')
                                                ->default('SHINDO AFTERSALES & SALES'),
                                            TextInput::make('blog_cta_button_text')
                                                ->label('Button Label')
                                                ->default('Hubungi Kami')
                                                ->required(),
                                        ]),
                                        TextInput::make('blog_cta_title')
                                            ->label('Headline')
                                            ->default('Butuh Konsultasi Armada Truk SHACMAN?')
                                            ->required()
                                            ->columnSpanFull(),
                                        Textarea::make('blog_cta_subtitle')
                                            ->label('Description')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
