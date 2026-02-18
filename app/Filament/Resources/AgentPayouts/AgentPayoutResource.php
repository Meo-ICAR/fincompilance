<?php

namespace App\Filament\Resources\AgentPayouts;

use App\Filament\Resources\AgentPayouts\Pages\CreateAgentPayout;
use App\Filament\Resources\AgentPayouts\Pages\EditAgentPayout;
use App\Filament\Resources\AgentPayouts\Pages\ListAgentPayouts;
use App\Filament\Resources\AgentPayouts\Schemas\AgentPayoutForm;
use App\Filament\Resources\AgentPayouts\Tables\AgentPayoutsTable;
use App\Models\AgentPayout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class AgentPayoutResource extends Resource
{
    protected static ?string $model = AgentPayout::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'AML';

    protected static ?string $navigationLabel = 'Payout Agenti';

    public static function form(Schema $schema): Schema
    {
        return AgentPayoutForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgentPayoutsTable::configure($table);
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
            'index' => ListAgentPayouts::route('/'),
            'create' => CreateAgentPayout::route('/create'),
            'edit' => EditAgentPayout::route('/{record}/edit'),
        ];
    }
}
