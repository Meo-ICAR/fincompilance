<?php

namespace App\Filament\Resources\DocumentTypes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class DocumentTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('scope')
                    ->label('Ambito')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'AGENT' => 'Agente',
                        'CUSTOMER' => 'Cliente',
                        'COMPANY' => 'Azienda',
                        'MANDATE' => 'Mandato',
                        default => $state,
                    }),
                TextColumn::make('category')
                    ->label('Categoria')
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('is_mandatory')
                    ->label('Obbligatorio')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Attivo')
                    ->boolean(),
                TextColumn::make('default_validity_months')
                    ->label('Validità (mesi)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('alert_days_before_expiry')
                    ->label('Alert scadenza (gg)')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('requires_expiration_date')
                    ->label('Richiede scadenza')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('requires_number')
                    ->label('Richiede numero')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('requires_issuer')
                    ->label('Richiede emittente')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_sensitive')
                    ->label('Sensibile')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('oam_mapping_code')
                    ->label('Cod. mapping OAM')
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
            ->defaultSort('name')
            ->defaultPaginationPageOption(25)
            ->filters([
                SelectFilter::make('scope')
                    ->label('Ambito')
                    ->options([
                        'AGENT' => 'Agente',
                        'CUSTOMER' => 'Cliente',
                        'COMPANY' => 'Azienda',
                        'MANDATE' => 'Mandato',
                    ]),
                TernaryFilter::make('is_active')
                    ->label('Attivo'),
                TernaryFilter::make('is_mandatory')
                    ->label('Obbligatorio'),
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
