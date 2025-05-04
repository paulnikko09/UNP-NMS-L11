<?php

namespace App\Filament\Admin\Resources\DeviceResource\Pages;

use App\Filament\Admin\Resources\DeviceResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListDevices extends ListRecords
{
    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\EditAction::make(),
        ];
    }
}
