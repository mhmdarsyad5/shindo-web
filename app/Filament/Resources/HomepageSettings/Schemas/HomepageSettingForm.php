<?php

namespace App\Filament\Resources\HomepageSettings\Schemas;

use App\Filament\Support\CmsImageField;
use App\Models\IconAsset;
use App\Models\Service;
use App\Models\ServiceSetting;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class HomepageSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Homepage Content Settings')
                    ->tabs([
                        // TAB 1: HERO BANNER
                        Tab::make('Hero Banner')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Hero Banner Image')
                                    ->description('Full widescreen hero banner displayed at the top of the homepage. All branding, trucks, and slogans are embedded directly in the visual graphic.')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'hero_background_image',
                                            label: 'Hero Banner Image (Widescreen)',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/heronew.webp',
                                            helperText: 'Recommended widescreen aspect ratio (WebP/PNG/JPG, Max 5MB).',
                                        ),

                                        TextInput::make('hero_tagline')
                                            ->label('Accessibility Alt Text & SEO Title')
                                            ->placeholder('SHACMAN – Tangguh di Segala Medan')
                                            ->default('SHACMAN – Tangguh di Segala Medan')
                                            ->helperText('Used for search engine crawlers (SEO) and screen readers (alt attribute).')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Hero Overlay Content')
                                    ->description('Description, checklist highlights, and CTA button displayed at the bottom of the hero banner.')
                                    ->schema([
                                        Textarea::make('hero_description')
                                            ->label('Hero Description')
                                            ->placeholder('Kombinasi teknologi mesin tangguh, konstruksi kokoh, dan dukungan purna jual menyeluruh untuk menunjang profitabilitas armada Anda.')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Repeater::make('hero_points')
                                            ->label('Checklist Points')
                                            ->simple(
                                                TextInput::make('point')
                                                    ->placeholder('Ketersediaan Genuine Parts')
                                                    ->required()
                                            )
                                            ->defaultItems(3)
                                            ->addActionLabel('Add Point')
                                            ->columnSpanFull(),

                                        Grid::make(2)->schema([
                                            TextInput::make('hero_cta_text')
                                                ->label('CTA Button Text')
                                                ->placeholder('PELAJARI LEBIH LANJUT')
                                                ->default('PELAJARI LEBIH LANJUT'),
                                            TextInput::make('hero_cta_url')
                                                ->label('CTA Button URL')
                                                ->placeholder('/tentang-kami')
                                                ->default('/tentang-kami'),
                                        ]),
                                    ]),
                            ]),

                        // TAB 2: KEY STATISTICS
                        Tab::make('Key Statistics')
                            ->icon('heroicon-o-chart-bar')
                            ->schema([
                                Section::make('Bottom Bar Metrics')
                                    ->description('Key fleet metrics and achievements displayed across the dark bar.')
                                    ->schema([
                                        Repeater::make('stats')
                                            ->label('Metric Items')
                                            ->schema([
                                                TextInput::make('value')
                                                    ->label('Value / Number')
                                                    ->placeholder('56+ Years')
                                                    ->required(),
                                                TextInput::make('label')
                                                    ->label('Metric Label')
                                                    ->placeholder('Industry Experience')
                                                    ->required(),
                                                Select::make('icon')
                                                    ->label('Icon')
                                                    ->options(fn () => IconAsset::getSelectOptions([
                                                        'truck' => 'Truck',
                                                        'handshake' => 'Partnership',
                                                        'map-pin' => 'Location / Reach',
                                                        'shield-check' => 'Warranty / Security',
                                                    ]))
                                                    ->searchable()
                                                    ->default('truck')
                                                    ->required(),
                                            ])
                                            ->columns(3)
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Add Metric'),
                                    ]),
                            ]),

                        // TAB 3: SHOWROOM SECTION
                        Tab::make('Showroom')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Section::make('Truck Series & Fleet Cards Header')
                                    ->description('Controls the header for the 3 Truck Series cards (X3000, F3000, H3000) displayed on the homepage.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('showroom_badge')
                                                ->label('Badge')
                                                ->default('SERI TRUK UNGGULAN'),
                                            TextInput::make('showroom_title')
                                                ->label('Section Title')
                                                ->default('PILIHAN ARMADA SHACMAN'),
                                        ]),
                                        Textarea::make('showroom_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2),
                                    ]),
                            ]),

                        // TAB 4: ABOUT US
                        Tab::make('About Us')
                            ->icon('heroicon-o-user-group')
                            ->schema([
                                Section::make('About Introduction')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('about_badge')
                                                ->label('Badge')
                                                ->default('ABOUT US'),
                                            TextInput::make('about_title')
                                                ->label('Headline')
                                                ->default('COMMITTED TO EFFICIENCY & HIGH PERFORMANCE'),
                                        ]),
                                        Textarea::make('about_description_1')
                                            ->label('Introduction Paragraph')
                                            ->rows(3),
                                    ]),

                                Section::make('Unit Showcase & Background')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'about_image',
                                            label: 'About Section Background Image',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/about-shacman-fleet-bg.png',
                                            helperText: 'Full-width cinematic background image for the About Us section on the homepage. Format: JPG, PNG, or WebP. Max 5MB.',
                                        ),

                                        Repeater::make('about_features')
                                            ->label('Highlights')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Add Highlight'),
                                    ]),
                            ]),

                        // TAB 6: OPERATIONAL HIGHLIGHTS
                        Tab::make('Operational Highlights')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('Operational Highlights Header')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('advantages_badge')
                                                ->label('Badge')
                                                ->default('OPERATIONAL EXCELLENCE'),
                                            TextInput::make('advantages_title')
                                                ->label('Section Title')
                                                ->default('WHY CHOOSE SHACMAN?'),
                                        ]),
                                        Textarea::make('advantages_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2),
                                    ]),

                                Section::make('Highlight Cards')
                                    ->schema([
                                        Repeater::make('advantages_items')
                                            ->label('Highlights')
                                            ->schema([
                                                Select::make('icon')
                                                    ->label('Icon')
                                                    ->options(fn () => IconAsset::getSelectOptions([
                                                        'cpu' => 'High Torque / Engine',
                                                        'fuel' => 'Fuel Efficiency',
                                                        'truck' => 'Safety & Cabin Protection',
                                                        'cog' => 'Genuine Parts & Powertrain',
                                                    ]))
                                                    ->searchable()
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->columnSpan(2)
                                                    ->required(),
                                            ])
                                            ->columns(4)
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Add Highlight'),
                                    ]),
                            ]),

                        // TAB 7: AFTERSALES SERVICES (Single Source of Truth)
                        Tab::make('Aftersales Services')
                            ->icon('heroicon-o-wrench-screwdriver')
                            ->schema([
                                Section::make('Aftersales Services Header')
                                    ->description('Customize the Aftersales Services heading displayed on the homepage, or leave blank to inherit from Services Page.')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('services_badge')
                                                ->label('Badge')
                                                ->placeholder('LAYANAN AFTERSALES')
                                                ->helperText('Optional. Leave empty to use default.'),
                                            TextInput::make('services_title')
                                                ->label('Section Title')
                                                ->placeholder('DUKUNGAN PENUH UNTUK BISNIS ANDA')
                                                ->helperText('Optional. Leave empty to inherit from Services Page.'),
                                        ]),
                                        Textarea::make('services_subtitle')
                                            ->label('Subtitle')
                                            ->placeholder('Memastikan performa dan ketersediaan armada dump truck SHACMAN di site tambang tetap optimal...')
                                            ->rows(2)
                                            ->helperText('Optional. Leave empty to inherit from Services Page.')
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('Unified Services Master Catalog')
                                    ->description('Service cards are managed centrally and synchronized across the entire site.')
                                    ->schema([
                                        Placeholder::make('services_sync_info')
                                            ->hiddenLabel()
                                            ->content(function () {
                                                $serviceSetting = ServiceSetting::current();
                                                $servicesCount = Service::where('is_active', true)->count();
                                                $editSettingUrl = route('filament.admin.resources.service-settings.edit', ['record' => $serviceSetting->id]);
                                                $servicesListUrl = route('filament.admin.resources.services.index');

                                                return new HtmlString("
                                                    <div style='padding: 16px; background-color: #f0f9ff; border: 1px solid #bae6fd; border-radius: 10px; font-family: inherit;'>
                                                        <div style='display: flex; align-items: flex-start; gap: 12px;'>
                                                            <div style='width: 36px; height: 36px; min-width: 36px; min-height: 36px; background-color: #0067b1; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #ffffff;'>
                                                                <svg style='width: 20px; height: 20px; min-width: 20px; min-height: 20px; max-width: 20px; max-height: 20px; display: block;' width='20' height='20' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                                                                    <path stroke-linecap='round' stroke-linejoin='round' d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'/>
                                                                </svg>
                                                            </div>
                                                            <div style='flex: 1;'>
                                                                <div style='display: flex; align-items: center; gap: 8px; margin-bottom: 4px;'>
                                                                    <span style='font-size: 14px; font-weight: 700; color: #082f49;'>Services Master Sync</span>
                                                                    <span style='font-size: 10px; font-weight: 600; padding: 2px 8px; background-color: #dcfce7; color: #166534; border-radius: 9999px;'>Active</span>
                                                                </div>
                                                                <p style='font-size: 12px; color: #0369a1; line-height: 1.5; margin: 0 0 12px 0;'>
                                                                    Homepage automatically displays the <strong>{$servicesCount} active service cards</strong> managed in the Services catalog.
                                                                </p>

                                                                <div style='display: flex; flex-wrap: wrap; gap: 8px;'>
                                                                    <a href='{$editSettingUrl}' style='display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background-color: #0067b1; color: #ffffff; text-decoration: none; font-size: 12px; font-weight: 600; border-radius: 6px;'>
                                                                        Edit Services Page Header &rarr;
                                                                    </a>
                                                                    <a href='{$servicesListUrl}' style='display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background-color: #ffffff; color: #1e293b; border: 1px solid #cbd5e1; text-decoration: none; font-size: 12px; font-weight: 600; border-radius: 6px;'>
                                                                        Manage {$servicesCount} Service Cards &rarr;
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ");
                                            }),
                                    ]),
                            ]),

                        // TAB 8: BLOG SECTION
                        Tab::make('Blog Posts')
                            ->icon('heroicon-o-newspaper')
                            ->schema([
                                Section::make('Blog Section Header')
                                    ->description('Articles and news are managed under "Content Management > Blog Posts".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('blog_badge')
                                                ->label('Badge')
                                                ->default('INSIGHTS'),
                                            TextInput::make('blog_title')
                                                ->label('Section Title')
                                                ->default('LATEST BLOG POSTS'),
                                        ]),
                                        Textarea::make('blog_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
