<?php

namespace App\Filament\Resources\Mandates\Pages;

use App\Filament\Resources\Mandates\MandateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMandates extends ListRecords
{
    protected static string $resource = MandateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('financialInstitution');
    }
}
