<?php

namespace App\Filament\Resources\Financials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FinancialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('abi_code')
                    ->label('Codice ABI')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'BANCA' => 'Banca',
                        'INTERMEDIARIO_106' => 'Intermediario 106',
                        'IP_IMEL' => 'IP/IMEL',
                        default => $state,
                    }),
                TextColumn::make('status')
                    ->label('Stato')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'OPERATIVO' => 'Operativo',
                        'SOSPESO' => 'Sospeso',
                        default => $state,
                    }),
                TextColumn::make('data_iscrizione')
                    ->label('Data iscrizione')
                    ->date()
                    ->sortable(),
                TextColumn::make('capogruppo')
                    ->label('Capogruppo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('data_cancellazione')
                    ->label('Data cancellazione')
                    ->date()
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
            ->defaultSort('name')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('type')
                    ->label('Tipo')
                    ->options([
                        'BANCA' => 'Banca',
                        'INTERMEDIARIO_106' => 'Intermediario 106',
                        'IP_IMEL' => 'IP/IMEL',
                    ]),
                SelectFilter::make('status')
                    ->label('Stato')
                    ->options([
                        'OPERATIVO' => 'Operativo',
                        'SOSPESO' => 'Sospeso',
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
