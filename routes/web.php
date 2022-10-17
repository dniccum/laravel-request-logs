<?php

use Illuminate\Support\Facades\Route;

Route::get('/test/get', [ \Dniccum\LaravelRequestLogs\Http\Controllers\TestController::class, 'getRequest' ])
    ->name('request-log-test.get');
Route::post('/test/post', [ \Dniccum\LaravelRequestLogs\Http\Controllers\TestController::class, 'postRequest' ])
    ->name('request-log-test.post');
Route::put('/test/put', [ \Dniccum\LaravelRequestLogs\Http\Controllers\TestController::class, 'putRequest' ])
    ->name('request-log-test.put');
Route::delete('/test/delete', [ \Dniccum\LaravelRequestLogs\Http\Controllers\TestController::class, 'deleteRequest' ])
    ->name('request-log-test.delete');
