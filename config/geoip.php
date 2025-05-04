<?php

return [
    'driver' => 'maxmind',
    'maxmind' => [
        'database_path' => storage_path('app/GeoLite2-City.mmdb'),
    ],
];
