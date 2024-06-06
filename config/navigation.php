<?php
return [

    [
        'name' => 'Dashboard',
        'route' => 'admin.dashboard',
        'routeGroup' => 'admin.dashboard',
        'icon' => 'home',
        
    ],
    [
        'name' => 'Artists',
        'route' => 'admin.artists.index',
        'routeGroup' => 'admin.artists',
        'icon' => 'person',
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
        'icon' => 'local_activity',
        'routeGroup' => 'admin.music-events',
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