<?php

namespace App\Filament\Resources\AgentPayouts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AgentPayoutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('loan_id')
                    ->relationship('loan', 'id')
                    ->required(),
                Select::make('agent_id')
                    ->relationship('agent', 'name')
                    ->required(),
                Select::make('practice_commission_id')
                    ->relationship('practiceCommission', 'id'),
                TextInput::make('amount_due')
                    ->required()
                    ->numeric(),
                TextInput::make('calculation_base')
                    ->required()
                    ->numeric(),
                TextInput::make('percentage')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'PENDING' => 'P e n d i n g',
                        'APPROVED' => 'A p p r o v e d',
                        'PAID' => 'P a i d',
                        'HELD' => 'H e l d',
                    ])
                    ->default('PENDING')
                    ->required(),
                DatePicker::make('paid_at'),
                TextInput::make('agent_invoice_reference'),
            ]);
    }
}
