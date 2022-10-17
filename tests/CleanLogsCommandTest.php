<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can remove logs that are older than 3 weeks', function () {
    $numberOfRecordsToCreate = 40;
    \Dniccum\LaravelRequestLogs\Models\RequestLog::factory($numberOfRecordsToCreate)->create();

    $date = now()->subDays(config('request-logs.history'));
    $numberOfRecords = \Dniccum\LaravelRequestLogs\Models\RequestLog::where('request_start', '<', $date)
        ->count();

    \Pest\Laravel\artisan('request-logs:clean')->assertOk();

    $leftOverRecords = \Dniccum\LaravelRequestLogs\Models\RequestLog::where('request_start', '>', $date)
        ->count();

    expect($numberOfRecordsToCreate === ($leftOverRecords + $numberOfRecords))->toBeTrue();
});
