<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function finalResponse(
        $message = "success",
        $statusCode = 200,
        $data = null,
        $errors = null
    ): JsonResponse {
        return response()->json([
            "message" => $message,
            "data" => $data,
            'errors' => $errors
        ], $statusCode);
    }
    // public function ErrorResponse(
    //     $message = "error",
    //     $statusCode = 200,
    //     $data = null,
    //     $errors = null
    // ): JsonResponse {
    //     return response()->json([
    //         "message" => $message,
    //         "data" => $data,
    //         'errors' => $errors
    //     ], $statusCode);
    // }
    // public function Response($message, $data, $errors, $statusCode): JsonResponse
    // {
    //     return response()->json([
    //         "message" => $message,
    //         "data" => $data,
    //         'errors' => $errors
    //     ], $statusCode);
    // }
}
