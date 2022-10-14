<?php

namespace Dniccum\LaravelRequestLogs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
