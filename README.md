# Laravel Request Logs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dniccum/laravel-request-logs.svg?style=flat-square)](https://packagist.org/packages/dniccum/laravel-request-logs)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/dniccum/laravel-request-logs/run-tests?label=tests)](https://github.com/dniccum/laravel-request-logs/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/dniccum/laravel-request-logs/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/dniccum/laravel-request-logs/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dniccum/laravel-request-logs.svg?style=flat-square)](https://packagist.org/packages/dniccum/laravel-request-logs)

Provide insight to your application's requests with this Laravel-specific package. Simply add a light-weight middleware to your application and capture all the requests' body, headers, and responses. A console command is also provided that can be used to purge the logs to prevent any dated, unwanted bloat. 

## Installation

You can install the package via composer:

```bash
composer require dniccum/laravel-request-logs
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-request-logs-migrations"
php artisan migrate --force
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-request-logs-config"
```

This is the contents of the published config file:

```php
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
```

## Usage

### Middleware

#### Adding to Middleware Groups

If you would like to use this package's middleware across a large group of requests, like all of your `api` routes, you can apply it to your applications api middleware group within your `app/Http/Kernel.php` like so:

```php
protected $middlewareGroups = [
        'web' => [
            ...
        ],

        'api' => [
            ...
            \Dniccum\LaravelRequestLogs\Http\Middleware\RequestLogging::class,
        ],
    ];
```

#### Adding to specific routes

On the other hand, if you are wanting to add some logging clarity to specific routes, you can define it as a route middleware within your `app/Http/Kernel.php`:

```php
/**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        ...
        'route-logging' => \Dniccum\LaravelRequestLogs\Http\Middleware\RequestLogging::class
    ];
```

and then assign it to a specific route within your routes file:

```php
Route::post('/create-project', [ \App\Http\Controllers\SampleController::class, 'create' ])
    ->middleware([ 'route-logging' ]);
```

### Log Cleanup (optional)

**Note** – this is not required but *HIGHLY* recommended as this could lead to large amounts of data within your database in short periods of time.

To automate the removal of older logs you can either use the provided artisan command `php artisan request-logs:clean` manually with your app's environment, or you can leverage your app's scheduler process within your `app/Console/Kernel.php` file to automate it like so:

```php
$schedule->job(\Dniccum\LaravelRequestLogs\Commands\CleanReqeustLogsCommand::class)
    ->daily();
```

#### Stored History

By default, this package will retain **21 days** of logs. This can be changed via environment variable (`LOGGING_HISTORY`) or simply modifying it within the `request-logs.php` configuration file.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Doug Niccum](https://github.com/dniccum)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
