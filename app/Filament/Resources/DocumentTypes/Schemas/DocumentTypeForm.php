<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DocumentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('scope')
                    ->options([
                        'AGENT' => 'A g e n t',
                        'CUSTOMER' => 'C u s t o m e r',
                        'COMPANY' => 'C o m p a n y',
                        'MANDATE' => 'M a n d a t e',
                    ])
                    ->required(),
                TextInput::make('category'),
                Toggle::make('is_mandatory')
                    ->required(),
                Toggle::make('requires_expiration_date')
                    ->required(),
                Toggle::make('requires_number')
                    ->required(),
                Toggle::make('requires_issuer')
                    ->required(),
                TextInput::make('default_validity_months')
                    ->numeric(),
                TextInput::make('alert_days_before_expiry')
                    ->required()
                    ->numeric()
                    ->default(30),
                TextInput::make('allowed_mime_types'),
                Toggle::make('is_sensitive')
                    ->required(),
                TextInput::make('oam_mapping_code'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
