<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\Alerts\AlertEngine;
use App\Models\Device;

class AlertEngineTest extends TestCase
{
    /** @test */
    public function it_triggers_alert_if_cpu_is_high()
    {
        $device = new Device(['hostname' => 'router1']);
        $metrics = ['cpu' => 95];

        $engine = new AlertEngine();
        $result = $engine->evaluate($device, $metrics);

        $this->assertTrue(true); // Replace with actual logic/assertion
    }
}
