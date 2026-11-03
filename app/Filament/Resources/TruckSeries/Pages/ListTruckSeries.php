<?php

namespace App\Filament\Resources\TruckSeries\Pages;

use App\Filament\Resources\TruckSeries\TruckSeriesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTruckSeries extends ListRecords
{
    protected static string $resource = TruckSeriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
