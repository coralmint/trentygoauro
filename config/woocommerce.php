<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Home URL to the store you want to connect to here
    |--------------------------------------------------------------------------
    */
    'store_url' => env('WOOCOMMERCE_STORE_URL', 'http://example.org/'),

    /*
    |--------------------------------------------------------------------------
    | Consumer Key
    |--------------------------------------------------------------------------
    */
    'consumer_key' => env('WOOCOMMERCE_CONSUMER_KEY', 'ck_3a878c534aa27bdbd1c2d862cfa7b7b5e5ccc253'),

    /*
    |--------------------------------------------------------------------------
    | Consumer Secret
    |--------------------------------------------------------------------------
    */
    'consumer_secret' => env('WOOCOMMERCE_CONSUMER_SECRET', 'cs_d268d12e7a4770d47336bab34cd6ee3adaa65c87'),

    /*
    |--------------------------------------------------------------------------
    | SSL support
    |--------------------------------------------------------------------------
    */
    'verify_ssl' => env('WOOCOMMERCE_VERIFY_SSL', true),

    /*
    |--------------------------------------------------------------------------
    | API version
    |--------------------------------------------------------------------------
    */
    'api_version' => env('WOOCOMMERCE_VERSION', 'v2'),

    /*
    |--------------------------------------------------------------------------
    | WP API usage
    |--------------------------------------------------------------------------
    */
    'wp_api' => env('WOOCOMMERCE_WP_API', true),

    /*
    |--------------------------------------------------------------------------
    | Force Basic Authentication as query string
    |--------------------------------------------------------------------------
    */
    'query_string_auth' => env('WOOCOMMERCE_WP_QUERY_STRING_AUTH', false),

    /*
    |--------------------------------------------------------------------------
    | WP timeout
    |--------------------------------------------------------------------------
    */
    'timeout' => env('WOOCOMMERCE_WP_TIMEOUT', 15),
];
