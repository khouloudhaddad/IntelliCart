<?php

namespace App\Filament\Resources\Coupons\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('code_type')
                    ->label('Coupon Mode')
                    ->options([
                        'manual' => 'Manual',
                        'Auto' => 'Automatic'
                    ])
                    ->default('manual')
                    ->live(),

                // Manual Code
                TextInput::make('code')
                    ->label('Coupon Code')
                    ->required(fn($get) => $get('code_type') === 'manual')
                    ->unique(ignoreRecord: true)
                    ->visible(fn($get) => $get('code_type') === 'manual'),

                // Auto generated Code
                TextInput::make('code')
                    ->label('Generated Code')
                    ->disabled()
                    ->dehydrated()
                    ->visible(fn($get) => $get('code_type') === 'auto')
                    ->default(function ($record) {
                        // Do not regenerate on Edit
                        return $record?->code ?? strtoupper(\Str::random(8));
                    }),
                // Catgeories multi select
                Select::make('categories')
                    ->label('Categories (Optional)')
                    ->multiple()
                    ->relationship('categories', 'name')
                    ->preload()
                    ->searchable(),

                // Brands multi select
                Select::make('brands')
                    ->label('Brands (Optional)')
                    ->multiple()
                    ->relationship('brands', 'name')
                    ->preload()
                    ->searchable(),

                Select::make('type')
                    ->label('Coupon Type')
                    ->options(['fixed' => 'Fixed Amount', 'percentage' => 'Percentage'])
                    ->required(),

                TextInput::make('value')
                    ->label('Discount Value')
                    ->required()
                    ->numeric(),

                TextInput::make('min_cart_value')
                    ->label('Minimum Cart Value')
                    ->numeric()
                    ->nullable(),

                TextInput::make('usage_limit')
                    ->label('Usage Limit')
                    ->numeric()
                    ->nullable(),

                // TextInput::make('used_count')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                DatePicker::make('expires_at')
                    ->label('Expiry Date')
                    ->nullable(),

                Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
