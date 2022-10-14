<?php

namespace Dniccum\LaravelRequestLogs\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dniccum\LaravelRequestLogs\LaravelRequestLogs
 */
class LaravelRequestLogs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Dniccum\LaravelRequestLogs\LaravelRequestLogs::class;
    }
}
