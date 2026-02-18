<?php

namespace App\Filament\Resources\AmlWatchlistHits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class AmlWatchlistHitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('amlAssessment.customer.ragione_sociale_o_cognome')
                    ->label('Cliente (valutazione)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('list_name')
                    ->label('Lista')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('match_type')
                    ->label('Tipo match')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_false_positive')
                    ->label('Falso positivo')
                    ->boolean(),
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
                TernaryFilter::make('is_false_positive')
                    ->label('Falso positivo'),
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
