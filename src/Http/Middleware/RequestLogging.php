<?php

namespace Dniccum\LaravelRequestLogs\Http\Middleware;

use Closure;
use Dniccum\LaravelRequestLogs\Models\RequestLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestLogging
{
    public RequestLog $log;

    /**
     * Middleware constructor
     *
     * @param  RequestLog  $log
     */
    public function __construct(RequestLog $log)
    {
        $this->log = $log;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $key = $request->bearerToken();

        if ($key && config('request-logs.remove_bearer')) {
            $request->headers->remove('Authorization');
        }

        $request = $this->identifyRequest($request);

        return $next($request);
    }

    /**
     * Parse the request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  JsonResponse  $response
     * @return void
     */
    public function terminate(Request $request, JsonResponse $response)
    {
        $logEntry = new $this->log;
        $logEntry->id = $request->header('request_id');
        $logEntry->request_start = date('Y-m-d H:i:s', LARAVEL_START);
        $logEntry->request_end = date('Y-m-d H:i:s', microtime(true));
        $logEntry->method = $request->method();
        $logEntry->url = $request->fullUrl();
        $logEntry->request_body = json_decode($request->getContent(), true);
        $logEntry->request_header = $request->header();
        $logEntry->ip = $request->ip();
        $logEntry->status_code = $response->getStatusCode();
        $logEntry->response_body = json_decode($response->getContent(), true);
        $logEntry->save();
    }

    /**
     * Adds UUId to request
     *
     * @param  Request  $request
     * @return Request
     */
    protected function identifyRequest(Request $request): Request
    {
        $requestId = Str::uuid()->toString();
        $request->headers->add(['request_id' => $requestId]);

        return $request;
    }
}
