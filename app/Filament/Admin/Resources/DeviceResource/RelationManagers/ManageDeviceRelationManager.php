<?php

namespace App\Filament\Admin\Resources\DeviceResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ManageDeviceRelationManager extends RelationManager
{
    protected static string $relationship = 'managedDevices'; // Change to match your Device.php relation

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name'),
            TextColumn::make('ip_address'),
            TextColumn::make('status')->badge(),
        ]);
    }
}
