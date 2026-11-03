<?php

namespace App\Filament\Resources\HomepageSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomepageSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_title')
                    ->label('Judul Website')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('hero_tagline')
                    ->label('Tagline Hero')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('cta_text')
                    ->label('Tombol CTA')
                    ->badge()
                    ->color('info'),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah Konten')
                    ->icon('heroicon-m-pencil-square'),
            ])
            ->toolbarActions([]);
    }
}
