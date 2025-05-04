<?php

namespace App\Services\Network;

use Symfony\Component\Process\Process;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class NetworkDiscoveryService
{
    public function discoverHosts(string $subnet): Collection
    {
        $hosts = collect();

        for ($i = 1; $i <= 254; $i++) {
            $ip = "$subnet.$i";
            if ($this->ping($ip)) {
                $hosts->push($ip);
            }
        }

        return $hosts;
    }

    public function ping(string $ip): bool
    {
        try {
            $process = Process::fromShellCommandline("ping -c 1 -W 1 $ip");
            $process->run();
            return $process->isSuccessful();
        } catch (\Exception $e) {
            Log::error("Ping failed for $ip: " . $e->getMessage());
            return false;
        }
    }
}
