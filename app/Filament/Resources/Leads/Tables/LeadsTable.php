<?php

namespace App\Filament\Resources\Leads\Tables;

use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Waktu Masuk')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('No. WhatsApp / Telp')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('company')
                    ->label('Perusahaan / Proyek')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('truck_series')
                    ->label('Kebutuhan Unit')
                    ->searchable()
                    ->placeholder('-')
                    ->limit(25),
                TextColumn::make('quantity')
                    ->label('Qty')
                    ->placeholder('-'),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'info' => 'new',
                        'warning' => 'contacted',
                        'primary' => 'in_negotiation',
                        'success' => 'closed_won',
                        'danger' => 'closed_lost',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'new' => 'Baru',
                        'contacted' => 'Sudah Dihubungi',
                        'in_negotiation' => 'Negosiasi',
                        'closed_won' => 'Deal',
                        'closed_lost' => 'Batal',
                        default => $state,
                    }),
                TextColumn::make('source')
                    ->label('Sumber')
                    ->badge()
                    ->color('gray')
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'homepage' => 'Beranda',
                        'contact_page' => 'Kontak',
                        default => $state ?? 'Web',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'Baru Masuk',
                        'contacted' => 'Sudah Dihubungi',
                        'in_negotiation' => 'Negosiasi',
                        'closed_won' => 'Deal',
                        'closed_lost' => 'Batal',
                    ]),
                SelectFilter::make('source')
                    ->label('Sumber Form')
                    ->options([
                        'homepage' => 'Beranda',
                        'contact_page' => 'Halaman Kontak',
                    ]),
            ])
            ->recordActions([
                Action::make('whatsapp')
                    ->label('Chat WA')
                    ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                    ->color('success')
                    ->url(function (Lead $record): string {
                        $clean = preg_replace('/[^0-9]/', '', $record->phone);
                        if (str_starts_with($clean, '0')) {
                            $clean = '62'.substr($clean, 1);
                        }

                        $msg = "Halo Bapak/Ibu {$record->name}, terima kasih telah menghubungi PT Shindo Tractors Adiperkasa via website resmi kami.\n\nTerkait kebutuhan armada: ".($record->truck_series ?: 'SHACMAN').($record->quantity ? " sebanyak {$record->quantity}" : '').', apakah ada hal spesifik yang ingin dikonsultasikan lebih lanjut?';

                        return "https://wa.me/{$clean}?text=".urlencode($msg);
                    }, shouldOpenInNewTab: true),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
