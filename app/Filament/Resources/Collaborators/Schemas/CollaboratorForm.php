<?php

namespace App\Filament\Resources\Collaborators\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CollaboratorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Azienda e anagrafica')
                    ->schema([
                        Select::make('company_id')
                            ->label('Azienda')
                            ->relationship('company', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('name')
                            ->label('Cognome')
                            ->required(),
                        TextInput::make('firstname')
                            ->label('Nome')
                            ->required(),
                        TextInput::make('codice_fiscale')
                            ->label('Codice fiscale')
                            ->required(),
                        TextInput::make('oam_code')
                            ->label('Codice OAM')
                            ->required(),
                        DatePicker::make('birth_date')
                            ->label('Data nascita'),
                        TextInput::make('birth_place')
                            ->label('Luogo nascita'),
                        TextInput::make('codice_interno_sede')
                            ->label('Codice interno sede'),
                    ])
                    ->columns(2),
                Section::make('Contatti')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefono')
                            ->tel()
                            ->required(),
                        TextInput::make('mobile')
                            ->label('Cellulare'),
                    ])
                    ->columns(2),
                Section::make('Rapporto di lavoro')
                    ->schema([
                        DatePicker::make('hire_date')
                            ->label('Data assunzione')
                            ->required(),
                        DatePicker::make('end_date')
                            ->label('Data cessazione'),
                        Toggle::make('active')
                            ->label('Attivo')
                            ->required(),
                        Textarea::make('notes')
                            ->label('Note')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
