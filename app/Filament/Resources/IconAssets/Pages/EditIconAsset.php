<?php

namespace App\Filament\Resources\IconAssets\Pages;

use App\Filament\Resources\IconAssets\IconAssetResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIconAsset extends EditRecord
{
    protected static string $resource = IconAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
