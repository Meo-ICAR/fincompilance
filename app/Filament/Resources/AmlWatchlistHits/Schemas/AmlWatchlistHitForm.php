<?php

namespace App\Filament\Resources\AmlWatchlistHits\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AmlWatchlistHitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('aml_assessment_id')
                    ->relationship('amlAssessment', 'id')
                    ->required(),
                TextInput::make('list_name')
                    ->required(),
                TextInput::make('match_type')
                    ->required(),
                Textarea::make('details')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_false_positive')
                    ->required(),
                Textarea::make('resolution_notes')
                    ->columnSpanFull(),
            ]);
    }
}
