<?php

namespace App\Filament\Resources\Financials\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FinancialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('abi_code')
                    ->label('Codice ABI')
                    ->required(),
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'BANCA' => 'Banca',
                        'INTERMEDIARIO_106' => 'Intermediario 106',
                        'IP_IMEL' => 'IP/IMEL',
                    ])
                    ->required(),
                TextInput::make('capogruppo')
                    ->label('Capogruppo'),
                Select::make('status')
                    ->label('Stato')
                    ->options([
                        'OPERATIVO' => 'Operativo',
                        'SOSPESO' => 'Sospeso',
                    ])
                    ->required()
                    ->default('OPERATIVO'),
                DatePicker::make('data_iscrizione')
                    ->label('Data iscrizione'),
                DatePicker::make('data_cancellazione')
                    ->label('Data cancellazione'),
            ]);
    }
}
