<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\GeoIP\GeoIPService;

class GeoIPServiceTest extends TestCase
{
    /** @test */
    public function it_returns_null_for_invalid_ip()
    {
        $geo = new GeoIPService();
        $location = $geo->getLocation('999.999.999.999');
        $this->assertNull($location);
    }
}
