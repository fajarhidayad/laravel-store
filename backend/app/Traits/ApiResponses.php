<?php

namespace App\Traits;

trait ApiResponses
{
    /**
     * Send a default success response.
     *
     * @param string $message
     * @return JsonResponse
     */
    protected function ok($message)
    {
        return $this->success($message, 200);
    }

    /**
     * Send a success response with no data.
     *
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    protected function success($message, $statusCode = 200)
    {
        return response()->json([
            'message' => $message
        ], $statusCode);
    }

    /**
     * Send a success response with data.
     *
     * @param mixed $data
     * @param int $code
     * @return JsonResponse
     */
    protected function success_data($data, $statusCode = 200)
    {
        return response()->json([
            "data" => $data
        ], $statusCode);
    }
}
