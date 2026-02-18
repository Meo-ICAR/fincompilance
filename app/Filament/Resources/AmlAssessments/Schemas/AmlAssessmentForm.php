<?php

namespace App\Filament\Resources\AmlAssessments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AmlAssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Cliente e date')
                    ->schema([
                        Select::make('customer_id')
                            ->label('Cliente')
                            ->relationship('customer', 'ragione_sociale_o_cognome', fn ($query) => $query->orderBy('ragione_sociale_o_cognome'))
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('performed_by')
                            ->label('Eseguito da (user id)')
                            ->required()
                            ->numeric(),
                        DateTimePicker::make('performed_at')
                            ->label('Data valutazione')
                            ->required(),
                        DatePicker::make('next_review_date')
                            ->label('Prossima revisione')
                            ->required(),
                        Select::make('status')
                            ->label('Stato')
                            ->options([
                                'PENDING' => 'In attesa',
                                'APPROVED' => 'Approvato',
                                'REJECTED' => 'Rifiutato',
                                'EXPIRED' => 'Scaduto',
                            ])
                            ->default('PENDING')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Rischio e due diligence')
                    ->schema([
                        Select::make('risk_level')
                            ->label('Livello rischio')
                            ->options([
                                'BASSO' => 'Basso',
                                'MEDIO' => 'Medio',
                                'ALTO' => 'Alto',
                                'MOLTO_ALTO' => 'Molto alto',
                            ])
                            ->required(),
                        TextInput::make('risk_score')
                            ->label('Punteggio rischio')
                            ->numeric(),
                        Select::make('due_diligence_type')
                            ->label('Tipo due diligence')
                            ->options([
                                'SEMPLIFICATA' => 'Semplificata',
                                'ORDINARIA' => 'Ordinaria',
                                'RAFFORZATA' => 'Rafforzata',
                            ])
                            ->required(),
                        TextInput::make('origine_fondi')
                            ->label('Origine fondi')
                            ->required(),
                    ])
                    ->columns(2),
                Section::make('Dettagli e questionario')
                    ->schema([
                        Textarea::make('scopo_natura_rapporto')
                            ->label('Scopo e natura del rapporto')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('pep_role_details')
                            ->label('Dettagli ruolo PEP')
                            ->columnSpanFull(),
                        TextInput::make('kyc_questionnaire_data')
                            ->label('Dati questionario KYC')
                            ->required(),
                    ]),
            ]);
    }
}
