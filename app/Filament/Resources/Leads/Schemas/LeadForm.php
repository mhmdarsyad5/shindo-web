<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact & Company Details')
                    ->description('Inquiry details submitted via the website form.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Full Name')
                                ->required(),
                            TextInput::make('phone')
                                ->label('Phone / WhatsApp')
                                ->tel()
                                ->required(),
                            TextInput::make('email')
                                ->label('Email Address')
                                ->email(),
                            TextInput::make('company')
                                ->label('Company / Project')
                                ->placeholder('Company name'),
                        ]),
                    ]),

                Section::make('Fleet Requirements')
                    ->schema([
                        Textarea::make('notes')
                            ->label('Notes & Specifications')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Status & Attribution')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('source')
                                ->label('Source')
                                ->options([
                                    'homepage' => 'Homepage',
                                    'contact_page' => 'Contact Page',
                                ])
                                ->disabled(),
                            Select::make('status')
                                ->label('Status')
                                ->options([
                                    'new' => 'New',
                                    'contacted' => 'Contacted',
                                    'in_negotiation' => 'In Negotiation',
                                    'closed_won' => 'Won',
                                    'closed_lost' => 'Lost',
                                ])
                                ->required()
                                ->default('new'),
                        ]),
                    ]),
            ]);
    }
}
