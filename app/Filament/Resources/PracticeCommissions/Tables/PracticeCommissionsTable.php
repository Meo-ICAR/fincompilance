<?php

namespace App\Filament\Resources\PracticeCommissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PracticeCommissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('loan.practice_number')
                    ->label('Pratica')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('payer_type')
                    ->label('Pagante')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'MANDANTE' => 'Mandante',
                        'CLIENTE' => 'Cliente',
                        default => $state,
                    }),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'UPFRONT' => 'Upfront',
                        'BACKEND' => 'Backend',
                        default => $state,
                    }),
                TextColumn::make('amount_total')
                    ->label('Totale')
                    ->money('EUR')
                    ->sortable(),
                TextColumn::make('amount_gross')
                    ->label('Imponibile')
                    ->money('EUR')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->label('Stato')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'PAID' => 'success',
                        'INVOICED' => 'info',
                        'CANCELLED' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'EXPECTED' => 'Atteso',
                        'INVOICED' => 'Fatturato',
                        'PAID' => 'Pagato',
                        'CANCELLED' => 'Annullato',
                        default => $state,
                    }),
                TextColumn::make('accrual_date')
                    ->label('Data competenza')
                    ->date()
                    ->sortable(),
                TextColumn::make('payment_date')
                    ->label('Data pagamento')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_retrocession_eligible')
                    ->label('Retrocedibile')
                    ->boolean(),
                TextColumn::make('invoice_number')
                    ->label('N. fattura')
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
            ->defaultSort('accrual_date', 'desc')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('status')
                    ->label('Stato')
                    ->options([
                        'EXPECTED' => 'Atteso',
                        'INVOICED' => 'Fatturato',
                        'PAID' => 'Pagato',
                        'CANCELLED' => 'Annullato',
                    ]),
                SelectFilter::make('payer_type')
                    ->label('Pagante')
                    ->options([
                        'MANDANTE' => 'Mandante',
                        'CLIENTE' => 'Cliente',
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
