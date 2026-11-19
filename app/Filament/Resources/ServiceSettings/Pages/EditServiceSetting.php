<?php

namespace App\Filament\Resources\ServiceSettings\Pages;

use App\Filament\Resources\ServiceSettings\ServiceSettingResource;
use Filament\Resources\Pages\EditRecord;

class EditServiceSetting extends EditRecord
{
    protected static string $resource = ServiceSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}
