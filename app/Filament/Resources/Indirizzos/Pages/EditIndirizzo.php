<?php

namespace App\Filament\Resources\Indirizzos\Pages;

use App\Filament\Resources\Indirizzos\IndirizzoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIndirizzo extends EditRecord
{
    protected static string $resource = IndirizzoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
