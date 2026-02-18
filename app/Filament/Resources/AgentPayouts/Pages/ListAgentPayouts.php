<?php

namespace App\Filament\Resources\AgentPayouts\Pages;

use App\Filament\Resources\AgentPayouts\AgentPayoutResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgentPayouts extends ListRecords
{
    protected static string $resource = AgentPayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
