<?php

namespace App\Filament\Resources\Oams\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dati anagrafici')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required(),
                        TextInput::make('persona')
                            ->label('Persona')
                            ->required(),
                        TextInput::make('codice_fiscale')
                            ->label('Codice fiscale')
                            ->required(),
                        TextInput::make('autorizzato_ad_operare')
                            ->label('Autorizzato ad operare')
                            ->required(),
                        TextInput::make('domicilio_sede_legale')
                            ->label('Domicilio / Sede legale')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Iscrizione albo')
                    ->schema([
                        TextInput::make('numero_iscrizione')
                            ->label('Numero iscrizione')
                            ->required(),
                        DatePicker::make('data_iscrizione')
                            ->label('Data iscrizione'),
                        TextInput::make('elenco')
                            ->label('Elenco')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Stato')
                    ->schema([
                        TextInput::make('stato')
                            ->label('Stato')
                            ->required(),
                        DatePicker::make('data_stato')
                            ->label('Data stato'),
                        Textarea::make('causale_stato_note')
                            ->label('Note causale stato')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
