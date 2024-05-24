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


];