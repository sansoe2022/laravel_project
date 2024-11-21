<?php

namespace App\Filament\Resources\HighLightResource\Pages;

use App\Filament\Resources\HighLightResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHighLights extends ListRecords
{
    protected static string $resource = HighLightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
