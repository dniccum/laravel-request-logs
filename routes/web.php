<?php

use Dniccum\LaravelRequestLogs\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/test/get', [TestController::class, 'getRequest'])
    ->name('request-log-test.get');
Route::post('/test/post', [TestController::class, 'postRequest'])
    ->name('request-log-test.post');
Route::put('/test/put', [TestController::class, 'putRequest'])
    ->name('request-log-test.put');
Route::delete('/test/delete', [TestController::class, 'deleteRequest'])
    ->name('request-log-test.delete');
