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
                    ->label('Valutazione AML')
                    ->relationship(
                        'amlAssessment',
                        'id',
                        fn ($query) => $query->with('customer')->orderBy('id')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => "Val. #{$record->id} – {$record->customer?->ragione_sociale_o_cognome}")
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('cognome')
                    ->label('Cognome')
                    ->required(),
                TextInput::make('nome')
                    ->label('Nome')
                    ->required(),
                TextInput::make('codice_fiscale')
                    ->label('Codice fiscale')
                    ->required(),
                DatePicker::make('data_nascita')
                    ->label('Data nascita')
                    ->required(),
                TextInput::make('comune_nascita')
                    ->label('Comune nascita')
                    ->required(),
                TextInput::make('ownership_percentage')
                    ->label('Percentuale partecipazione')
                    ->required()
                    ->numeric(),
                Toggle::make('is_indirect_ownership')
                    ->label('Partecipazione indiretta')
                    ->required(),
            ]);
    }
}
