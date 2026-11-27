<?php

namespace App\Filament\Resources\BlogCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Category')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Category Name')
                                ->placeholder('Spare Parts')
                                ->required()
                                ->unique('blog_categories', 'name', ignoreRecord: true),

                            TextInput::make('slug')
                                ->label('Slug (Optional)')
                                ->placeholder('spare-parts')
                                ->helperText('Leave blank to auto-generate from name.')
                                ->unique('blog_categories', 'slug', ignoreRecord: true),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('order_column')
                                ->label('Sort Order')
                                ->numeric()
                                ->default(0),

                            Toggle::make('is_active')
                                ->label('Active')
                                ->default(true)
                                ->inline(false),
                        ]),
                    ]),
            ]);
    }
}
