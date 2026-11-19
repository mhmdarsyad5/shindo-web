<?php

namespace App\Filament\Resources\ServiceSettings;

use App\Filament\Resources\ServiceSettings\Pages\EditServiceSetting;
use App\Filament\Resources\ServiceSettings\Pages\ListServiceSettings;
use App\Filament\Resources\ServiceSettings\Schemas\ServiceSettingForm;
use App\Filament\Resources\ServiceSettings\Tables\ServiceSettingsTable;
use App\Models\ServiceSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class ServiceSettingResource extends Resource
{
    protected static ?string $model = ServiceSetting::class;

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan Web';

    protected static ?string $navigationLabel = 'Halaman Layanan';

    protected static ?string $modelLabel = 'Pengaturan Halaman Layanan';

    protected static ?string $pluralModelLabel = 'Pengaturan Halaman Layanan';

    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    public static function form(Schema $schema): Schema
    {
        return ServiceSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceSettingsTable::configure($table);
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
            'index' => ListServiceSettings::route('/'),
            'edit' => EditServiceSetting::route('/{record}/edit'),
        ];
    }
}
