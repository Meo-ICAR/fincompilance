<?php

namespace App\Filament\Resources\AmlAssessments\Pages;

use App\Filament\Resources\AmlAssessments\AmlAssessmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAmlAssessment extends EditRecord
{
    protected static string $resource = AmlAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
