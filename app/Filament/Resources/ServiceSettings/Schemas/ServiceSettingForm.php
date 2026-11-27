<?php

namespace App\Filament\Resources\ServiceSettings\Schemas;

use App\Filament\Support\CmsImageField;
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
                                    ->description('Headline for the Services Page. Homepage services header can be customized under Homepage Settings. Manage individual service cards under "Content Management > Services".')
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

                        // TAB 2: BANNER BAWAH
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
