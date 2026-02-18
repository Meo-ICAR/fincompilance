<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Utente')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'PF' => 'Persona fisica',
                        'PG' => 'Persona giuridica',
                    ])
                    ->required()
                    ->default('PF'),
                TextInput::make('ragione_sociale_o_cognome')
                    ->label('Ragione sociale / Cognome')
                    ->required(),
                TextInput::make('nome')
                    ->label('Nome'),
                TextInput::make('codice_fiscale')
                    ->label('Codice fiscale')
                    ->required(),
                TextInput::make('partita_iva')
                    ->label('Partita IVA'),
                Toggle::make('is_pep')
                    ->label('PEP (persona politicamente esposta)')
                    ->required(),
                Toggle::make('is_sanctioned')
                    ->label('Sanzionato')
                    ->required(),
            ]);
    }
}
