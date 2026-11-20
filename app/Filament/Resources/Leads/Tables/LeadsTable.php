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
                    ->label('Received At')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Name')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Phone / WhatsApp')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->copyable()
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('company')
                    ->label('Company')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('truck_series')
                    ->label('Requested Series')
                    ->searchable()
                    ->placeholder('-')
                    ->limit(25),
                TextColumn::make('quantity')
                    ->label('Qty')
                    ->placeholder('-'),
                TextColumn::make('location')
                    ->label('Location')
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
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'in_negotiation' => 'In Negotiation',
                        'closed_won' => 'Won',
                        'closed_lost' => 'Lost',
                        default => $state,
                    }),
                TextColumn::make('source')
                    ->label('Source')
                    ->badge()
                    ->color('gray')
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'homepage' => 'Homepage',
                        'contact_page' => 'Contact Page',
                        default => $state ?? 'Web',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'in_negotiation' => 'In Negotiation',
                        'closed_won' => 'Won',
                        'closed_lost' => 'Lost',
                    ]),
                SelectFilter::make('source')
                    ->label('Source')
                    ->options([
                        'homepage' => 'Homepage',
                        'contact_page' => 'Contact Page',
                    ]),
            ])
            ->recordActions([
                Action::make('whatsapp')
                    ->label('WhatsApp')
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
