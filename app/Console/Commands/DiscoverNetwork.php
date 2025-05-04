<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Device;

class DiscoverNetwork extends Command
{
    // This is the command you'll run in terminal
    protected $signature = 'discover:network';

    // This is the description shown in `php artisan list`
    protected $description = 'Ping scan the 192.168.1.0/24 network and save online devices.';

    public function handle()
    {
        $subnet = '192.168.1.'; // 🔁 Change to match your actual subnet

        for ($i = 1; $i <= 254; $i++) {
            $ip = $subnet . $i;

            if ($this->ping($ip)) {
                Device::updateOrCreate(
                    ['ip_address' => $ip],
                    [
                        'name' => 'Discovered Device ' . $i,
                        'status' => 'online',
                    ]
                );

                $this->info("🟢 Found: $ip");
            } else {
                $this->line("⚪ No response: $ip");
            }
        }

        $this->info('✅ Discovery finished!');
        return Command::SUCCESS;
    }

    private function ping($ip): bool
    {
        $os = strtoupper(substr(PHP_OS, 0, 3));
        $cmd = $os === 'WIN'
            ? "ping -n 1 -w 300 {$ip}"
            : "ping -c 1 -W 1 {$ip}";

        exec($cmd, $output, $status);
        return $status === 0;
    }
}
