<?php

namespace App\Filament\Resources\Cars\Schemas;

use Laravel\Pail\File;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->maxLength(255)
                    ->required(),

                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),

                TextInput::make('plate')
                    ->maxLength(255)
                    ->required(),

                Select::make('transmission')
                    ->options([
                        'manual' => 'Manual',
                        'automatic' => 'Automatic',
                    ])
                    ->required(),

                Select::make('fuel_type')
                    ->options([
                        'petrol' => 'Petrol',
                        'diesel' => 'Diesel',
                        'electric' => 'Electric',
                    ])
                    ->required(),

                TextInput::make('seats')
                    ->numeric()
                    ->required(),

                TextInput::make('price_per_day')
                    ->numeric()
                    ->required(),

                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('cars')
                    ->required(),

                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'rented' => 'Rented',
                        'maintenance' => 'Maintenance',
                    ])
            ]);
    }
}
