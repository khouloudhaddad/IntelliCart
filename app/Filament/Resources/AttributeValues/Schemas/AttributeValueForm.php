<?php

namespace App\Filament\Resources\AttributeValues\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AttributeValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('attribute_id')
                    ->label('Attribute')
                    ->relationship('attribute', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),

                TextInput::make('value')
                    ->required(),
            ]);
    }
}
