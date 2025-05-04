<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Device;

class DeviceDiscoveryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_discovered_device()
    {
        $device = Device::create([
            'ip_address' => '192.168.1.1',
            'hostname' => 'test-device',
            'status' => 'online',
            'type' => 'router',
            'is_managed' => true
        ]);

        $this->assertDatabaseHas('devices', [
            'ip_address' => '192.168.1.1',
            'hostname' => 'test-device'
        ]);
    }
}
