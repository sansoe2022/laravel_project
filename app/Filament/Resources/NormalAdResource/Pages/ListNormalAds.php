<?php

namespace App\Filament\Resources\NormalAdResource\Pages;

use App\Filament\Resources\NormalAdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNormalAds extends ListRecords
{
    protected static string $resource = NormalAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
