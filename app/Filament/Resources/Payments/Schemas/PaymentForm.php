<?php

namespace App\Filament\Resources\Payments\Schemas;

use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('rental_id')
                    ->relationship('rental', 'name')
                    ->label('Rental Name'),
                Select::make('rental_id')
                    ->relationship('rental', 'email')
                    ->label('Rental Email'),
                Select::make('rental_id')
                    ->relationship('rental', 'phone')
                    ->label('Rental Phone'),

                TextInput::make('total_amount'),
                TextInput::make('status'),
                FileUpload::make('proof')
                    ->image()
                    ->disk('public')
                    ->directory('proofs'),
            ]);
    }
}
