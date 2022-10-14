<?php

namespace Dniccum\LaravelRequestLogs;

use Dniccum\LaravelRequestLogs\Commands\CleanReqeustLogsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
