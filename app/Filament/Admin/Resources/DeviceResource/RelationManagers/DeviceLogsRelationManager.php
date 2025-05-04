<?php

namespace App\Filament\Admin\Resources\DeviceResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DeviceLogsRelationManager extends RelationManager
{
    protected static string $relationship = 'logs';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ip_address'),
                TextColumn::make('status')->badge()->colors([
                    'success' => 'online',
                    'danger' => 'offline',
                ]),
                TextColumn::make('polled_at')->dateTime(),
            ]);
    }
}
