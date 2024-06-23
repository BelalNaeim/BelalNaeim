<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'galleries' => 'c,r,u,d',
            'governorates' => 'c,r,u,d',
            'projects' => 'c,r,u,d',
            'services' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'statuses' => 'c,r,u,d',	
            'types' => 'c,r,u,d',	
        ],
        'admin' =>[],
        'client' =>[
            'users' => 'c,r',
            'galleries'=>'c,r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
