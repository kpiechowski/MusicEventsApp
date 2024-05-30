<?php
return [

    [
        'name' => 'Dashboard',
        'route' => 'admin.dashboard'
        
    ],
    [
        'name' => 'Artists',
        'route' => 'admin.artists.index',
        'dropdown' => [
            [
                'name' => 'All artists',
                'route' => 'admin.artists.index',
            ],
            [
                'name' => 'Add new',
                'route' => 'admin.artists.create',
            ],
        ],
    ],
    [
        'name' => 'Events',
        'route' => 'admin.music-events.index',
        'dropdown' => [
            [
                'name' => 'All events',
                'route' => 'admin.music-events.index',
            ],
            [
                'name' => 'Add new',
                'route' => 'admin.music-events.create',
            ],
        ],
    ],


];