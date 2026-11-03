<?php

namespace App\Filament\Resources\SiteSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('navbar_logo')
                    ->label('Logo')
                    ->disk('public'),
                TextColumn::make('site_name')
                    ->label('Nama Situs')
                    ->weight('bold'),
                TextColumn::make('office_phone')
                    ->label('Telepon'),
                TextColumn::make('office_email')
                    ->label('Email'),
                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i'),
            ])
            ->recordActions([
                EditAction::make()->label('Kelola Pengaturan'),
            ]);
    }
}
