<?php

namespace App\Filament\Resources\NewsFakeResource\Pages;

use App\Filament\Resources\NewsFakeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsFake extends EditRecord
{
    protected static string $resource = NewsFakeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
