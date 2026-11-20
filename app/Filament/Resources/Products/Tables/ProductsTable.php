<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'),
                TextColumn::make('name')
                    ->label('Product Name')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('truckSeries.name')
                    ->label('Series')
                    ->badge()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Type / Variant')
                    ->searchable(),
                TextColumn::make('badge')
                    ->label('Badge')
                    ->badge()
                    ->color('info'),
                TextColumn::make('capacity')
                    ->label('Capacity'),
                IconColumn::make('is_featured')
                    ->label('Homepage')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                TextColumn::make('order_column')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('order_column', 'asc')
            ->filters([
                SelectFilter::make('truck_series_id')
                    ->label('Filter Series')
                    ->relationship('truckSeries', 'name'),
                Filter::make('featured')
                    ->label('Featured Only')
                    ->query(fn ($query) => $query->where('is_featured', true)),
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
