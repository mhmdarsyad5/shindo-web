<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
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
                Tabs::make('Pengaturan Global Website')
                    ->tabs([
                        // TAB 1: NAVBAR
                        Tab::make('Navbar & Menu Atas')
                            ->icon('heroicon-o-bars-3')
                            ->schema([
                                Section::make('Logo & Tombol CTA Navbar')
                                    ->schema([
                                        FileUpload::make('navbar_logo')
                                            ->label('Logo Navbar')
                                            ->image()
                                            ->disk('public')
                                            ->directory('homepage')
                                            ->openable()
                                            ->downloadable()
                                            ->helperText('Format: PNG transparan atau SVG.')
                                            ->columnSpanFull(),

                                        Grid::make(2)->schema([
                                            TextInput::make('cta_text')
                                                ->label('Teks Tombol CTA')
                                                ->default('Hubungi Kami')
                                                ->required(),
                                            TextInput::make('cta_url')
                                                ->label('Tautan Tombol CTA')
                                                ->default('/kontak')
                                                ->required(),
                                        ]),
                                    ]),

                                Section::make('Menu Tautan Navigasi')
                                    ->description('Daftar link yang muncul di navbar.')
                                    ->schema([
                                        Repeater::make('nav_items')
                                            ->label('Menu Link')
                                            ->schema([
                                                TextInput::make('label')
                                                    ->label('Label Menu')
                                                    ->placeholder('Produk')
                                                    ->required(),
                                                TextInput::make('url')
                                                    ->label('Tautan / URL')
                                                    ->placeholder('/produk')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->reorderable()
                                            ->collapsible()
                                            ->cloneable()
                                            ->addActionLabel('Tambah Menu Link'),
                                    ]),
                            ]),

                        // TAB 2: FOOTER
                        Tab::make('Footer Perusahaan')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Logo & Bio Perusahaan')
                                    ->schema([
                                        FileUpload::make('footer_logo')
                                            ->label('Logo Footer')
                                            ->image()
                                            ->disk('public')
                                            ->directory('homepage')
                                            ->openable()
                                            ->downloadable()
                                            ->columnSpanFull(),
                                        Textarea::make('footer_description')
                                            ->label('Deskripsi Perusahaan di Footer')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 3: KONTAK & JAM OPERASIONAL
                        Tab::make('Kontak & Jam Operasional')
                            ->icon('heroicon-o-phone')
                            ->schema([
                                Section::make('Informasi Kantor & Kontak')
                                    ->schema([
                                        TextInput::make('office_address')
                                            ->label('Alamat Kantor')
                                            ->columnSpanFull(),
                                        Grid::make(2)->schema([
                                            TextInput::make('office_phone')
                                                ->label('Nomor Telepon'),
                                            TextInput::make('office_email')
                                                ->label('Email Kantor'),
                                        ]),
                                        Grid::make(2)->schema([
                                            TextInput::make('office_hours')
                                                ->label('Jam Operasional Kantor'),
                                            TextInput::make('mechanic_hours')
                                                ->label('Jam Layanan Mekanik Darurat'),
                                        ]),
                                    ]),
                            ]),

                        // TAB 4: SOSIAL MEDIA
                        Tab::make('Sosial Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Section::make('Tautan Media Sosial Resmi')
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

                        // TAB 5: HAK CIPTA & SEO
                        Tab::make('Hak Cipta & Judul')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                Section::make('Hak Cipta (Copyright)')
                                    ->schema([
                                        TextInput::make('site_name')
                                            ->label('Nama Situs Website')
                                            ->required(),
                                        TextInput::make('copyright_text')
                                            ->label('Teks Hak Cipta (Copyright)')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
