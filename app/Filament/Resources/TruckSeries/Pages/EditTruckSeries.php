<?php

namespace App\Filament\Resources\TruckSeries\Pages;

use App\Filament\Resources\TruckSeries\TruckSeriesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTruckSeries extends EditRecord
{
    protected static string $resource = TruckSeriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
