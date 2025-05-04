<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DeviceResource\Pages;
use App\Filament\Admin\Resources\DeviceResource\RelationManagers;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;
    protected static ?string $navigationIcon = 'heroicon-o-server';
    protected static ?string $navigationGroup = 'Device Management';
    protected static ?string $label = 'Devices';
    protected static ?string $pluralLabel = 'Devices';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->disabled()->dehydrated(false),
            Forms\Components\TextInput::make('ip_address')->label('IP Address')->disabled()->dehydrated(false),
            Forms\Components\TextInput::make('hostname')->disabled()->dehydrated(false),
            Forms\Components\TextInput::make('description')->disabled()->dehydrated(false),
            Forms\Components\TextInput::make('uptime')->disabled()->dehydrated(false),
            Forms\Components\Toggle::make('managed')->label('Managed')->disabled()->dehydrated(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('ip_address')->label('IP Address')->sortable(),
            TextColumn::make('hostname')->sortable(),
            BadgeColumn::make('status')->colors([
                'success' => 'online',
                'danger' => 'offline',
            ]),
            BadgeColumn::make('managed')
                ->label('Managed')
                ->colors([
                    'primary' => fn (bool $state): bool => $state,
                    'gray' => fn (bool $state): bool => ! $state,
                ])
                ->formatStateUsing(fn (bool $state) => $state ? 'Yes' : 'No'),
            TextColumn::make('last_seen')->dateTime('Y-m-d H:i:s'),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ManageDeviceRelationManager::class,
            RelationManagers\DeviceLogsRelationManager::class,
            RelationManagers\DeviceEntitiesRelationManager::class,
            RelationManagers\DeviceInterfacesRelationManager::class,
            RelationManagers\DeviceNeighborsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'view' => Pages\ViewDevice::route('/{record}'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
