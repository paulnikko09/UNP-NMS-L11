<?php

namespace App\Services\Network;

use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Log;
use App\Models\Device;

class DevicePollingService
{
    public function pollDevice(string $ip): void
    {
        if (!$this->ping($ip)) {
            Log::warning("Device $ip is unreachable.");
            return;
        }

        $sysDescr = $this->snmpGet($ip, '1.3.6.1.2.1.1.1.0'); // sysDescr
        $uptime = $this->snmpGet($ip, '1.3.6.1.2.1.1.3.0');   // uptime
        $ifCount = $this->snmpGet($ip, '1.3.6.1.2.1.2.1.0');   // interface count
        $hostnameSNMP = $this->snmpGet($ip, '1.3.6.1.2.1.1.5.0'); // hostname

        $isManaged = $sysDescr !== null;

        Device::updateOrCreate(
            ['ip' => $ip],
            [
                'hostname' => $hostnameSNMP ?: gethostbyaddr($ip),
                'description' => $sysDescr,
                'uptime' => $uptime,
                'interface_count' => $ifCount,
                'last_seen' => now(),
                'managed' => $isManaged,
            ]
        );

        Log::info("Device $ip " . ($isManaged ? "(Managed)" : "(Unmanaged)") . " updated.");
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

    public function snmpGet(string $ip, string $oid): ?string
    {
        try {
            $process = Process::fromShellCommandline("snmpget -v2c -c public $ip $oid");
            $process->run();

            if (!$process->isSuccessful()) {
                Log::warning("SNMP OID $oid failed for $ip");
                return null;
            }

            $output = $process->getOutput();
            return trim(preg_replace('/.*=\s+STRING:\s+|.*=\s+Timeticks:\s+|.*=\s+INTEGER:\s+/', '', $output));
        } catch (\Exception $e) {
            Log::error("SNMP exception for $ip OID $oid: " . $e->getMessage());
            return null;
        }
    }
}
