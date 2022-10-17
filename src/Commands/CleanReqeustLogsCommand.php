<?php

namespace Dniccum\LaravelRequestLogs\Commands;

use Illuminate\Console\Command;

class CleanReqeustLogsCommand extends Command
{
    public $signature = 'request-logs:clean';

    public $description = 'Clean the request logs based on the number of days you would like to keep';

    public function handle(): int
    {
        $date = now()->subDays(config('request-logs.history'));
        \Dniccum\LaravelRequestLogs\Models\RequestLog::where('request_start', '<=', $date)
            ->delete();

        $this->comment('Request logs are nice and tidy.');

        return self::SUCCESS;
    }
}
