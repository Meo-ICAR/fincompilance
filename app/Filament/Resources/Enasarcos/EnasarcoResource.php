<?php

namespace App\Filament\Resources\Enasarcos;

use App\Filament\Resources\Enasarcos\Pages\CreateEnasarco;
use App\Filament\Resources\Enasarcos\Pages\EditEnasarco;
use App\Filament\Resources\Enasarcos\Pages\ListEnasarcos;
use App\Filament\Resources\Enasarcos\Schemas\EnasarcoForm;
use App\Filament\Resources\Enasarcos\Tables\EnasarcosTable;
use App\Models\Enasarco;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EnasarcoResource extends Resource
{
    protected static ?string $model = Enasarco::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingLibrary;

    protected static ?string $recordTitleAttribute = 'name';

    protected static UnitEnum|string|null $navigationGroup = 'Anagrafiche';

    protected static ?string $navigationLabel = 'Enasarco';

    public static function form(Schema $schema): Schema
    {
        return EnasarcoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnasarcosTable::configure($table);
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
            'index' => ListEnasarcos::route('/'),
            'create' => CreateEnasarco::route('/create'),
            'edit' => EditEnasarco::route('/{record}/edit'),
        ];
    }
}
