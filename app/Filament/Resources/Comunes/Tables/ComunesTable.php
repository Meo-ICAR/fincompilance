<?php

namespace App\Filament\Resources\Comunes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ComunesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('denominazione')
                    ->label('Comune')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sigla_automobilistica')
                    ->label('Provincia')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('denominazione_regione')
                    ->label('Regione')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('codice_comune_alfanumerico')
                    ->label('Cod. alfanumerico')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('codice_catastale')
                    ->label('Cod. catastale')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('capoluogo_provincia')
                    ->label('Capoluogo')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('codice_regione')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('codice_unita_territoriale')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('denominazione_unita_territoriale')
                    ->label('Unità territoriale')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('codice_nuts3_2024')
                    ->label('NUTS3')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('denominazione')
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
