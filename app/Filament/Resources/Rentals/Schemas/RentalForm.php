<?php

namespace App\Filament\Resources\Rentals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RentalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('car_id')
                    ->relationship('car', 'name')
                    ->label('Car Name'),
                TextInput::make('name'),
                TextInput::make('email'),
                TextInput::make('phone'),
                DatePicker::make('pickup_date'),
                DatePicker::make('return_date'),
            ]);
    }
}
