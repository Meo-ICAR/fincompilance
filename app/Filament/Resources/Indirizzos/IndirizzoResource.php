<?php

namespace App\Filament\Resources\Indirizzos;

use App\Filament\Resources\Indirizzos\Pages\CreateIndirizzo;
use App\Filament\Resources\Indirizzos\Pages\EditIndirizzo;
use App\Filament\Resources\Indirizzos\Pages\ListIndirizzos;
use App\Filament\Resources\Indirizzos\Schemas\IndirizzoForm;
use App\Filament\Resources\Indirizzos\Tables\IndirizzosTable;
use App\Models\Indirizzo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IndirizzoResource extends Resource
{
    protected static ?string $model = Indirizzo::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    public static function form(Schema $schema): Schema
    {
        return IndirizzoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IndirizzosTable::configure($table);
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
            'index' => ListIndirizzos::route('/'),
            'create' => CreateIndirizzo::route('/create'),
            'edit' => EditIndirizzo::route('/{record}/edit'),
        ];
    }
}
