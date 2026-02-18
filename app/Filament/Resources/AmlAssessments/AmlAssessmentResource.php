<?php

namespace App\Filament\Resources\AmlAssessments;

use App\Filament\Resources\AmlAssessments\Pages\CreateAmlAssessment;
use App\Filament\Resources\AmlAssessments\Pages\EditAmlAssessment;
use App\Filament\Resources\AmlAssessments\Pages\ListAmlAssessments;
use App\Filament\Resources\AmlAssessments\Schemas\AmlAssessmentForm;
use App\Filament\Resources\AmlAssessments\Tables\AmlAssessmentsTable;
use App\Models\AmlAssessment;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class AmlAssessmentResource extends Resource
{
    protected static ?string $model = AmlAssessment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'AML';

    protected static ?string $navigationLabel = 'Valutazioni AML';

    public static function form(Schema $schema): Schema
    {
        return AmlAssessmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AmlAssessmentsTable::configure($table);
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
            'index' => ListAmlAssessments::route('/'),
            'create' => CreateAmlAssessment::route('/create'),
            'edit' => EditAmlAssessment::route('/{record}/edit'),
        ];
    }
}
