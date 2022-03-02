<?php

return [
     /*
    |--------------------------------------------------------------------------
    | Admins DB Table
    |--------------------------------------------------------------------------
    */
    'table' => 'admins',

     /*
    |--------------------------------------------------------------------------
    | Admin Authentication Guard
    |--------------------------------------------------------------------------
    */
    'auth_guard' => 'admin',

    //'auth_table' => 'admins',


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
    | Root directory for storing media files for lad -- default media
    | This directory will be created in storage directory
    |--------------------------------------------------------------------------
    */
    'storage_dir' => 'media',
    'media_dir' => 'media',


     /*
    |--------------------------------------------------------------------------
    | Other package links 
    | Blades holding nav-item for sidebar
    |--------------------------------------------------------------------------
    */
    'sidebar_navitems' => [
        //pagman navitems
        'pagman::lad.sidebar.posts',
        'pagman::lad.sidebar.pages',
        'pagman::lad.sidebar.appearance',
    ],



    /*
    |--------------------------------------------------------------------------
    | Admin Permissions (Uses the permission middleware) --> $this->middleware('permission:manage_users')
    |--------------------------------------------------------------------------
    */
    'permissions' => [
        'manage_users' => 'Control other users account information, Delete, Edir & Deactivate Other Accounts',
        'cmd' => 'Access to command interface to run artisan commands.',
        'configure_system_settings' => 'Configure system settings, like Mail Servers, Enable System Caching etc',
        'manage_mail_servers' => 'Manage Mail Servers',
        //Pagan permissions
        'author' => 'Add, View, Edit and Delete Posts',
        'manage_menus' => 'Add View and delete menus',
        'install_themes' => 'Install Themes'
    ],

     /*
    |--------------------------------------------------------------------------
    | Lad default dashboard color schemes
    |--------------------------------------------------------------------------
    */
    'color_schemes' => ['default', 'light'],

    'use_ajax' => true,

    'developer' => [
        'name' => 'Okello Stephen Omoding',
        'email' => 'okellostephenomoding@gmail.com',
        'github' => 'https://github.com/stephendevs/stephendevs',
        'linkedin' => 'https://www.linkedin.com/in/stephendevs',
        'twitter' => 'https://twitter.com/stephendevs',
    ],

    
];