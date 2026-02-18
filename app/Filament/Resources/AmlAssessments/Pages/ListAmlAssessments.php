<?php

namespace App\Filament\Resources\AmlAssessments\Pages;

use App\Filament\Resources\AmlAssessments\AmlAssessmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAmlAssessments extends ListRecords
{
    protected static string $resource = AmlAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
