<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $data
     * @param string|null $message
     * @param int $code
     * @return JsonResponse
     */
    protected function responseSuccess(array $data = [], string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data,
        ], $code);
    }

    /**
     * @param array $errors
     * @param string|null $message
     * @param int $code
     * @return JsonResponse
     */
    protected function responseError(array $errors = [], string $message = null, int $code = 400): JsonResponse
    {
        return response()->json([
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
        ], $code);
    }
}
