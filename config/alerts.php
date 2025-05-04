<?php

return [
    'thresholds' => [
        'cpu' => 80,
        'latency' => 150, // ms
        'packet_loss' => 5, // percent
    ],
    'notification_channels' => ['mail'], // extend to slack, telegram, etc.
    'cooldown_period' => 300, // seconds
];
