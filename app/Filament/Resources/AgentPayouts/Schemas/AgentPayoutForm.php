<?php

namespace App\Filament\Resources\AgentPayouts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AgentPayoutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Riferimenti')
                    ->schema([
                        Select::make('loan_id')
                            ->label('Finanziamento')
                            ->relationship('loan', 'practice_number', fn ($query) => $query->orderBy('practice_number'))
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('agent_id')
                            ->label('Agente')
                            ->relationship('agent', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Select::make('practice_commission_id')
                            ->label('Provvigione')
                            ->relationship('practiceCommission', 'id')
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2),
                Section::make('Importi e stato')
                    ->schema([
                        TextInput::make('calculation_base')
                            ->label('Base di calcolo')
                            ->required()
                            ->numeric(),
                        TextInput::make('percentage')
                            ->label('Percentuale')
                            ->required()
                            ->numeric(),
                        TextInput::make('amount_due')
                            ->label('Importo dovuto')
                            ->required()
                            ->numeric(),
                        Select::make('status')
                            ->label('Stato')
                            ->options([
                                'PENDING' => 'In attesa',
                                'APPROVED' => 'Approvato',
                                'PAID' => 'Pagato',
                                'HELD' => 'Trattenuto',
                            ])
                            ->default('PENDING')
                            ->required(),
                        DatePicker::make('paid_at')
                            ->label('Data pagamento'),
                        TextInput::make('agent_invoice_reference')
                            ->label('Riferimento fattura agente'),
                    ])
                    ->columns(2),
            ]);
    }
}
