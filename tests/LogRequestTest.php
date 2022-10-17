<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can log a GET request', function () {
    \Pest\Laravel\getJson('/test/get')
        ->assertStatus(200);

    \Pest\Laravel\assertDatabaseHas(config('request-logs.table_name', 'request_logs'), [
        'method' => 'GET',
        'url' => 'http://localhost/test/get',
        'request_body' => json_encode([]),
        'status_code' => 200,
        'response_body' => json_encode([
            'message' => 'GET request successful',
        ]),
    ]);
});

it('can log a POST request', function () {
    \Pest\Laravel\postJson('/test/post')
        ->assertStatus(201);

    \Pest\Laravel\assertDatabaseHas(config('request-logs.table_name', 'request_logs'), [
        'method' => 'POST',
        'url' => 'http://localhost/test/post',
        'request_body' => json_encode([]),
        'status_code' => 201,
        'response_body' => json_encode([
            'message' => 'POST request successful',
        ]),
    ]);
});

it('can log a PUT request', function () {
    \Pest\Laravel\putJson('/test/put')
        ->assertStatus(200);

    \Pest\Laravel\assertDatabaseHas(config('request-logs.table_name', 'request_logs'), [
        'method' => 'PUT',
        'url' => 'http://localhost/test/put',
        'request_body' => json_encode([]),
        'status_code' => 200,
        'response_body' => json_encode([
            'message' => 'PUT request successful',
        ]),
    ]);
});

it('can log a DELETE request', function () {
    \Pest\Laravel\deleteJson('/test/delete')
        ->assertStatus(200);

    \Pest\Laravel\assertDatabaseHas(config('request-logs.table_name', 'request_logs'), [
        'method' => 'DELETE',
        'url' => 'http://localhost/test/delete',
        'request_body' => json_encode([]),
        'status_code' => 200,
        'response_body' => json_encode([
            'message' => 'DELETE request successful',
        ]),
    ]);
});
