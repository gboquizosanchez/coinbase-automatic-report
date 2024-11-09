<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| OVH Scheduler
|--------------------------------------------------------------------------
|
| This file is used to run Laravel scheduler in OVH services.
|
*/
$_SERVER['argv'] = [
    'artisan',
    'schedule:run',
];

require __DIR__ . '/artisan';
