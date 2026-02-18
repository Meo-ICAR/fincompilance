<?php

namespace App\Filament\Resources\PracticeCommissions\Pages;

use App\Filament\Resources\PracticeCommissions\PracticeCommissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPracticeCommissions extends ListRecords
{
    protected static string $resource = PracticeCommissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('loan');
    }
}
