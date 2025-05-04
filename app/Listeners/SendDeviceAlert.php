<?php

namespace App\Listeners;

use App\Events\DeviceStatusChanged;
use App\Models\Alert;
use App\Notifications\DeviceAlertNotification;
use Illuminate\Support\Facades\Notification;

class SendDeviceAlert
{
    public function handle(DeviceStatusChanged $event)
    {
        $alert = Alert::create([
            'device_id' => $event->device->id,
            'type' => 'status_change',
            'message' => "Device status changed from {$event->oldStatus} to {$event->newStatus}",
            'severity' => 'medium',
            'status' => 'new',
            'triggered_at' => now()
        ]);

        Notification::route('mail', 'admin@example.com')
            ->notify(new DeviceAlertNotification($alert));
    }
}
