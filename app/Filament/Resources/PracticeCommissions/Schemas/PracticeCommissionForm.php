<?php

namespace App\Filament\Resources\PracticeCommissions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PracticeCommissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Riferimenti e tipo')
                    ->schema([
                        Select::make('loan_id')
                            ->label('Finanziamento')
                            ->relationship('loan', 'practice_number', fn ($query) => $query->orderBy('practice_number'))
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('payer_type')
                            ->label('Pagante')
                            ->options([
                                'MANDANTE' => 'Mandante',
                                'CLIENTE' => 'Cliente',
                            ])
                            ->required(),
                        Select::make('type')
                            ->label('Tipo')
                            ->options([
                                'UPFRONT' => 'Upfront',
                                'BACKEND' => 'Backend',
                            ])
                            ->required()
                            ->default('UPFRONT'),
                    ])
                    ->columns(2),
                Section::make('Importi')
                    ->schema([
                        TextInput::make('amount_gross')
                            ->label('Imponibile')
                            ->required()
                            ->numeric(),
                        TextInput::make('vat_amount')
                            ->label('IVA')
                            ->required()
                            ->numeric()
                            ->default(0),
                        TextInput::make('amount_total')
                            ->label('Totale')
                            ->required()
                            ->numeric(),
                    ])
                    ->columns(2),
                Section::make('Stato e date')
                    ->schema([
                        Select::make('status')
                            ->label('Stato')
                            ->options([
                                'EXPECTED' => 'Atteso',
                                'INVOICED' => 'Fatturato',
                                'PAID' => 'Pagato',
                                'CANCELLED' => 'Annullato',
                            ])
                            ->default('EXPECTED')
                            ->required(),
                        DatePicker::make('accrual_date')
                            ->label('Data competenza'),
                        DatePicker::make('payment_date')
                            ->label('Data pagamento'),
                        TextInput::make('invoice_number')
                            ->label('Numero fattura'),
                        Toggle::make('is_retrocession_eligible')
                            ->label('Retrocedibile')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
}
