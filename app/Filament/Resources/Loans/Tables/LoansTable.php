<?php

namespace App\Filament\Resources\Loans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LoansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('practice_number')
                    ->label('N. pratica')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('customer.ragione_sociale_o_cognome')
                    ->label('Cliente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('customer_fiscal_code')
                    ->label('CF cliente')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('agent.name')
                    ->label('Agente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('product_type')
                    ->label('Prodotto')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'CQS' => 'CQS',
                        'CQP' => 'CQP',
                        'PRESTITO_PERSONALE' => 'Prestito personale',
                        'MUTUO' => 'Mutuo',
                        'TFS' => 'TFS',
                        default => $state,
                    }),
                TextColumn::make('internal_reference')
                    ->label('Rif. interno')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('mandante_id')
                    ->label('Mandante')
                    ->numeric()
                    ->sortable()
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
            ->defaultSort('created_at', 'desc')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('product_type')
                    ->label('Prodotto')
                    ->options([
                        'CQS' => 'CQS',
                        'CQP' => 'CQP',
                        'PRESTITO_PERSONALE' => 'Prestito personale',
                        'MUTUO' => 'Mutuo',
                        'TFS' => 'TFS',
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
