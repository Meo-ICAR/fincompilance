<?php

namespace App\Filament\Resources\Oams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('codice_fiscale')
                    ->label('Cod. fiscale')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('numero_iscrizione')
                    ->label('N. iscrizione')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('data_iscrizione')
                    ->label('Data iscrizione')
                    ->date()
                    ->sortable(),
                TextColumn::make('stato')
                    ->label('Stato')
                    ->badge()
                    ->sortable(),
                TextColumn::make('data_stato')
                    ->label('Data stato')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('autorizzato_ad_operare')
                    ->label('Autorizzato')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('persona')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('domicilio_sede_legale')
                    ->label('Sede legale')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('elenco')
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
            ->defaultSort('name')
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
