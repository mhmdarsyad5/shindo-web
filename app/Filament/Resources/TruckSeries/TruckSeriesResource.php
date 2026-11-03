<?php

namespace App\Filament\Resources\TruckSeries;

use App\Filament\Resources\TruckSeries\Pages\CreateTruckSeries;
use App\Filament\Resources\TruckSeries\Pages\EditTruckSeries;
use App\Filament\Resources\TruckSeries\Pages\ListTruckSeries;
use App\Filament\Resources\TruckSeries\Schemas\TruckSeriesForm;
use App\Filament\Resources\TruckSeries\Tables\TruckSeriesTable;
use App\Models\TruckSeries;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TruckSeriesResource extends Resource
{
    protected static ?string $model = TruckSeries::class;

    protected static string|UnitEnum|null $navigationGroup = 'Katalog & Armada';

    protected static ?string $navigationLabel = 'Seri Truk';

    protected static ?string $modelLabel = 'Seri Truk';

    protected static ?string $pluralModelLabel = 'Seri Truk';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    public static function form(Schema $schema): Schema
    {
        return TruckSeriesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TruckSeriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTruckSeries::route('/'),
            'create' => CreateTruckSeries::route('/create'),
            'edit' => EditTruckSeries::route('/{record}/edit'),
        ];
    }
}
