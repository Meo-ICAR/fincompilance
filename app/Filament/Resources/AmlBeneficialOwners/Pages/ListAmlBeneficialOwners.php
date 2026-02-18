<?php

namespace App\Filament\Resources\AmlBeneficialOwners\Pages;

use App\Filament\Resources\AmlBeneficialOwners\AmlBeneficialOwnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAmlBeneficialOwners extends ListRecords
{
    protected static string $resource = AmlBeneficialOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
