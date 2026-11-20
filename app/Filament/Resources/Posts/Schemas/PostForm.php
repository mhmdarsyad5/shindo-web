<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Support\CmsImageField;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post Content')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->placeholder('Post title...')
                                ->required(),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('post-title-slug')
                                ->required(),
                        ]),
                        CmsImageField::make(
                            name: 'image',
                            label: 'Cover Image',
                            directory: 'homepage',
                            defaultFallbackAsset: 'homepage/blog-dump-truck.jpg',
                        ),
                        Textarea::make('excerpt')
                            ->label('Excerpt')
                            ->rows(3)
                            ->helperText('Short summary displayed on blog cards.')
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->label('Article Content')
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            TextInput::make('url')
                                ->label('Custom URL (Optional)')
                                ->default('/blog'),
                            Toggle::make('is_featured')
                                ->label('Featured on Homepage')
                                ->default(true)
                                ->inline(false),
                            Toggle::make('is_published')
                                ->label('Published')
                                ->default(true)
                                ->inline(false),
                        ]),
                        DateTimePicker::make('published_at')
                            ->label('Published Date')
                            ->default(now()),
                    ]),
            ]);
    }
}
