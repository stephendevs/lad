<?php

return [
    'layout' => 'master',
     /*
    |--------------------------------------------------------------------------
    | Admin authentication guard
    |--------------------------------------------------------------------------
    */
    'guard' => 'admin',
    /*
    |--------------------------------------------------------------------------
    | Route prefix for accessing the admin panel pages
    |--------------------------------------------------------------------------
    */
    'route_prefix' => 'dashboard',
    /*
    |--------------------------------------------------------------------------
    | Additional middleware for admin panel
    |--------------------------------------------------------------------------
    */
    'middlewares' => ['web','etc'],

    /*
    |--------------------------------------------------------------------------
    | Root directory for storing media files for ldashboard -- default ldashboard
    |--------------------------------------------------------------------------
    */
    'storage_dir' => 'ldashboard',


     /*
    |--------------------------------------------------------------------------
    | Other package links 
    | Blades holding nav-item for sidebar
    |--------------------------------------------------------------------------
    */
    'sidebar_navitem' => [
        'schlr::core.includes.navbars.sidebars.sidebarNavItem',
        'pagman::core.includes.navbars.sidebars.sidebarNavItem',
        'neman::core.includes.navbar.sidebar.sidebarNavItem',
        'medman::core.includes.navbar.sidebar.sidebarNavItem',
        'calend::core.includes.navbar.sidebar.sidebarNavItem',
    ],

    

    'use_ajax' => true,

    'developer' => [
        'name' => 'Okello Stephen Omoding',
        'email' => 'okellostephenomoding@gmail.com',
        'github' => 'https://github.com/stephendevs/stephendevs',
        'linkedin' => 'https://www.linkedin.com/in/stephendevs',
        'twitter' => 'https://twitter.com/stephendevs',
    ],

    
];