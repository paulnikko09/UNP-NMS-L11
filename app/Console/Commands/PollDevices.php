<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PollDevices extends Command
{
    protected $signature = 'poll:devices';
    protected $description = 'Ping or poll devices and store results in poll_logs';

    public function handle()
    {
        $devices = Device::all();

        foreach ($devices as $device) {
    $ip = $device->ip_address ?? $device->hostname;

    $online = $this->ping($ip);
    $status = $online ? 'online' : 'offline';

    // ✅ Update device status
    $device->status = $status;
    $device->save();

    // ✅ Log to poll_logs
    DB::table('poll_logs')->insert([
        'device_id' => $device->id,
        'status' => $status,
        'created_at' => now(),
    ]);

    $this->info("Polled {$ip}: {$status}");
        }

        return Command::SUCCESS;
    }

    private function ping($host): bool
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $command = "ping -n 1 -w 1000 {$host}";
        } else {
            $command = "ping -c 1 -W 1 {$host}";
        }

        exec($command, $output, $resultCode);
        return $resultCode === 0;
    }
}
