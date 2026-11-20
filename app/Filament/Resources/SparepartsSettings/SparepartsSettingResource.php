<?php

namespace App\Filament\Resources\SparepartsSettings;

use App\Filament\Resources\SparepartsSettings\Pages\EditSparepartsSetting;
use App\Filament\Resources\SparepartsSettings\Pages\ListSparepartsSettings;
use App\Filament\Resources\SparepartsSettings\Schemas\SparepartsSettingForm;
use App\Filament\Resources\SparepartsSettings\Tables\SparepartsSettingsTable;
use App\Models\SparepartsSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class SparepartsSettingResource extends Resource
{
    protected static ?string $model = SparepartsSetting::class;

    protected static string|UnitEnum|null $navigationGroup = 'Site Settings';

    protected static ?string $navigationLabel = 'Spareparts Page';

    protected static ?string $modelLabel = 'Spareparts Page';

    protected static ?string $pluralModelLabel = 'Spareparts Pages';

    protected static ?int $navigationSort = 4;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    public static function form(Schema $schema): Schema
    {
        return SparepartsSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SparepartsSettingsTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSparepartsSettings::route('/'),
            'edit' => EditSparepartsSetting::route('/{record}/edit'),
        ];
    }
}
