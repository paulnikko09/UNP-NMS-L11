<?php

namespace App\Services\Alerts;

class AlertEngine
{
    public function evaluate($device, $metrics)
    {
        // Example: alert if CPU > 80%
        if ($metrics['cpu'] > 80) {
            // Trigger alert
        }
    }
}
