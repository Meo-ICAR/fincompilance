<?php

namespace App\Filament\Resources\AmlAssessments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AmlAssessmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.id')
                    ->searchable(),
                TextColumn::make('performed_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('performed_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('next_review_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('risk_level')
                    ->badge(),
                TextColumn::make('risk_score')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('due_diligence_type')
                    ->badge(),
                TextColumn::make('origine_fondi')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
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
