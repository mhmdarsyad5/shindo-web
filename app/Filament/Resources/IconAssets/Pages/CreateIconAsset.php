<?php

namespace App\Filament\Resources\IconAssets\Pages;

use App\Filament\Resources\IconAssets\IconAssetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIconAsset extends CreateRecord
{
    protected static string $resource = IconAssetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
