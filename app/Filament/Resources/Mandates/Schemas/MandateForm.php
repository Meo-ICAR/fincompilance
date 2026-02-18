<?php

namespace App\Filament\Resources\Mandates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MandateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('financial_institution_id')
                    ->label('Istituto finanziario')
                    ->relationship('financialInstitution', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('codice_mandato_interno')
                    ->label('Codice mandato interno'),
                DatePicker::make('start_date')
                    ->label('Data inizio')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('Data fine'),
                Toggle::make('is_active')
                    ->label('Attivo')
                    ->required(),
                TextInput::make('authorized_products')
                    ->label('Prodotti autorizzati'),
            ]);
    }
}
