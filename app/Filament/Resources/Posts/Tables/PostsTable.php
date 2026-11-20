<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Cover')
                    ->disk('public'),
                TextColumn::make('title')
                    ->label('Title')
                    ->weight('bold')
                    ->searchable()
                    ->limit(40),
                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->placeholder('-'),
                TextColumn::make('excerpt')
                    ->label('Excerpt')
                    ->limit(50)
                    ->toggleable(),
                IconColumn::make('is_featured')
                    ->label('Homepage')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->label('Published Date')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('featured')
                    ->label('Featured Only')
                    ->query(fn ($query) => $query->where('is_featured', true)),
                Filter::make('published')
                    ->label('Published Only')
                    ->query(fn ($query) => $query->where('is_published', true)),
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
