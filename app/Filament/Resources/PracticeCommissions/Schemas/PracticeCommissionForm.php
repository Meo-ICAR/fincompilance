<?php

namespace App\Filament\Resources\PracticeCommissions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PracticeCommissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('loan_id')
                    ->relationship('loan', 'id')
                    ->required(),
                Select::make('payer_type')
                    ->options(['MANDANTE' => 'M a n d a n t e', 'CLIENTE' => 'C l i e n t e'])
                    ->required(),
                TextInput::make('type')
                    ->required()
                    ->default('UPFRONT'),
                TextInput::make('amount_gross')
                    ->required()
                    ->numeric(),
                TextInput::make('vat_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('amount_total')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'EXPECTED' => 'E x p e c t e d',
                        'INVOICED' => 'I n v o i c e d',
                        'PAID' => 'P a i d',
                        'CANCELLED' => 'C a n c e l l e d',
                    ])
                    ->default('EXPECTED')
                    ->required(),
                DatePicker::make('accrual_date'),
                DatePicker::make('payment_date'),
                TextInput::make('invoice_number'),
                Toggle::make('is_retrocession_eligible')
                    ->required(),
            ]);
    }
}
