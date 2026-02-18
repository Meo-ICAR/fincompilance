<?php

namespace App\Filament\Resources\AmlWatchlistHits;

use App\Filament\Resources\AmlWatchlistHits\Pages\CreateAmlWatchlistHit;
use App\Filament\Resources\AmlWatchlistHits\Pages\EditAmlWatchlistHit;
use App\Filament\Resources\AmlWatchlistHits\Pages\ListAmlWatchlistHits;
use App\Filament\Resources\AmlWatchlistHits\Schemas\AmlWatchlistHitForm;
use App\Filament\Resources\AmlWatchlistHits\Tables\AmlWatchlistHitsTable;
use App\Models\AmlWatchlistHit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AmlWatchlistHitResource extends Resource
{
    protected static ?string $model = AmlWatchlistHit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedExclamationTriangle;

    protected static UnitEnum|string|null $navigationGroup = 'AML';

    protected static ?string $navigationLabel = 'Watchlist';

    public static function form(Schema $schema): Schema
    {
        return AmlWatchlistHitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AmlWatchlistHitsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAmlWatchlistHits::route('/'),
            'create' => CreateAmlWatchlistHit::route('/create'),
            'edit' => EditAmlWatchlistHit::route('/{record}/edit'),
        ];
    }
}
