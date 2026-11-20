<?php

namespace App\Filament\Resources\ContactSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_title')
                    ->label('Headline')
                    ->searchable()
                    ->limit(45),

                TextColumn::make('office_phone')
                    ->label('Phone')
                    ->badge()
                    ->color('info'),

                TextColumn::make('office_email')
                    ->label('Email')
                    ->badge(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-m-pencil-square'),
            ])
            ->toolbarActions([]);
    }
}
