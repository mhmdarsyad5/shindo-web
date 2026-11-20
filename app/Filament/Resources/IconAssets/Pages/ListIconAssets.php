<?php

namespace App\Filament\Resources\IconAssets\Pages;

use App\Filament\Resources\IconAssets\IconAssetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIconAssets extends ListRecords
{
    protected static string $resource = IconAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
