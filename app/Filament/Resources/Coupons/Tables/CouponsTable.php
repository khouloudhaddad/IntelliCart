<?php

namespace App\Filament\Resources\Coupons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CouponsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable()
                    ->sortable(),

                // Manual/Auto
                TextColumn::make('code_type')
                    ->label('Mode')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'manual' => 'info',
                        'auto' => 'success'
                    }),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'fixed' => 'success',
                        'percentage' => 'info'
                    }),

                TextColumn::make('value')
                    ->label('Discount')
                    ->formatStateUsing(fn($record) => $record->type === 'fixed' ? '$' . $record->value : $record->value . '%'),
                TextColumn::make('min_cart_value')
                    ->label('Min Cart')
                    ->formatStateUsing(fn($record) => $record ? '$' . $record : '-'),

                // Categories
                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->badge()
                    ->separator(', ')
                    ->toggleable(isToggledHiddenByDefault: true),

                // Brands
                TextColumn::make('brands.name')
                    ->label('Brands')
                    ->badge()
                    ->separator(', ')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('usage_limit')
                    ->label('Limit'),
                TextColumn::make('used_count')
                    ->label('Used'),
                TextColumn::make('expires_at')
                    ->date()
                    ->sortable(),
                IconColumn::make('status')
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
