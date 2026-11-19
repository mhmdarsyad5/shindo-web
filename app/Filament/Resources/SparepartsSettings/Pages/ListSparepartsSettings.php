<?php

namespace App\Filament\Resources\SparepartsSettings\Pages;

use App\Filament\Resources\SparepartsSettings\SparepartsSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSparepartsSettings extends ListRecords
{
    protected static string $resource = SparepartsSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
