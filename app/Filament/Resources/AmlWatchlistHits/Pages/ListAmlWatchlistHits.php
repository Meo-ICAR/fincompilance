<?php

namespace App\Filament\Resources\AmlWatchlistHits\Pages;

use App\Filament\Resources\AmlWatchlistHits\AmlWatchlistHitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAmlWatchlistHits extends ListRecords
{
    protected static string $resource = AmlWatchlistHitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('amlAssessment.customer');
    }
}
