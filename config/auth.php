<?php

return [

    'defaults' => [
        'guard' => 'owner', 
        'passwords' => 'owners',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'owner' => [ 
            'driver' => 'session',
            'provider' => 'owners',
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'owners' => [
            'driver' => 'eloquent',
            'model' => App\Models\Owner::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'owners' => [ 
            'provider' => 'owners',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

];

