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
                    ->label('Site Title')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('hero_tagline')
                    ->label('Hero Tagline')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('cta_text')
                    ->label('CTA Button')
                    ->badge()
                    ->color('info'),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-m-pencil-square'),
            ])
            ->toolbarActions([]);
    }
}
