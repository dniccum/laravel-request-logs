<?php

namespace Dniccum\LaravelRequestLogs;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Dniccum\LaravelRequestLogs\Commands\CleanReqeustLogsCommand;

class LaravelRequestLogsServiceProvider extends PackageServiceProvider
{
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
