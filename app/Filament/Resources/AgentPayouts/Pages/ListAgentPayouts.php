<?php

namespace App\Filament\Resources\AgentPayouts\Pages;

use App\Filament\Resources\AgentPayouts\AgentPayoutResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAgentPayouts extends ListRecords
{
    protected static string $resource = AgentPayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['loan', 'agent', 'practiceCommission']);
    }
}
