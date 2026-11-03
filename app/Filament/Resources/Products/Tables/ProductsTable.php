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
                    ->label('Foto Unit')
                    ->disk('public'),
                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->weight('bold')
                    ->searchable(),
                TextColumn::make('truckSeries.name')
                    ->label('Seri')
                    ->badge()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipe / Varian')
                    ->searchable(),
                TextColumn::make('badge')
                    ->label('Badge')
                    ->badge()
                    ->color('info'),
                TextColumn::make('capacity')
                    ->label('Kapasitas'),
                IconColumn::make('is_featured')
                    ->label('Homepage')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                TextColumn::make('order_column')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('order_column', 'asc')
            ->filters([
                SelectFilter::make('truck_series_id')
                    ->label('Filter Seri')
                    ->relationship('truckSeries', 'name'),
                Filter::make('featured')
                    ->label('Hanya Produk Unggulan')
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
