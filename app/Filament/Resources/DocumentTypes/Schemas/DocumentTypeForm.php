<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identificazione')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required(),
                        Select::make('scope')
                            ->label('Ambito')
                            ->options([
                                'AGENT' => 'Agente',
                                'CUSTOMER' => 'Cliente',
                                'COMPANY' => 'Azienda',
                                'MANDATE' => 'Mandato',
                            ])
                            ->required(),
                        TextInput::make('category')
                            ->label('Categoria'),
                        TextInput::make('oam_mapping_code')
                            ->label('Codice mapping OAM'),
                    ])
                    ->columns(2),
                Section::make('Requisiti')
                    ->schema([
                        Toggle::make('is_mandatory')
                            ->label('Obbligatorio')
                            ->required(),
                        Toggle::make('requires_expiration_date')
                            ->label('Richiede data scadenza')
                            ->required(),
                        Toggle::make('requires_number')
                            ->label('Richiede numero')
                            ->required(),
                        Toggle::make('requires_issuer')
                            ->label('Richiede emittente')
                            ->required(),
                        TextInput::make('default_validity_months')
                            ->label('Validità default (mesi)')
                            ->numeric(),
                        TextInput::make('alert_days_before_expiry')
                            ->label('Giorni alert prima scadenza')
                            ->required()
                            ->numeric()
                            ->default(30),
                        TextInput::make('allowed_mime_types')
                            ->label('MIME types consentiti'),
                        Toggle::make('is_sensitive')
                            ->label('Dato sensibile (GDPR)')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Stato')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Attivo')
                            ->required(),
                    ]),
            ]);
    }
}
