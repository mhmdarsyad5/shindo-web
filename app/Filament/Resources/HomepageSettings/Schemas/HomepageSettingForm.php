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
                                Section::make('Hero Headline & Copy')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Top Badge')
                                            ->placeholder('OFFICIAL SHACMAN DISTRIBUTOR')
                                            ->default('OFFICIAL SHACMAN DISTRIBUTOR'),

                                        TextInput::make('hero_title')
                                            ->label('Headline')
                                            ->placeholder('Heavy-Duty Reliability & Power')
                                            ->default('Heavy-Duty Reliability & Power')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Description / Subheadline')
                                            ->rows(3),
                                    ]),

                                Section::make('Hero Media')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'hero_background_image',
                                            label: 'Hero Truck Image',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/hero-cropped-mockup.png',
                                        ),

                                        CmsImageField::make(
                                            name: 'hero_logo',
                                            label: 'SHACMAN Logo',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/shacman-logo.png',
                                        ),

                                        TextInput::make('hero_logo_tagline')
                                            ->label('Logo Tagline')
                                            ->default('TOUGH ON EVERY TERRAIN')
                                            ->columnSpanFull(),
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
                                Section::make('Showroom Header')
                                    ->description('Truck series cards (X3000, F3000, H3000) are managed under "Fleet & Catalog > Truck Series".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('showroom_badge')
                                                ->label('Badge')
                                                ->default('FEATURED TRUCK SERIES'),
                                            TextInput::make('showroom_title')
                                                ->label('Section Title')
                                                ->default('PREMIER FLEET SELECTION FOR HEAVY OPERATIONS'),
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
                                        Textarea::make('about_description_2')
                                            ->label('Services & Value-add Paragraph')
                                            ->rows(3),
                                    ]),

                                Section::make('Unit Showcase & Highlights')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'about_image',
                                            label: 'Showcase Image',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/about-truck.png',
                                        ),

                                        Repeater::make('about_features')
                                            ->label('Highlights')
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Add Highlight'),
                                    ]),
                            ]),

                        // TAB 5: FEATURED PRODUCTS
                        Tab::make('Featured Products')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Section::make('Featured Products Header')
                                    ->description('Product cards are managed under "Fleet & Catalog > Products".')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('products_badge')
                                                ->label('Badge')
                                                ->default('FEATURED PRODUCTS'),
                                            TextInput::make('products_title')
                                                ->label('Section Title')
                                                ->default('SHACMAN DUMP TRUCK LINEUP'),
                                        ]),
                                        Textarea::make('products_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2),
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
                                                        'flame' => 'High Torque / Power',
                                                        'droplet' => 'Fuel Efficiency',
                                                        'shield' => 'Safety & Cabin Protection',
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
                                Section::make('Unified Services Master Data')
                                    ->description('The Homepage services section is 100% synchronized with the master data in Services Page.')
                                    ->schema([
                                        Placeholder::make('services_sync_info')
                                            ->label('')
                                            ->content(function () {
                                                $serviceSetting = ServiceSetting::current();
                                                $servicesCount = Service::where('is_active', true)->count();
                                                $editSettingUrl = route('filament.admin.resources.service-settings.edit', ['record' => $serviceSetting->id]);
                                                $servicesListUrl = route('filament.admin.resources.services.index');

                                                return new HtmlString("
                                                    <div class='p-5 bg-sky-50 dark:bg-sky-950/40 border border-sky-200 dark:border-sky-800 rounded-xl space-y-4'>
                                                        <div class='flex items-start gap-3.5'>
                                                            <div class='p-2.5 bg-[#0067b1] text-white rounded-lg shadow-xs shrink-0'>
                                                                <svg class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'/></svg>
                                                            </div>
                                                            <div class='space-y-1'>
                                                                <h4 class='text-sm font-bold text-sky-950 dark:text-sky-100 flex items-center gap-2'>
                                                                    <span>Single Source of Truth Active</span>
                                                                    <span class='px-2 py-0.5 text-[10px] bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-300 font-semibold rounded-full'>Auto Synced</span>
                                                                </h4>
                                                                <p class='text-xs text-sky-800 dark:text-sky-200 leading-relaxed'>
                                                                    Headline, description, and <strong>{$servicesCount} active service cards</strong> on both the Homepage and Services Page are managed from a single source. Changes saved in Services automatically reflect across both pages.
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class='p-3.5 bg-white dark:bg-neutral-900 rounded-lg border border-sky-200/80 dark:border-sky-800/80 text-xs space-y-1.5'>
                                                            <div class='text-neutral-500 dark:text-neutral-400 font-medium'>Current Services Headline:</div>
                                                            <div class='font-bold text-neutral-900 dark:text-white text-sm'>{$serviceSetting->hero_title}</div>
                                                            <div class='text-neutral-600 dark:text-neutral-300 line-clamp-2'>{$serviceSetting->hero_subtitle}</div>
                                                        </div>

                                                        <div class='pt-2 flex flex-wrap items-center gap-2.5'>
                                                            <a href='{$editSettingUrl}' class='inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#0067b1] hover:bg-[#00528e] text-white text-xs font-semibold rounded-lg shadow-xs transition-colors'>
                                                                ✏️ Edit Services Header ↗
                                                            </a>
                                                            <a href='{$servicesListUrl}' class='inline-flex items-center gap-1.5 px-3.5 py-2 bg-white dark:bg-neutral-800 hover:bg-neutral-50 text-neutral-800 dark:text-neutral-200 border border-neutral-300 dark:border-neutral-700 text-xs font-semibold rounded-lg shadow-xs transition-colors'>
                                                                📋 Manage {$servicesCount} Active Services ↗
                                                            </a>
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

                        // TAB 9: CTA BANNER
                        Tab::make('Call to Action')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Bottom CTA Banner')
                                    ->schema([
                                        TextInput::make('cta_banner_title')
                                            ->label('Headline')
                                            ->default('READY TO POWER YOUR FLEET WITH SHACMAN?')
                                            ->columnSpanFull(),

                                        Textarea::make('cta_banner_subtitle')
                                            ->label('Subtitle')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        CmsImageField::make(
                                            name: 'cta_banner_bg_image',
                                            label: 'Background Image',
                                            directory: 'homepage',
                                            defaultFallbackAsset: 'homepage/cta-mining-clean.jpg',
                                        ),

                                        Grid::make(2)->schema([
                                            TextInput::make('whatsapp_number')
                                                ->label('WhatsApp Number (e.g. 628123456789)')
                                                ->default('628123456789'),
                                            TextInput::make('whatsapp_text')
                                                ->label('WhatsApp Button Text')
                                                ->default('Contact via WhatsApp'),
                                        ]),

                                        Grid::make(2)->schema([
                                            TextInput::make('brochure_text')
                                                ->label('Brochure Button Text')
                                                ->default('Request Brochure'),
                                            TextInput::make('brochure_url')
                                                ->label('Brochure URL')
                                                ->default('/kontak'),
                                        ]),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
