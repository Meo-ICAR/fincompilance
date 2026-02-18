<?php

namespace App\Filament\Resources\AmlWatchlistHits\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AmlWatchlistHitForm
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
                TextInput::make('list_name')
                    ->label('Nome lista')
                    ->required(),
                TextInput::make('match_type')
                    ->label('Tipo di match')
                    ->required(),
                Textarea::make('details')
                    ->label('Dettagli')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_false_positive')
                    ->label('Falso positivo')
                    ->required(),
                Textarea::make('resolution_notes')
                    ->label('Note risoluzione')
                    ->columnSpanFull(),
            ]);
    }
}
