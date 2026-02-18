<?php

namespace App\Filament\Resources\AmlBeneficialOwners;

use App\Filament\Resources\AmlBeneficialOwners\Pages\CreateAmlBeneficialOwner;
use App\Filament\Resources\AmlBeneficialOwners\Pages\EditAmlBeneficialOwner;
use App\Filament\Resources\AmlBeneficialOwners\Pages\ListAmlBeneficialOwners;
use App\Filament\Resources\AmlBeneficialOwners\Schemas\AmlBeneficialOwnerForm;
use App\Filament\Resources\AmlBeneficialOwners\Tables\AmlBeneficialOwnersTable;
use App\Models\AmlBeneficialOwner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AmlBeneficialOwnerResource extends Resource
{
    protected static ?string $model = AmlBeneficialOwner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'AML';

    protected static ?string $navigationLabel = 'Beneficiari';

    public static function form(Schema $schema): Schema
    {
        return AmlBeneficialOwnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AmlBeneficialOwnersTable::configure($table);
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
            'index' => ListAmlBeneficialOwners::route('/'),
            'create' => CreateAmlBeneficialOwner::route('/create'),
            'edit' => EditAmlBeneficialOwner::route('/{record}/edit'),
        ];
    }
}
