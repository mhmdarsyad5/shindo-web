<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Banner')
                    ->disk('public')
                    ->height(45)
                    ->width(60)
                    ->defaultImageUrl(fn ($record) => $record->resolveImageUrl($record->image, 'images/service-banner-facility.jpg')),
                TextColumn::make('title')
                    ->label('Service Name')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('icon')
                    ->label('Icon')
                    ->badge(),
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
