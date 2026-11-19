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
                Tabs::make('Pengaturan Halaman Kontak')
                    ->tabs([
                        // TAB 1: HERO
                        Tab::make('Hero Header')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Header Halaman Kontak')
                                    ->schema([
                                        TextInput::make('hero_badge')
                                            ->label('Badge Atas')
                                            ->default('KONTAK KAMI'),

                                        TextInput::make('hero_title')
                                            ->label('Judul Utama Hero')
                                            ->required(),

                                        Textarea::make('hero_subtitle')
                                            ->label('Deskripsi Subjudul')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 2: DETAIL KONTAK
                        Tab::make('Detail Kantor')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make('Informasi Kantor & Kontak')
                                    ->schema([
                                        TextInput::make('office_title')
                                            ->label('Label Kantor')
                                            ->default('KANTOR PUSAT')
                                            ->required(),

                                        Textarea::make('office_address')
                                            ->label('Alamat Lengkap Kantor')
                                            ->rows(3)
                                            ->columnSpanFull()
                                            ->required(),

                                        TextInput::make('office_phone')
                                            ->label('Nomor Telepon Hotline / Sales')
                                            ->required(),

                                        TextInput::make('office_email')
                                            ->label('Email Perusahaan')
                                            ->email()
                                            ->required(),

                                        TextInput::make('office_hours')
                                            ->label('Jam Operasional Kantor')
                                            ->default('Senin - Jumat, 09:00 - 17:00 WIB')
                                            ->required(),

                                        TextInput::make('mechanic_hours')
                                            ->label('Status / Keterangan Mekanik 24/7')
                                            ->default('Tim mekanik siaga 24/7 meluncur ke lokasi proyek Anda.')
                                            ->required(),
                                    ]),
                            ]),

                        // TAB 3: GOOGLE MAPS
                        Tab::make('Google Maps')
                            ->icon('heroicon-o-map')
                            ->schema([
                                Section::make('Peta Lokasi Interaktif')
                                    ->schema([
                                        Textarea::make('map_embed_url')
                                            ->label('URL Iframe Embed Google Maps')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        TextInput::make('map_link_url')
                                            ->label('Link Langsung ke Google Maps (Tombol Buka di Maps)')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // TAB 4: FORM KONSULTASI
                        Tab::make('Form Konsultasi')
                            ->icon('heroicon-o-pencil-square')
                            ->schema([
                                Section::make('Header & Tombol Form')
                                    ->schema([
                                        TextInput::make('form_title')
                                            ->label('Judul Form')
                                            ->required(),

                                        Textarea::make('form_subtitle')
                                            ->label('Deskripsi Form')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        TextInput::make('submit_button_text')
                                            ->label('Teks Tombol Submit')
                                            ->default('Hubungi Kami')
                                            ->required(),

                                        TextInput::make('submit_notice_text')
                                            ->label('Keterangan di Bawah Tombol')
                                            ->default('Data Anda otomatis tersimpan & terhubung langsung ke WhatsApp tim kami.')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
