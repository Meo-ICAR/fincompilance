<?php

namespace App\Filament\Resources\DocumentTypes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DocumentTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('scope')
                    ->badge(),
                TextColumn::make('category')
                    ->searchable(),
                IconColumn::make('is_mandatory')
                    ->boolean(),
                IconColumn::make('requires_expiration_date')
                    ->boolean(),
                IconColumn::make('requires_number')
                    ->boolean(),
                IconColumn::make('requires_issuer')
                    ->boolean(),
                TextColumn::make('default_validity_months')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('alert_days_before_expiry')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_sensitive')
                    ->boolean(),
                TextColumn::make('oam_mapping_code')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
