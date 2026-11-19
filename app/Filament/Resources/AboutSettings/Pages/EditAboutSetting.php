<?php

namespace App\Filament\Resources\AboutSettings\Pages;

use App\Filament\Resources\AboutSettings\AboutSettingResource;
use Filament\Resources\Pages\EditRecord;

class EditAboutSetting extends EditRecord
{
    protected static string $resource = AboutSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}
