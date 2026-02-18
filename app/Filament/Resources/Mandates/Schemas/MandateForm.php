<?php

namespace App\Filament\Resources\Mandates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MandateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('financial_id')
                    ->required()
                    ->numeric(),
                TextInput::make('codice_mandato_interno'),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date'),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('authorized_products'),
            ]);
    }
}
