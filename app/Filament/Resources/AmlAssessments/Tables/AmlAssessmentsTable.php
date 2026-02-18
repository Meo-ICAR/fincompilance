<?php

namespace App\Filament\Resources\AmlAssessments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AmlAssessmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.ragione_sociale_o_cognome')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('performed_at')
                    ->label('Data valutazione')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('next_review_date')
                    ->label('Prossima revisione')
                    ->date()
                    ->sortable(),
                TextColumn::make('risk_level')
                    ->label('Rischio')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'BASSO' => 'success',
                        'MEDIO' => 'warning',
                        'ALTO', 'MOLTO_ALTO' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'BASSO' => 'Basso',
                        'MEDIO' => 'Medio',
                        'ALTO' => 'Alto',
                        'MOLTO_ALTO' => 'Molto alto',
                        default => $state,
                    }),
                TextColumn::make('risk_score')
                    ->label('Punteggio')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('due_diligence_type')
                    ->label('Due diligence')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'SEMPLIFICATA' => 'Semplificata',
                        'ORDINARIA' => 'Ordinaria',
                        'RAFFORZATA' => 'Rafforzata',
                        default => $state,
                    }),
                TextColumn::make('status')
                    ->label('Stato')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'APPROVED' => 'success',
                        'REJECTED' => 'danger',
                        'EXPIRED' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'PENDING' => 'In attesa',
                        'APPROVED' => 'Approvato',
                        'REJECTED' => 'Rifiutato',
                        'EXPIRED' => 'Scaduto',
                        default => $state,
                    }),
                TextColumn::make('origine_fondi')
                    ->label('Origine fondi')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Creato il')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('performed_at', 'desc')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('risk_level')
                    ->label('Rischio')
                    ->options([
                        'BASSO' => 'Basso',
                        'MEDIO' => 'Medio',
                        'ALTO' => 'Alto',
                        'MOLTO_ALTO' => 'Molto alto',
                    ]),
                SelectFilter::make('status')
                    ->label('Stato')
                    ->options([
                        'PENDING' => 'In attesa',
                        'APPROVED' => 'Approvato',
                        'REJECTED' => 'Rifiutato',
                        'EXPIRED' => 'Scaduto',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
