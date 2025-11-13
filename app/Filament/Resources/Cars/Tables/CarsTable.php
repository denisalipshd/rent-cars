<?php

namespace App\Filament\Resources\Cars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),

                // TextColumn::make('slug')
                //     ->label('Slug'),

                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable(),

                TextColumn::make('plate')
                    ->label('Plate')
                    ->searchable(),

                // TextColumn::make('transmission')
                //     ->label('Transmission')
                //     ->searchable(),

                // TextColumn::make('fuel_type')
                //     ->label('Fuel Type')
                //     ->searchable(),

                // TextColumn::make('seats')
                //     ->label('Seats')
                //     ->searchable(),

                TextColumn::make('price_per_day')
                    ->label('Price Per Day'),

                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public'),

                TextColumn::make('status')
                    ->label('Status'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
