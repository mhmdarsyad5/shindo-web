<?php

namespace App\Filament\Resources\TruckSeries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TruckSeriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'),
                TextColumn::make('name')
                    ->label('Series')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('badge')
                    ->label('Badge')
                    ->badge(),
                TextColumn::make('title')
                    ->label('Full Title')
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('order_column')
                    ->label('Order')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->defaultSort('order_column', 'asc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
