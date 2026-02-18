<?php

namespace App\Filament\Resources\Loans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'id'),
                TextInput::make('customer_fiscal_code')
                    ->required(),
                Select::make('agent_id')
                    ->relationship('agent', 'name'),
                TextInput::make('agent_fiscal_code')
                    ->required(),
                TextInput::make('mandante_id')
                    ->required()
                    ->numeric(),
                TextInput::make('practice_number')
                    ->required(),
                TextInput::make('internal_reference'),
                Select::make('product_type')
                    ->options([
                        'CQS' => 'C q s',
                        'CQP' => 'C q p',
                        'PRESTITO_PERSONALE' => 'P r e s t i t o  p e r s o n a l e',
                        'MUTUO' => 'M u t u o',
                        'TFS' => 'T f s',
                    ])
                    ->required(),
            ]);
    }
}
