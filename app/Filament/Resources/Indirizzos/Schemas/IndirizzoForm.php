<?php

namespace App\Filament\Resources\Indirizzos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class IndirizzoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Indirizzo')
                    ->schema([
                        TextInput::make('tipo_indirizzo')
                            ->label('Tipo indirizzo'),
                        TextInput::make('indirizzo')
                            ->label('Via / Piazza')
                            ->required(),
                        TextInput::make('numero_civico')
                            ->label('N. civico'),
                        TextInput::make('cap')
                            ->label('CAP'),
                        TextInput::make('comune')
                            ->label('Comune'),
                        TextInput::make('provincia')
                            ->label('Provincia'),
                        TextInput::make('codice_stato_estero')
                            ->label('Cod. stato estero'),
                        TextInput::make('codice_interno_sede')
                            ->label('Codice interno sede'),
                    ])
                    ->columns(2),
            ]);
    }
}
