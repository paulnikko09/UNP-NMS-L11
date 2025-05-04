<?php

namespace App\Filament\Admin\Resources\DeviceResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DeviceNeighborsRelationManager extends RelationManager
{
    protected static string $relationship = 'neighbors';

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->label('ID'),
            TextColumn::make('created_at')->dateTime()->label('Created'),
            TextColumn::make('updated_at')->dateTime()->label('Updated'),
        ]);
    }
}
