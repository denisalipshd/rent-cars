<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                ->maxLength(255)
                ->required(),
            ]);
    }
}
