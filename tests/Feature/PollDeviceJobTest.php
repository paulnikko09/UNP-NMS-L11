<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Jobs\PollDeviceJob;
use App\Models\Device;

class PollDeviceJobTest extends TestCase
{
    /** @test */
    public function it_handles_polling_without_errors()
    {
        $device = Device::factory()->create();
        $job = new PollDeviceJob($device);
        $job->handle();

        $this->assertTrue(true); // Update with actual validation
    }
}
