<?php

namespace App\Filament\Resources\NewsFakeResource\Pages;

use App\Filament\Resources\NewsFakeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsFake extends CreateRecord
{
    protected static string $resource = NewsFakeResource::class;
}
