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
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('type')
                    ->required()
                    ->default('PF'),
                TextInput::make('ragione_sociale_o_cognome')
                    ->required(),
                TextInput::make('nome'),
                TextInput::make('codice_fiscale')
                    ->required(),
                TextInput::make('partita_iva'),
                Toggle::make('is_pep')
                    ->required(),
                Toggle::make('is_sanctioned')
                    ->required(),
            ]);
    }
}
