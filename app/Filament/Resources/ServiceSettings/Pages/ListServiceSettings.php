<?php

namespace App\Filament\Resources\ServiceSettings\Pages;

use App\Filament\Resources\ServiceSettings\ServiceSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceSettings extends ListRecords
{
    protected static string $resource = ServiceSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
