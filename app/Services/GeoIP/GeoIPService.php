<?php

namespace App\Services\GeoIP;

use GeoIp2\Database\Reader;

class GeoIPService
{
    protected $reader;

    public function __construct()
    {
        $this->reader = new Reader(storage_path('app/GeoLite2-City.mmdb'));
    }

    public function getLocation($ip)
    {
        try {
            $record = $this->reader->city($ip);
            return [
                'latitude' => $record->location->latitude,
                'longitude' => $record->location->longitude,
                'city' => $record->city->name,
                'country' => $record->country->name
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}
