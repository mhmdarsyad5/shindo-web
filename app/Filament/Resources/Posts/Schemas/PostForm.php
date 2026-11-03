<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
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
                Section::make('Konten Artikel / Blog')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Judul Artikel')
                                ->placeholder('Judul berita atau artikel...')
                                ->required(),
                            TextInput::make('slug')
                                ->label('Slug (URL)')
                                ->placeholder('judul-berita-artikel')
                                ->required(),
                        ]),
                        FileUpload::make('image')
                            ->label('Gambar Utama / Cover')
                            ->image()
                            ->disk('public')
                            ->directory('homepage')
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),
                        Textarea::make('excerpt')
                            ->label('Ringkasan Singkat')
                            ->rows(3)
                            ->helperText('Teks singkat yang muncul di kartu artikel beranda.')
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->label('Isi Lengkap Artikel')
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            TextInput::make('url')
                                ->label('Tautan Kustom (Opsional)')
                                ->default('/blog'),
                            Toggle::make('is_featured')
                                ->label('Tampil di Beranda')
                                ->default(true)
                                ->inline(false),
                            Toggle::make('is_published')
                                ->label('Status Publish')
                                ->default(true)
                                ->inline(false),
                        ]),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now()),
                    ]),
            ]);
    }
}
