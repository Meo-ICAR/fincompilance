<?php

namespace App\Filament\Resources\Comunes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ComuneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Codici identificativi')
                    ->schema([
                        TextInput::make('codice_regione')
                            ->label('Cod. regione')
                            ->required(),
                        TextInput::make('codice_unita_territoriale')
                            ->label('Cod. unità territoriale')
                            ->required(),
                        TextInput::make('codice_provincia_storico')
                            ->label('Cod. provincia storico')
                            ->required(),
                        TextInput::make('progressivo_comune')
                            ->label('Progressivo comune')
                            ->required(),
                        TextInput::make('codice_comune_alfanumerico')
                            ->label('Cod. comune alfanumerico')
                            ->required(),
                        TextInput::make('codice_comune_numerico')
                            ->label('Cod. comune numerico')
                            ->required(),
                        TextInput::make('codice_catastale')
                            ->label('Cod. catastale')
                            ->required(),
                        TextInput::make('sigla_automobilistica')
                            ->label('Sigla automobilistica')
                            ->required(),
                        Toggle::make('capoluogo_provincia')
                            ->label('Capoluogo provincia')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Denominazioni')
                    ->schema([
                        TextInput::make('denominazione')
                            ->label('Denominazione')
                            ->required(),
                        TextInput::make('denominazione_italiano')
                            ->label('Denominazione italiano')
                            ->required(),
                        TextInput::make('denominazione_altra_lingua')
                            ->label('Denominazione altra lingua'),
                        TextInput::make('denominazione_regione')
                            ->label('Regione')
                            ->required(),
                        TextInput::make('denominazione_unita_territoriale')
                            ->label('Unità territoriale')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Ripartizione e tipologia')
                    ->schema([
                        TextInput::make('codice_ripartizione_geografica')
                            ->label('Cod. ripartizione geografica')
                            ->required(),
                        TextInput::make('ripartizione_geografica')
                            ->label('Ripartizione geografica')
                            ->required(),
                        TextInput::make('tipologia_unita_territoriale')
                            ->label('Tipologia unità territoriale')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Codici provincia e NUTS')
                    ->schema([
                        TextInput::make('codice_comune_110_province')
                            ->label('Cod. 110 province')
                            ->required(),
                        TextInput::make('codice_comune_107_province')
                            ->label('Cod. 107 province')
                            ->required(),
                        TextInput::make('codice_comune_103_province')
                            ->label('Cod. 103 province')
                            ->required(),
                        TextInput::make('codice_nuts1_2021')
                            ->label('NUTS1 2021')
                            ->required(),
                        TextInput::make('codice_nuts2_2021')
                            ->label('NUTS2 2021')
                            ->required(),
                        TextInput::make('codice_nuts3_2021')
                            ->label('NUTS3 2021')
                            ->required(),
                        TextInput::make('codice_nuts1_2024')
                            ->label('NUTS1 2024')
                            ->required(),
                        TextInput::make('codice_nuts2_2024')
                            ->label('NUTS2 2024')
                            ->required(),
                        TextInput::make('codice_nuts3_2024')
                            ->label('NUTS3 2024')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
}
