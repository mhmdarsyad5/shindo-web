<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kontak & Perusahaan')
                    ->description('Data prospek yang dikirimkan melalui form website.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->required(),
                            TextInput::make('phone')
                                ->label('No. WhatsApp / Telepon')
                                ->tel()
                                ->required(),
                            TextInput::make('email')
                                ->label('Alamat Email')
                                ->email(),
                            TextInput::make('company')
                                ->label('Perusahaan / Proyek')
                                ->placeholder('Nama PT / CV / Perusahaan'),
                            TextInput::make('location')
                                ->label('Lokasi Job Site / Wilayah')
                                ->placeholder('Contoh: Morowali, Sangatta, dll.'),
                        ]),
                    ]),

                Section::make('Detail Kebutuhan Truk')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('truck_series')
                                ->label('Pilihan Seri Truk / Kebutuhan'),
                            TextInput::make('quantity')
                                ->label('Estimasi Jumlah Unit'),
                        ]),
                        Textarea::make('notes')
                            ->label('Rincian Kebutuhan / Catatan Khusus')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Status & Sumber Prospek')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('source')
                                ->label('Sumber Form')
                                ->options([
                                    'homepage' => 'Beranda (Homepage)',
                                    'contact_page' => 'Halaman Kontak',
                                ])
                                ->disabled(),
                            Select::make('status')
                                ->label('Status Prospek')
                                ->options([
                                    'new' => 'Baru Masuk (New)',
                                    'contacted' => 'Sudah Dihubungi (Contacted)',
                                    'in_negotiation' => 'Dalam Negosiasi',
                                    'closed_won' => 'Deal (Won)',
                                    'closed_lost' => 'Batal / Closed Lost',
                                ])
                                ->required()
                                ->default('new'),
                        ]),
                    ]),
            ]);
    }
}
