<?php

namespace App\Filament\Resources\AgentPayouts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AgentPayoutsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('loan.practice_number')
                    ->label('Pratica')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('agent.name')
                    ->label('Agente')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('amount_due')
                    ->label('Importo dovuto')
                    ->money('EUR')
                    ->sortable(),
                TextColumn::make('calculation_base')
                    ->label('Base calcolo')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('percentage')
                    ->label('%')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Stato')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'PAID' => 'success',
                        'APPROVED' => 'info',
                        'HELD' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'PENDING' => 'In attesa',
                        'APPROVED' => 'Approvato',
                        'PAID' => 'Pagato',
                        'HELD' => 'Trattenuto',
                        default => $state,
                    }),
                TextColumn::make('paid_at')
                    ->label('Data pagamento')
                    ->date()
                    ->sortable(),
                TextColumn::make('agent_invoice_reference')
                    ->label('Rif. fattura agente')
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
            ->defaultSort('created_at', 'desc')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('status')
                    ->label('Stato')
                    ->options([
                        'PENDING' => 'In attesa',
                        'APPROVED' => 'Approvato',
                        'PAID' => 'Pagato',
                        'HELD' => 'Trattenuto',
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
