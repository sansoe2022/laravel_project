<?php

namespace App\Filament\Resources\HighLightResource\Pages;

use App\Filament\Resources\HighLightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHighLight extends EditRecord
{
    protected static string $resource = HighLightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
