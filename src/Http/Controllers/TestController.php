<?php

namespace Dniccum\LaravelRequestLogs\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    /**
     * Test Controller Constructor
     */
    public function __construct()
    {
        $this->middleware('request-logging');
    }

    /**
     * Returns a successful GET request
     *
     * @return JsonResponse
     */
    public function getRequest()
    {
        return response()->json([
            'message' => 'GET request successful',
        ]);
    }

    /**
     * Returns a successful POST request
     *
     * @return JsonResponse
     */
    public function postRequest()
    {
        return response()->json([
            'message' => 'POST request successful',
        ], 201);
    }

    /**
     * Returns a successful PUT request
     *
     * @return JsonResponse
     */
    public function putRequest()
    {
        return response()->json([
            'message' => 'PUT request successful',
        ]);
    }

    /**
     * Returns a successful DELETE request
     *
     * @return JsonResponse
     */
    public function deleteRequest()
    {
        return response()->json([
            'message' => 'DELETE request successful',
        ]);
    }
}
