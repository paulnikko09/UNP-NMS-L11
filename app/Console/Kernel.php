<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // Your scheduled commands go here
        $schedule->command('poll:devices')->everyFiveMinutes();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
    protected $commands = [
    \App\Console\Commands\TestNetworkServices::class,
    \App\Console\Commands\DiscoverNetwork::class,
    \App\Console\Commands\PollDevices::class,
];

}
