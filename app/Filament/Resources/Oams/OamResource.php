<?php

namespace App\Filament\Resources\Oams;

use App\Filament\Resources\Oams\Pages\CreateOam;
use App\Filament\Resources\Oams\Pages\EditOam;
use App\Filament\Resources\Oams\Pages\ListOams;
use App\Filament\Resources\Oams\Schemas\OamForm;
use App\Filament\Resources\Oams\Tables\OamsTable;
use App\Models\Oam;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class OamResource extends Resource
{
    protected static ?string $model = Oam::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static UnitEnum|string|null $navigationGroup = 'OAM / Elenchi';

    protected static ?string $navigationLabel = 'Albo OAM';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return OamForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OamsTable::configure($table);
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
            'index' => ListOams::route('/'),
            'create' => CreateOam::route('/create'),
            'edit' => EditOam::route('/{record}/edit'),
        ];
    }
}
