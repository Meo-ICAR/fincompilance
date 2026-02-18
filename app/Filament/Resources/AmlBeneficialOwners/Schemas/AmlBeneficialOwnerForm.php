<?php

namespace App\Filament\Resources\AmlBeneficialOwners\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AmlBeneficialOwnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('aml_assessment_id')
                    ->relationship('amlAssessment', 'id')
                    ->required(),
                TextInput::make('nome')
                    ->required(),
                TextInput::make('cognome')
                    ->required(),
                TextInput::make('codice_fiscale')
                    ->required(),
                DatePicker::make('data_nascita')
                    ->required(),
                TextInput::make('comune_nascita')
                    ->required(),
                TextInput::make('ownership_percentage')
                    ->required()
                    ->numeric(),
                Toggle::make('is_indirect_ownership')
                    ->required(),
            ]);
    }
}
