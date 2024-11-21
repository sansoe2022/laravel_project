<?php

namespace App\Filament\Resources\NewsFakeResource\Pages;

use App\Filament\Resources\NewsFakeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsFakes extends ListRecords
{
    protected static string $resource = NewsFakeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
