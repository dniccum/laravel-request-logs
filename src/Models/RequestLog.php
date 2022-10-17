<?php

namespace Dniccum\LaravelRequestLogs\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Dniccum\LaravelRequestLogs\Model\RequestLog
 *
 * @property string $id
 * @property string $method
 * @property string $url
 * @property string $ip
 * @property string $request_body
 * @property string $response_body
 * @property string|array|mixed $request_header
 * @property Carbon|string $request_start
 * @property Carbon|string $request_end
 * @property Carbon|string $created_at
 * @property int $status_code
 */
class RequestLog extends Model
{
    use HasFactory;

    protected $casts = [
        'request_body' => 'json',
        'response_body' => 'json',
        'request_header' => 'json',
        'request_start' => 'datetime',
    ];

    public $timestamps = false;

    /**
     * {@inheritDoc}
     */
    public function getTable()
    {
        return config('request-logs.table_name');
    }

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (RequestLog $model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
            $model->created_at = now();
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
