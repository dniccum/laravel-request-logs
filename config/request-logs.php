<?php

// config for Dniccum/LaravelRequestLogs
return [

    /*
    |--------------------------------------------------------------------------
    | Table Name
    |--------------------------------------------------------------------------
    |
    | The name of the table that will store the log entries.
    |
    */

    'table_name' => 'request_logs',

    /*
    |--------------------------------------------------------------------------
    | History
    |--------------------------------------------------------------------------
    |
    | The number of days of logs that you would like to keep in the database
    | at any time.
    |
    */

    'history' => env('LOGGING_HISTORY', 21),

    /*
    |--------------------------------------------------------------------------
    | Remove Bearer Token
    |--------------------------------------------------------------------------
    |
    | Enable if you would like to remove the bearer authentication token from
    | the request header.
    |
    */

    'remove_bearer' => env('LOGGING_REMOVE_BEARER', true),

];
