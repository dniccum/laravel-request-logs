<?php

namespace Dniccum\LaravelRequestLogs;

use Dniccum\LaravelRequestLogs\Commands\CleanReqeustLogsCommand;
use Dniccum\LaravelRequestLogs\Http\Middleware\RequestLogging;
use Illuminate\Routing\Router;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRequestLogsServiceProvider extends PackageServiceProvider
{
    public function bootingPackage()
    {
        if (app()->runningUnitTests()) {
            if (!defined('LARAVEL_START')) {
                define('LARAVEL_START', microtime(true));
            }

            $this->loadRoutesFrom("{$this->package->basePath('/../routes/')}web.php");

            $router = $this->app->make(Router::class);
            $router->aliasMiddleware('request-logging', RequestLogging::class);
        }
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-request-logs')
            ->hasConfigFile()
            ->hasMigration('create_request_logs_table')
            ->hasCommand(CleanReqeustLogsCommand::class);
    }
}
