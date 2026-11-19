<?php

namespace App\Filament\Resources\ServiceSettings\Schemas;

use App\Filament\Support\CmsImageField;
use App\Models\Service;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class ServiceSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Pengaturan Halaman Layanan')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Header')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Teks Header Halaman Layanan')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge Atas')
                                            ->placeholder('LAYANAN AFTERSALES')
                                            ->default('LAYANAN AFTERSALES'),

                                        TextInput::make('hero_title')
                                            ->label('Judul Utama Hero')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Deskripsi Subjudul')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: 6 LAYANAN UTAMA
                        Tab::make('6 Layanan Utama (Kartu)')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Section::make('Kartu Layanan yang Ditampilkan di Halaman Layanan & Beranda')
                                    ->description('Setiap layanan memiliki judul, deskripsi, urutan, serta foto banner masing-masing yang dapat diubah.')
                                    ->schema([
                                        Placeholder::make('services_list_preview')
                                            ->label('')
                                            ->content(function () {
                                                $services = Service::orderBy('order_column')->get();
                                                $html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">';
                                                foreach ($services as $svc) {
                                                    $imgUrl = $svc->resolveImageUrl($svc->image, 'images/service-banner-facility.jpg');
                                                    $editUrl = route('filament.admin.resources.services.edit', ['record' => $svc->id]);
                                                    $html .= "
                                                        <div class='flex flex-col border border-neutral-200 dark:border-neutral-800 rounded-xl overflow-hidden bg-white dark:bg-neutral-900 shadow-xs'>
                                                            <div class='relative h-32 overflow-hidden bg-neutral-100 dark:bg-neutral-800'>
                                                                <img src='{$imgUrl}' alt='{$svc->title}' class='w-full h-full object-cover' />
                                                            </div>
                                                            <div class='p-3 flex flex-col justify-between flex-1 gap-2'>
                                                                <div>
                                                                    <h4 class='font-bold text-sm text-neutral-900 dark:text-white leading-snug'>{$svc->title}</h4>
                                                                    <p class='text-xs text-neutral-500 mt-1 line-clamp-2'>{$svc->description}</p>
                                                                </div>
                                                                <a href='{$editUrl}' class='inline-flex items-center justify-center gap-1.5 px-3 py-1.5 bg-primary-600 hover:bg-primary-700 text-white text-xs font-semibold rounded-lg transition-colors'>
                                                                    ✏️ Ubah Gambar & Detail ↗
                                                                </a>
                                                            </div>
                                                        </div>
                                                    ";
                                                }
                                                $html .= '</div>';
                                                $allUrl = route('filament.admin.resources.services.index');
                                                $html .= "<div class='mt-4 flex justify-end'><a href='{$allUrl}' class='text-xs font-semibold text-primary-600 hover:underline'>Buka Daftar Lengkap Layanan Purna Jual →</a></div>";

                                                return new HtmlString($html);
                                            }),
                                    ]),
                            ]),

                        // TAB 3: KEUNGGULAN OPERASIONAL
                        Tab::make('Keunggulan Operasional')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Section::make('Header Section Biru')
                                    ->schema([
                                        TextInput::make('advantages_badge')
                                            ->label('Badge Section')
                                            ->default('KEUNGGULAN OPERASIONAL'),

                                        TextInput::make('advantages_title')
                                            ->label('Judul Section')
                                            ->required(),

                                        Textarea::make('advantages_subtitle')
                                            ->label('Subjudul Section')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Repeater::make('advantages_items')
                                            ->label('4 Kartu Keunggulan')
                                            ->schema([
                                                Select::make('icon')
                                                    ->label('Pilihan Icon')
                                                    ->options([
                                                        'cpu' => 'Mesin / CPU / Torsi',
                                                        'fuel' => 'BBM / Efisiensi Solar',
                                                        'truck' => 'Truk / Kabin / Keamanan',
                                                        'cog' => 'Gear / Suku Cadang',
                                                    ])
                                                    ->default('cpu')
                                                    ->required(),
                                                TextInput::make('title')
                                                    ->label('Judul Keunggulan')
                                                    ->required(),
                                                Textarea::make('description')
                                                    ->label('Deskripsi')
                                                    ->rows(2)
                                                    ->required(),
                                            ])
                                            ->collapsible()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: BANNER BAWAH
                        Tab::make('Banner Bawah')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make('Armada Showcase Banner')
                                    ->schema([
                                        CmsImageField::make(
                                            name: 'banner_image',
                                            label: 'Gambar Banner Armada Lebar',
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
