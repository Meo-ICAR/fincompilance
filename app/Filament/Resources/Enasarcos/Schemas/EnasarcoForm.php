<?php

namespace App\Filament\Resources\Enasarcos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnasarcoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Competenza e tipo')
                    ->schema([
                        TextInput::make('competenza')
                            ->label('Anno competenza')
                            ->numeric()
                            ->required()
                            ->default(now()->year),
                        Select::make('enasarco')
                            ->label('Tipo ENASARCO')
                            ->options([
                                'monomandatario' => 'Monomandatario',
                                'plurimandatario' => 'Plurimandatario',
                                'societa' => 'Società',
                                'no' => 'No',
                            ]),
                    ])
                    ->columns(2),
                Section::make('Imponibili e contributi')
                    ->schema([
                        TextInput::make('minimo')
                            ->label('Minimo imponibile')
                            ->numeric(),
                        TextInput::make('massimo')
                            ->label('Massimo imponibile')
                            ->numeric(),
                        TextInput::make('minimale')
                            ->label('Contributo minimale')
                            ->numeric(),
                        TextInput::make('massimale')
                            ->label('Contributo massimale')
                            ->numeric(),
                        TextInput::make('aliquota_soc')
                            ->label('Aliquota società')
                            ->numeric(),
                        TextInput::make('aliquota_agente')
                            ->label('Aliquota agente')
                            ->numeric(),
                    ])
                    ->columns(2),
            ]);
    }
}
