<?php

namespace App\Filament\Resources\Indirizzos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IndirizzosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('indirizzo')
                    ->label('Indirizzo')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('numero_civico')
                    ->label('N. civico')
                    ->searchable(),
                TextColumn::make('cap')
                    ->label('CAP')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('comune')
                    ->label('Comune')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('provincia')
                    ->label('Provincia')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tipo_indirizzo')
                    ->label('Tipo')
                    ->badge(),
                TextColumn::make('indirizzable_type')
                    ->label('Riferito a')
                    ->formatStateUsing(fn (?string $state): string => $state ? class_basename($state) : '-')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('codice_stato_estero')
                    ->label('Cod. stato estero')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('codice_interno_sede')
                    ->label('Cod. interno sede')
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
            ->defaultSort('comune')
            ->defaultPaginationPageOption(25)
            ->filters([
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
