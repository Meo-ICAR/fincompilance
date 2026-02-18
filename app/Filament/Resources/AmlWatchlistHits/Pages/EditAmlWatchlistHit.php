<?php

namespace App\Filament\Resources\AmlWatchlistHits\Pages;

use App\Filament\Resources\AmlWatchlistHits\AmlWatchlistHitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAmlWatchlistHit extends EditRecord
{
    protected static string $resource = AmlWatchlistHitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
