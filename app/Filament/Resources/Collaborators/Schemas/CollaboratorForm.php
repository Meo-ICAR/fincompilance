<?php

namespace App\Filament\Resources\Collaborators\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CollaboratorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('firstname')
                    ->required(),
                TextInput::make('codice_fiscale')
                    ->required(),
                TextInput::make('oam_code')
                    ->required(),
                DatePicker::make('birth_date'),
                TextInput::make('birth_place'),
                TextInput::make('codice_interno_sede'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('mobile'),
                DatePicker::make('hire_date')
                    ->required(),
                DatePicker::make('end_date'),
                Toggle::make('active')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
