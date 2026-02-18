<?php

namespace App\Filament\Resources\AmlAssessments\Pages;

use App\Filament\Resources\AmlAssessments\AmlAssessmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAmlAssessments extends ListRecords
{
    protected static string $resource = AmlAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('customer');
    }
}
