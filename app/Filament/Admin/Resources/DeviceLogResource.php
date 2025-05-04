<?php

namespace App\Filament\Admin\Resources;

use App\Models\DeviceLog;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Admin\Resources\DeviceLogResource\Pages;

class DeviceLogResource extends Resource
{
    protected static ?string $model = DeviceLog::class;
    protected static ?string $navigationGroup = 'Device Management';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $label = 'Device Log';
    protected static ?string $pluralLabel = 'Device Logs';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('device.name')->label('Device'),
            TextColumn::make('ip_address'),
            TextColumn::make('status')->badge()->colors([
                'success' => 'online',
                'danger' => 'offline',
            ]),
            TextColumn::make('polled_at')->dateTime(),
        ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListDeviceLogs::route('/'),
    ];
}
}
