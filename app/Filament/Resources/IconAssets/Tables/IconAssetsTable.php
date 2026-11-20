<?php

namespace App\Filament\Resources\IconAssets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IconAssetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_path')
                    ->label('Preview')
                    ->disk('public')
                    ->height(40)
                    ->width(40),

                TextColumn::make('title')
                    ->label('Name')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('key')
                    ->label('Key / Identifier')
                    ->badge()
                    ->color('info')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->placeholder('-')
                    ->searchable(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
