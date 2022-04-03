<?php

return [

    /*
     * If enabled for voyager-login-as-user package.
     */
    'enabled' => env('VOYAGER_LOGIN_AS_USER_ENABLED', true),

    /*
    | Here you can specify for which data type slugs login-as-user is enabled
    | 
    | Supported: "*", or data type slugs "users", "roles"
    |
    */

    'allowed_slugs' => array_filter(explode(',', env('VOYAGER_LOGIN_AS_USER_ALLOWED_SLUGS', 'users'))),

    /*
    | Here you can specify for which data type slugs login-as-user is not allowed
    | 
    | Supported: "*", or data type slugs "users", "roles"
    |
    */

    'not_allowed_slugs' => array_filter(explode(',', env('VOYAGER_LOGIN_AS_USER_NOT_ALLOWED_SLUGS', ''))),

    /*
     * The config_key for voyager-login-as-user package.
     */
    'config_key' => env('VOYAGER_LOGIN_AS_USER_CONFIG_KEY', 'joy-voyager-login-as-user'),

    /*
     * The route_prefix for voyager-login-as-user package.
     */
    'route_prefix' => env('VOYAGER_LOGIN_AS_USER_ROUTE_PREFIX', 'joy-voyager-login-as-user'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerLoginAsUser\\Http\\Controllers',
    ],
];
