<?php

namespace App\Filament\Resources\IconAssets;

use App\Filament\Resources\IconAssets\Pages\CreateIconAsset;
use App\Filament\Resources\IconAssets\Pages\EditIconAsset;
use App\Filament\Resources\IconAssets\Pages\ListIconAssets;
use App\Filament\Resources\IconAssets\Schemas\IconAssetForm;
use App\Filament\Resources\IconAssets\Tables\IconAssetsTable;
use App\Models\IconAsset;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class IconAssetResource extends Resource
{
    protected static ?string $model = IconAsset::class;

    protected static string|UnitEnum|null $navigationGroup = 'Site Settings';

    protected static ?string $navigationLabel = 'Icons & Assets';

    protected static ?string $modelLabel = 'Icon & Asset';

    protected static ?string $pluralModelLabel = 'Icons & Assets';

    protected static ?int $navigationSort = 7;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    public static function form(Schema $schema): Schema
    {
        return IconAssetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IconAssetsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIconAssets::route('/'),
            'create' => CreateIconAsset::route('/create'),
            'edit' => EditIconAsset::route('/{record}/edit'),
        ];
    }
}
