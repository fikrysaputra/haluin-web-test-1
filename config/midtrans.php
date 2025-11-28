<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Midtrans Server Key
    |--------------------------------------------------------------------------
    |
    | Server key digunakan untuk melakukan request API dari backend.
    |
    */
    'server_key' => env('MIDTRANS_SERVER_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Client Key
    |--------------------------------------------------------------------------
    |
    | Client key digunakan di frontend Snap JS untuk menampilkan popup payment.
    |
    */
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Production mode
    |--------------------------------------------------------------------------
    |
    | Jika true, akan menggunakan server dan client key production.
    | Jika false, akan menggunakan sandbox.
    |
    */
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    /*
    |--------------------------------------------------------------------------
    | Sanitized data
    |--------------------------------------------------------------------------
    |
    | Jika true, data input akan disanitasi untuk keamanan.
    |
    */
    'is_sanitized' => true,

    /*
    |--------------------------------------------------------------------------
    | 3DSecure
    |--------------------------------------------------------------------------
    |
    | Jika true, transaksi kartu kredit akan menggunakan 3D Secure.
    |
    */
    'is_3ds' => true,

];
