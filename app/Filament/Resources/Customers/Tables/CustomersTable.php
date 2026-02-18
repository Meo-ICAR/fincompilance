<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ragione_sociale_o_cognome')
                    ->label('Ragione sociale / Cognome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nome')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('codice_fiscale')
                    ->label('Cod. fiscale')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->searchable(),
                IconColumn::make('is_pep')
                    ->label('PEP')
                    ->boolean(),
                IconColumn::make('is_sanctioned')
                    ->label('Sanzionato')
                    ->boolean(),
                TextColumn::make('user.name')
                    ->label('Utente')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('partita_iva')
                    ->label('P. IVA')
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
            ->defaultSort('ragione_sociale_o_cognome')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('type')
                    ->label('Tipo')
                    ->options([
                        'PF' => 'Persona fisica',
                        'PG' => 'Persona giuridica',
                    ]),
                TernaryFilter::make('is_pep')
                    ->label('PEP'),
                TernaryFilter::make('is_sanctioned')
                    ->label('Sanzionato'),
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
