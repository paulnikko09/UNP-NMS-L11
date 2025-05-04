<?php

namespace App\Notifications;

use App\Models\Alert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DeviceAlertNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $alert;

    public function __construct(Alert $alert)
    {
        $this->alert = $alert;
    }

    public function via($notifiable)
    {
        return ['mail']; // Extend to ['mail', 'slack', 'telegram'] if needed
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Device Alert: " . $this->alert->type)
                    ->line("Device: " . $this->alert->device->hostname)
                    ->line("Message: " . $this->alert->message)
                    ->line("Severity: " . $this->alert->severity)
                    ->line("Time: " . $this->alert->triggered_at)
                    ->action('View Alert', url('/alerts'))
                    ->line('This is an automated notification from UNP-NMS.');
    }
}
