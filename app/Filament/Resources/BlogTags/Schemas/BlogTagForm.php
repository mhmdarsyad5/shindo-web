<?php

namespace App\Filament\Resources\BlogTags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Tag')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Tag Name')
                                ->placeholder('Weichai')
                                ->required()
                                ->unique('blog_tags', 'name', ignoreRecord: true),

                            TextInput::make('slug')
                                ->label('Slug (Optional)')
                                ->placeholder('weichai')
                                ->helperText('Leave blank to auto-generate from name.')
                                ->unique('blog_tags', 'slug', ignoreRecord: true),
                        ]),
                    ]),
            ]);
    }
}
