<?php

namespace App\Filament\Resources\Enasarcos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EnasarcosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('competenza')
                    ->label('Competenza')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('enasarco')
                    ->label('Enasarco')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('minimo')
                    ->label('Minimo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('massimo')
                    ->label('Massimo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('minimale')
                    ->label('Minimale')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('massimale')
                    ->label('Massimale')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('aliquota_soc')
                    ->label('Aliquota soc.')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('aliquota_agente')
                    ->label('Aliquota agente')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('competenza')
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
