<?php 

namespace App\Utils;

use Illuminate\Http\JsonResponse;

class Responsefinal{

    public static function finalResponse(
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








}













?>