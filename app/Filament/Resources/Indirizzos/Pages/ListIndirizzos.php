<?php

namespace App\Filament\Resources\Indirizzos\Pages;

use App\Filament\Resources\Indirizzos\IndirizzoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIndirizzos extends ListRecords
{
    protected static string $resource = IndirizzoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
