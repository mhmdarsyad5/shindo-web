<?php

namespace App\Filament\Resources\SparepartsSettings\Pages;

use App\Filament\Resources\SparepartsSettings\SparepartsSettingResource;
use Filament\Resources\Pages\EditRecord;

class EditSparepartsSetting extends EditRecord
{
    protected static string $resource = SparepartsSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}
