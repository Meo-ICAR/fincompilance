<?php

namespace App\Filament\Resources\AmlBeneficialOwners\Pages;

use App\Filament\Resources\AmlBeneficialOwners\AmlBeneficialOwnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAmlBeneficialOwner extends EditRecord
{
    protected static string $resource = AmlBeneficialOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
