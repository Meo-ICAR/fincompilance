<?php

namespace App\Filament\Resources\AmlAssessments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AmlAssessmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'id')
                    ->required(),
                TextInput::make('performed_by')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('performed_at')
                    ->required(),
                DatePicker::make('next_review_date')
                    ->required(),
                Select::make('risk_level')
                    ->options([
                        'BASSO' => 'B a s s o',
                        'MEDIO' => 'M e d i o',
                        'ALTO' => 'A l t o',
                        'MOLTO_ALTO' => 'M o l t o  a l t o',
                    ])
                    ->required(),
                TextInput::make('risk_score')
                    ->numeric(),
                Select::make('due_diligence_type')
                    ->options([
                        'SEMPLIFICATA' => 'S e m p l i f i c a t a',
                        'ORDINARIA' => 'O r d i n a r i a',
                        'RAFFORZATA' => 'R a f f o r z a t a',
                    ])
                    ->required(),
                Textarea::make('scopo_natura_rapporto')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('origine_fondi')
                    ->required(),
                Textarea::make('pep_role_details')
                    ->columnSpanFull(),
                TextInput::make('kyc_questionnaire_data')
                    ->required(),
                Select::make('status')
                    ->options([
                        'PENDING' => 'P e n d i n g',
                        'APPROVED' => 'A p p r o v e d',
                        'REJECTED' => 'R e j e c t e d',
                        'EXPIRED' => 'E x p i r e d',
                    ])
                    ->default('PENDING')
                    ->required(),
            ]);
    }
}
