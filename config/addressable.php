<?php

declare(strict_types=1);

return [

    // Manage autoload migrations
    'autoload_migrations' => true,

    // Addresses Database Tables
    'tables' => [
        'addresses' => 'addresses',
    ],

    // Addresses Models
    'models' => [
        'address' => \GrnSpc\Addressable\Models\Address::class,
    ],

    // Addresses Geocoding Options
    'geocoding' => false,

];
