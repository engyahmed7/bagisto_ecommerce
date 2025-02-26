<?php

return [
    'flatrate' => [
        'code'         => 'flatrate',
        'title'        => 'Flat Rate',
        'description'  => 'Flat Rate Shipping',
        'active'       => true,
        'default_rate' => '10',
        'type'         => 'per_unit',
        'class'        => 'Webkul\Shipping\Carriers\FlatRate',
    ],

    'free' => [
        'code'         => 'free',
        'title'        => 'Free Shipping',
        'description'  => 'Free Shipping',
        'active'       => true,
        'default_rate' => '0',
        'class'        => 'Webkul\Shipping\Carriers\Free',
    ],

    'customflatrate' => [
        'code'         => 'customflatrate',
        'title'        => 'Custom Flat Rate',
        'description'  => 'Custom Flat Rate Shipping Method',
        'active'       => true,
        'default_rate' => '50',
        'type'         => 'per_unit',
        'class'        => 'App\Shipping\CustomFlatRate',
    ],
];
