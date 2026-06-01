<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->unique('users', 'email', ignoreRecord: true),

                TextInput::make('password')
                    ->password()
                    ->required(fn($record) => !$record)
                    ->dehydrated(fn($state) => filled($state))
                    ->dehydrateStateUsing(fn($state) => \Hash::make($state)),

                TextInput::make('phone'),

                Toggle::make('status')
                    ->label('Active')
                    ->default(true),

                DateTimePicker::make('email_verified_at'),


            ]);
    }
}
