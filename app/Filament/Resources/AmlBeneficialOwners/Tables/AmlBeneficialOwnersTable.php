<?php

namespace App\Filament\Resources\AmlBeneficialOwners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AmlBeneficialOwnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('amlAssessment.customer.ragione_sociale_o_cognome')
                    ->label('Cliente (valutazione)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('cognome')
                    ->label('Cognome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('codice_fiscale')
                    ->label('Cod. fiscale')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ownership_percentage')
                    ->label('% partecipazione')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('data_nascita')
                    ->label('Data nascita')
                    ->date()
                    ->sortable(),
                IconColumn::make('is_indirect_ownership')
                    ->label('Indiretta')
                    ->boolean(),
                TextColumn::make('comune_nascita')
                    ->label('Comune nascita')
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
            ->defaultSort('cognome')
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
