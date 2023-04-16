<?php

namespace App\Traits;

trait HttpResponses
{
    protected function success(array $data, string $message, int $code = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function error(string $message, int $code)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $code);
    }
}
