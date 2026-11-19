<?php

namespace App\Filament\Resources\AboutSettings;

use App\Filament\Resources\AboutSettings\Pages\EditAboutSetting;
use App\Filament\Resources\AboutSettings\Pages\ListAboutSettings;
use App\Filament\Resources\AboutSettings\Schemas\AboutSettingForm;
use App\Filament\Resources\AboutSettings\Tables\AboutSettingsTable;
use App\Models\AboutSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class AboutSettingResource extends Resource
{
    protected static ?string $model = AboutSetting::class;

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan Web';

    protected static ?string $navigationLabel = 'Halaman Tentang Kami';

    protected static ?string $modelLabel = 'Pengaturan Tentang Kami';

    protected static ?string $pluralModelLabel = 'Pengaturan Tentang Kami';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    public static function form(Schema $schema): Schema
    {
        return AboutSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutSettingsTable::configure($table);
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
            'index' => ListAboutSettings::route('/'),
            'edit' => EditAboutSetting::route('/{record}/edit'),
        ];
    }
}
